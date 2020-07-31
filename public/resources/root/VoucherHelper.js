VoucherHelper = {
    contracts: {},
    load: async () => {
        await VoucherHelper.loadWeb3();
        await VoucherHelper.loadAccount();
        await VoucherHelper.loadContract();
    },
    loadWeb3: async () => {
        if (typeof web3 !== 'undefined') {
            VoucherHelper.web3Provider = web3.currentProvider;
            web3 = new Web3(web3.currentProvider);
        } else {
            window.alert("Please connect to Metamask.");
        }
        // Modern dapp browsers...
        if (window.ethereum) {
            window.web3 = new Web3(ethereum);
            try {
                // Request account access if needed
                await ethereum.enable();
                // Acccounts now exposed
                web3.eth.sendTransaction({});
            } catch (error) {
                // User denied account access...
            }
        }
        // Legacy dapp browsers...
        else if (window.web3) {
            VoucherHelper.web3Provider = web3.currentProvider;
            window.web3 = new Web3(web3.currentProvider);
            // Acccounts always exposed
            web3.eth.sendTransaction({});
        }
        // Non-dapp browsers...
        else {
            console.log('Non-Ethereum browser detected. You should consider trying MetaMask!');
        }
    },
    loadAccount: async () => {
        VoucherHelper.account = web3.eth.accounts[0];
        console.log("[Load Account] " + VoucherHelper.account);
    },
    loadContract: async () => {
        // Create a JavaScript version of the smart contract
        const assetPath = $('meta[name="asset-path"]').attr('content');
        const evoucher = await $.getJSON(assetPath + 'resources/root/Evoucher.json');
        VoucherHelper.contracts.Evoucher = TruffleContract(evoucher);
        VoucherHelper.contracts.Evoucher.setProvider(VoucherHelper.web3Provider);

        // Hydrate the smart contract with values from the blockchain
        VoucherHelper.evoucher = await VoucherHelper.contracts.Evoucher.deployed();
    },
    createVoucher: async (params) => {
        let isCreateSuccess = await VoucherHelper.evoucher.insert(
            params.token,
            params.price,
            params.issue_from,
            params.issue_until,
            params.redeem_date
        );
        return isCreateSuccess;
    },
    getVoucher: async (token) => {
        let voucher = await VoucherHelper.evoucher.getVoucher(token);
        return voucher;
    } 
};