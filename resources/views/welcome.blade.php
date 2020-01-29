@extends('layouts.app')


@section('content')

    <div class="homepage text-center">
       <div class="homepage-content m-auto">
           <h1 class="display-4">Welcome to the CyVouchers website</h1>
           <hr class="my-4">
           <p class="lead">The system allows you to Purchase vouchers. You can then redeem them into our products</p>
           <hr class="my-4">
           <p>You can create an account by clicking the vutton below to register</p>
           <a class="btn btn-primary btn-lg" href="/register" role="button">Create Account</a>

       </div>
    </div>

@endsection

