<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\State;
use DB;
class StateController extends Controller
{
    public function index()
    {
       $states = State::orderBy('id','ASC')->get();
       return view('admin.states.index',compact('states'));
    }

    public function create()
    {
        return view('admin.states.add');
    }

    public function store(Request $request, State $State)
    {
        try {
           DB::beginTransaction();
           
           $State->name = $request->name;
           $State->code_postal = $request->code_postal;
           $State->price = $request->price;
           $State->save();
           DB::commit();
           return redirect()->route('admin.states')->with('success','La wilaya est ajoutée avec succes');

        } catch (\Throwable $ex) {
            return redirect()->back()->with('error',$ex->getMessage());
        }
    }

    public function edit($id)
    {
        $data = [];
        $data['state'] = State::where('id',$id)->first();
        if(!$data['state']){
            return redirect()->route('admin.states')->with(['error'=> 'Cette wilaya n\'existe pas']);
        }
        return view('admin.states.edit',$data);
    }

    public function update(Request $request, $id)
    {
        try {
            DB::beginTransaction();

            $State = State::orderBy('id','DESC')->where('id',$id)->first();
            if(!$State){
                return redirect()->route('admin.states')->with(['error'=> 'Cette State n\'existe pas']);
            }
            $State->name = $request->name;
            $State->code_postal = $request->code_postal;
            $State->price = $request->price;
            $State->save();
            $State->save();

            DB::commit();
            return redirect()->route('admin.states')->with('success','La wilaya est modifiée avec succes');
        } catch (\Throwable $ex) {
            return redirect()->back()->with('error',$ex->getMessage());
        }
    }

    public function destroy($id)
    {
       try {
        $State = State::orderBy('id','DESC')->where('id',$id);
            if(!$State){
                return redirect()->route('admin.states')->with(['error'=> 'Cette State n\'existe pas']);
            }
            $State -> delete();
            return redirect()->route('admin.states')->with('success','La wilaya a étè supprimer avec succes');

       } catch (\Throwable $ex) {
            return redirect()->back()->with('error',$ex->getMessage());
       }
    }
}
