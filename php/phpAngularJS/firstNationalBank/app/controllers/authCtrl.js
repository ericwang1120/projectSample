/**
 * 159339Assignment2
 * XIN WANG 15397438
 */
app.controller('authCtrl', ['$scope', '$http', '$location','toaster',function ($scope, $http, $location, toaster) {
    $scope.doLogin = function (user) {
        $http.post('api/login', {
            userName: user.userName,
            userPassword: user.userPassword
        }).then(function (results) {
            toaster.pop(results.data,"",results.data);
            if (results.data == "success") {
                $location.path('accountList');
            }
        });
    };
}]);