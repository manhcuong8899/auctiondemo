var AuctionProduct = artifacts.require("./AuctionProduct.sol");

module.exports = function(deployer){
  deployer.deploy(AuctionProduct);
};