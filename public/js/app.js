'use strict';

/* App Module */

var app = angular.module('blumimaxApp', []);

app.controller('GblCtrl', function($scope, $http){

	$scope.search = function(){
		
		$http.get('search', {
			params: { name: $scope.searchInput }
		}).success(function(data){
			$scope.users = data;
			console.log(data);
		});

	};

})