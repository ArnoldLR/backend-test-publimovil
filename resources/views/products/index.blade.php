@extends('layouts.app')
<script src="https://cdnjs.cloudflare.com/ajax/libs/angular.js/1.8.3/angular.min.js" integrity="sha512-KZmyTq3PLx9EZl0RHShHQuXtrvdJ+m35tuOiwlcZfs/rE7NZv29ygNA8SFCkMXTnYZQK2OX0Gm2qKGfvWEtRXA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>

@section('content')
<div class="container" ng-app="ProductsApp" ng-controller="ProductsController" ng-init="getData()">
    
    <div class="row justify-content-center">
        <div class="col-md-12">
        <div class="d-flex justify-content-between">   
            <h4 class="text-center mb-4">Productos</h4>
            <input type="text" ng-model="searchText" ng-change="search()" class="form-control w-50" placeholder="Buscar productos">
            <a type="button" class="btn btn-sm btn-primary h-50 mr-3 text-white" ng-click="showUser(null)" data-bs-toggle="modal" data-bs-target="#modalNewProduct">Crear producto</a>
        </div>
            <div class="card pl-2 pr-2 pb-2">
                @include('products.products') 
            <div class="m-2">
                <span>Página @{{ currentPage }} de @{{ totalPages }}</span>
                <i class="fa-solid fa-angle-left text-primary p-1 icon-pag" ng-click="previousPage()"></i>
                <i class="fa-solid fa-angle-right text-primary p-1 icon-pag" ng-click="nextPage()"></i>
            </div>
            </div>
        </div>
    </div>

    @include('products.modal-new-product')
    @include('products.toast-product')
</div>


@endsection
@push('scripts')
<script>    

    const ProductsApp = angular.module('ProductsApp', []);

    ProductsApp.controller('ProductsController', function($scope, $http){
        let myAlert = document.querySelector('.toast');
        let bsAlert = new  bootstrap.Toast(myAlert);
        
        $scope.data = [];
        $scope.itemsPerPage = 10;
        $scope.currentPage = 1;
        $scope.products = [];
        $scope.user = {};
        $scope.searchText = '';

        //get products request
        $scope.getData = function(){
            $http.get('/api/products')
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
            $scope.products = $scope.data.slice(startIndex, endIndex);
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

        $scope.showProduct = function(product){
            $scope.product = product;
        }

        $scope.submitForm = function() {
            $http.post('/api/update-product', $scope.product)
            .then(function(response) {
                $('#modalNewProduct').modal('hide');
                bsAlert.show();
                $scope.getData();
            })
            .catch(function(error) {
                // Error callback
                console.error('Error submitting form:', error);
            });
        };

        //delete product
        $scope.delete = function(id){
            $http.get('/api/product/delete/' + id)
            .then(function(response) {
                bsAlert.show();
                $scope.getData();
            })
            .catch(function(error) {
                console.error('Error:', error);
            });
        }

        //search products
        $scope.search = function(){
            
            $http.get('/api/search-products/' + $scope.searchText)
            .then(function(response) {
                $scope.data = response.data;
                $scope.totalPages = Math.ceil($scope.data.length / $scope.itemsPerPage);
                $scope.updateData(); 
            })
            .catch(function(error) {
                console.error('Error:', error);
            });
            
        }
        
    });

</script>
@endpush

