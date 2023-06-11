<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Category extends Model
{
    use HasFactory,SoftDeletes;
    protected $table = 'categories';
    protected $guarded = [];

	public function getActive(){
	    return $this->is_active == 1 ? __('مفعل') :  __('غير مفعل');
	}

	public function scopeActive($query){
      return $query->where('is_active',1);
    }

    public function books(){
        return $this->hasMany(Book::class);
    }
}
