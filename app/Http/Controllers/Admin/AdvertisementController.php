<?php

namespace App\Http\Controllers\Admin;

use Storage;
use App\Models\Advertisement;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use App\Http\Controllers\Controller;

class AdvertisementController extends Controller
{
    public function index(Request $request){

        $advertisement_data = Advertisement::where([
            ['title', '!=', Null],
            [function ($query) use ($request) {
                if (($search = $request->search)) {
                    $query->orWhere('title', 'LIKE', '%' . $search . '%')
                        ->orWhere('description', 'LIKE', '%' . $search . '%')
                        ->get();
                }
            }]
        ])->paginate(10);
    
        $advertisements = Advertisement::get();

        return view('admin.advertisement.index',['advertisement_data'=>$advertisement_data,'advertisements'=>$advertisements]);
    }

    public function create(){
        return view('admin.advertisement.create');
    }

    public function store(Request $request){

        if (isset($request->advertisement_id) && $request->advertisement_id != null) {

            $advertisement = Advertisement::find($request->advertisement_id);
            $advertisement->title  = $request->title;
            $advertisement->description  = $request->description;
            $advertisement->duration  = $request->duration;
            //filesystem
            if($request->hasfile('advertised_video')){

                $image_destination = 'storage/advertisement/'.$advertisement->advertised_video;
                if(File::exists($image_destination)){

                    File::delete($image_destination);
                }
                $image = $request->file('advertised_video');
                $image_extention = $image->getClientOriginalExtension();
                $image_file= "advertisement".time().'.'.$image_extention;
                $image->move('storage/advertisement/',$image_file);
                $advertisement->advertised_video = $image_file;
            }

            $advertisement->save();
            $request->session()->flash('success', 'Data Updated successfully.');
            return redirect()->route('admin.advertisements.index');

        } else {
           

            $add_advertisement = new Advertisement();
            $add_advertisement->title  = $request->title;
            $add_advertisement->description  = $request->description;
            $add_advertisement->duration  = $request->duration;

            if($request->hasfile('advertised_video')){

                $image = $request->file('advertised_video');
                $image_extention = $image->getClientOriginalExtension();
                $image_file= "advertisement".time().'.'.$image_extention;
                $image->move('storage/advertisement/',$image_file);
                $add_advertisement->advertised_video = $image_file;
            }
            $add_advertisement->save();

            $request->session()->flash('success', 'Data Inserted successfully.');
            return redirect()->route('admin.advertisements.index');

            
        }
        

    }

    public function edit($id)
    {
        $edit_advertisement = Advertisement::find($id);
        return view('admin.advertisement.create', ['edit_advertisement' => $edit_advertisement]);
    }

    public function delete(Request $request, $id){

        $delete_banner = Advertisement::find($id);
        $delete_banner->delete();
        $request->session()->flash('success', 'Data Deleted successfully.');
        return redirect()->route('admin.advertisements.index');
    }
}
