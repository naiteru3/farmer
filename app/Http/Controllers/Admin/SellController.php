<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\User;
use App\Sell;
use Auth;
use App\Buy;
use Storage;

class SellController extends Controller
{
    public function create()
  {
      return view('admin.sell.create');
  }
  
  public function store(Request $request)
  {
      $this->validate($request, Sell::$rules);

      $sell = new Sell;
      $form = $request->all();

      // フォームから画像が送信されてきたら、保存して、$sell->image_path に画像のパスを保存する
      
      if (isset($form['image'])) {
        $path = $request->file('image')->store('public/image');
        $sell->image_path = basename($path);
      } else {
          $sell->image_path = null;
      }

      // フォームから送信されてきた_tokenを削除する
      unset($form['_token']);
      // フォームから送信されてきたimageを削除する
      unset($form['image']);
      
      //紐付け
      $sell->user_id = auth()->user()->id;
      
      
      
      
      // データベースに保存する
      $sell->fill($form);
      $sell->save();

      // admin/sell/createにリダイレクトする
      return redirect('admin/sell/create');
  }  
  
  
  public function index(Request $request)
  {
      $cond_title = $request->cond_title;
      if ($cond_title != '') {
          // 検索されたら検索結果を取得する
          
          $posts = Sell::where('title', $cond_title)->Paginate(6);
      } else {
          // それ以外はすべてのデーターを取得する
          $posts = Sell::orderBy('updated_at','desc')->Paginate(6);
          
          
      }
      return view('admin.sell.index', ['posts' => $posts, 'cond_title' => $cond_title]);
  }
public function edit(Request $request)
  {
      // Sell Modelからデータを取得する
      $sell = Sell::find($request->id);
      if (empty($sell)) {
        abort(404);    
      }
      return view('admin.sell.edit', ['sell_form' => $sell]);
  }

  //商品詳細
  public function show(Request $request)
  {
    $sell = Sell::find($request->id);
      if (empty($sell)) {
        abort(404);    
      }

        
      return view('admin.sell.show' , ['sell_form' => $sell]);
      
  }
  

  public function update(Request $request)
  {
      // Validationをかける
      $this->validate($request, Sell::$rules);
      
      // Sell Modelからデータを取得する
      $sell = Sell::find($request->id);
      
      // 送信されてきたフォームデータを格納する
      $sell_form = $request->all();
      if ($request->remove == 'true') {
          $sell_form['image_path'] = null;
      } elseif ($request->file('image')) {
          $path = $request->file('image')->store('public/image');
          $sell_form['image_path'] = basename($path);
      } else {
          $sell_form['image_path'] = $sell->image_path;
      }
      
      unset($sell_form['image']);
      unset($sell_form['remove']);
      unset($sell_form['_token']);
      

      // 該当するデータを上書きして保存する
      $sell->fill($sell_form)->save();

      return redirect('admin/sell/index');
  }
  
  public function delete(Request $request)
  {
      // 該当するSell Modelを取得
      $sell = Sell::find($request->id);
      // 削除する
      $sell->delete();
      return redirect('admin/sell/index');
  }  
  
  public function buys_index(Request $request)
  {
      $buys = Buy::where('product_id', $request->id)->get();
      
      return view('admin/sell/buys_index',['buys' => $buys]);
  }  
  
}
