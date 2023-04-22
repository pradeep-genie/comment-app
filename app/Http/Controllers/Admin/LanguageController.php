<?php

namespace App\Http\Controllers\Admin;
use Auth;
use Config;
use Storage;
use App\Models\Language;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use App\Http\Controllers\Controller;

class LanguageController extends Controller
{
    public function index(Request $request){


        $language_data = Language::where([
            ['language', '!=', Null],
            [function ($query) use ($request) {
                if (($search = $request->search)) {
                    $query->orWhere('language', 'LIKE', '%' . $search . '%')->get();
                }
            }]
        ])->paginate(10);
    
        $languages = Language::get();

        return view('admin.languages.index',['language_data'=>$language_data,'languages'=>$languages]);
    }

    public function create(){
        return view('admin.languages.create');
    }

    public function store(Request $request){

        if (isset($request->language_id) && $request->language_id != null) {

            $languages = Language::find($request->language_id);
            $languages->language  = $request->language;
            //filesystem
            if($request->hasfile('language_image')){

                $image_destination = 'storage/languages/'.$languages->language_image;
                if(File::exists($image_destination)){

                    File::delete($image_destination);
                }
                $image = $request->file('language_image');
                $image_extention = $image->getClientOriginalExtension();
                $image_file= "language".time().'.'.$image_extention;
                $image->move('storage/languages/',$image_file);
                $languages->language_image = $image_file;
            }
            $languages->save();
            // Set a flash message
            $request->session()->flash('success', 'Data Updated successfully.');
            return redirect()->route('admin.languages.index');

        } else {
           

            $add_languages = new Language();
            $add_languages->language  = $request->language;

            if($request->hasfile('language_image')){

                $image = $request->file('language_image');
                $image_extention = $image->getClientOriginalExtension();
                $image_file= "language".time().'.'.$image_extention;
                $image->move('storage/languages/',$image_file);
                $add_languages->language_image = $image_file;
            }
            $add_languages->save();

            // Set a flash message
            $request->session()->flash('success', 'Data Inserted successfully.');
            return redirect()->route('admin.languages.index');
        }

    }

    public function edit($id)
    {
        $edit_language = Language::find($id);
        return view('admin.languages.create', ['edit_language' => $edit_language]);
    }

    public function delete(Request $request,$id){
        
        Language::find($id)->delete();
        $request->session()->flash('success', 'Data Deleted successfully.');
        return redirect()->route('admin.languages.index');
    }
}
