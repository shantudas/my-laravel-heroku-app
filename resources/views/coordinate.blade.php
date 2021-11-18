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
        </tr>
    </thead>
    <tbody>
    @foreach ($onlineTracks as $track)
        <tr>
           
            <td>{{$track->id}}</td>
            <td>{{$track->latitude}}</td>
            <td>{{$track->longitude}}</td>
            <td>{{$track->speed}}</td>
            <td>{{$track->accuracy}}</td>
            <td>{{$track->created_at}}</td>
          
        </tr>
        @endforeach
    </tbody>
</table>
@endsection