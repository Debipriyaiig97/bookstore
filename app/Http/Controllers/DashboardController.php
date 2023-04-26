<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\BookRequest;
use App\Models\Book;
use Auth;
use Crypt;

class DashboardController extends Controller
{
    public function index(Request $request) {
        try {
            return view('admin.dashboard');
        } catch (\Throwable $th) {
            throw $th;
        }
    }
    public function book(Request $request) {
        try {
            $data['book'] = Book::where(['isdeleted'=>0])->get()->sortDesc(); 
            return view('admin.book.index',$data);
        } catch (\Throwable $th) {
            throw $th;
        }
    }
    public function createBook(BookRequest $request) {
        try {
            if($request->hasFile('image'))
            {
              $image = $request->file('image');
              $name = rand(00,99).time().'.'.$image->getClientOriginalExtension();
              $destinationPath = public_path('/assets/admin/images/');
              $image->move($destinationPath, $name);
            }else{
              $name=null;
            }
            $data =[
              'title'=>$request->title,
              'author' => $request->author,
              'genre' => $request->genre,
              'description' => $request->description,
              'publisher' => $request->publisher,
              'published' => $request->published,
              'isbn' => $request->isbn,
              'image' => $name,
              'created_at'=>date("Y-m-d H:i:s")
            ]; 
            $create= Book::create($data);    
            if($create){
              $request->session()->flash('SuccessToastr', 'Added Successfully.');
              return 'success';
          }else{
              return redirect()->back()->with('ErrorStatus','Updated failed');
          }
        } catch (\Throwable $th) {
            throw $th;
        }
    }
    public function updateBook(Request $request) {
        try {
            if($request->hasFile('image'))
            {
              $image = $request->file('image');
              $name = rand(00,99).time().'.'.$image->getClientOriginalExtension();
              $destinationPath = public_path('/assets/admin/images/');
              $image->move($destinationPath, $name);
            }else{
              $name=$request->old_image;
            }
            $data =[
              'title'=>$request->title,
              'author' => $request->author,
              'genre' => $request->genre,
              'description' => $request->description,
              'publisher' => $request->publisher,
              'published' => $request->published,
              'isbn' => $request->isbn,
              'image' => $name,
              'created_at'=>date("Y-m-d H:i:s")
            ]; 
            $update= Book::where('id',$request->edit_id)->update($data);    
            if($update){
              $request->session()->flash('SuccessToastr', 'Updated Successfully.');
              return back();
          }else{
              return redirect()->back()->with('ErrorStatus','Updated failed');
          }
        } catch (\Throwable $th) {
            throw $th;
        }
    }
    public function deleteBook(Request $request) {
        try {
            $deletebook=array(
                'isdeleted'=>1,
                'updated_at'=>date("Y-m-d H:i:s")
              );
              $delete = Book::where('id',Crypt::decrypt($request->id))->update($deletebook);
              if($delete){
                return back();
            }else{
                return redirect()->back()->with('failed','Created failed');
            }
        } catch (\Throwable $th) {
            throw $th;
        }
    }
}
