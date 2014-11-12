'use strict';

/* App Module */

var app = angular.module('blumimaxApp', ['ui.bootstrap']);

app.controller('GblCtrl', function($scope, $http){

	// console.log("Bienvenido!");

	$scope.autocomplete = ['Alabama', 'Alaska', 'Arizona', 'Arkansas', 'California', 'Colorado', 'Connecticut', 'Delaware', 'Florida', 'Georgia', 'Hawaii', 'Idaho', 'Illinois', 'Indiana', 'Iowa', 'Kansas', 'Kentucky', 'Louisiana', 'Maine', 'Maryland', 'Massachusetts', 'Michigan', 'Minnesota', 'Mississippi', 'Missouri', 'Montana', 'Nebraska', 'Nevada', 'New Hampshire', 'New Jersey', 'New Mexico', 'New York', 'North Dakota', 'North Carolina', 'Ohio', 'Oklahoma', 'Oregon', 'Pennsylvania', 'Rhode Island', 'South Carolina', 'South Dakota', 'Tennessee', 'Texas', 'Utah', 'Vermont', 'Virginia', 'Washington', 'West Virginia', 'Wisconsin', 'Wyoming'];
	
	$http.post('/autocomplete')
	.success(function(data) {
     console.log(data);
  });



});

app.controller('CarouselDemoCtrl', function($scope, $http){

	$scope.myInterval = 5000;
  $scope.slides = [
  	{
      image: 'http://placekitten.com/700/400',
      text: 'hola'
    },
    {
      image: 'http://placekitten.com/701/400',
      text: 'hola'
    },
    {
      image: 'http://placekitten.com/702/400',
      text: 'hola'
    }
  ];
  

});
