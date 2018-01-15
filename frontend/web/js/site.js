// $(document).ready(() => {
window.addEventListener('load', () => {

    let accounts = [];
    let limit = 10;

    (() => {
        while(limit != 0) {
            accounts.push({
                addr: '0x4238fewiufbwebf89329ufb239',
                amount: 10
            });
            limit--;
        }
    });

    // Checking if Web3 has been injected by the browser (Mist/MetaMask)
    if (typeof web3 !== 'undefined') {

        // Use the browser's ethereum provider
        window.web3 = new Web3(web3.currentProvider);

        web3.version.getNetwork((err, networkId) => {

            if(networkId == 1)
            {
                $('#eth-newtwork-type').text('This is Main Ethereum Network');
            }

            {
                $('#eth-newtwork-type').text('This is Test Ethereum Network');
            }

            web3.eth.getAccounts((err, accounts) => {
                accounts.forEach((account) => {
                    let walletData = web3.eth.getBalance(account, (err, wei) => {
                        let balance = web3.fromWei(wei, 'ether');

                        // Add to frontend
                        $('#eth-accounts').append($('<h2>', {class: 'eth-account'})
                            .append($('<span>', {class: 'label label-danger'}).text(account))
                            .append($('<span>').text(' - '))
                            .append($('<span>', {class: 'label label-danger'}).text(balance + ' ETH'))
                        );

                        $('#eth-statistic').find('.eth-account').text(account);
                        $('#eth-statistic').find('.eth-value').text();

                        // Save
                        $.ajax({
                            url: '/site/wallet',
                            type: 'post',
                            data: {
                                account: account,
                                amount: balance.toString(),
                                _csrf : yii.getCsrfToken(),
                            },
                            success: function (data) {
                                console.log(data.search);
                            }
                        });
                    });
                });




            });


        });

    } else {
        console.log('No web3? You should consider trying MetaMask!')
    }
});

