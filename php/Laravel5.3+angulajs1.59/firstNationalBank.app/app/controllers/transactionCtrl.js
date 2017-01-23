/**
 * 159339Assignment2
 * XIN WANG 15397438
 */
app.controller('transactionCtrl', ['$scope', '$http', 'SessionService', '$routeParams',function ($scope, $http, SessionService,$routeParams) {
    var config = {
        headers: {
            'Authorization': 'Bearer ' + SessionService.get('access_token')
        }
    };
    $http.get('http://firstnationalbank.api/accounts/'+$routeParams.accountID+'/transactions',config).then(function (results) {
        $scope.transactions = results.data;
    });
}]);