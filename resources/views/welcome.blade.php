@extends('layouts.app')


@section('content')

    <div class="homepage text-center">
       <div class="homepage-content m-auto">
           <h1 class="display-4">Welcome to the CyVouchers website</h1>
           <hr class="my-4">
           <p class="lead">The system allows you to Purchase vouchers for our product. You can then redeem or gift them to others</p>
           <hr class="my-4">
           <p>You can create an account by clicking the button below to register</p>
           <hr class="my-1">
           <a class="btn btn-primary btn-lg" href="/register" role="button">Create Account</a>

       </div>
    </div>

@endsection

