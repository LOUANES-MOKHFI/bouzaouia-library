<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Admin;
use App\Models\Role;
use App\Http\Requests\AdminRequest;
use Ramsey\Uuid\Uuid;
use Hash;
class UserController extends Controller
{
    public function index(){
        $users = Admin::latest()->where('id','<>',auth()->id())->get();

        return view('admin.users.index',compact('users'));
    }

    public function create(){
        $roles = Role::get();
        return view('admin.users.add',compact('roles'));
    }

    public function store(AdminRequest $request){
       // return $request->griffle;
        $user = new Admin();
        /*if(!$request->has('is_notified')){
            $request->request->add(['is_notified' => 0]);
        }
        else{
            $request->request->add(['is_notified' => 1]);
        }*/
        $user->uuid = (string) Uuid::uuid4();
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = Hash::make($request->password);
        $user->role_id = $request->role_id;

        if($user->save()){
            return redirect()->route('admin.users')->with(['success' => 'L\'utilisateur est ajoutée avec succées']);
        }
        else{
            return redirect()->route('admin.users')->with(['error' => 's\'il vous plait, verifier vos informations']);
        }
    }

    public function edit($uuid){
        $roles = Role::get();
        $user = Admin::where('uuid',$uuid)->first();
        if(!$user){
            return redirect()->route('admin.users')->with(['error' => "L'utilisateur  n'existe pas"]);

        }
        return view('admin.users.edit',compact('roles','user'));
    }

    public function update(AdminRequest $request,$uuid){
        $user = Admin::where('uuid',$uuid)->first();
        if(!$user){
            return redirect()->route('admin.users')->with(['error' => "L'utilisateur  n'existe pas"]);
        }
        /*if(!$request->has('is_notified')){
            $request->request->add(['is_notified' => 0]);
        }
        else{
            $request->request->add(['is_notified' => 1]);
        }*/
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = Hash::make($request->password);
        $user->role_id = $request->role_id;
        if($user->save()){
            return redirect()->route('admin.users')->with(['success' => 'L\'utilisateur est modifiée avec succées']);
        }
        else{
            return redirect()->route('admin.users')->with(['error' => 's\'il vous plait, verifier vos informations']);
        }
    }
    public function destroy($uuid){
        $user = Admin::where('uuid',$uuid)->first();
        if(!$user){
            return redirect()->route('admin.users')->with(['error' => "L'utilisateur n'existe pas"]);

        }
        else{
            $user->delete();
            return redirect()->route('admin.users')->with(['success' => 'L\'utilisateur est Supprimée avec succées']);

        }
    }

    public function changeStatus($uuid){
        $data['user'] = Admin::where('uuid',$uuid)->first();
        if(!$data['user']){
            return redirect()->route('admin.users')->with(['error'=>'cet utilisateur n\'existe pas']);
        }
        $status = $data['user']->is_active == 0 ? 1 : 0 ;
         // return $status;
        $data['user']->is_active = $status;
        $data['user']->save();
        
        return redirect()->back()->with(['success' => "Le status de l'utilisateur a étè changer avec success"]);

    }

}
