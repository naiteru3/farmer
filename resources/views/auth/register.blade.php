@extends('layouts.front')

@section('content')
<div class="col-lg-12">　

    <div class="container mt-5 p-lg-5 bg-light">
        <h2>新規会員登録</h2>
              @if (count($errors) > 0)
                        <ul>
                            @foreach($errors->all() as $e)
                                <li>{{ $e }}</li>
                            @endforeach
                        </ul>
                    @endif
                    
                    <form method="POST" action="{{ route('register') }}">
                        @csrf
                        <!--氏名-->
                        <div class="form-row mb-4">
                            <div class="col-md-6">
                            <label for="name">{{ __('氏名') }}</label>
                                <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" placeholder="(例)山田太郎" required autocomplete="name" autofocus>
                                
                                <small id="name" class="form-text text-muted">フルネームで入力してください</small>
                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            
                            <div class="col-md-6 mb-3">
                            <label for="furigana">{{ __('フリガナ') }}</label>
                                <input id="furigana" type="text" class="form-control @error('furigana') is-invalid @enderror" name="furigana" value="{{ old('furigana') }}" placeholder="(例)ヤマダタロウ" required autocomplete="furigana" autofocus>
                                <small id="furigana" class="form-text text-muted">フルネームで入力してください</small>
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
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">
                                 <div class="invalid-feedback">入力直しててください</div>
                            </div>
                        </div>
                         <!--Eメール-->

                        <!--パスワード-->
                        <div class="form-group row mb-5">
                            <label for="password" class="col-md-2 col-form-label">{{ __('パスワード') }}</label>

                            <div class="col-md-10">
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">
                                <div class="invalid-feedback">正しく入力できていません</div>
                                <small id="password" class="form-text text-muted">パスワードは、文字と数字を含めて8～20文字で、空白、特殊文字、絵文字を含むことはできません</small>
                                
                            </div>
                        </div>
                        <!--パスワード-->

                        <div class="form-group row">
                            <label for="password-confirm" class="col-md-5 col-form-label text-md-right">{{ __('確認の為再度パスワード入力してください') }}</label>

                            <div class="col-md-6">
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                            </div>
                        </div>

                         <!--/電話番号-->
                        <div class="form-group row">
                            <label for="phone_number" class="col-sm-2 col-form-label">{{ __('電話番号') }}</label>
                           　<div class="col-sm-10">
                                    <input id="phone_number" type="text" class="form-control @error('phone_number') is-invalid @enderror" name="phone_number" value="{{ old('phone_number') }}" required>
                                   　<div class="invalid-feedback">番号は11以内で入力してください</div>
                            </div>
                        </div> 
                         <!--/電話番号-->
                         
                         <!--代表者名　事業所名-->
                         <p></p><h5>ここからは訳あり品を出品したい方のみ記入をしてください (後で記入も出来ます)</h5></p>
                        <div class="form-row mb-4">
                            <div class="col-md-6">
                                
                                <label for="representatives_name">{{ __('代表者名') }}</label>
                                <input id="representatives_name" type="text" class="form-control" placeholder="(例)山田太郎" name="representatives_name" value="{{ old('representatives_name') }}" autocomplete="representatives_name" autofocus>
                                
                            </div>
                            <div class="col-md-6 mb-3">
                                <label for="office_name">{{ __('事業所名') }}</label>
                                <input id="office_name" type="text" class="form-control" placeholder="(例)山田事業所" name="office_name" value="{{ old('office_name') }}" autocomplete="office_name" autofocus>
                            </div>
                        </div>
                        <!--代表者名　事業所名-->
                
                        <!--事業所-->
                        <label for="office">{{ __('事業所在地 (受け渡し先)') }}</label>
                        <div class="form-group row">
                            <div class="col-sm-10">
                                <input id="office" type="text" class="form-control" placeholder="(例)高松市 朝日町1 番地 等" name="office" value="{{ old('office') }}" autocomplete="office" autofocus>
                            </div>
                        </div>
                        <!--/事業所-->
                        
                        
                        <div class="form-group row">
                            <div class="col-sm-12">
                                <button type="submit" class="btn btn-primary btn-block">{{ __('新規登録') }}</button>
                            </div>
                        </div>
                    </form>
                
            </div>
        </div>
    </div>
</div>




@endsection    