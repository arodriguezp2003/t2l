'use strict';

var app = angular.module('todolistApp');

app.controller('NotesController',function($scope,$http,$modal,G){
	$scope.notes = [];

	$http.get(G.URL + "notes").success(function (data){
		$scope.notes = data;
	});
	$scope.eliminar = function(notes){
		if(!confirm("Esta Seguro?")) return;
		$http.get(G.URL + "eliminarnote/" + notes.id)
		.success(function(data){
			var nuevo = [];
			angular.forEach($scope.notes,function(note,indice){
				if(note.id != notes.id)
					nuevo.push(note);
			});
			$scope.notes = nuevo;
		});
	};
	$scope.showModal = function	(){
		$scope.nuevoNote = {};
		var modalInstance = $modal.open({
			templateUrl: 'views/addNotes.html',
			controller: 'addNuevoNoteController',
			 backdrop : 'static',
			resolve: {
				nuevoNote: function() {
					return $scope.nuevoNote;
				}
			}
		});

 modalInstance.result.then(function (selectedItem) {
        console.log(selectedItem);
    }, function () {
      
        var datas = {
        	"titulo":$scope.nuevoNote.titulo,
        	"cuerpo":$scope.nuevoNote.cuerpo,
        	"color" :$scope.nuevoNote.color};
		if(datas.titulo==null)return;
		$http.post(G.URL + "nuevanote",{
									titulo:datas.titulo ,
									cuerpo: datas.cuerpo, 
									categoria: "0",
									color: datas.color
		}).success(function (data){
			$scope.notes.push(data);
		}).error(function(data){

		});
    });
	};
	
});

app.controller('addNuevoNoteController',function($scope,$modalInstance,nuevoNote){
	$scope.nuevoNote = nuevoNote;ropo
	debugger;
	$scope.salvarNuevoNote = function() {

		$modalInstance.dismiss(nuevoNote);
	};

	$scope.cancel = function() {
		$modalInstance.dismiss('cancel');
	}
	

});
