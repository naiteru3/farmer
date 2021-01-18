@extends('layouts.admin')

@section('content')
    <div class="col-lg-12">　

        <div class="container mt-5 p-lg-5 bg-light">
            <p id="menber_edit">会員情報編集</p>
                        @if (count($errors) > 0)
                            <ul>
                                @foreach($errors->all() as $e)
                                    <li>{{ $e }}</li>
                                @endforeach
                            </ul>
                        @endif
                        <form action="{{ action('Admin\UserController@update') }}" method="post" enctype="multipart/form-data">
                        @csrf
                        <!--氏名-->
                        <div class="form-row mb-4">
                            <div class="col-md-6">
                            <label for="name">{{ __('氏名') }}</label>
                                <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ $user_form->name }}" required autocomplete="name" autofocus>

                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            
                            <div class="col-md-6 mb-3">
                            <label for="furigana">{{ __('フリガナ') }}</label>
                                <input id="furigana" type="text" class="form-control @error('furigana') is-invalid @enderror" name="furigana" value="{{ $user_form->furigana }}" required autocomplete="furigana" autofocus>

                                @error('furigana')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>    
                             <!--氏名-->
                             
                         <!--Eメール-->
                        <div class="form-group row">
                            <label for="email" class="col-sm-2 col-form-label">{{ __('Eメール') }}</label>

                            <div class="col-sm-10">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ $user_form->email }}" required autocomplete="email">

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                         <!--Eメール-->

                         <!--/電話番号-->
                        <div class="form-group row">
                            <label for="phone_number" class="col-sm-2 col-form-label">{{ __('電話番号') }}</label>
                           　<div class="col-sm-10">
                                    <input id="phone_number" type="text" class="form-control @error('phone_number') is-invalid @enderror" name="phone_number" value="{{ $user_form->phone_number }}" required>
                                   　@error('phone_number')
                                   　<span class="invalid-feedback" role="alert">
                                       <strong>{{ $message }}</strong>
                                    　</span>
                                    　@enderror
                            </div>
                        </div> 
                         <!--/電話番号-->
                         
                         <!--代表者名　事業所名-->
                        <div class="form-row mb-4">
                            <div class="col-md-6">
                                <label for="representatives_name">{{ __('代表者名') }}</label>
                                <input id="representatives_name" type="text" class="form-control" name="representatives_name" value="{{ $user_form->representatives_name }}" autocomplete="representatives_name" autofocus>
                                
                            </div>
                            <div class="col-md-6 mb-3">
                                <label for="office_name">{{ __('事業所名') }}</label>
                                <input id="office_name" type="text" class="form-control" name="office_name" value="{{ $user_form->office_name }}" autocomplete="office_name" autofocus>
                            </div>
                        </div>
                        <!--代表者名　事業所名-->
                
                        <!--事業所-->
                        <label for="office">{{ __('事業所在地  (受け渡し先)') }}</label>
                        <div class="form-group row">
                            <div class="col-sm-10">
                                <input id="office" type="text" class="form-control" name="office" value="{{ $user_form->office }}" autocomplete="office" autofocus>
                            </div>
                        </div>
                        <!--/事業所-->
                        
                        
                        <div class="form-group row">
                            <div class="col-sm-12">
                                <input type="hidden" name="id" value="{{ $user_form->id }}">
                                 {{ csrf_field() }}
                                <button type="submit" class="btn btn-primary btn-block">{{ __('更新') }}</button>
                            </div>
                        </div>
                    </form>
            </div>
        </div>





@endsection    