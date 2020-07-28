<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Transaction extends Model
{
    protected $table = 'transactions';
    protected $primaryKey = 'transaction_id';
    protected $fillable =
        [
            'transaction_id','name','category','price','qty','description'
        ];

    public $incrementing = false;
}
