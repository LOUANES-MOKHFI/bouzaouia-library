<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Role;
use App\Http\Requests\RolesRequest;
use Carbon\Carbon;
use Ramsey\Uuid\Uuid;

class RolesController extends Controller
{
    public function index(){
        $roles = Role::get();
        return view('admin.roles.index',compact('roles'));
    }

    public function create(){
        return view('admin.roles.add');
    }

    public function store(Request $request){
        try {
            $role = $this->process(new Role, $request);
            if($role){
                return redirect()->route('admin.roles')->with(['success' => 'Le role est ajoutée avec succées']);
            }
            else{
                return redirect()->route('admin.roles')->with(['error' => 'Erreur,Verifier vos informations']);
            }
        } catch (\Throwable $e) {

            return redirect()->route('admin.roles')->with(['error' => 'Erreur,Verifier vos informations']);
        }
    }

    public function edit($uuid){
        $role = Role::where('uuid',$uuid)->first();
            if(!$role){
                return redirect()->route('admin.roles')->with(['error' => "ce role n'existe pas"]);
            }else{
               return view('admin.roles.edit',compact('role'));
            }
    }

    public function update($uuid,Request $request){
        try {

            $role = Role::where('uuid',$uuid)->first();
            if(!$role){
                return redirect()->route('admin.roles')->with(['error' => "ce role n'existe pas"]);
            }
            $role = $this->process($role, $request);
            if($role){
                return redirect()->route('admin.roles')->with(['success' => 'Le role est Modifiée avec succées']);
            }
            else{
                return redirect()->route('admin.roles')->with(['error' => 'Erreur,Verifier vos informations']);
            }
        } catch (\Throwable $e) {

            return redirect()->route('admin.roles')->with(['error' => 'Erreur,Verifier vos informations']);
        }
    }

    public function destroy($uuid){
        $role = Role::where('uuid',$uuid)->first();
        if(!$role){
            return redirect()->route('admin.roles')->with(['error' => "ce role n'existe pas"]);

        }
        else{
            $role->delete();
            return redirect()->route('admin.roles')->with(['success' => 'Le role est Supprimée avec succées']);

        }
    }
    protected function process(Role $role, Request $request){
        $role->uuid = (string) Uuid::uuid4();
        $role->name = $request->name;
        $role->permissions = json_encode($request->permissions);
        $role->save();
        return $role;
    }
}
