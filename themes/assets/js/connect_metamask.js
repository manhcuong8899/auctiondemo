window.addEventListener('load', async () =>{
    // Modern dapp browsers...
    if (window.ethereum) {
    window.web3 = new Web3(ethereum);
    try {
        await ethereum.enable();
        var accounts= await web3.eth.getAccounts();
        var option={from: accounts[0] };
    } catch (error) {
        // User denied account access...
    }
}
// Legacy dapp browsers...
else if (window.web3) {
    window.web3 = new Web3(web3.currentProvider);
    // Acccounts always exposed
    web3.eth.sendTransaction({/* ... */});
}
// Non-dapp browsers...
else {
    console.log('Non-Ethereum browser detected. You should consider trying MetaMask!');
}
});