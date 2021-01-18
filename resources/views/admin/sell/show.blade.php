@extends('layouts.admin')
@section('content')
<div class="col-lg-12">　
    <div class="container mt-5 p-lg-5 bg-light">
        <div class="row">
            
            <form action="{{ action('Admin\BuyController@store') }}" method="post" enctype="multipart/form-data">
                {{ csrf_field() }}
            <h2>商品詳細</h2>
        </div>
         <!--タイトル-->
            <div class="form-row mb-4">
                <div class="col-md-12">
                <label>タイトル</label>
                    <input type="text" disabled class="form-control" value="{{ $sell_form->title }}">
                </div>
            </div>
            <!--タイトル-->
            
<!--代表者名　事業所名-->
        <div class="form-row mb-4">
            <div class="col-md-6">
                <label>代表者名</label>
                <input type="text" disabled class="form-control" value="{{$sell_form->user->representatives_name}}"  >
                
            </div>
            <div class="col-md-6 mb-3">
                <label>事業所名</label>
                <input type="text" disabled class="form-control" value="{{$sell_form->user->office_name}}">
                
            </div>
        </div>

        <!--事業所-->
        <label>事業所在地  (受け渡し先)</label>
        <div class="form-row">
            <div class="col-md-8">
                <label>住所</label>
                <input type="text" disabled  class="form-control" value="{{$sell_form->user->office}}">
            </div>
        </div>
        <!--事業所-->
        
            <!--/電話番号-->
        <div class="form-group row">
            <label  class="col-sm-10 col-form-label">電話番号</label>
            <div class="col-sm-4">
                <input type="number" disabled class="form-control" value="{{$sell_form->user->phone_number}}">
            </div>
        </div><!--/電話番号-->
                    
        
         <!--種類-->
            <div class="form-group">
                <div class="row mb-4">
                    <legend class="col-form-label col-sm-2">区分</legend>
                    <div class="col-sm-6">
                        <div class="custom-control custom-radio custom-control-inline">
                            <input type="radio" disabled id="customRadioInline1" name="type"  checked class="custom-control-input" required value="野菜">
                            <label class="custom-control-label" for="customRadioInline1">野菜</label>
                        </div>
                        <div class="custom-control custom-radio custom-control-inline">
                            <input type="radio" disabled id="customRadioInline2" name="type"  checked class="custom-control-input" required value="果物">
                            <label class="custom-control-label" for="customRadioInline2">果物</label>
                        </div>
                    </div>
                </div>
            </div>
            <!--種類-->
            
            <!--在庫-->
            <div class="form-row mb-4">
                <div class="col-md-6">
                    <label>在庫数</label>
                    <input type="number" disabled class="form-control" value="{{ $sell_form->stock }}">
                </div>
            <div class="col-md-6 mb-3">
                <label>予約購入数</label>
                <input type="number"  class="form-control" name="number" required>
                </div>
            </div>
           <!--在庫-->
    
            <!--注意事項-->
            <div class="form-group pb-3">
                <label for="Textarea">注意事項</label>
                <textarea class="form-control" type="text" disabled required name="notes" id="notes" rows="4">{{ $sell_form->notes }}</textarea>
               
            </div>
            <!--/注意事項-->
            


            <!--ボタンブロック-->
            <div class="form-group row">
                <div class="col-sm-12">
                    <input type="hidden" name="product_id" value="{{ $sell_form->id }}">
                    <button type="submit" class="btn btn-primary btn-block">予約購入</button>
                </div>
            </div>
            <!--/ボタンブロック-->

    </form>
       
    </div>
</div>    
@endsection