@extends('layouts.admin')

@section('content')
<div class="col-lg-12">　
    <div class="container mt-5 p-lg-5 bg-light">
        <div class="row">
            <h2>訳あり品編集</h2>
        </div>
        <form action="{{ action('Admin\SellController@update') }}" method="post" enctype="multipart/form-data">
            
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
                    <input type="text" class="form-control" name="title" value="{{ $sell_form->title }}" required>
                </div>
            </div>
            <!--タイトル-->

        
         <!--種類-->
            <div class="form-group">
                <div class="row mb-4">
                    <legend class="col-form-label col-sm-2">区分</legend>
                    <div class="custom-control custom-radio custom-control-inline">
                            <input type="radio" name="type" value="野菜" {{ ($sell_form->type == '野菜') ? "checked" : "" }}>野菜
                        <div class="custom-control custom-radio custom-control-inline">
                            <input type="radio" name="type" value="果物" {{ ($sell_form->type == '果物') ? "checked" : "" }}>果物
                         
                        </div>
                    </div>
                </div>
            </div>
            <!--種類-->
            
            <!--在庫-->
            <div class="col-md-6 mb-3">
                <label>数量</label>
                <input type="number" class="form-control" name="stock" id="stock" {{ $sell_form->stock }} required>
            </div>
           <!--在庫-->
            
            
            <!--/ファイル選択-->   
                <div class="custom-file mb-5">
                <input type="file" class="custom-file-input pb-3" id="image" name="image">
                <label class="custom-file-label pb-3">画像選択...</label>
                  <div class="form-text text-info">
                                設定中: {{ $sell_form->image_path }}
                  </div>
                </div>
                <div class="form-check">
                    <label class="form-check-label">
                        <input type="checkbox" class="form-check-input" name="remove" value="true">画像を削除
                    </label>
                </div>
                <div class="form-group row">
                        <div class="col-md-10">
                            <input type="hidden" name="id" value="{{ $sell_form->id }}">
                        </div>    
                </div>    
            {{ csrf_field() }}
            <!--/ファイル選択-->
    
            <!--注意事項-->
            <div class="form-group pb-3">
                <label for="Textarea">注意事項</label>
                <textarea class="form-control" required name="notes" id="notes" rows="3" placeholder="一人何個までや、何日までに取りに行かなくてはならないなど"> {{ $sell_form->notes }} </textarea>
                <div class="invalid-feedback">入力してください</div>
            </div>
            <!--/注意事項-->



            <!--ボタンブロック-->
            <div class="form-group row">
                <div class="col-sm-12">
                    <button type="submit" class="btn btn-primary btn-block">更新</button>
                </div>
            </div>
            <!--/ボタンブロック-->

    </form>
    @endsection    