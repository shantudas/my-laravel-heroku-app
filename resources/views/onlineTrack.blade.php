@extends('app')

@section('title', 'Page Title')

@section('content')



<table class="table">
    <thead>
        <tr>
            <th scope="col">track id</th>
            <th scope="col">Online at</th>
            <th scope="col">Offline at </th>
            <th scope="col">Actions</th>
        </tr>
    </thead>
    <tbody>
    @foreach ($onlineTracks as $track)
        <tr>
            <td>{{$track->id}}</td>
            <td>{{$track->online_at}}</td>
            <td>{{$track->offline_at}}</td>
            <td><a href="{{ route('coordinate.show', $track->id)}}" type="button" class="btn btn-primary">See Coordinates</a></td>
        </tr>
        @endforeach
    </tbody>
</table>
@endsection