<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Sell;
use App\User;
use Storage;

class ProductController extends Controller
{   
    public function index(Request $request)
    {
        //$posts = sell::Paginate(6);
        
        $cond_type = $request->cond_type;
      if ($cond_type == '野菜') {
          
          
          $posts = Sell::where('type', $cond_type)->Paginate(6);
          
      } elseif ($cond_type == '果物') {
          $posts = Sell::where('type', $cond_type)->Paginate(6);
          
      } else {
          
          // それ以外はすべて取得する
          $posts = Sell::orderBy('updated_at','desc')->Paginate(6);
      }
     

        
        
       
       return view('admin.product.index',['posts' => $posts, 'cond_type' => $cond_type]);
    }


}
