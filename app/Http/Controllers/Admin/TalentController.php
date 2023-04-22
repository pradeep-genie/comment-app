<?php
namespace App\Http\Controllers\Admin;
use App\Models\User;
use App\Models\Telent;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use App\Http\Controllers\Controller;

class TalentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request){
        $talent_data = Telent::where([
            ['title', '!=', Null],
            [function ($query) use ($request) {
                if (($search = $request->search)) {
                    $query->orWhere('title', 'LIKE', '%' . $search . '%')
                        ->orWhere('description', 'LIKE', '%' . $search . '%')
                        ->get();
                }
            }]
        ])->paginate(10);
        $talents = Telent::get();
        return view('admin.talent-hunt.index',['talent_data'=>$talent_data,'talents'=>$talents]);
    }

    public function show_talents($id){

        $talents_view = Telent::find($id);
        $user_details = User::get();

        return view('admin.talent-hunt.show',['talents_view'=>$talents_view,'user_details'=>$user_details]);
    }

}
