@extends('layouts.app')
<script src="https://cdnjs.cloudflare.com/ajax/libs/angular.js/1.8.3/angular.min.js" integrity="sha512-KZmyTq3PLx9EZl0RHShHQuXtrvdJ+m35tuOiwlcZfs/rE7NZv29ygNA8SFCkMXTnYZQK2OX0Gm2qKGfvWEtRXA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>

@section('content')
<div class="container" ng-app="UserApp" ng-controller="UsersController" ng-init="getData()">
    
    <div class="row justify-content-center">
        <div class="col-md-12">
        <div class="d-flex">   
            <h4 class="text-center mb-4">Usuarios</h4>
            
            <a type="button" class="btn btn-sm btn-primary position-absolute end-0 mr-3 text-white" ng-click="showUser(null)" data-bs-toggle="modal" data-bs-target="#modalNewUser">Crear usuario</a>
            </div>
            <div class="card pl-2 pr-2 pb-2">
                @include('users.users') 
            <div class="m-2">
                <span>Página @{{ currentPage }} de @{{ totalPages }}</span>
                <i class="fa-solid fa-angle-left text-primary p-1 icon-pag" ng-click="previousPage()"></i>
                <i class="fa-solid fa-angle-right text-primary p-1 icon-pag" ng-click="nextPage()"></i>
            </div>
            </div>
        </div>
    </div>

    @include('users.modal-new-user')
    @include('users.toast-user')
</div>


@endsection
@push('scripts')
<script>    

    const UserApp = angular.module('UserApp', []);

    UserApp.controller('UsersController', function($scope, $http){
        let myAlert = document.querySelector('.toast');
        let bsAlert = new  bootstrap.Toast(myAlert);
        
        $scope.data = [];
        $scope.itemsPerPage = 10;
        $scope.currentPage = 1;
        $scope.users = [];
        $scope.user = {};
        $scope.error = '';
        $scope.apiToken = {!! json_encode($token) !!};

        $http.defaults.headers.common['Authorization'] = 'Bearer ' + $scope.apiToken;

        //get users request
        $scope.getData = function(){
            $http.get('/api/users')
            .then(function(response) {
                $scope.data = response.data;
                $scope.totalPages = Math.ceil($scope.data.length / $scope.itemsPerPage);
                $scope.updateData();
            })
            .catch(function(error) {
                console.error('Error:', error);
            });
        }
        
        //update data
        $scope.updateData = function() {
            var startIndex = ($scope.currentPage - 1) * $scope.itemsPerPage;
            var endIndex = startIndex + $scope.itemsPerPage;
            $scope.users = $scope.data.slice(startIndex, endIndex);
        };
        //previous page
        $scope.previousPage = function() {
            if ($scope.currentPage > 1) {
            $scope.currentPage--;
            $scope.updateData();
            }
        };
        //next page
        $scope.nextPage = function() {
            if ($scope.currentPage < $scope.totalPages) {
            $scope.currentPage++;
            $scope.updateData();
            }
        };

        $scope.showUser = function(user){
            $scope.user = user;
        }

        $scope.submitForm = function() {
            $http.post('/api/update-user', $scope.user)
            .then(function(response) {
                $('#modalNewUser').modal('hide');
                bsAlert.show();
                $scope.getData();
                $scope.error = '';
            })
            .catch(function(error) {
                $scope.error = error.data;
                console.error('Error submitting form:', error);
            });
        };

        //get users request
        $scope.delete = function(id){
            $http.get('/api/user/delete/' + id)
            .then(function(response) {
                bsAlert.show();
                $scope.getData();
            })
            .catch(function(error) {
                console.error('Error:', error);
            });
        }
        
    });

</script>
@endpush

