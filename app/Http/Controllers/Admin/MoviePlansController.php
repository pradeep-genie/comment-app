<?php

namespace App\Http\Controllers\Admin;

use App\Models\MoviePlans;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\File;

class MoviePlansController extends Controller
{
    public function index(Request $request){

        $plan_data = MoviePlans::where([
            ['plan', '!=', Null],
            [function ($query) use ($request) {
                if (($search = $request->search)) {
                    $query->orWhere('plan', 'LIKE', '%' . $search . '%')
                        ->orWhere('description', 'LIKE', '%' . $search . '%')
                        ->get();
                }
            }]
        ])->paginate(10);
        $plans = MoviePlans::get();
        return view('admin.movies-plans.index',['plan_data'=>$plan_data,'plans'=>$plans]);
    }

    public function create(){
        return view('admin.movies-plans.create');
    }

    public function store(Request $request){

        if (isset($request->plan_id) && $request->plan_id != null) {
            $this->validate($request, [
                'plan' => ['required', 'unique:movie_plans'],
            ]);

            $plans = MoviePlans::find($request->plan_id);
            $plans->plan  = $request->plan;   
            $plans->description  = $request->description;
            $plans->price  = $request->price;
            $plans->validity  = $request->validity;
            $plans->movies_qty  = $request->movies_qty;
            $plans->save();
            $request->session()->flash('success', 'Data Updated successfully.');
            return redirect()->route('admin.plans.index');

        } else {
            $this->validate($request, [
                'plan' => ['required', 'unique:movie_plans'],
            ]);

            $add_plans = new MoviePlans();
            $add_plans->plan  = $request->plan;   
            $add_plans->description  = $request->description;
            $add_plans->price  = $request->price;
            $add_plans->validity  = $request->validity;
            $add_plans->movies_qty  = $request->movies_qty;
            $add_plans->save();

            $request->session()->flash('success', 'Data Inserted successfully.');
            return redirect()->route('admin.plans.index');    
        }
        
    }

    public function edit($id)
    {
        $edit_plan = MoviePlans::find($id);
        return view('admin.movies-plans.create', ['edit_plan' => $edit_plan]);
    }

    public function delete(Request $request, $id){

        $delete_plan = MoviePlans::find($id);
        $delete_plan->delete();
        $request->session()->flash('success', 'Data Deleted successfully.');
        return redirect()->route('admin.plans.index');
    }
}
