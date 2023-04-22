<?php

namespace App\Http\Controllers\Admin;

use Config;
use Storage;
use App\Models\Banner;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use App\Http\Controllers\Controller;

class BannerController extends Controller
{
    public function index(Request $request){
        $banner_data = Banner::where([
            ['banner_name', '!=', Null],
            [function ($query) use ($request) {
                if (($search = $request->search)) {
                    $query->orWhere('banner_name', 'LIKE', '%' . $search . '%')
                        ->orWhere('banner_url', 'LIKE', '%' . $search . '%')
                        ->get();
                }
            }]
        ])->paginate(10);

        $banners = Banner::get();
        return view('admin.banners.index',['banner_data'=>$banner_data,'banners'=>$banners]);
    }

    public function create(){
        return view('admin.banners.create');
    }

    public function store(Request $request){

        if (isset($request->banner_id) && $request->banner_id != null) {

            $banners = Banner::find($request->banner_id);
            $banners->banner_name  = $request->banner_name;
            $banners->banner_url  = $request->banner_url;
            //filesystem
            if($request->hasfile('banner_image')){

                $image_destination = 'storage/banners/'.$banners->banner_image;
                if(File::exists($image_destination)){

                    File::delete($image_destination);
                }
                $image = $request->file('banner_image');
                $image_extention = $image->getClientOriginalExtension();
                $image_file= "banners".time().'.'.$image_extention;
                $image->move('storage/banners/',$image_file);
                $banners->banner_image = $image_file;
            }

            $banners->save();
            $request->session()->flash('success', 'Data Updated successfully.');
            return redirect()->route('admin.banners.index');

        } else {
           

            $add_banner = new Banner();
            $add_banner->banner_name  = $request->banner_name;
            $add_banner->banner_url  = $request->banner_url;

            if($request->hasfile('banner_image')){

                $image = $request->file('banner_image');
                $image_extention = $image->getClientOriginalExtension();
                $image_file= "banners".time().'.'.$image_extention;
                $image->move('storage/banners/',$image_file);
                $add_banner->banner_image = $image_file;
            }
            $add_banner->save();

            $request->session()->flash('success', 'Data Inserted successfully.');
            return redirect()->route('admin.banners.index');

            
        }
        

    }

    public function edit($id)
    {
        $edit_banner = Banner::find($id);
        return view('admin.banners.create', ['edit_banner' => $edit_banner]);
    }

    public function delete(Request $request, $id){

        $delete_banner = Banner::find($id);
        $delete_banner->delete();
        $request->session()->flash('success', 'Data Deleted successfully.');
        return redirect()->route('admin.banners.index');
    }
}
