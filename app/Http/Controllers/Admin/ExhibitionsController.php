<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Exhibition;
use DB;

class ExhibitionsController extends Controller
{
    public function index()
    {
       $exhibitions = Exhibition::orderBy('id','DESC')->get();
       return view('admin.exhibitions.index',compact('exhibitions'));
    }

    public function create()
    {
        return view('admin.exhibitions.add');
    }

    public function store(Request $request, Exhibition $exhibitions)
    {
       // return $request;

        try {
           DB::beginTransaction();


           if(!$request->has('is_active')){
               $exhibitions->is_active = 0;
           }
           else{
               $exhibitions->is_active = 1;
           }
           /*if($request->type == 1){
               $request->request->add(['parent_id'=> null]);
           }
           $category->parent_id = $request->parent_id;*/
           $exhibitions->title = $request->title;
//           $exhibitions->image = $request->name;
           $exhibitions->pays = $request->pays;
           $exhibitions->state = $request->state;
           $exhibitions->date_from = $request->date_from;
           $exhibitions->date_to = $request->date_to;
           $exhibitions->save();
           DB::commit();
           return redirect()->route('admin.exhibitions')->with('success','La categorie est ajoutée avec succes');

        } catch (\Throwable $ex) {
            return redirect()->back()->with('error',$ex->getMessage());
        }
    }

    public function edit($id)
    {
        $data = [];
        $data['exhibition'] = Exhibition::where('id',$id)->first();
        if(!$data['exhibition']){
            return redirect()->route('admin.exhibitions')->with(['error'=> 'Cette exhibition n\'existe pas']);
        }
        return view('admin.exhibitions.edit',$data);
    }

    public function update(Request $request, $id)
    {
        try {
            DB::beginTransaction();

            $exhibitions = Exhibition::orderBy('id','DESC')->where('id',$id)->first();
            if(!$exhibitions){
                return redirect()->route('admin.exhibitions')->with(['error'=> 'Cette exhibitions n\'existe pas']);
            }
            if(!$request->has('is_active')){
                $exhibitions->is_active = 0;
                //$request->request->add(['is_active' => 0]);
            }
            else{
                $exhibitions->is_active = 1;
                //$request->request->add(['is_active' => 1]);
            }
            $exhibitions->title = $request->title;
//           $exhibitions->image = $request->name;
           $exhibitions->pays = $request->pays;
           $exhibitions->state = $request->state;
           $exhibitions->date_from = $request->date_from;
           $exhibitions->date_to = $request->date_to;
           $exhibitions->save();

            DB::commit();
            return redirect()->route('admin.exhibitions')->with('success','L\'exhibition est modifiée avec succes');
        } catch (\Throwable $ex) {
            return redirect()->back()->with('error',$ex->getMessage());
        }
    }

    public function destroy($id)
    {
       try {
        $exhibition = Exhibition::orderBy('id','DESC')->where('id',$id);
            if(!$exhibition){
                return redirect()->route('admin.exhibitions')->with(['error'=> 'Cette exhibition n\'existe pas']);
            }
            $exhibition -> delete();
            return redirect()->route('admin.exhibitions')->with('success','L\'exhibition a étè supprimer avec succes');

       } catch (\Throwable $ex) {
        return redirect()->back()->with('error',$ex->getMessage());
       }
    }
}
