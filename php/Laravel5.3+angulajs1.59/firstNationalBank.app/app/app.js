var app = angular.module('myApp', ['ngRoute', 'ngAnimate', 'toaster']);

app.constant("CSRF_TOKEN", '{!! csrf_token() !!}');

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
    }]);

app.factory("SessionService", function () {
    return {
        get: function (key) {
            return sessionStorage.getItem(key);
        },
        set: function (key, val) {
            return sessionStorage.setItem(key, val);
        },
        unset: function (key) {
            return sessionStorage.removeItem(key);
        }
    }
});

app.run(function ($rootScope, $location, SessionService) {
    $rootScope.$on("$routeChangeStart", function (event, next) {
        if (!SessionService.get('authenticated')) {
            var nextUrl = next.$$route.originalPath;
            if (nextUrl != '/login' && nextUrl != '/register') {
                $location.path("/login");
            }
        }
    });
});


