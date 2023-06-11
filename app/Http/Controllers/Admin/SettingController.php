<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Settings;
use DB;
class SettingController extends Controller
{
    public function index(){

    	$setting = Settings::where('id',1)->first();
    	return view('admin.settings.index',compact('setting'));
    }

    public function update(Request $request){
    	$setting = Settings::where('id',1)->first();
    	try {
           DB::beginTransaction();
           
           $setting->site_name = $request->site_name;
           $setting->facebook = $request->facebook;
           $setting->instagram = $request->instagram;
           $setting->linkedin = $request->linkedin;
           $setting->phone = $request->phone;
           $setting->fax = $request->fax;
           $setting->email = $request->email;
           $setting->slegon = $request->slegon;
           $setting->about = $request->about;
           $setting->adresse = $request->adresse;
            
            if($request->has('logo')){

               $filename = '';
               $file = $request->file('logo');
               $filename = UploadFile('logo',$file);
               $setting->logo = $filename;
            }

           $setting->save();
           DB::commit();
           return redirect()->route('admin.settings')->with('success','Les paramétres son mettre à jour avec succes');

        } catch (\Throwable $ex) {
            return redirect()->back()->with('error',$ex->getMessage());
            //DB::rollback();
        }
    }

    public function purchaseMethode(){
        $setting = Settings::where('id',1)->first();
        return view('admin.settings.purchase_methode',compact('setting'));
    }
    public function updatePuchaseMethode(Request $request){
        $setting = Settings::where('id',1)->first();
        $setting->purchase_methode = $request->purchase_methode;
        $setting->add_your_book = $request->add_your_book;
        
        $setting->save();
        return redirect()->route('admin.settings.purchase_methode')->with('success','Les paramétres son mettre à jour avec succes');

    }
}
