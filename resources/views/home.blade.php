@extends('layouts.admin')

@section('content')
                <div class="col-lg-12">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                   
                    <h2><p id="login_home">ようこそ！</p></h2>
                        
@endsection   
                    