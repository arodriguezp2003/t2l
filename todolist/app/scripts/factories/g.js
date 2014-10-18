'use strict';

var app = angular.module('todolistApp')
 
app.factory('G',function($http){
	var servicio = {
		'URL' : "http://localhost/api/v1/"
	};
	return servicio;
});
