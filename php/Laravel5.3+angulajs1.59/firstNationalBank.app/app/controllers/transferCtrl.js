/**
 * 159339Assignment2
 * XIN WANG 15397438
 */
app.controller('transferCtrl', ['$scope', '$http', '$routeParams', '$location', 'toaster', 'SessionService', function ($scope, $http, $routeParams, $location, toaster, SessionService, CSRF_TOKEN) {
    var config = {
        headers: {
            'Authorization': 'Bearer ' + SessionService.get('access_token')
        }
    };

    var $_token = "{{ csrf_token() }}";

    $scope.transaction = {};
    $scope.transfer = function (transaction) {
        $http.post('http://firstnationalbank.api/transactions/accounts/' + $routeParams.accountID, {
            transaction_amount: transaction.amount,
            transaction_type: transaction.type,
            _token: "{{ csrf_token() }}"
        }, config).then(function successCallback(results) {
            toaster.pop("success", "", "success");
            $location.path('accountList');
        }, function errorCallback() {
            toaster.pop("fail", "", "fail");
        });
    };

    $http.get('http://firstnationalbank.api/accounts/' + $routeParams.accountID, config).then(function (results) {
        $scope.account = results.data;
    });

    $scope.calculateBalance = function (transactionType, previousBalance, transferAmount) {
        var balanceAfterTransfer;
        if (transactionType == "deposit") {
            balanceAfterTransfer = previousBalance * 1 + transferAmount * 1;
        }
        else if (transactionType == "withdraw") {
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