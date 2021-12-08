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

    <table class="table">
        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">type</th>
                <th scope="col">user id</th>
                <th scope="col">created at</th>

            </tr>
        </thead>
        <tbody>
            @foreach ($workers as $worker)
            <tr>
                <td>{{$worker->id}}</td>

                <td>
                    @switch($worker->type)
                    @case(1)
                        From Offline Button click
                    @break
                    @case(2)
                        From Multiple location Upload worker
                    @break
                    @case(3)
                        From Offline worker
                    @break
                    @endswitch
                </td>

                <td>{{ $worker->user->name}}</td>

                <td>{{$worker->created_at}}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
    {{$workers->links()}}
    @endsection