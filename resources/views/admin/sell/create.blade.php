@extends('layouts.admin')

@section('content')
<div class="col-lg-12">　
    <div class="container mt-5 p-lg-5 bg-light">
        <div class="row">
            <h2>訳あり品出品</h2>
        </div>
        <form action="{{ action('Admin\SellController@store') }}" method="post" enctype="multipart/form-data">
            
                    @if (count($errors) > 0)
                        <ul>
                            @foreach($errors->all() as $e)
                                <li>{{ $e }}</li>
                            @endforeach
                        </ul>
                    @endif
                    
            <!--タイトル-->
            <div class="form-row mb-4">
                <div class="col-md-12">
                <label>タイトル</label>
                    <input type="text" class="form-control" placeholder="(例)イチゴ 訳あり 若干キズあり　等" name="title" value="{{ old('title') }}" required>
                    
                </div>
            </div>
            <!--タイトル-->

        
         <!--種類-->
            <div class="form-group">
                <div class="row mb-4">
                    <legend class="col-form-label col-sm-2">区分</legend>
                    <div class="col-sm-6">
                        <div class="custom-control custom-radio custom-control-inline">
                            <input type="radio" id="customRadioInline1" name="type" class="custom-control-input" required value="野菜">
                            <label class="custom-control-label" for="customRadioInline1">野菜</label>
                        </div>
                        <div class="custom-control custom-radio custom-control-inline">
                            <input type="radio" id="customRadioInline2" name="type" class="custom-control-input" required value="果物">
                            <label class="custom-control-label" for="customRadioInline2">果物</label>
                        </div>
                    </div>
                </div>
            </div>
            <!--種類-->
            
            <!--在庫-->
            <div class="col-md-6 mb-3">
                <label>数量</label>
                <input type="number" class="form-control" name="stock" id="stock" {{ old('stock') }} required>
            </div>
           <!--在庫-->
            
            
            <!--/ファイル選択-->   
                <div class="custom-file mb-5">
                <input type="file" class="custom-file-input pb-3" id="image" name="image">
                <label class="custom-file-label pb-3">画像選択...</label>
            </div>
            {{ csrf_field() }}
            <!--/ファイル選択-->
    
            <!--注意事項-->
            <div class="form-group pb-3">
                <label for="Textarea">注意事項</label>
                <textarea class="form-control" type="text" required name="notes" id="notes" rows="4" placeholder="一人何個までや、何日までに取りに行かなくてはならないなど"></textarea>
                <div class="invalid-feedback">入力してください</div>
            </div>
            <!--/注意事項-->



            <!--ボタンブロック-->
            <div class="form-group row">
                <div class="col-sm-12">
                    <button type="submit" class="btn btn-primary btn-block">出品</button>
                </div>
            </div>
            <!--/ボタンブロック-->
    </div>
    </div>
    </form>
    @endsection    