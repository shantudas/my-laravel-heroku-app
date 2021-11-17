<?php

namespace App\Http\Controllers;

use App\User;
use App\UserOnlineTrack;
use Illuminate\Http\Request;
use Carbon\Carbon;
use Exception;
use Illuminate\Support\Facades\Log;

class OnlineTrackController extends Controller
{
    // public function __construct()
    // {
    //     $this->middleware('auth:api');
    // }

    public function updateOnlineState(Request $request)
    {
        $user=$request->user();
        $onlineState = $request->online;

        if ($onlineState == 1) {

            $user->online = 1;
            $user->save();

            $userOnlineTrack = new UserOnlineTrack();
            $userOnlineTrack->user_id = $user->id;
            $userOnlineTrack->online_at = date('Y-m-d H:i:s');
            $userOnlineTrack->save();

            $message = 'online success';
        } else {

            $user->online = 0;
            $user->save();

            $userOnlineTrack = UserOnlineTrack::where('user_id', $user->id)->where('offline_at', null)->orderBy('id', 'desc')->first();
            $userOnlineTrack->offline_at = date('Y-m-d H:i:s');
            $userOnlineTrack->save();

            $message = 'offline success';
        }

        return response()->json(
            [
                'track_id'=> $userOnlineTrack->id,
                'message' => $message
            ]
        );
    }
}
