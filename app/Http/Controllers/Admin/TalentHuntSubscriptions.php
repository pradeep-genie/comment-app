<?php

namespace App\Http\Controllers\Admin;

use App\Models\TalentHuntSubscription;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\MoviePlans;

class TalentHuntSubscriptions extends Controller
{
    public function index(Request $request)
    {

        // $subscription_data = TalentHuntSubscription::where([
        //     ['payment_date', '!=', Null],
        //     [function ($query) use ($request) {
        //         if (($search = $request->search)) {
        //             $query->orWhere('payment_date', 'LIKE', '%' . $search . '%')
        //                 ->orWhere('reference_id', 'LIKE', '%' . $search . '%')
        //                 ->orWhere('transaction_id', 'LIKE', '%' . $search . '%')
        //                 ->get();
        //         }
        //     }]
        // ])->paginate(10);

        $query = TalentHuntSubscription::query();

        if ($request->has('search') && !empty($request->search)) {
            $query->orWhere('reference_id', 'LIKE', '%' . $request->search . '%')
                ->orWhere('transaction_id', 'LIKE', '%' . $request->search . '%');
        }

        if (($request->has('start_date') && !empty($request->start_date)) && ($request->has('end_date') && !empty($request->start_date))) {
            $query->whereBetween('created_at', [$request->start_date, $request->end_date]);
        }

        $TalentHuntSubscription = TalentHuntSubscription::get();
        $subscription_data = $query->paginate(10);
        $user_details = User::get();

        return view('admin.talent-hunt.subscription', [
            'TalentHuntSubscription' => $TalentHuntSubscription, 'subscription_data' => $subscription_data,
            'user_details' => $user_details
        ]);
    }

    public function invoice($id)
    {

        $show_subscriptions = TalentHuntSubscription::find($id);
        $user_details = User::get();

        return view('admin.talent-hunt.subscriptionshow', ['show_subscriptions' => $show_subscriptions, 'user_details' => $user_details]);
    }

    public function showTalentSubscription($id)
    {
        $show_subscriptions = TalentHuntSubscription::find($id);
        $movie_pack = MoviePlans::get();
        $user_details = User::get();

        return view('admin.talent-hunt.viewsubscription', ['show_subscriptions' => $show_subscriptions,'user_details' => $user_details,'movie_pack'=>$movie_pack]);
    }
}
