var app = angular.module('myApp', ['ngRoute', 'ngAnimate', 'toaster']);
app.config(['$routeProvider',
    function ($routeProvider) {
        $routeProvider.when('/login', {
            title: 'Login',
            templateUrl: 'app/templates/login.html',
            controller: 'authCtrl'
        })
            .when('/logout', {
                title: 'Logout',
                templateUrl: 'app/templates/login.html',
                controller: 'logoutCtrl'
            })
            .when('/register', {
                title: 'Register',
                templateUrl: 'app/templates/register.html',
                controller: 'registerCtrl'
            })
            .when('/accountList', {
                title: 'accountList',
                templateUrl: 'app/templates/accountList.html',
                controller: 'accountCtrl'
            })
            .when('/addAccount', {
                title: 'AddAccount',
                templateUrl: 'app/templates/addAccount.html',
                controller: 'accountCtrl'
            })
            .when('/transaction/all/account/:accountID', {
                title: 'transaction',
                templateUrl: 'app/templates/transactionList.html',
                controller: 'transactionCtrl'
            })
            .when('/transferView/:accountID', {
                title: 'transfer',
                templateUrl: 'app/templates/transferView.html',
                controller: 'transferCtrl'
            })
            .when('/', {
                title: 'Login',
                templateUrl: 'app/templates/login.html',
                controller: 'authCtrl',
                role: '0'
            })
            .otherwise({
                redirectTo: '/login'
            })
    }]).run(function ($rootScope, $location, $http) {
    $rootScope.$on("$routeChangeStart", function (event, next, current) {
        $rootScope.authenticated = false;
        $http.get('api/session').then(function (results) {
            if (results.data == "success") {
                $rootScope.authenticated = true;
            } else {
                var nextUrl = next.$$route.originalPath;
                if (nextUrl == '/login' || nextUrl == '/register') {

                } else {
                    $location.path("/login");
                }
            }
        });
    });
});
