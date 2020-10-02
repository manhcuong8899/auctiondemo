pragma solidity >=0.4.0 <0.7.0;

contract AuctionProduct {
// KHAI BÁO
//1.
    struct Product {
        unit id;
        uint p_id;
        string p_name;
        uint256 p_price;   // Giá sàn (giá tối thiểu đặt)
        bool init;
    }

    Product[] public products;

    // Các Hàm Tạo sự kiện
    event ProductCreated(uint p_id, string p_name, uint p_price);

// CÁC GHI DỮ LIỆU VÀO MẠNG BLOCKCHAIN
//1. Ghi dữ liệu sản phẩm trong giỏ hàng được người sử dụng đấu giá
    function createProduct(
                            
                            string memory p_name,
                            uint256 p_price
                        )  payable public returns (uint productid){

         /// Ghi dữ liệu sản phẩm người mua đặt giá
            productid = products.length++;
            products[productid].p_id = productid;
            products[productid].p_name = p_name;
            products[productid].p_price = p_price;
         /// Tạo sự kiện khi tạo giao dịch đấu giá trên mỗi sản phẩm
        emit ProductCreated(productid, p_name,p_price);
        return productid;
    }
}