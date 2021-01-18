<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <meta name="csrf-token" content="{{ csrf_token() }}">
        
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">

        <title>@yield('title')</title>

        <script src="{{ secure_asset('js/app.js') }}" defer></script>

        <link rel="dns-prefetch" href="https://fonts.gstatic.com">
        <link href="https://fonts.googleapis.com/css?family=Raleway:300,400,600" rel="stylesheet" type="text/css">

        <link href="{{ secure_asset('css/app.css') }}" rel="stylesheet">
       <link href="{{ asset('css/front.css') }}" rel="stylesheet">
    </head>
    <body>
        <header>
            <div class="abc">
            
           <ul class="bbc">
              <li><a href="{{ route('register') }}">新規会員登録</a></li>
              <li><a href="{{ route('login') }}">登録済みの方はこちら</a></li>
            </ul>
         </div>


              
          <div class="name">
            <span><h2>香川県のおいしい訳あり野菜</h2></span>
          </div>
          
          <div class="aa">
          <ul class="center">
            <li><a href="{{ action('ProductController@index') }}">トップページ</a></li>
             <li><a href="{{ action('Admin\UserController@show') }}">会員ページ</a></li>
          </ul>
            </div>
        </header>
        
        <div class="container">
            <div class="row">
                <div class="side col-lg-3">
                    <div class="flame08">
                      
                            <div class="menber_top">
                              <ul class="menber">
                                <li id="menber_li">会員情報</li>
                              @auth
                                 <li>{{ Auth::user()->name }}</li>
                              @else
                                <li>登録していません</li>
                              @endauth 
                              </ul>
                            </div>      
                            <ul class="vegetable">
                              <li id="vg_top">訳あり商品</li>
                              <li><a href={{ action('Admin\ProductController@index' , ['cond_type' =>'野菜'])}}>野菜</a></li>
                              <li><a href={{ action('Admin\ProductController@index' , ['cond_type' =>'果物'])}}>果物</a></li>
                            </ul>
                                        
                          
                    </div>
                </div>
                <div class="column col-lg-9">
                    <div class="row">
                        @yield('content')
                    </div>
                </div>
            </div>
        </div>
        
        <footer>
            <p id="foo">&copy;Nito Yoshiteru</p>
            
        </footer>
        <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>
    </body>
</html>