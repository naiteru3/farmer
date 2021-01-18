@extends('layouts.admin')

@section('content')
<div class="col-lg-12">　
<p>訳あり品出品</p></p>
    <div class="container mt-5 p-lg-5 bg-light">
        <!--タイトル-->
        <div class="form-row mb-4">
            <div class="col-md-12">
                <label for="title">タイトル</label>
                <input type="text" class="form-control" id="representativeName" placeholder="タイトル" required>
            </div><!--タイトル-->
            
         
            
        </div>
        <!--代表者名　事業所名-->
        <div class="form-row mb-4">
            <div class="col-md-6">
                <label for="representative'sNeme">代表者名</label>
                <input type="text" class="form-control" id="representativeName" placeholder="代表者名" required>
                
            </div>
            <div class="col-md-6 mb-3">
                <label for="officeName">事業所名</label>
                <input type="text" class="form-control" id="officeName" placeholder="事業所名" required>
                
            </div>
        </div>

        <!--事業所-->
        <label for="office">事業所</label>
        <div class="form-row">
            <div class="col-md-3 mb-5">
                <label for="inputAddress01">郵便番号(7桁)</label>
                <input type="text" name="zip01" maxlength="8" onKeyUp="AjaxZip3.zip2addr(this,'','pref01','addr01');" class="form-control" id="inputAddress01" placeholder="1030013" required>
                <div class="invalid-feedback">入力してください</div>
            </div>
            <div class="col-md-3">
                <label for="inputAddress02">都道府県</label>
                <input type="text" name="pref01" id="inputAddress02" class="form-control" placeholder="東京都" required>
                <div class="invalid-feedback">入力してください</div>
            </div>
            <div class="col-md-6">
                <label for="inputAddress03">住所</label>
                <input type="text" name="addr01" class="form-control" id="inputAddress03" placeholder="中央区日本橋人形町" required>
                <div class="invalid-feedback">入力してください</div>
            </div>
        </div>
        <!--事業所-->
        
            <!--/電話番号-->
        <div class="form-group row">
            <label for="inputPhone" class="col-sm-10 col-form-label">電話番号</label>
            <div class="col-sm-4">
                <input type="number" class="form-control" id="inputPhon" placeholder="電話番号" required>
                <div class="invalid-feedback">入力してください</div>
            </div>
        </div><!--/電話番号-->

        
         <!--種類-->
            <div class="form-group">
                <div class="row mb-4">
                    <legend class="col-form-label col-sm-2">区分</legend>
                    <div class="col-sm-10">
                        <div class="custom-control custom-radio custom-control-inline">
                            <input type="radio" id="customRadioInline1" name="gender" class="custom-control-input" required>
                            <label class="custom-control-label" for="customRadioInline1">野菜</label>
                        </div>
                        <div class="custom-control custom-radio custom-control-inline">
                            <input type="radio" id="customRadioInline2" name="gender" class="custom-control-input">
                            <label class="custom-control-label" for="customRadioInline2">果物</label>
                        
                        </div>
                    </div>
                </div>
            </div>
            <!--種類-->
            
            <!--/ファイル選択-->   
                <div class="custom-file mb-5">
                <input type="file" class="custom-file-input pb-3" id="customFile" required>
                <label class="custom-file-label pb-3" for="customFile">画像選択...</label>
                <div class="invalid-feedback">画像を選択してください</div>
            </div>
            <!--/ファイル選択-->
    
            <!--注意事項-->
            <div class="form-group pb-3">
                <label for="Textarea">注意事項</label>
                <textarea class="form-control" id="Textarea" rows="3" placeholder="一人何個までや、何日までに取りに行かなくてはならないなど" required></textarea>
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

    </form>




@endsection    