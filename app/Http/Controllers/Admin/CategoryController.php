<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Category;
use App\Http\Requests\CategoryRequest;
use Carbon\Carbon;
use Ramsey\Uuid\Uuid;
use Illuminate\Support\Str;
use DB;
class CategoryController extends Controller
{
    public function index()
    {
       $categories = Category::orderBy('id','DESC')->get();
       return view('admin.categories.index',compact('categories'));
    }

    public function create()
    {
        return view('admin.categories.add');
    }

    public function store(CategoryRequest $request, Category $category)
    {
       // return $request;

        try {
           DB::beginTransaction();


           if(!$request->has('is_active')){
               $category->is_active = 0;
           }
           else{
               $category->is_active = 1;
           }
           /*if($request->type == 1){
               $request->request->add(['parent_id'=> null]);
           }
           $category->parent_id = $request->parent_id;*/
           $category->uuid = (string) Uuid::uuid4();
           $category->name = $request->name;
           $category->slug = Str::slug($request->name);
           $category->save();
           DB::commit();
           return redirect()->route('admin.categories')->with('success','La categorie est ajoutée avec succes');

        } catch (\Throwable $ex) {
            return redirect()->back()->with('error',$ex->getMessage());
           // DB::rollback();
        }
    }

    public function edit($uuid)
    {
        $data = [];
        $data['category'] = Category::where('uuid',$uuid)->first();
        if(!$data['category']){
            return redirect()->route('admin.categories')->with(['error'=> 'Cette categorie n\'existe pas']);
        }
        return view('admin.categories.edit',$data);
    }

    public function update(CategoryRequest $request, $uuid)
    {
        try {
            DB::beginTransaction();

            $category = Category::orderBy('id','DESC')->where('uuid',$uuid)->first();
            if(!$category){
                return redirect()->route('admin.categories')->with(['error'=> 'Cette category n\'existe pas']);
            }
            if(!$request->has('is_active')){
                $category->is_active = 0;
                //$request->request->add(['is_active' => 0]);
            }
            else{
                $category->is_active = 1;
                //$request->request->add(['is_active' => 1]);
            }
            $category->name = $request->name;
            $category->slug = Str::slug($request->name);
            $category->save();

            DB::commit();
            return redirect()->route('admin.categories')->with('success','La categorie est modifiée avec succes');
        } catch (\Throwable $ex) {
            return redirect()->back()->with('error',$ex->getMessage());
            //DB::rollback();
        }
    }

    public function destroy($uuid)
    {
       try {
        $category = Category::orderBy('id','DESC')->where('uuid',$uuid);
            if(!$category){
                return redirect()->route('admin.categories')->with(['error'=> 'Cette category n\'existe pas']);
            }
            $category -> delete();
            return redirect()->route('admin.categories')->with('success','La categorie a étè supprimer avec succes');

       } catch (\Throwable $ex) {
            return redirect()->back()->with('error',$ex->getMessage());
       }
    }
}
