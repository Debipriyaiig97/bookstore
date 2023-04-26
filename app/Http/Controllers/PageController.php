<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Book;

class PageController extends Controller
{
    public function index(Request $request)
    {
        try {
        $data['book'] = Book::where(['isdeleted'=>0])->paginate(3);     
         return view('frontend.index',$data);
        } catch (\Throwable $th) {
            throw $th;
        }
    }
    public function search(Request $request)
    {
        try {
            $title = strtoupper($request->title);
            $author = strtoupper($request->author); 
            $genre = strtoupper($request->genre);
            $isbn  = $request->isbn;
        $data['book'] = Book::where('title','LIKE','%'.$title.'%')
        ->where('author','LIKE','%'.$author.'%')
        ->where('genre','LIKE','%'.$genre.'%')
        ->where('isbn','LIKE','%'.$isbn.'%')
        ->paginate(3);     
         return view('frontend.index',$data);
        } catch (\Throwable $th) {
            throw $th;
        }
    }
}