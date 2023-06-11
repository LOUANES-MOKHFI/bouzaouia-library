<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Book;
use App\Models\Category;
use App\Models\Subscribers;
use Illuminate\Http\Request;
use DB;

use Ramsey\Uuid\Uuid;
use App\Http\Requests\BookRequest;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Str;
class BookController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $books = Book::orderBy('id','DESC')->get();
        return view('admin.books.index',compact('books'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categories = Category::active()->orderBy('id','ASC')->orderBy('name','ASC')->get();
        return view('admin.books.add',compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(BookRequest $request,Book $book)
    {
        try {
           DB::beginTransaction();


           if(!$request->has('is_active')){
               $book->is_active = 0;
           }
           else{
               $book->is_active = 1;
           }
           if(!$request->has('special_price')){
               $book->special_price = 0;
           }
           else{
               $book->special_price = 1;
           }
           
           $book->title = $request->title;
           $book->uuid = (string) Uuid::uuid4();
           $book->category_id = $request->category;
           $book->slug = Str::slug($request->title);
           $book->price = $request->price;
           $book->special_price_value = $request->special_price_value;
           $book->author = $request->author;
           $book->nbr_page = $request->nbr_page;
           $book->year = $request->year;
           $book->binding_type = $request->binding_type;
           $book->edition_number = $request->edition_number;
           $book->imprint_color = $request->imprint_color;
           $book->size = $request->size;
           $book->edition = $request->edition;
           $book->weight = $request->weight;
           $book->barcode = $request->barcode;
           $book->description = $request->description;
            if($request->has('contents')){

               $filename = '';
               $file = $request->file('contents');
               $filename = UploadFile('contents',$file);
               $book->contents = $filename;
            }
            if($request->has('file')){

               $filename = '';
               $file = $request->file('file');
               $filename = UploadFile('file',$file);
               $book->file = $filename;
            }
            if($request->has('cover')){

               $filename = '';
               $file = $request->file('cover');
               $filename = UploadFile('cover',$file);
               $book->cover = $filename;
            }

           $book->save();
           $url = route('book.show',$book->slug);
           $subscribers = Subscribers::all();
           foreach($subscribers as $subscribe){
                $this->sendMail($subscribe->email,$request->title,$url);
           }
           

           DB::commit();
           return redirect()->route('admin.books')->with('success','Le livre est ajoutée avec succes');

        } catch (\Throwable $ex) {
            return redirect()->back()->with('error',$ex->getMessage());
            //DB::rollback();
        }
    }

    /**
     * Display the specified resource.
     */
    public function show($uuid)
    {
        $data['book'] = Book::where('uuid',$uuid)->first();
        if(!$data['book']){
            return redirect()->route('admin.books')->with(['error'=> 'Ce livre n\'existe pas']);
        }
        return view('admin.books.show',$data);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($uuid)
    {
        $data = [];
        $data['categories'] = Category::active()->orderBy('id','ASC')->orderBy('name','ASC')->get();
        $data['book'] = Book::where('uuid',$uuid)->first();
        if(!$data['book']){
            return redirect()->route('admin.books')->with(['error'=> 'Ce livre n\'existe pas']);
        }
        return view('admin.books.edit',$data);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(BookRequest $request, $uuid)
    {
        $book = Book::where('uuid',$uuid)->first();
        try {
           DB::beginTransaction();


           if(!$request->has('is_active')){
               $book->is_active = 0;
           }
           else{
               $book->is_active = 1;
           }
           if(!$request->has('special_price')){
               $book->special_price = 0;
           }
           else{
               $book->special_price = 1;
           }
           
           $book->title = $request->title;
           $book->category_id = $request->category;
           $book->slug = Str::slug($request->title);
           $book->price = $request->price;
           $book->special_price_value = $request->special_price_value;
           $book->author = $request->author;
           $book->nbr_page = $request->nbr_page;
           $book->year = $request->year;
           $book->binding_type = $request->binding_type;
           $book->edition_number = $request->edition_number;
           $book->imprint_color = $request->imprint_color;
           $book->size = $request->size;
           $book->edition = $request->edition;
           $book->weight = $request->weight;
           $book->barcode = $request->barcode;
           $book->description = $request->description;
            if($request->has('contents')){

               $filename = '';
               $file = $request->file('contents');
               $filename = UploadFile('contents',$file);
               $book->contents = $filename;
            }
            if($request->has('file')){

               $filename = '';
               $file = $request->file('file');
               $filename = UploadFile('file',$file);
               $book->file = $filename;
            }
            if($request->has('cover')){

               $filename = '';
               $file = $request->file('cover');
               $filename = UploadFile('cover',$file);
               $book->cover = $filename;
            }

           $book->save();
           DB::commit();
           return redirect()->route('admin.books')->with('success','Le livre est modifiée avec succes');

        } catch (\Throwable $ex) {
            return redirect()->route('admin.books')->with('error',$ex->getMessage());
            //DB::rollback();
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($uuid)
    {
        try {
        $book = Book::orderBy('id','DESC')->where('uuid',$uuid)->first();
            if(!$book){
                return redirect()->route('admin.books')->with(['error'=> 'ce livre n\'existe pas']);
            }
            $book -> delete();
            return redirect()->route('admin.books')->with('success','La livre a étè supprimer avec succes');

       } catch (\Throwable $ex) {
         return redirect()->route('admin.books')->with('error',$ex->getMessage());
       }
    }

    public function changeStatus($uuid)
    {
        try {
            $book = Book::orderBy('id','DESC')->where('uuid',$uuid)->first();
            if(!$book){
                return redirect()->route('admin.books')->with(['error'=> 'ce livre n\'existe pas']);
            }

            if($book->is_active == 1){$book->is_active = 0;}else{$book->is_active = 1;}

            $book -> save();
            return redirect()->route('admin.books')->with('success','Le status a étè changer avec succes');

       } catch (\Throwable $ex) {
           return redirect()->route('admin.books')->with('error',$ex->getMessage());
       }
    }
    
    function sendMail($to_email,$book_name,$url){

        $data = array("Hello"=>"سلام","header" => "تم إضافة كتاب جديد :",
        "Book_name" => " إسم الكتاب :".$book_name,
        "Url" => " رابط الكتاب :".$url);
        Mail::send('emails.mailSubscriber', $data, function($message) use ($to_email) {
        $message->to($to_email)
        ->subject('الأكادمية للنشر و الترجمة');
        $message->from('library@g-clinique.com','الأكادمية للنشر و الترجمة');
        });
        
    }
}
