<?php

namespace Modules\Wishlist\App\Http\Controllers;

use Auth;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Http\Controllers\Controller;
use Illuminate\Http\RedirectResponse;
use Modules\Listing\Entities\Listing;
use Modules\Wishlist\App\Models\Wishlist;

class WishlistController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $item_array = array();

        $user = Auth::guard('web')->user();

        $wishlists = Wishlist::where('user_id', $user->id)->get();

        foreach($wishlists as $wishlist){
            $item_array[] = $wishlist->item_id;
        }

        $services = Listing::with('seller')->where(['status' => 'enable', 'approved_by_admin' => 'approved'])->whereIn('id', $item_array)->latest()->get();

        return view('wishlist::index', ['services' => $services]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $user = Auth::guard('web')->user();

        if($user->is_seller == 1){
            $notify_message= trans('translate.Please login as a buyer');
            return response()->json(['message' => $notify_message], 403);
        }

        $is_exist = Wishlist::where('user_id', $user->id)->where('item_id', $request->item_id)->count();

        if($is_exist == 0){
            $wishlist = new Wishlist();
            $wishlist->item_id = $request->item_id;
            $wishlist->user_id = $user->id;
            $wishlist->save();

            $notify_message= trans('translate.Item added to wishlist');
            return response()->json(['message' => $notify_message]);
        }else{
            $notify_message= trans('translate.Item already added to wishlist');
            return response()->json(['message' => $notify_message], 403);
        }


    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $user = Auth::guard('web')->user();

        Wishlist::where('user_id', $user->id)->where('item_id', $id)->delete();

        $notify_message= trans('translate.Item removed to wishlist');
        $notify_message=array('message'=>$notify_message,'alert-type'=>'success');
        return redirect()->back()->with($notify_message);
    }
}
