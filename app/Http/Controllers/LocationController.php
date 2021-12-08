<?php

namespace App\Http\Controllers;

use App\Http\Resources\LocationCollection;
use Illuminate\Http\Request;
use App\UserCoordinate;
use App\Http\Resources\LocationResource;
use App\WorkerInfo;

class LocationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $locattions = UserCoordinate::paginate(5);
        return new LocationCollection($locattions);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // return $request;
        $user=$request->user();

        $location = new UserCoordinate();
        $location->user_id = $user->id;
        $location->user_online_track_id = $request['track_id'];
        $location->latitude = $request['latitude'];
        $location->longitude = $request['longitude'];
        $location->speed = $request['speed'];
        $location->accuracy = $request['accuracy'];
        $location->time_stamps = $request['time_stamps'];
        $location->save();

        return response()->json(
            [
                'message' => 'coordinate added successfully'
            ]
        );
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show(UserCoordinate $location)
    {
        return new LocationResource($location);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function storeLocations(Request $request)
    {
        $user=$request->user();
        $data = $request->input();
        $workerType=$request->type;
        //echo "<pre>";print_r($data);
        foreach ($data['locations'] as $key => $value) {
            $location = new UserCoordinate();
            $location->user_id = $user->id;
            $location->user_online_track_id = $value['user_online_track_id'];
            $location->latitude = $value['latitude'];
            $location->longitude = $value['longitude'];
            $location->speed = $value['speed'];
            $location->accuracy = $value['accuracy'];
            $location->time_stamps = $value['time_stamps'];
            $location->save();
        }

        $workerInfo= new WorkerInfo();
        $workerInfo->type=$workerType;
        $workerInfo->save();


        return response()->json(
            [
                'message' => 'locations added successfully'
            ]
        );
    }

    public function showAllLocations($id)
    {
        # code...
        $onlineTracks = UserCoordinate::where('user_online_track_id',$id)->get();
        return $onlineTracks;
    }

    
    public function storeOfflineWorker(Request $request){

        $user=$request->user();
    
        $workerInfo= new WorkerInfo();
        $workerInfo->user_id=$user->id;
        $workerInfo->type=$request->type;
        $workerInfo->save();

        return response()->json(
            [
                'message' => 'worker called'
            ]
        );
    }
}
