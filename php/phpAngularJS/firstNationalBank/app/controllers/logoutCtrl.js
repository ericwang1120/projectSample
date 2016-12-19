/**
 * 159339Assignment2
 * XIN WANG 15397438
 */
app.controller('logoutCtrl', ['$http', '$location', 'toaster', function ($http, $location, toaster) {
    $http.get('api/logout').then(function (results) {
        toaster.pop(results.data, "", results.data);
        if (results.data == "success") {
            $location.path('login');
        }
    });
}]);