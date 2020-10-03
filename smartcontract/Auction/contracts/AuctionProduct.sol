pragma solidity >=0.4.0 <0.7.0;
contract AuctionProduct{
    enum BidStatus {Pending, Winner, NotWinner}
    struct Bid {
        address bidder;
        string buyer_name;
        string buyer_email;
        uint256 amount;
        uint timestamp;
        BidStatus status;
    }
    enum AuctionStatus {Pending, Active, Inactive, Finish}

    struct Product {
        uint p_id;
        string p_name;
        uint  p_start;
        uint   p_deadline;
        uint256 p_price;
        uint256 p_current;
        AuctionStatus status;
        bool init;
        Bid[] bids;
    }
    Product[] public products;

    mapping(address => uint[]) public productsBidOnByUser;
    mapping(address => uint) refunds;

    event ProductCreated(uint id, string p_name, uint256 p_price, uint p_start, uint p_deadline, AuctionStatus status);
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
        string memory p_name,
        uint   p_start,
        uint   p_deadline,
        uint256 p_price
    ) public returns (uint productid) {
        productid = products.length++;
        Product storage pro = products[productid];
        pro.p_id = p_id;
        pro.p_name = p_name;
        pro.p_start = p_start;
        pro.p_deadline = p_deadline;
        pro.p_price = p_price;
        pro.p_current = p_price;
        pro.status = AuctionStatus.Active;
        pro.init = true;

        emit ProductCreated(p_id, p_name,p_price,p_start,p_deadline,products[productid].status);
        return productid;
    }
    function placeBid(uint productid, address bidder, string memory buyer_name,string memory buyer_email,uint256 amount) payable CheckAuction(productid) public returns (bool success){

        Product storage pro = products[productid];
        if (pro.p_current >= amount){
            revert();
        }

        uint bidIdx = pro.bids.length++;
        pro.bids[bidIdx].bidder = bidder;
        pro.bids[bidIdx].buyer_name = buyer_name;
        pro.bids[bidIdx].buyer_email = buyer_email;
        pro.bids[bidIdx].amount = amount;
        pro.bids[bidIdx].timestamp = now;
        pro.bids[bidIdx].status = BidStatus.Pending;
        pro.p_current = amount;
        productsBidOnByUser[bidder].push(productid);

        if (bidIdx > 0) {
            Bid storage previousBid = pro.bids[bidIdx - 1];
            refunds[previousBid.bidder] += previousBid.amount;
            pro.bids[pro.bids.length-1].status = BidStatus.NotWinner;
        }
        emit BindCreated(productid, bidder, buyer_name,buyer_email,amount,now);
        return true;
    }
    function endAuction(uint productid) public returns (bool success) {
        Product storage pro = products[productid];
        if (pro.status!= AuctionStatus.Active) {
            revert();
        }
        if (now < pro.p_deadline){
            revert();
        }
        if (pro.bids.length == 0) {
            pro.status = AuctionStatus.Inactive;
            return true;
        }
        pro.bids[pro.bids.length-1].status = BidStatus.Winner;
        emit BindWinner(productid, pro.p_name,pro.bids[pro.bids.length-1].bidder,pro.p_current);
        pro.status = AuctionStatus.Finish;
        return true;
    }
    function  getStatus(uint proid) view public returns (uint) {
        Product storage pro = products[proid];
        return uint(pro.status);
    }

    function queryProduct(uint p_id) view public returns (uint id, string memory name,uint start,uint end,uint256 price,uint256 current,AuctionStatus status) {
        require(products[p_id].init);
        return(products[p_id].p_id,products[p_id].p_name,products[p_id].p_start,products[p_id].p_deadline,products[p_id].p_price,products[p_id].p_current,products[p_id].status);
    }
    function getProductCount() view public returns (uint) {
        return products.length;
    }
    // Cum ham su dung truy van so luong nguoi dung dat mua tren 1 san pham
    function getBindCount(uint productid) view public returns (uint) {
        return uint(products[productid].bids.length);
    }

    function getBidProduct(uint p_id, uint idx) view public returns (address bidder, string memory buyer_name, string memory buyer_email, uint256 amount, uint timestamp) {

        if(idx > products[p_id].bids.length - 1) {
            revert();
        }
        return (products[p_id].bids[idx].bidder, products[p_id].bids[idx].buyer_name, products[p_id].bids[idx].buyer_email, products[p_id].bids[idx].amount,products[p_id].bids[idx].timestamp);
    }

    // Truy van nguoi dung da tham gia nhung phien mua dau gia san pham
    function getUserBind(address bidder) view public returns (uint[]) {
        return (productsBidOnByUser[bidder]);
    }

    function getRefundValue()view public returns (uint){
        return refunds[msg.sender];
    }
    function withdrawRefund() payable public{
        uint refund = refunds[msg.sender];
        refunds[msg.sender] = 0;
        if (!msg.sender.send(refund))
            refunds[msg.sender] = refund;
    }
}