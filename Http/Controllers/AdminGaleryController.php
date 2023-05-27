<?php
namespace App\Http\Controllers;
// use App\Models\Photo;
use App\Models\Gallery;
use Illuminate\Http\Request;
use App\Http\Requests;


class AdminGaleryController extends Controller
{
    //
    public function index(){
        $photos = Gallery::latest()->paginate(20);
        return view('galery.index', compact('photos'))->with('i', (request()->input('page', 1) - 1) * 5);
    }
    

    public function create(){
        return view('galery.create');
    }
    

    public function store(Request $request){
        $file = $request->file('file');
        $name = time() .  $file->getClientOriginalName();
        $file->move('images/media/', $name);
        Gallery::create(['file'=>$name]);
    }
    public function updateAlt(Request $request){
            $data['alttag'] = $request->altName;
            Gallery:: where('id',$request->ids)->update($data);
            return redirect()->back();
    }
    

    public function destroy($id){
        $photo = Gallery::findOrFail($id);
        $photo->delete();
    }
    

    public function deleteMedia(Request $request){
        if(isset($request->delete_all) && !empty($request->checkBoxArray)){
            $photos = Gallery::findOrFail($request->checkBoxArray);
            foreach($photos as $photo){
                $photo->delete();
                unlink(public_path() .  '/images/media/' . $photo->file );
            }
            return redirect()->back()->with('user_success','Image/s deleted successfully!');;
        } else {
            return redirect()->back();
        }
    }




}
