<?php

namespace App\Http\Controllers\Admin;

use App\Models\User;
use App\Models\Language;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\File;
use App\Http\Controllers\Controller;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Validator;

class UsersController extends Controller
{
    public function index(Request $request)
    {

        $user_data = User::where([
            ['name', '!=', Null],
            [function ($query) use ($request) {
                if (($search = $request->search)) {
                    $query->orWhere('name', 'LIKE', '%' . $search . '%')
                        ->orWhere('email', 'LIKE', '%' . $search . '%')
                        ->orWhere('phone', 'LIKE', '%' . $search . '%')
                        ->get();
                }
            }]
        ])->paginate(10);

        $record = User::get();
        return view('admin.users.index', ['user_data' => $user_data, 'record' => $record]);
    }

    public function create()
    {

        $language = Language::get();

        return view('admin.users.create', ['language' => $language]);
    }

    public function store(Request $request)
    {


        $validatedData = $request->validate([
            'phone' => ['required', 'digits:10'],
            'lang_1' => 'required',
            'lang_2' => 'nullable|different:lang_1',
            'lang_3' => 'nullable|different:lang_1|different:lang_2',

            'name' => 'required',
            'email' => 'required',
            'address' => 'required',
            'city' => 'required',
            'state' => 'required',
            'pincode' => 'required',
            'status' => 'required',
            'password' => 'required',
            'profile_image' => 'nullable',
            'latitude' => 'nullable',
            'lognitute' => 'nullable',
            'device_name' => 'nullable',
            'device_imei' => 'nullable',
            'installed_date' => 'nullable',
        ]);


        if (User::where('phone', '=', $request->phone)->exists()) {


            if (((User::where('phone', '=', $request->phone)->exists()) && (User::where('phone', '=', $request->phone)->where('lang_1', '!=', $request->lang_2)->exists()) && (User::where('phone', '=', $request->phone)->where('lang_2', '!=', $request->lang_2)->exists()) && (User::where('phone', '=', $request->phone)->where('lang_3', '!=', $request->lang_2)->exists()) && (User::where('phone', '=', $request->phone)->where('lang_1', '!=', $request->lang_3)->exists()) && (User::where('phone', '=', $request->phone)->where('lang_2', '!=', $request->lang_3)->exists()) && (User::where('phone', '=', $request->phone)->where('lang_3', '!=', $request->lang_3)->exists()))) {

                $user = new User;
                $user->phone = $validatedData['phone'];
                $user->lang_1 = $validatedData['lang_1'];
                $user->lang_2 = $validatedData['lang_2'];
                $user->lang_3 = $validatedData['lang_3'];

                $user->name = $validatedData['name'];
                $user->email = $validatedData['email'];
                $user->address = $validatedData['address'];
                $user->city = $validatedData['city'];
                $user->state = $validatedData['state'];
                $user->pincode = $validatedData['pincode'];
                $user->status = $validatedData['status'];
                $user->password = Hash::make($validatedData['password']);
                $user->save();
            } else {
                $request->session()->flash('success', 'Please select language 2 and language 3 different from privius');
                return redirect()->route('admin.users.index');
            }
        } else {

            $user = new User;
            $user->phone = $validatedData['phone'];
            $user->lang_1 = $validatedData['lang_1'];
            $user->lang_2 = $validatedData['lang_2'];
            $user->lang_3 = $validatedData['lang_3'];

            $user->name = $validatedData['name'];
            $user->email = $validatedData['email'];
            $user->address = $validatedData['address'];
            $user->city = $validatedData['city'];
            $user->state = $validatedData['state'];

            // if ($request->hasfile('profile_image')) {

            //     $image = $request->file('profile_image');
            //     $image_extention = $image->getClientOriginalExtension();
            //     $image_file = "movie" . time() . '.' . $image_extention;
            //     $image->move('storage/users/', $image_file);
            //     $user->profile_image = $image_file;
            // }
            $user->pincode = $validatedData['pincode'];
            $user->status = $validatedData['status'];
            $user->password = Hash::make($validatedData['password']);
            // Save the user to the database
            $user->save();
        }

        $request->session()->flash('success', 'User Created successfully.');
        return redirect()->route('admin.users.index');
    }


    public function update(Request $request)
    {

        $validatedData = $request->validate([
            'phone' => ['required', 'digits:10'],
            'lang_1' => 'required',
            'lang_2' => 'nullable|different:lang_1',
            'lang_3' => 'nullable|different:lang_1|different:lang_2',

            'name' => 'required',
            'email' => 'required',
            'address' => 'required',
            'city' => 'required',
            'state' => 'required',
            'pincode' => 'required',
            'status' => 'required',
            'password' => 'required',

            'profile_image' => 'nullable',
            'latitude' => 'nullable',
            'lognitute' => 'nullable',
            'device_name' => 'nullable',
            'device_imei' => 'nullable',
            'installed_date' => 'nullable',

        ]);

        if (isset($request->user_id) && $request->user_id != null) {

            if (((User::where('phone', '=', $request->phone)->exists()) && (User::where('phone', '=', $request->phone)->where('lang_1', '!=', $request->lang_2)->exists()) && (User::where('phone', '=', $request->phone)->where('lang_2', '!=', $request->lang_2)->exists()) && (User::where('phone', '=', $request->phone)->where('lang_3', '!=', $request->lang_2)->exists()) && (User::where('phone', '=', $request->phone)->where('lang_1', '!=', $request->lang_3)->exists()) && (User::where('phone', '=', $request->phone)->where('lang_2', '!=', $request->lang_3)->exists()) && (User::where('phone', '=', $request->phone)->where('lang_3', '!=', $request->lang_3)->exists()))) {

                // dd("Hello Man");

                $user = User::find($request->user_id);
                $user->phone = $validatedData['phone'];
                $user->lang_1 = $validatedData['lang_1'];
                $user->lang_2 = $validatedData['lang_2'];
                $user->lang_3 = $validatedData['lang_3'];

                $user->name = $validatedData['name'];
                $user->email = $validatedData['email'];
                $user->address = $validatedData['address'];
                $user->city = $validatedData['city'];
                $user->state = $validatedData['state'];
                $user->pincode = $validatedData['pincode'];
                $user->status = $validatedData['status'];
                $user->password = Hash::make($validatedData['password']);

                // $profile_photo = $validatedData['profile_image'];


                // if ($request->hasfile('profile_image')) {

                //     $image_destination = 'storage/users/' . $user->profile_image;
                //     if (File::exists($image_destination)) {

                //         File::delete($image_destination);
                //     }

                //     $image = $request->file('profile_image');
                //     $image_extention = $image->getClientOriginalExtension();
                //     $image_file = "movie" . time() . '.' . $image_extention;
                //     $image->move('storage/users/', $image_file);
                //     $user->profile_image = $image_file;
                // }

                $user->save();
            } else {

                // dd("Hello Pradeep");


                $request->session()->flash('success', 'Please select language 2 and language 3 different from privius');
                return redirect()->route('admin.users.index');
            }
        } else {

            echo "con't edit the data";
        }

        $request->session()->flash('success', 'User Updated successfully.');
        return redirect()->route('admin.users.index');
    }

    public function edit($id)
    {
        $edit_users = User::find($id);
        $language = Language::get();
        return view('admin.users.edit', ['edit_users' => $edit_users, 'language' => $language]);
    }

    public function delete(Request $request, $id)
    {
        $delete_user = User::find($id);
        $delete_user->delete();
        $request->session()->flash('success', 'User Deleted successfully.');
        return redirect()->route('admin.users.index');
    }

    public function show($id)
    {

        $show_user = User::find($id);
        $pradeep =  explode(',', $show_user->language);
        $language = Language::get();

        return view('admin.users.show', ['show_user' => $show_user, 'language' => $language, 'pradeep' => $pradeep]);
    }

    public function getDataBetweenDates()
    {
        $startDate = request('start_date');
        $endDate = request('end_date');

        $user_data = User::whereBetween('created_at', [$startDate, $endDate])->paginate(10);
        $record = User::get();
        return view('admin.users.index', ['user_data' => $user_data, 'record' => $record]);
    }
}
