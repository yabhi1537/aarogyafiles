<?php

namespace App\Http\Controllers;
use App\Models\Language;
use App\Models\Blog;
use App\Models\Photo;
use DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Imports\blogImport;  
use Rap2hpoutre\FastExcel\FastExcel;
use Excel;
use Illuminate\Pagination\Paginator;
class BlogController extends Controller
{
    function index(){
        $data['pages'] = Blog::orderBy('id', 'DESC')->paginate(12);
        // print_r($data['pages']);die();
        return view('blog.blog-index', $data);
    }
    
    

    function addBlog(Request $request){
        // $langs = Language::all();
        // $lang = Language::where('code', $request->language)->first();
        // $lang_id = $lang->id;
        return view('blog.blog-create');
    }

    function store(Request $request){
        $input = $request->all();
        
        $user = Auth::user();
        if ($file = $request->file('image_name')) {
            $name = time() . $file->getClientOriginalName();
            $file->move('assets/images/blog/', $name);
            //$photo = Photo::create([' file'=>$name]);
            $input['image_name'] = $name;
        }
        // return $input;
        $user->blogs()->create($input);
        return back()->with('page_success','Blog created successfully!');
    }

    function edit($req){
        // return $req;

         $data['blog'] = Blog::where('id',$req)->get();
        //  return $data;
        return view('blog.blog-edit',$data);
    }

    function update(Request $request,Blog $blog){
        // return $request;
        $input = $request->all();
        // return $input['hdnid'];
        $user = Auth::user();
        if ($file = $request->file('image_name')) {
            $name = time() . $file->getClientOriginalName();
            $file->move('assets/images/blog/', $name);
            //$photo = Photo::create([' file'=>$name]);
            $data['image_name'] = $name;
        }
        // return $input;
        $data['title'] = $request->title;
        $data['discription'] = $request->body;
        $data['heading'] = $request->heading;
        $data['slug'] = $request->slug;
        $data['meta_title'] = $request->meta_title;
        $data['meta_description'] = $request->meta_description;
        $data['keywords'] = $request->keywords;
        $data['alt'] = $request->alt;

        $blog->where('id',$input['hdnid'])->update($data);
        return back()->with('page_success','Blog updated successfully!');
    }

    public function delete_blog(Request $request, Blog $blog) {
        $blog = Blog::findOrFail($request->id);
        $blog->delete();
        return back();
    }

    function excelImport(Request $request) {
        //  return $user;
        $collection = (new FastExcel)->import($request->file('file'));

        $userid = Auth::id();
        $blogs = (new FastExcel)->import($request->file('file'), function ($line) {
        // return $userid; 
            
            return Blog::create([
                'title' => $line['title'],
                'discription'=>$line['discription'],
                'heading'=>$line['heading'],
                'image_name'=>$line['image_url'],
                'slug'=> $line['slug'],
                'meta_title'=> $line['meta_title'],
                'meta_description'=> $line['meta_description'],
                'keywords'=> $line['keywords'],
                
            ]);
        });
        return back()->with('success','Excel Uploaded Done!');
         
    }
    
    function blogExport(){
       return (new FastExcel(Blog::all()))->download('blog.csv', function ($blog) {
        return [
            'title' => $blog->title,
            'discription' => $blog->discription,
            'heading' => $blog->heading,
            'image_url' => $blog->image_name,
            'slug' => $blog->slug,
            'meta_title' => $blog->meta_title,
            'meta_description' => $blog->meta_description,
            'keywords' => $blog->keywords,
        ];
        });
        return back()->with('success','Excel Export Done!');
       // return (new FastExcel(Blog::all()))->download('file.csv');
    }
}
