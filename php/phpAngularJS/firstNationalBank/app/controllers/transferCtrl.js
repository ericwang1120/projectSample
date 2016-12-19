/**
 * 159339Assignment2
 * XIN WANG 15397438
 */
app.controller('transferCtrl', ['$scope', '$http', '$routeParams', '$location', 'toaster', function ($scope, $http, $routeParams, $location, toaster) {
    $scope.transaction = {};
    $scope.transfer = function (transaction) {
        $http.post('api/account/' + $routeParams.accountID, {
            balance: transaction.balanceAfterTransfer,
            transactionAmount: transaction.amount,
            transactionType: transaction.type
        }).then(function (results) {
            toaster.pop(results.data, "", results.data);
            $location.path('accountList');
        });
    };
    $http.get('api/account/' + $routeParams.accountID).then(function (results) {
        $scope.account = results.data[0];
    });
    $scope.calculateBalance = function (transactionType, previousBalance, transferAmount) {
        var balanceAfterTransfer;
        if (transactionType == "Deposit") {
            balanceAfterTransfer = previousBalance * 1 + transferAmount * 1;
        }
        else if (transactionType == "Withdraw") {
            if (previousBalance * 1 - transferAmount * 1 < 0) {
            }
            balanceAfterTransfer = previousBalance * 1 - transferAmount * 1;
        }
        else {
            balanceAfterTransfer = previousBalance * 1;
        }
        $scope.transaction['balanceAfterTransfer'] = balanceAfterTransfer;
        return balanceAfterTransfer;
    }
}]);