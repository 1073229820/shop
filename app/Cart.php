<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Cart extends Model
{
    //
    protected $table = 'cart';
    public $timestamps = false;

    public function getCartList()
    {
        $userId = session('user_id');
        if ($userId) {
            //从数据库中取数据
        }else{
            //从session中取数据，且在session有效期内
           if (time()-session('addtime')<300){
                return session('cartList');
           }else{
               session()->forget('cartList');

           }
        }
    }
}
