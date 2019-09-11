@extends('layout.mainlayout')

@section('content')

<div class="container justify-content-center" id="margin">
        <div class="d-flex justify-content-center">
            <div class="page-header">
                <h1>Registration Form </h1>
            </div>
        </div>
        <div class="row pt-3 pl-3">
            <div class="col-lg-12">
            <h1>
                @if(session('msg')!='null')
                    {{session('msg')}}
                @endif
            </h1>
                <form action="\register" method="post">
                    {{csrf_field()}}
                    <div class="form-group">
                        <label for="name">Name</label>
                        <input type="text" name="name" id="name" class="form-control" placeholder="Name">
                    </div>
                    <div class="form-group">
                        <label for="Email">Email</label>
                        <input type="email" name="email" id="Email" class="form-control" placeholder="Email">
                    </div>
                    <div class="form-group">
                        <label for="Phone">Phone No</label>
                        <input type="number" name="phone" id="Phone" class="form-control" placeholder="Phone Number">
                    </div>
                    <div class="form-group">
                        <label for="pass">Password</label>
                        <input type="password" name="pass" id="pass" class="form-control" placeholder="Password">
                    </div>
                    <div class="form-group">
                        <label for="confpass">Confirm Password</label>
                        <input type="password" name="confpass" id="confpass" class="form-control" placeholder="Confirm Password">
                    </div>
                    <div class="row pr-3 justify-content-end">
                        <input type="submit" class="btn btn-outline-dark">
                    </div>
                </form>
            </div>
        </div>
    </div>

@endsection
