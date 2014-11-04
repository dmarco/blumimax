'use strict';

/* App Module */

var app = angular.module('blumimaxApp', []);

app.controller('GblCtrl', function($scope, $http){

	console.log("Bienvenido!");

	/*$scope.search = function(){
		
		$http.get('search', {
			params: { name: $scope.searchInput }
		}).success(function(data){
			$scope.users = data;
			console.log(data);
		});

	};*/

})

app.controller('PriceCtrl', function($scope, $http){

	$scope.priceFilter = function(min, max){
		
		console.log(min, max);

		$http.post('priceFilter', {
			params: { 
				min: min,
				max: max 
			}
		}).success(function(data){
			console.log(data);
		});

		

	};

})