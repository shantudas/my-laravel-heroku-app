@extends('app')

@section('title', 'Page Title')

@section('content')
<table class="table">
    <thead>
        <tr>
            <th scope="col">#</th>
            <th scope="col">Name</th>
            <th scope="col">State</th>
            <th scope="col">Action</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($users as $user)
        <tr>

            <td>{{$user->id}}</td>
            <td>{{$user->name}}</td>
            @if($user->online==1)
            <td>Online</td>
            @else
            <td>Offline</td>
            @endif
            @php
            $date = \Carbon\Carbon::today()->toDateString();
            @endphp
            <td><a href="{{ route('onlineTrack.show',['id'=>$user->id, 'date'=>$date])}}" type="button" class="btn btn-primary">See Online Tracking</a></td>
        </tr>
        @endforeach
    </tbody>
</table>
@endsection