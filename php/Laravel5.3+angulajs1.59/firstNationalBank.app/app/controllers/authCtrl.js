/**
 * 159339Assignment2
 * XIN WANG 15397438
 */
app.controller('authCtrl', ['$scope', '$http', '$location', 'toaster', '$rootScope', 'SessionService', function ($scope, $http, $location, toaster, $rootScope, SessionService) {

    $scope.doLogin = function (user) {
        $http.post('http://firstnationalbank.api/oauth/token', {
            grant_type: 'password',
            client_id: '2',
            client_secret: 'J6PH3oP2Xq0M0osT23A0fiybj1dtLJoe2A6Nt0Rx',
            username: user.userName,
            password: user.userPassword,
            scope: ''
        }, {
            headers: {
                'Content-Type': 'multipart/form-data,application/json'
            }
        }).then(function successCallback(results) {
            toaster.pop('success', '', 'success');
            SessionService.set('authenticated', true);
            SessionService.set('access_token', results.data['access_token']);
            $location.path('accountList');
        }, function errorCallback() {
            toaster.pop('fail', '', 'fail');
        });
    };
}]);