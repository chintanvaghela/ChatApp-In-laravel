@extends('layout.mainlayout')

@section('content')
<div class="container" style="margin-top:10%;">
            <div class="row">
                <div class="col">
                    <h1>
                @if($errors->has('email'))
                    {{$errors->first('email')}}
                @endif
            </h1>
            <h1>
                @if($errors->has('password'))
                    {{$errors->first('password')}}
                @endif
            </h1>
                <div class="d-flex justify-content-center">
                    <div class="page-header">
                        <h1>Login Form </h1>
                    </div>
                </div>
                </div>
            </div>
            <div class="row">
                <div class="col">
                    <form action="/" method="post">
                        {{csrf_field()}}
                        <div class="form-group">
                            <label for="email">Email</label>
                            <input type="email" name="email" id="Email1" class="form-control" placeholder="Email">
                        </div>
                        <div class="form-group">
                            <label for="pass">Password</label>
                            <input type="password" name="password" id="pass" class="form-control" placeholder="Password">
                        </div>
                        <div class="row pr-3 justify-content-end">
                            <input type="submit"  value="Login" class="btn btn-outline-dark">
                        </div>
                    </form>
                </div>
            </div>
        </div>
@endsection
