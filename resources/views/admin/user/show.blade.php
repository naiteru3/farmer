@extends('layouts.admin')

@section('content')
<div class="col-lg-6">
  <p class="menber_show">会員ページ</p>
<div class="member_page">　
<ul>
  <li><a href="{{ action('Admin\UserController@edit', ["id"=>Auth::id()]) }}">会員情報編集</a></li>
  <li><a href="{{ action('Admin\SellController@index') }}">訳あり品　出品</a></li></li>
  <li><a href="{{ action('Admin\BuyController@index') }}">予約購入一覧</a></li></li>
  <li><a href="{{ route('logout') }}">
                                        
                                    {{ __('ログアウト') }}</a></li>
  
  @csrf
</ul>
</div>
</div>
@endsection   