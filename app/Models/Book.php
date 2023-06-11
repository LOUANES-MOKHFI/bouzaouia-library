<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Book extends Model
{
    use HasFactory,SoftDeletes;
    protected $table = 'books';
    protected $guarded = [];

	public function getActive(){
	    return $this->is_active == 1 ? __('مفعل') :  __('غير مفعل');
	}

	public function category(){
		return $this->belongsTo(Category::class);
	}
}
