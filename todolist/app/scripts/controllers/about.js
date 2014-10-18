'use strict';

/**
 * @ngdoc function
 * @name todolistApp.controller:AboutCtrl
 * @description
 * # AboutCtrl
 * Controller of the todolistApp
 */
angular.module('todolistApp')
  .controller('AboutCtrl', function ($scope,G) {
    $scope.awesomeThings = [
      'HTML5 Boilerplate',
      'AngularJS',
      'Karma'
    ];
    $scope.awesomeThings.push(G.URL);
  });
