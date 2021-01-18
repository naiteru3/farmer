@extends('layouts.front')

@section('content')
<div class="col-lg-12">　

    <div class="container mt-5 p-lg-5 bg-light">
        <h2><p id="login">ログイン</p></h2>
                        <form method="POST" action="{{ route('login') }}">
                            @csrf

                            <div class="form-group row">
                                <label for="email" class="col-sm-3 col-form-label">{{ __('Eメール') }}</label>

                                <div class="col-md-10">
                                        <input id="email" type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email') }}" required autofocus>
                                        <div class="invalid-feedback">メールアドレスかパスワードが間違っています</div>
                                        
                                        
                                    </div>
                                </div>
    
                                <div class="form-group row">
                                    <label for="password" class="col-md-3 col-form-label">{{ __('パスワード') }}</label>

                                    <div class="col-md-10">
                                        <input id="password" type="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" required>
                                        <small id="passwordHelpBlock" class="form-text text-muted">パスワードは、文字と数字を含めて8～20文字で、空白、特殊文字、絵文字を含むことはできません。</small>
                                        @if ($errors->has('password'))
                                            <span class="invalid-feedback">
                                                <strong>{{ $errors->first('password') }}</strong>
                                            </span>
                                        @endif
                                    </div>
                                </div>
                                <div class="form-group row">
                            <div class="col-md-10">
                                <button type="submit" class="btn btn-primary btn-block">{{ __('ログイン') }}</button>
                            </div>
                        </div>
                        </form>
                        
                    </div>
                </div>
            
@endsection