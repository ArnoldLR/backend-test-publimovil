@extends('layouts.app')

@section('content')
<div class="container">
    <h4 class="text-center mb-4">Home</h4>
    <div class="row justify-content-center">
        <div class="col-md-5">
            <div class="card">
                <div class="card-body">
                    @include('card-users')
                </div>
            </div>
        </div>
        
        <div class="col-md-5">
            <div class="card">
                <div class="card-body">
                    @include('card-products')
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

<style>
.card:hover {
  box-shadow: 0 0 5px rgba(33,33,33,.2); 
}
</style>
