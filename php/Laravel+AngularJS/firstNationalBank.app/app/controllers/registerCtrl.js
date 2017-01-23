/**
 * 159339Assignment2
 * XIN WANG 15397438
 */
app.controller('registerCtrl', ['$scope', '$http', '$location', 'toaster', function ($scope, $http, $location, toaster) {
    $scope.register = function (user) {
        $http.post('http://firstnationalbank.api/users', {
            name: user.userName,
            password: user.userPassword,
            email: user.userEmail
        }).then(function successCallback(results) {
            toaster.pop('success', "", 'success');
            $location.path('login');
        }, function errorCallback() {
            toaster.pop('fail', "", 'fail');
        });
    };
}]);