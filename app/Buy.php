<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Buy extends Model
{
    protected $guarded = array('id');
    
    public static $rules = array(
        'product_id' => 'required ',
        'number' => 'required | min:0',
    );
    
    public function user()
    {
      return $this->belongsTo('App\User');

    }
    
    public function sell()
    {
      return $this->belongsTo('App\Sell', 'product_id');

    }
}
