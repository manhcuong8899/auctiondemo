/**
 *Submitted for verification at Etherscan.io on 2020-10-12
*/

pragma solidity >=0.4.0 <0.7.0;
contract AuctionProduct{
    enum BidStatus {Pending,Winner,NotWinner}
    struct Bid {
        uint id;
        address bidder;
        string buyer_name;
        string buyer_email;
        uint256 amount;
        uint timestamp;
        BidStatus status;
    }
    enum AuctionStatus {Pending, Active, Inactive, Finish, Success}

    struct Product {
        uint id;
        uint p_id;
        address seller;
        string p_name;
        uint  p_start;
        uint   p_deadline;
        uint256 p_price;
        uint256 p_current;
        AuctionStatus status;
        bool init;
        Bid[] bids;
    }

    struct History {
        uint p_id;
        uint bid_id;
        uint256 amount;
        uint bidtime;
    }

    Product[] public products;

    mapping(address => uint[]) public productsBidOnByUser;
    mapping(address => History[]) public historys;
    mapping(address => uint) public refunds;
    mapping(uint => Bid) public Winner;

    event ProductCreated(uint id, uint pid, string p_name, uint256 p_price, uint p_start, uint p_deadline, AuctionStatus status);
    event BindCreated(uint productid, address bidder, string buyer_name, string buyer_email,  uint256 amount, uint timestamp);
    event BindWinner(uint productid, string p_name, address winningBidder, uint256 amount);
    event LogFailure(string message);

    modifier CheckAuction(uint productId) {
        if (products[productId].status != AuctionStatus.Active) {
            revert();
        }

        if (block.timestamp < products[productId].p_start) {
            revert();
        }

        // Auction should not be over
        if (block.timestamp >= products[productId].p_deadline) {
            revert();
        }
        _;
    }
    function createProduct(
        uint p_id,
        address seller,
        string memory p_name,
        uint   p_start,
        uint   p_deadline,
        uint256 p_price
    ) public returns (uint productid) {

        if (p_deadline < now){
            revert();
        }
        productid = products.length++;
        Product storage pro = products[productid];
        pro.id = productid;
        pro.p_id = p_id;
        pro.seller = seller;
        pro.p_name = p_name;
        pro.p_start = p_start;
        pro.p_deadline = p_deadline;
        pro.p_price = p_price;
        pro.p_current = p_price;
        pro.status = AuctionStatus.Active;
        pro.init = true;

        emit ProductCreated(productid,p_id, p_name,p_price,p_start,p_deadline,products[productid].status);
        return productid;
    }
    function placeBid(uint productid, address bidder, string memory buyer_name,string memory buyer_email,uint256 amount) payable CheckAuction(productid) public returns (bool success){
        Product storage pro = products[productid];
        if (pro.p_current >= amount){
            revert();
        }
        uint bidIdx = pro.bids.length++;
        pro.bids[bidIdx].id = bidIdx;
        pro.bids[bidIdx].bidder = bidder;
        pro.bids[bidIdx].buyer_name = buyer_name;
        pro.bids[bidIdx].buyer_email = buyer_email;
        pro.bids[bidIdx].amount = amount;
        pro.bids[bidIdx].timestamp = now;
        pro.bids[bidIdx].status = BidStatus.Pending;
        pro.p_current = amount;
        productsBidOnByUser[bidder].push(productid);

        historys[bidder].push(History({
            p_id: productid,
            bid_id: bidIdx,
            amount:amount,
            bidtime:now
            }));
        if (bidIdx > 0) {
            Bid storage previousBid = pro.bids[bidIdx - 1];
            refunds[previousBid.bidder] += previousBid.amount;
            previousBid.status = BidStatus.NotWinner;
        }
        emit BindCreated(productid, bidder, buyer_name,buyer_email,amount,now);
        return true;
    }
    function endAuction(uint productid) public returns (bool success) {
        Product storage pro = products[productid];
        if (pro.status!= AuctionStatus.Active) {
            revert();
        }
        if (pro.bids.length == 0) {
            pro.status = AuctionStatus.Inactive;
            return true;
        }
        pro.bids[pro.bids.length-1].status = BidStatus.Winner;
        emit BindWinner(productid, pro.p_name,pro.bids[pro.bids.length-1].bidder,pro.p_current);
        pro.status = AuctionStatus.Finish;
        Bid storage awinner = Winner[productid]; // Ghi du lieu nguoi mua dau gia thang cuoc
        awinner.id = pro.bids[pro.bids.length-1].id;
        awinner.bidder = pro.bids[pro.bids.length-1].bidder;
        awinner.buyer_name = pro.bids[pro.bids.length-1].buyer_name;
        awinner.amount = pro.bids[pro.bids.length-1].amount;
        awinner.timestamp = pro.bids[pro.bids.length-1].timestamp;
        return true;
    }
    function  getStatus(uint proid) view public returns (uint) {
        Product storage pro = products[proid];
        return uint(pro.status);
    }

    function queryProduct(uint p_id) view public returns (uint productid, string memory name,uint start,uint end,uint256 price,uint256 current,AuctionStatus status) {
        require(products[p_id].init);
        return(products[p_id].id,products[p_id].p_name,products[p_id].p_start,products[p_id].p_deadline,products[p_id].p_price,products[p_id].p_current,products[p_id].status);
    }
    function getProductCount() view public returns (uint) {
        return products.length;
    }
    // Cum ham su dung truy van so luong nguoi dung dat mua tren 1 san pham
    function getBindCount(uint productid) view public returns (uint) {
        return uint(products[productid].bids.length);
    }

    function getHistoryCount(address bidder) view public returns (uint) {
        return uint(historys[bidder].length);
    }

    function getBidProduct(uint p_id, uint idx) view public returns (uint id, address bidder, string memory buyer_name, string memory buyer_email, uint256 amount, uint timestamp, BidStatus status) {

        if(idx > products[p_id].bids.length - 1) {
            revert();
        }
        return (products[p_id].bids[idx].id, products[p_id].bids[idx].bidder, products[p_id].bids[idx].buyer_name, products[p_id].bids[idx].buyer_email, products[p_id].bids[idx].amount,products[p_id].bids[idx].timestamp,products[p_id].bids[idx].status);
    }

    // Truy van nguoi dung da tham gia nhung phien mua dau gia san pham
    function getUserBind(address bidder) view public returns (uint[]) {
        return (productsBidOnByUser[bidder]);
    }

    function getRefundValue( address binder)view public returns (uint){
        return refunds[binder];
    }
    function withdrawRefund() payable public{
        uint refund = refunds[msg.sender];
        refunds[msg.sender] = 0;
        if (!msg.sender.send(refund*1000000000000000000))
            refunds[msg.sender] = refund;
    }
    function GetCoinFromWinner(uint proid) payable public{
        if(Winner[proid].amount==0){
            revert();
        }
        Product storage pro = products[proid];
        if (pro.seller!= msg.sender){
            revert();
        }
        if (pro.status!= AuctionStatus.Finish){
            revert();
        }
        uint256 amountwinner = Winner[proid].amount;
        Winner[proid].amount=0;
        pro.status = AuctionStatus.Success;
        if(!msg.sender.send(amountwinner*1000000000000000000))
        {
            Winner[proid].amount=amountwinner;
            pro.status = AuctionStatus.Finish;
        }
    }
}