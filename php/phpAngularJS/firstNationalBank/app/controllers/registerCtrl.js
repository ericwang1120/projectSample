/**
 * 159339Assignment2
 * XIN WANG 15397438
 */
app.controller('registerCtrl', ['$scope', '$http', '$location', 'toaster', function ($scope, $http, $location, toaster) {
    $scope.register = function (user) {
        $http.post('api/user', {
            userName: user.userName,
            userPassword: user.userPassword,
            userFName: user.userFName,
            userLName: user.userLName,
            userEmail: user.userEmail
        }).then(function (results) {
            toaster.pop(results.data, "", results.data);
            if (results.data == "success") {
                $location.path('login');
            }
        });
    };
}]);