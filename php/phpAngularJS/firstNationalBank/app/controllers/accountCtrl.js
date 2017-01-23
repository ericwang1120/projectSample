/**
 * 159339Assignment2
 * XIN WANG 15397438
 */
app.controller('accountCtrl', ['$scope', '$route', '$http', '$window', '$location', 'toaster', function ($scope, $route, $http, $window, $location, toaster) {
    $http.get('api/accountList').then(function (results) {
        $scope.accounts = results.data;
    });
    $scope.deleteAccount = function (accountID) {
        deleteWindow = $window.confirm('Are you sure you want to close the account?');
        if (deleteWindow) {
            $http({
                method: 'POST',
                url: 'api/account/' + accountID
            }).then(function (results) {
                toaster.pop(results.data, "", results.data);
                if (results.data == "success") {
                    $route.reload();
                }
            });
        }
    }
    $scope.openAccount = function (account) {
        $http.post('api/account',
            {
                cardNum: account.cardNum,
                accountName: account.accountName
            }).then(function (results) {
            toaster.pop(results.data, "", results.data);
            if (results.data == "success") {
                $location.path('accountList');
            }
        });
    }
}]);