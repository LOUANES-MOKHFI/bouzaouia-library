<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Slider extends Model
{
    use HasFactory;
    protected $table = 'sliders';
    protected $guarded = [];

	public function getActive(){
	    return $this->is_active == 1 ? __('مفعل') :  __('غير مفعل');
	}
}
