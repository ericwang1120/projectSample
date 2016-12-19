/**
 * 159339Assignment2
 * XIN WANG 15397438
 */
app.controller('transactionCtrl', ['$scope', '$http', '$routeParams', function ($scope, $http, $routeParams) {
    $http.get('api/transaction/all/account/'+$routeParams.accountID).then(function (results) {
        $scope.transactions = results.data;
    });
}]);