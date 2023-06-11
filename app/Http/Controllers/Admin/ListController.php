<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Lists;
use DB;
class ListController extends Controller
{
    public function index()
    {
       $lists = Lists::orderBy('id','DESC')->get();
       return view('admin.lists.index',compact('lists'));
    }

    public function create()
    {
        return view('admin.lists.add');
    }

    public function store(Request $request, Lists $list)
    {
       // return $request;

        try {
           DB::beginTransaction();


           if(!$request->has('is_active')){
               $list->is_active = 0;
           }
           else{
               $list->is_active = 1;
           }
           
           
           $list->title = $request->title;
           if($request->has('list')){

                $filename = '';
                $file = $request->file('list');
                $filename = UploadFile('lists',$file);
                $list->list = $filename;
            }
           $list->save();
           DB::commit();
           return redirect()->route('admin.lists')->with('success','La list est ajoutée avec succes');

        } catch (\Throwable $ex) {
            return redirect()->back()->with('error',$ex->getMessage());
            //DB::rollback();
        }
    }

    public function edit($id)
    {
        $data = [];
        $data['list'] = Lists::where('id',$id)->first();
        if(!$data['list']){
            return redirect()->route('admin.lists')->with(['error'=> 'Cette list n\'existe pas']);
        }
        return view('admin.lists.edit',$data);
    }

    public function update(Request $request, $id)
    {
        try {
            DB::beginTransaction();

            $list = Lists::orderBy('id','DESC')->where('id',$id)->first();
            if(!$list){
                return redirect()->route('admin.categories')->with(['error'=> 'Cette list n\'existe pas']);
            }
            if(!$request->has('is_active')){
                $list->is_active = 0;
                //$request->request->add(['is_active' => 0]);
            }
            else{
                $list->is_active = 1;
                //$request->request->add(['is_active' => 1]);
            }
            $list->title = $request->title;
            if($request->has('list')){
 
                 $filename = '';
                 $file = $request->file('list');
                 $filename = UploadFile('lists',$file);
                 $list->list = $filename;
             }
            $list->save();

            DB::commit();
            return redirect()->route('admin.lists')->with('success','La list est modifiée avec succes');
        } catch (\Throwable $ex) {
            return redirect()->back()->with('error',$ex->getMessage());
        }
    }

    public function destroy($id)
    {
       try {
        $list = Lists::orderBy('id','DESC')->where('id',$id);
            if(!$list){
                return redirect()->route('admin.lists')->with(['error'=> 'Cette list n\'existe pas']);
            }
            $list -> delete();
            return redirect()->route('admin.lists')->with('success','La list a étè supprimer avec succes');

       } catch (\Throwable $ex) {
         return redirect()->back()->with('error',$ex->getMessage());
       }
    }
}
