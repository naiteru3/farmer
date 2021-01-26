<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Buy;
use Carbon\Carbon;
use App\Sell;
use Validator;

class BuyController extends Controller
{
    public function store(Request $request)
  {
 
      $this->validate($request, Buy::$rules);
      $buy = new Buy;
      $form = $request->all();
   

      //紐付け
      $buy->user_id = auth()->user()->id;
      $buy->purchase_date= Carbon::now();
      
      $sell = Sell::find($request->product_id);
      if (empty($sell)) {
        abort(404);    
      }
      
    
    $validator = Validator::make($request->all(), [
            'number' => "integer|max:{$sell->stock}",
        ]);

        if ($validator->fails()) {
            return redirect('/admin/sell/show?id='.$request->product_id)
            ->withErrors($validator)
            ->withInput();
          } 
        
      $sell->stock -= $request->number;
      
      
      $sell->save();
      
      
      
      // データベースに保存する
      $buy->fill($form);
      $buy->save();
      
      
      
      // admin/buy/indexにリダイレクトする
      return redirect('admin/buy/index');
  }  
  
    
    public function index(Request $request)
  {
        $posts = auth()->user()->buys();
        $posts = Buy::orderBy('updated_at','desc')->where('user_id', auth()->user()->id)->Paginate(6);
        
        
        
      
      return view('admin.buy.index', ['posts' => $posts]);
  }
  
  public function delete(Request $request)
  {
      // 該当するbuy Modelを取得
      $buy = Buy::find($request->id);
      // 削除する
      $buy->delete();
      return redirect('admin/buy/index');
  }  
  
}
