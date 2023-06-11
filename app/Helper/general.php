<?php

function UploadFile($folder, $file){

    $file->store('/', $folder);

    $filename = $file->hashName();

    return  $filename;
}

function setting(){
    return \App\Models\Settings::where('id',1)->first();
}

function getCover($id){
    return \App\Models\Book::where('id',$id)->first()->cover;
}

function getCategory($id){
    $cat_id =  \App\Models\Book::where('id',$id)->first()->category_id;
    return \App\Models\Category::where('id',$cat_id)->first();
}


function AllNewOrder(){
    return \App\Models\Order::where('status',0)->orderBy('id','DESC')->get();
}

