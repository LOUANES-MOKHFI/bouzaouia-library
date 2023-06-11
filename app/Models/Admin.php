<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\SoftDeletes;

class Admin extends Authenticatable
{
    use SoftDeletes;
    protected $table = 'admins';
    protected $guarded = [];

    public $timestamps = true;

    public function role(){
        return $this->belongsTo(Role::class, 'role_id');
    }

    public function specialite(){
        return $this->belongsTo(Specialite::class, 'spec_id');
    }

    public function scopeActive($query){
      return $query->where('is_active',1);
    }


    public function hasAbility($permissions){
        $role = $this->role;
        if(!$role){
            return false;
        }

        foreach ($role->permissions as $permission) {
                if(is_array($permission) && in_array($permission, $permissions)){
                    return true;
                }
                else if(is_string($permissions) && strcmp($permissions,$permission) == 0){
                    return true;
                }
        }
        return false;
    }

}
