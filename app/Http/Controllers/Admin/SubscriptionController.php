<?php

namespace App\Http\Controllers\Admin;

use App\Models\User;
use App\Models\Subscription;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class SubscriptionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {

        // $subscription_data = Subscription::where([
        //     ['start_date', '!=', Null],
        //     [function ($query) use ($request) {
        //         if (($search = $request->search)) {
        //             $query->orWhere('start_date', 'LIKE', '%' . $search . '%')
        //                 ->orWhere('transaction_id', 'LIKE', '%' . $search . '%')
        //                 ->get();
        //         }
        //     }]
        // ])->paginate(10);

        $query = Subscription::query();

        if ($request->has('search') && !empty($request->search)) {
            $query->orWhere('transaction_id', 'LIKE', '%' . $request->search . '%');
        }

        if (($request->has('start_date') && !empty($request->start_date)) && ($request->has('end_date') && !empty($request->start_date))) {
            $query->whereBetween('created_at', [$request->start_date, $request->end_date]);
        }

        $subscription_data = $query->paginate(10);
        $subscriptions = Subscription::get();
        $user_details = User::get();

        return view('admin.subscription.index', ['subscription_data' => $subscription_data, 'subscriptions' => $subscriptions, 'user_details' => $user_details]);
    }

    public function showOrderDetails($id)
    {

        $view_subscriptions = Subscription::find($id);
        $view_user = User::get();

        return view('admin.subscription.show', ['view_subscriptions' => $view_subscriptions, 'view_user' => $view_user]);
    }

}
