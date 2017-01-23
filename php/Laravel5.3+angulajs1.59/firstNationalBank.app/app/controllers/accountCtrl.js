/**
 * 159339Assignment2
 * XIN WANG 15397438
 */
app.controller('accountCtrl', ['$scope', '$route', '$http', '$window', '$location', 'toaster', 'SessionService', function ($scope, $route, $http, $window, $location, toaster, SessionService) {
    // console.log('Bearer ' + $rootScope.access_token);

    var config = {
        headers: {
            'Authorization': 'Bearer ' + SessionService.get('access_token')
        }
    };


    $http.get('http://firstnationalbank.api/users/accounts', config).then(function (results) {
        $scope.accounts = results.data;
    });
    $scope.deleteAccount = function (accountID) {
        deleteWindow = $window.confirm('Are you sure you want to close the account?');
        if (deleteWindow) {
            $http({
                method: 'DELETE',
                url: 'http://firstnationalbank.api/accounts/' + accountID,
                headers: {
                    'Authorization': 'Bearer ' + SessionService.get('access_token')
                }
            }).then(function successCallback() {
                toaster.pop("success", "", "success");
                $route.reload();
            }, function errorCallback() {
                toaster.pop('fail', "", 'fail');
            });
        }
    };
    $scope.openAccount = function (account) {
        $http.post('http://firstnationalbank.api/accounts',
            {
                card_num: account.cardNum,
                account_name: account.accountName
            }, config
        ).then(function (results) {
            toaster.pop(results.data, "", results.data);
            if (results.data == "success") {
                $location.path('accountList');
            }
        });
    }
}
]);