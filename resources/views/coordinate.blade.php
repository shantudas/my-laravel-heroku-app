@extends('app')

@section('title', 'Page Title')

@section('content')
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
            <td>{{ Carbon\Carbon::createFromTimestamp($coordinate->time_stamps)->toDateTimeString() }}</td>
            <td>{{$coordinate->created_at}}</td>
        </tr>
        @endforeach
    </tbody>
</table>

{{ $userCoordinates->links() }}
@endsection