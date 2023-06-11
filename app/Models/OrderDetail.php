<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
class OrderDetail extends Model
{
    use HasFactory,SoftDeletes;
    protected $table = 'order_details';
    protected $guarded = [];

    public function book(){
        return $this->belongsTo(Book::class,'book_id');
    }

    public function order(){
        return $this->belongsTo(Order::class,'order_id');
    }
}
