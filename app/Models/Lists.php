<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Lists extends Model
{
    use HasFactory;
    protected $table = 'lists';
    protected $guarded = [];

	public function getActive(){
	    return $this->is_active == 1 ? __('مفعل') :  __('غير مفعل');
	}
}
