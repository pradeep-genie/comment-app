<?php

namespace App\Http\Controllers\Admin;

use Config;
use Storage;
use App\Models\Genre;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\File;
use App\Http\Controllers\Controller;

class GenreController extends Controller
{
    public function index(Request $request){

        $genre_data = Genre::where([
            ['genre_title', '!=', Null],
            [function ($query) use ($request) {
                if (($search = $request->search)) {
                    $query->orWhere('genre_title', 'LIKE', '%' . $search . '%')
                        ->orWhere('genre_description', 'LIKE', '%' . $search . '%')
                        ->get();
                }
            }]
        ])->paginate(10);
        $genres = Genre::get();

        return view('admin.genre.index',['genre_data'=>$genre_data,'genres'=>$genres]);
    }

    public function create(){
        return view('admin.genre.create');
    }

    public function store(Request $request){

        if (isset($request->genre_id) && $request->genre_id != null) {

            $genres = Genre::find($request->genre_id);
            $genres->genre_title = $request->genre_title;
            $genres->genre_description = $request->genre_description;
            $genres->genre_status = $request->genre_status;
            $genres->save();
            // Set a flash message
            $request->session()->flash('success', 'Data Updated successfully.');
            return redirect()->route('admin.genres.index');

        } else {

            $add_genre = new Genre();
            $add_genre->genre_title = $request->genre_title;
            $add_genre->genre_description = $request->genre_description;
            $add_genre->genre_status = $request->genre_status;
            $add_genre->save();
            // Set a flash message
            $request->session()->flash('success', 'Data inserted successfully.');
            return redirect()->route('admin.genres.index');
            
        }

    }
    

    public function edit($id)
    {
        $edit_genre = Genre::find($id);
        return view('admin.genre.create', ['edit_genre' => $edit_genre]);
    }

    public function delete(Request $request ,$id){
        Genre::find($id)->delete();
        // Set a flash message
        $request->session()->flash('success', 'Data Deleted successfully.');
        return redirect()->route('admin.genres.index');
    }
}
