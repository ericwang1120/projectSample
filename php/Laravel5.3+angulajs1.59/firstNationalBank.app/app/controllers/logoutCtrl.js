/**
 * 159339Assignment2
 * XIN WANG 15397438
 */
app.controller('logoutCtrl', ['$http', '$location', 'toaster', 'SessionService', function ($http, $location, toaster, SessionService) {
    SessionService.unset('authenticated');
    SessionService.unset('access_token')
    toaster.pop('success', '', 'success');
    $location.path('login');
}]);