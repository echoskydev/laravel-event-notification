@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Dashboard</div>

                <div class="card-body">
                    @if (session('status'))
                    <div class="alert alert-success" role="alert">
                        {{ session('status') }}
                    </div>
                    @endif

                    You are logged in!
                    <hr>
                    <div class="text-center">
                        <a class="btn btn-primary" href="{{ route('help', ['message'=>'Help Me #1'])}}" role="button">
                            Help Me 1
                        </a>
                        <a class="btn btn-success" href="{{ route('help', ['message'=>'Help Me #2'])}}" role="button">
                            Help Me 2
                        </a>
                        <a class="btn btn-warning" href="{{ route('help', ['message'=>'Help Me #3'])}}" role="button">
                            Help Me 3
                        </a>
                        <a class="btn btn-danger" href="{{ route('help', ['message'=>'Help Me #4'])}}" role="button">
                            Help Me 4
                        </a>
                        <a class="btn btn-secondary" href="{{ route('help', ['message'=>'Help Me #5'])}}" role="button">
                            Help Me 5
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
