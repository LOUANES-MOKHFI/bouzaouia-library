<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Slider;
use DB;

class SliderController extends Controller
{
    public function index()
    {
       $sliders = Slider::orderBy('id','DESC')->get();
       return view('admin.sliders.index',compact('sliders'));
    }

    public function create()
    {
        return view('admin.sliders.add');
    }

    public function store(Request $request, Slider $Slider)
    {
       // return $request;

        try {
           DB::beginTransaction();


           if(!$request->has('is_active')){
               $Slider->is_active = 0;
           }
           else{
               $Slider->is_active = 1;
           }
           $Slider->title = $request->title;
           if($request->has('image')){

                $filename = '';
                $file = $request->file('image');
                $filename = UploadFile('sliders',$file);
                $Slider->image = $filename;
            }
           $Slider->save();
           DB::commit();
           return redirect()->route('admin.sliders')->with('success','L\'image est ajoutée avec succes');

        } catch (\Throwable $ex) {
            return redirect()->back()->with('error',$ex->getMessage());
           // DB::rollback();
        }
    }

    public function edit($id)
    {
        $data = [];
        $data['slider'] = Slider::where('id',$id)->first();
        if(!$data['slider']){
            return redirect()->route('admin.sliders')->with(['error'=> 'Cett\'image n\'existe pas']);
        }
        return view('admin.sliders.edit',$data);
    }

    public function update(Request $request, $id)
    {
        try {
            DB::beginTransaction();

            $Slider = Slider::orderBy('id','DESC')->where('id',$id)->first();
            if(!$Slider){
                return redirect()->route('admin.sliders')->with(['error'=> 'Cette Slider n\'existe pas']);
            }
            if(!$request->has('is_active')){
                $Slider->is_active = 0;
            }
            else{
                $Slider->is_active = 1;
            }
            $Slider->title = $request->title;
           if($request->has('image')){

                $filename = '';
                $file = $request->file('image');
                $filename = UploadFile('sliders',$file);
                $Slider->image = $filename;
            }
           $Slider->save();

            DB::commit();
            return redirect()->route('admin.sliders')->with('success','L\'image est modifiée avec succes');
        } catch (\Throwable $ex) {
            return redirect()->back()->with('error',$ex->getMessage());       
        }
    }

    public function destroy($id)
    {
       try {
        $slider = Slider::orderBy('id','DESC')->where('id',$id);
            if(!$slider){
                return redirect()->route('admin.sliders')->with(['error'=> 'Cette Slider n\'existe pas']);
            }
            $slider -> delete();
            return redirect()->route('admin.sliders')->with('success','L\'image a étè supprimer avec succes');

       } catch (\Throwable $ex) {
            return redirect()->back()->with('error',$ex->getMessage());
        }
    }

    public function changeStatus($id)
    {
        try {
            $slider = Slider::orderBy('id','DESC')->where('id',$id)->first();
            if(!$slider){
                return redirect()->route('admin.sliders')->with(['error'=> 'cette slide n\'existe pas']);
            }

            if($slider->is_active == 1){$slider->is_active = 0;}else{$slider->is_active = 1;}

            $slider -> save();
            return redirect()->route('admin.sliders')->with('success','Le status a étè changer avec succes');

       } catch (\Throwable $ex) {
             return redirect()->back()->with('error',$ex->getMessage());
       }
    }
}
