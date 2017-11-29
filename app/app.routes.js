var myApp = angular.module('myApp', ['ngRoute']);
var host=window.location.hostname;
console.log(host);
myApp.config(function ($routeProvider) {
    $routeProvider
            .when('/infoPUB/:id*', {
                templateUrl: '/app/shared/infoPUB.php',
                controller: 'pubCtrl'
            })
            .when('/updatePub/:id*', {
                templateUrl: '/app/components/chercheur/updatePub.html',
                controller: 'pubCtrl'
            })
            .otherwise({
                redirect: '/'
            });
});
// HOME
myApp.directive("about", function () {
    return{
        templateUrl: '/app/components/home/about.html'
    };
});
myApp.directive("equipe", function () {
    return{
        templateUrl: '/app/components/home/equipe.html'
    };
});
myApp.directive("articles", function () {
    return{
        templateUrl: '/app/components/home/publication.php'
    };
});
myApp.directive("infoGeneral", function () {
    return{
        templateUrl: '/app/shared/infoGeneral.html'
    };
});
// END HOME

//ADMIN
myApp.directive("listUser", function () {
    return{
        templateUrl: '/app/components/admin/listUser.html'
    };
});
myApp.directive("statistique", function () {
    return{
        templateUrl: '/app/components/admin/statistique.html'
    };
});
myApp.directive("anomalies", function () {
    return{
        templateUrl: '/app/components/admin/anomalies.php'
    };
});
//END ADMIN

//CHERCHEUR
myApp.directive("ajoutePub", function () {
    return{
        templateUrl: 'ajoutePub.html'
    };
});
myApp.directive("ajouteUtilisateur", function () {
    return{
        templateUrl: 'ajouteUtilisateur.html'
    };
});
myApp.directive("modifierPub", function () {
    return{
        templateUrl: 'modifierPub.html'
    };
});

