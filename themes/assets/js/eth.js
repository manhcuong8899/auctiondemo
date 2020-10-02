// Get blockNumber Transactions
function getTransactionStatus(result,block) {
    web3.eth.getTransaction(result,function (loi, ok){
            block(ok.blockNumber);
    });
}


