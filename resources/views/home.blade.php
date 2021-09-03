@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-4">
            <div class="card">
                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert" >
                            <p style="text-align:center;">{{ session('status') }}</p>
                        </div>
                    @endif
                    <p style="text-align:center; font-size:20px; color:green;">{{ __('You are logged in!') }}</p>
                    
                </div>
            </div>
        </div>
    </div>
    <home-component></home-component>
</div>
@endsection
