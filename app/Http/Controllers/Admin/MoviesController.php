<?php

namespace App\Http\Controllers\Admin;

use App\Models\Genre;
use App\Models\Movies;
use App\Models\Language;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use App\Http\Controllers\Controller;

class MoviesController extends Controller
{
    public function index(Request $request)
    {

        $movies_data = Movies::where([
            ['title', '!=', Null],
            [function ($query) use ($request) {
                if (($search = $request->search)) {
                    $query->orWhere('title', 'LIKE', '%' . $search . '%')
                        ->orWhere('description', 'LIKE', '%' . $search . '%')
                        ->orWhere('imdb_rating', 'LIKE', '%' . $search . '%')
                        ->orWhere('release_date', 'LIKE', '%' . $search . '%')
                        ->get();
                }
            }]
        ])->paginate(10);

        $total_movies = Movies::get();

        return view('admin.movies.index', ['movies_data' => $movies_data, 'total_movies' => $total_movies]);
    }


    public function getDataBetweenDates()
    {
        $startDate = request('start_date');
        $endDate = request('end_date');

        $movies_data = Movies::whereBetween('created_at', [$startDate, $endDate])->paginate(10);
        $total_movies = Movies::get();
        return view('admin.movies.index', ['movies_data' => $movies_data, 'total_movies' => $total_movies]);
    }

    public function create()
    {

        $movie_genre = Genre::get();
        $language = Language::get();
        return view('admin.movies.create', ['language' => $language, 'movie_genre' => $movie_genre]);
    }

    public function store(Request $request)
    {


        $add_movies = new Movies();
        $add_movies->title = $request->title;
        $add_movies->description = $request->description;
        $add_movies->url = $request->url;

        if ($request->hasfile('banner_image')) {

            $banner = $request->file('banner_image');
            $extention = $banner->getClientOriginalExtension();
            $banner_file = "hotott" . time() . '.' . $extention;
            $banner->move('storage/movies/', $banner_file);
            $add_movies->banner_image = $banner_file;
        }
        if ($request->hasfile('movie_path')) {

            $movies = $request->file('movie_path');
            $movie_extention = $movies->getClientOriginalExtension();
            $movies_file = "movie" . time() . '.' . $movie_extention;
            $movies->move('storage/movies/', $movies_file);
            $add_movies->movie_path = $movies_file;
        }


        $language = $request->language_id;
        $language_data = implode(',', $language);
        $add_movies->language_id = $language_data;

        $genre = $request->genre_id;
        $genre_data = implode(',', $genre);
        $add_movies->genre_id = $genre_data;

        $add_movies->release_date = $request->release_date;
        $add_movies->imdb_rating = $request->imdb_rating;

        //premium
        if (isset($request->premium)) {
            $premium = 1;
        } else {
            $premium = 0;
        }
        //standard
        if (isset($request->standard)) {
            $standard = 1;
        } else {
            $standard = 0;
        }
        // kids
        if (isset($request->kids)) {
            $kids = 1;
        } else {
            $kids = 0;
        }
        //devotional
        if (isset($request->devotional)) {
            $devotional = 1;
        } else {
            $devotional = 0;
        }
        $add_movies->premium = $premium;
        $add_movies->standard = $standard;
        $add_movies->kids = $kids;
        $add_movies->devotional = $devotional;

        $add_movies->save();

        $request->session()->flash('success', 'Data Inserted successfully.');
        return redirect()->route('admin.movies.index');
    }

    public function edit($id)
    {
        $language = Language::get();
        $edit_movies = Movies::find($id);
        $movie_genre = Genre::get();

        return view('admin.movies.edit', ['language' => $language, 'movie_genre' => $movie_genre, 'edit_movies' => $edit_movies]);
    }


    public function update(Request $request)
    {

        if (isset($request->movies_id) && $request->movies_id != null) {

            $movies = Movies::find($request->movies_id);

            $movies->title = $request->title;
            $movies->description = $request->description;
            $movies->url = $request->url;
            //filesystem
            if ($request->hasfile('banner_image')) {

                $banner_destination = 'storage/movies/' . $movies->banner_image;
                if (File::exists($banner_destination)) {

                    File::delete($banner_destination);
                }
                $banner = $request->file('banner_image');
                $extention = $banner->getClientOriginalExtension();
                $banner_file = "hotott" . time() . '.' . $extention;
                $banner->move('storage/movies/', $banner_file);
                $movies->banner_image = $banner_file;
            }

            if ($request->hasfile('movie_path')) {

                $movie_destination = 'storage/movies/' . $movies->movie_path;
                if (File::exists($movie_destination)) {

                    File::delete($movie_destination);
                }

                $movies_data = $request->file('movie_path');
                $movie_extention = $movies_data->getClientOriginalExtension();
                $movies_file = "movie" . time() . '.' . $movie_extention;
                $movies_data->move('storage/movies/', $movies_file);
                $movies->movie_path = $movies_file;
            }
            //end filesystem
            $language = $request->language_id;
            $language_data = implode(',', $language);
            // dd($language_data);
            $movies->language_id = $language_data;

            $genre = $request->genre_id;
            $genre_data = implode(',', $genre);
            $movies->genre_id = $genre_data;
            $movies->release_date = $request->release_date;
            $movies->imdb_rating = $request->imdb_rating;
            //premium
            if (isset($request->premium)) {
                $premium = 1;
            } else {
                $premium = 0;
            }

            //standard
            if (isset($request->standard)) {
                $standard = 1;
            } else {
                $standard = 0;
            }

            // kids
            if (isset($request->kids)) {
                $kids = 1;
            } else {
                $kids = 0;
            }

            //devotional
            if (isset($request->devotional)) {
                $devotional = 1;
            } else {
                $devotional = 0;
            }

            $movies->premium = $premium;
            $movies->standard = $standard;
            $movies->kids = $kids;
            $movies->devotional = $devotional;
            $movies->save();
        } else {
            echo "Interanl server error";
        }

        $request->session()->flash('success', 'Data Inserted successfully.');
        return redirect()->route('admin.movies.index');
    }

    public function delete(Request $request, $id)
    {
        Movies::find($id)->delete();
        $request->session()->flash('success', 'Data Deleted successfully.');
        return redirect()->route('admin.movies.index');
    }

    public function show($id)
    {

        $show_movie = Movies::find($id);
        $genres = Genre::get();
        $language = Language::where('id', '=', $show_movie->language_id)->get();


        $language = Language::get();

        return view('admin.movies.show', ['language' => $language, 'genres' => $genres, 'show_movie' => $show_movie]);
    }
}
