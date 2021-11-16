<?php

namespace App\Http\Controllers;

use App\User;
use App\UserOnlineTrack;
use Illuminate\Http\Request;
use Carbon\Carbon;

class OnlineController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:api');
    }

    public function updateOnlineState(Request $request)
    {
        $user = $request->user();
        $onlineState = $request->online;

        if ($onlineState==1) {
            UserOnlineTrack::create([
                'user_id' => $user->id,
                'online_at' => Carbon::now()
            ]);
            $user->online = 1;
            $message = "Online success";
            $user->save();
        } else {
            $userOnlineTrack=UserOnlineTrack::where('user_id', $user->id);
            return $userOnlineTrack;

            /*$userOnlineTrack->offline_at=Carbon::now();
            $userOnlineTrack->save();*/

           /* $user->online = 0;
            $message = "offline success";
            $user->save();*/
        }



        return response()->json(
            ['message' => $message]
        );
    }
}
