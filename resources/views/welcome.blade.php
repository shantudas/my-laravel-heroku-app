@extends('app')

@section('title', 'Page Title')

@section('content')
<table class="table">
    <thead>
        <tr>
            <th scope="col">#</th>
            <th scope="col">Name</th>
            <th scope="col">Online</th>
            <th scope="col">time</th>
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
            <td>
                @foreach ($user->onlineTracks as $t)
                <P>
                  

                    <a href="{!! url('dashboard',$t->id) !!}">track id #{{$t->id}}</a>
                    Online at: {{$t->online_at}}, Offline at: {{$t->offline_at}}

                </P>
                @endforeach
            </td>
         
        </tr>
        @endforeach
    </tbody>
</table>
@endsection