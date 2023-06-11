<?php

namespace App\Http\Controllers\Site;

use App\Http\Controllers\Controller;
use App\Models\Book;
use App\Models\Category;
use Illuminate\Http\Request;
use DB;
class BookController extends Controller
{
    public function index(){
        $data = [];
        $data['books'] = Book::where('is_active',1)->paginate(16);
        $data['categories'] = Category::where('is_active',1)->get();

        return view('site.book.index',$data);
    }
    public function show($slug){
        $data = [];
        $data['book'] = Book::where('is_active',1)->where('slug',$slug)->first();
        $data['book_categorie'] = Book::where('is_active',1)->where('category_id',$data['book']->category_id)->limit(4)->get();
        return view('site.book.show',$data);

    }

    public function newaArrivals(){
        $data = [];
        $data['books'] = Book::where('is_active',1)
        ->selectRaw('*, datediff(created_at, now())')
        ->whereRaw('datediff(now(),created_at) < ?', [30])
        ->paginate(16);
        
        $data['categories'] = Category::where('is_active',1)->get();
        
        return view('site.new_arrivals.index',$data);
    }

    public function getBooksByCategory($slug){
        $data = [];
        $data['category'] = Category::where('is_active',1)->where('slug',$slug)->first();
        $data['books'] = Book::where('is_active',1)->where('category_id',$data['category']->id)->paginate(16);

        return view('site.book.book_by_category',$data);
    }


    public function searchBook(Request $request){
        $data = [];
        if($request->category == 0 && $request->keyword != null){
            $data['books'] = Book::where('is_active',1)->where('title','LIKE','%'.$request->keyword.'%')->paginate(16);
            $data['categories'] = Category::where('is_active',1)->get();
            $data['keyword'] = $request->keyword;
            return view('site.book.book_by_search',$data);
        }elseif($request->category == 0){
            $data['books'] = Book::where('is_active',1)->paginate(16);
            $data['categories'] = Category::where('is_active',1)->get();
            $data['keyword'] = $request->keyword;
            return view('site.book.index',$data);
        }
        $data['category'] = Category::where('is_active',1)->where('slug',$request->category)->first();
        $data['books'] = Book::where('is_active',1)->where('category_id',$data['category']->id)->where('title','LIKE','%'.$request->keyword.'%')->paginate(16);
        $data['keyword'] = $request->keyword;
        return view('site.book.book_by_search',$data);
    }

    
}




