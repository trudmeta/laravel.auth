@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    @if($auths)
                        <div class="col mt-5 mb-3">
                            <ul class="list-group">
                                @foreach($auths as $auth)
                                    <li class="list-group-item">
                                        <p>{{ $auth->user->name }}</p>
                                        <p>{{ $auth->user->created_at }}</p>
                                    </li>
                                @endforeach
                            </ul>
                        </div>
                    @endif

                    {{ __('You are logged in!') }}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
