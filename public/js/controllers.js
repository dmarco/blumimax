'use strict';

/* Controllers */

var app = angular.module('appControllers', []);

app.controller('ProductsCtrl', ['$scope', '$http', '$location',
  function($scope, $http, $location) {
    
    $http.get('home/products').success(function(data) {
      
    	$scope.products = data;

    });
    
  }
]);

app.controller('NavCtrl', ['$scope', '$http', '$location',
  function($scope, $http, $location) {
    
    $http.get('home/categories').success(function(data) {
      
    	$scope.categories = data;
    	//console.log(data);

    });
    
  }
]);

