@extends('app')

@section('title', 'Page Title')
@push('css')
<style type="text/css">
    #myMap {
        border: 1px solid red;
        width: 100%;
        height: 500px;
    }
</style>
@endpush

@section('content')
<div class="row">
    <div class="col-6">
        <table class="table">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">latitude</th>
                    <th scope="col">longitude</th>
                    <th scope="col">speed</th>
                    <th scope="col">accuracy</th>
                    <th scope="col">time stamps</th>
                    <th scope="col">Created at</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($userCoordinates as $coordinate)
                <tr>
                    <td>{{$coordinate->id}}</td>
                    <td>{{$coordinate->latitude}}</td>
                    <td>{{$coordinate->longitude}}</td>
                    <td>{{$coordinate->speed}}</td>
                    <td>{{$coordinate->accuracy}}</td>
                    <td>{{$coordinate->time_stamps}}, {{ date('Y-m-d, h:i:s a', $coordinate->time_stamps/1000) }}</td>
                    <td>{{$coordinate->created_at}}</td>
                </tr>
                @endforeach
            </tbody>
        </table>

    </div>
    <div class="col-6">
        <div id="myMap"></div>
    </div>
</div>

@endsection

@push('scriptsEnd')
<script type="text/javascript">
    function myMap() {
        const map = new google.maps.Map(document.getElementById("myMap"), {
            zoom: 12,
            center: {
                lat: 23.8103,
                lng: 90.4125
            },
            mapTypeId: "terrain",
        });

        var flightPlanCoordinates = [];
        var jArray = <?php echo json_encode($userCoordinates); ?>;
        console.log(jArray);
        for (var i = 0; i < jArray.length; i++) {
            console.log("data:: " + jArray[i].id);

            if (jArray[i].accuracy<50) {
                flightPlanCoordinates.push({
                "lat": jArray[i].latitude,
                "lng": jArray[i].longitude,
            });
            }

           
        }
        // const flightPlanCoordinates2 = [{
        //         lat: 37.772,
        //         lng: -122.214
        //     },
        //     {
        //         lat: 21.291,
        //         lng: -157.821
        //     },
        //     {
        //         lat: -18.142,
        //         lng: 178.431
        //     },
        //     {
        //         lat: -27.467,
        //         lng: 153.027
        //     },
        // ];
        for (var i = 0; i < flightPlanCoordinates.length; i++) {
            console.log("flightPlanCoordinates :: " + flightPlanCoordinates[i].lat);
        }

        const flightPath = new google.maps.Polyline({
            path: flightPlanCoordinates,
            geodesic: true,
            strokeColor: "#FF0000",
            strokeOpacity: 1.0,
            strokeWeight: 2,
        });

        flightPath.setMap(map);
    }
</script>
<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAAR1ILRrHbI2BC7qWbV1xgYO4PbZGaTGM&callback=myMap"></script>
@endpush