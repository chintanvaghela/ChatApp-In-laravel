@extends('layout.mainlayout')

@section('content')

@if(Auth::user())
    <div class="topmargin">
        <div><a href="send">Send</a></div>
    @if(count($users)>0)
        <h1>List of Users:</h1><br>
        @foreach ($users as $user)
        @if(Auth::user()->id!=$user->id)
            <div class="well">
            <h3>{{$user->name}}</h3>
            <a href="{{$user->id}}/message">Send Message</a>
            </div>
        @endif
        @endforeach
    @endif
    </div>
    @else
    <div class="container" style="margin-top:10%;">
    <div class="row">
        <div class="col">
            <h1>Welcome to The Home Page Of ChatApp</h1>
        </div>
    </div>
</div>
@endif
@endsection
