var abi=[
    {
        "constant": false,
        "inputs": [],
        "name": "withdrawRefund",
        "outputs": [],
        "payable": true,
        "stateMutability": "payable",
        "type": "function"
    },
    {
        "constant": true,
        "inputs": [
            {
                "name": "bidder",
                "type": "address"
            }
        ],
        "name": "getUserBind",
        "outputs": [
            {
                "name": "",
                "type": "uint256[]"
            }
        ],
        "payable": false,
        "stateMutability": "view",
        "type": "function"
    },
    {
        "constant": true,
        "inputs": [],
        "name": "getProductCount",
        "outputs": [
            {
                "name": "",
                "type": "uint256"
            }
        ],
        "payable": false,
        "stateMutability": "view",
        "type": "function"
    },
    {
        "constant": true,
        "inputs": [],
        "name": "getRefundValue",
        "outputs": [
            {
                "name": "",
                "type": "uint256"
            }
        ],
        "payable": false,
        "stateMutability": "view",
        "type": "function"
    },
    {
        "constant": true,
        "inputs": [
            {
                "name": "proid",
                "type": "uint256"
            }
        ],
        "name": "getStatus",
        "outputs": [
            {
                "name": "",
                "type": "uint256"
            }
        ],
        "payable": false,
        "stateMutability": "view",
        "type": "function"
    },
    {
        "constant": true,
        "inputs": [
            {
                "name": "",
                "type": "uint256"
            }
        ],
        "name": "products",
        "outputs": [
            {
                "name": "p_id",
                "type": "uint256"
            },
            {
                "name": "p_name",
                "type": "string"
            },
            {
                "name": "p_start",
                "type": "uint256"
            },
            {
                "name": "p_deadline",
                "type": "uint256"
            },
            {
                "name": "p_price",
                "type": "uint256"
            },
            {
                "name": "p_current",
                "type": "uint256"
            },
            {
                "name": "status",
                "type": "uint8"
            },
            {
                "name": "init",
                "type": "bool"
            }
        ],
        "payable": false,
        "stateMutability": "view",
        "type": "function"
    },
    {
        "constant": true,
        "inputs": [
            {
                "name": "p_id",
                "type": "uint256"
            },
            {
                "name": "idx",
                "type": "uint256"
            }
        ],
        "name": "getBidProduct",
        "outputs": [
            {
                "name": "bidder",
                "type": "address"
            },
            {
                "name": "buyer_name",
                "type": "string"
            },
            {
                "name": "buyer_email",
                "type": "string"
            },
            {
                "name": "amount",
                "type": "uint256"
            },
            {
                "name": "timestamp",
                "type": "uint256"
            }
        ],
        "payable": false,
        "stateMutability": "view",
        "type": "function"
    },
    {
        "constant": false,
        "inputs": [
            {
                "name": "productid",
                "type": "uint256"
            },
            {
                "name": "bidder",
                "type": "address"
            },
            {
                "name": "buyer_name",
                "type": "string"
            },
            {
                "name": "buyer_email",
                "type": "string"
            },
            {
                "name": "amount",
                "type": "uint256"
            }
        ],
        "name": "placeBid",
        "outputs": [
            {
                "name": "success",
                "type": "bool"
            }
        ],
        "payable": true,
        "stateMutability": "payable",
        "type": "function"
    },
    {
        "constant": true,
        "inputs": [
            {
                "name": "",
                "type": "address"
            },
            {
                "name": "",
                "type": "uint256"
            }
        ],
        "name": "productsBidOnByUser",
        "outputs": [
            {
                "name": "",
                "type": "uint256"
            }
        ],
        "payable": false,
        "stateMutability": "view",
        "type": "function"
    },
    {
        "constant": true,
        "inputs": [
            {
                "name": "p_id",
                "type": "uint256"
            }
        ],
        "name": "queryProduct",
        "outputs": [
            {
                "name": "id",
                "type": "uint256"
            },
            {
                "name": "name",
                "type": "string"
            },
            {
                "name": "start",
                "type": "uint256"
            },
            {
                "name": "end",
                "type": "uint256"
            },
            {
                "name": "price",
                "type": "uint256"
            },
            {
                "name": "current",
                "type": "uint256"
            },
            {
                "name": "status",
                "type": "uint8"
            }
        ],
        "payable": false,
        "stateMutability": "view",
        "type": "function"
    },
    {
        "constant": false,
        "inputs": [
            {
                "name": "productid",
                "type": "uint256"
            }
        ],
        "name": "endAuction",
        "outputs": [
            {
                "name": "success",
                "type": "bool"
            }
        ],
        "payable": false,
        "stateMutability": "nonpayable",
        "type": "function"
    },
    {
        "constant": true,
        "inputs": [
            {
                "name": "productid",
                "type": "uint256"
            }
        ],
        "name": "getBindCount",
        "outputs": [
            {
                "name": "",
                "type": "uint256"
            }
        ],
        "payable": false,
        "stateMutability": "view",
        "type": "function"
    },
    {
        "constant": false,
        "inputs": [
            {
                "name": "p_id",
                "type": "uint256"
            },
            {
                "name": "p_name",
                "type": "string"
            },
            {
                "name": "p_start",
                "type": "uint256"
            },
            {
                "name": "p_deadline",
                "type": "uint256"
            },
            {
                "name": "p_price",
                "type": "uint256"
            }
        ],
        "name": "createProduct",
        "outputs": [
            {
                "name": "productid",
                "type": "uint256"
            }
        ],
        "payable": false,
        "stateMutability": "nonpayable",
        "type": "function"
    },
    {
        "anonymous": false,
        "inputs": [
            {
                "indexed": false,
                "name": "id",
                "type": "uint256"
            },
            {
                "indexed": false,
                "name": "p_name",
                "type": "string"
            },
            {
                "indexed": false,
                "name": "p_price",
                "type": "uint256"
            },
            {
                "indexed": false,
                "name": "p_start",
                "type": "uint256"
            },
            {
                "indexed": false,
                "name": "p_deadline",
                "type": "uint256"
            },
            {
                "indexed": false,
                "name": "status",
                "type": "uint8"
            }
        ],
        "name": "ProductCreated",
        "type": "event"
    },
    {
        "anonymous": false,
        "inputs": [
            {
                "indexed": false,
                "name": "productid",
                "type": "uint256"
            },
            {
                "indexed": false,
                "name": "bidder",
                "type": "address"
            },
            {
                "indexed": false,
                "name": "buyer_name",
                "type": "string"
            },
            {
                "indexed": false,
                "name": "buyer_email",
                "type": "string"
            },
            {
                "indexed": false,
                "name": "amount",
                "type": "uint256"
            },
            {
                "indexed": false,
                "name": "timestamp",
                "type": "uint256"
            }
        ],
        "name": "BindCreated",
        "type": "event"
    },
    {
        "anonymous": false,
        "inputs": [
            {
                "indexed": false,
                "name": "productid",
                "type": "uint256"
            },
            {
                "indexed": false,
                "name": "p_name",
                "type": "string"
            },
            {
                "indexed": false,
                "name": "winningBidder",
                "type": "address"
            },
            {
                "indexed": false,
                "name": "amount",
                "type": "uint256"
            }
        ],
        "name": "BindWinner",
        "type": "event"
    },
    {
        "anonymous": false,
        "inputs": [
            {
                "indexed": false,
                "name": "message",
                "type": "string"
            }
        ],
        "name": "LogFailure",
        "type": "event"
    }
];
var abi =JSON.parse(abi);
var Web3 = require('web3');
var web3 = new Web3(new Web3.providers.HttpProvider('https://ropsten.infura.io/v3/b7f2ce93c320460eaaef396b9f547f7b'));

//1. Call createProduct
function createProduct(contractaddress,p_id,p_name,p_start,p_deadline,p_price, getblock){
    var MyContract = web3.eth.contract(abi).at(contractaddress).createProduct(p_id,p_name,p_start,p_deadline,p_price,function(err, result){
        if (err){
            alert('Hủy tạo phiên đấu giá mua sản phẩm');
        } else {
            setTimeout(function (){
                getTransactionStatus(result,function (block) {
                    getblock(block);
                });
            }, 60000);
            clearTimeout();
        };
    });
};
//2. Đếm tổng số sản phẩm đưa lên sàn
function getProductCount(contractaddress,total){
    var MyContract = web3.eth.contract(abi).at(contractaddress).getProductCount.call(function(err, result){
        if (err){
            console.log(err);
        } else {
            total(result);
        };
    });
};

//3. Truy vấn thông tin một sản phẩm
function queryProduct(contractaddress,proid,data){
    var MyContract = web3.eth.contract(abi).at(contractaddress).queryProduct.call(proid,function(err, result){
        if (err){
            console.log(err);
        } else {
            data(result);
        };
    });
};
//3. Call Bid
function placeBid(contractaddress,productid, bidder, buyer_name, buyer_email,amount) {
    var MyContract = web3.eth.contract(abi).at(contractaddress).placeBid.sendTransaction(productid, bidder, buyer_name,buyer_email,amount,{
        from:bidder,
        value:web3.toWei(amount, "ether")},
        function(err, result){
        if (err){
            alert('Kiểm tra địa chỉ ví với hệ thống!');
        } else {
            console.log(result);
        };
    });
};

//4. Get tổng số người dùng đặt đấu giá mua sản phẩm
function getBindCount(contractaddress,productid,totalbinder){
    var MyContract = web3.eth.contract(abi).at(contractaddress).getBindCount.call(productid,
        function(err, result){
            if (err){
                alert('Lỗi truy cấp tổng số đặt đấu giá sản phẩm!');
            } else {
                totalbinder(result);
            };
        });
};

//5. Get ID sản phẩm người dùng đã đặt đấu giá
function getUserBind(contractaddress,bidder,total){
    var MyContract = web3.eth.contract(abi).at(contractaddress).getUserBind.call(bidder,
        function(err, result){
            if (err){
                alert('Lỗi lấy dữ liệu sản phẩm của người dùng đă đặt đấu giá!');
            } else {
                total(result);
            };
        });
};

//5. Hàm lấy giá người dùng đã đặt cho sản phẩm
function getBidProduct(contractaddress,proid,idx,data){
    var MyContract = web3.eth.contract(abi).at(contractaddress).getBidProduct.call(proid,idx,
        function(err, result){
            if (err){
                alert('Lỗi lấy dữ liệu giá người dùng đã đặt cho sản phẩm');
            } else {
                data(result);
            };
        });
};



//4. Call Send Coin
function sendCoin(contractaddress,buyer, admin, totalamount) {
    var MyContract = web3.eth.contract(abi).at(contractaddress).sendCoin(totalamount,{
        from:buyer,
        to:admin,
        value:web3.toWei(Totalamount, "ether"),
        gas:300000}, function(err, result){
        if (err) {
            console.log(err);
        } else {
            console.log(result);
        };
});
};

function GetFormattedDate(date) {
    var todayTime = new Date(date);
    var month = format(todayTime .getMonth() + 1);
    var day = format(todayTime .getDate());
    var year = format(todayTime .getFullYear());
    return month + "/" + day + "/" + year;
}