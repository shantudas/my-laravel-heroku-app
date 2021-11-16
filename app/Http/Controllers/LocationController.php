<?php

namespace App\Http\Controllers;

use App\Http\Resources\LocationCollection;
use Illuminate\Http\Request;
use App\Location;
use App\Http\Resources\LocationResource;

class LocationController extends Controller
{
    public function __construct()
    {
      $this->middleware('auth:api');
    }
    
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $locattions = Location::paginate(5);
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
        $location = new Location();
        $location->track_id = $request['track_id'];
        $location->latitude = $request['latitude'];
        $location->longitude = $request['longitude'];
        $location->speed = $request['speed'];
        $location->accuracy = $request['accuracy'];
        $location->time_stamps = $request['time_stamps'];
        $location->save();

        return response()->json(
            [
                'message' => 'locations added successfully'
            ]
        );
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show(Location $location)
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
        $data = $request->input();
        //echo "<pre>";print_r($data);
        foreach ($data['locations'] as $key => $value) {
            $location = new Location();
            $location->track_id = $value['track_id'];
            $location->latitude = $value['latitude'];
            $location->longitude = $value['longitude'];
            $location->speed = $value['speed'];
            $location->accuracy = $value['accuracy'];
            $location->time_stamps = $value['time_stamps'];
            $location->save();
        }

        return response()->json(
            [
                'message' => 'locations added successfully'
            ]
        );

    }
}
