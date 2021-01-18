<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\User;
use App\Sell;
class UserController extends Controller
{
    public function create()
  {
      return view('auth.register');
  }
  //ダッシュボード
  public function show()
  {
      return view('admin.user.show');
  }//ダッシュボード
  
    
    public function edit(Request $request)
  {
      // User Modelからデータを取得する
      $user = User::find($request->id);
      if (empty($user)) {
        abort(404);    
      }//
      return view('admin.user.edit', ['user_form' => $user]);
  }
  
  public function update(Request $request)
  {
      // Validationをかける
      $this->validate($request, User::$rules);
      
      // User Modelからデータを取得する
      $user = User::find($request->id);
      
      // 送信されてきたフォームデータを格納する
      $user_form = $request->all();
      unset($user_form['_token']);

      // 該当するデータを上書きして保存する
      $user->fill($user_form)->save();

      return redirect('admin/user/show');
  }
  
  
  
  
}

