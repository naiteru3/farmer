<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Sell extends Model
{
    protected $guarded = array('id');

    
    public static $rules = array(
        'title' => 'required',
        'type' => 'required',
        'stock' => 'required | min:0',
        'notes' => 'required',
    );
    
    public function user()
    {
      return $this->belongsTo('App\User');

    }
}
