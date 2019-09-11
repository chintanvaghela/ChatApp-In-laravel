@extends('layout.mainlayout')

@section('content')

@if(Auth::user())
    {{-- only login user can see this area --}}
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
