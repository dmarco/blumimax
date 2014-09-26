'use strict';

/* App Module */

var app = angular.module('blumimaxApp', [
  'ngRoute',
  'appControllers'
]);


app.config(['$routeProvider', '$locationProvider',
  function($routeProvider, $locationProvider) {
    
    $routeProvider.
      /*********************************************/
      // HOME
      when('/home', {
        templateUrl: 'partials/home.php'
      }).
      /*********************************************/
      // DEFAULT
      otherwise({
        templateUrl: 'partials/home.php'
      });

      $locationProvider.html5Mode(true);
      $locationProvider.hashPrefix('!');

  }]);


