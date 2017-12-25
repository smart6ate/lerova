@extends('lerova.layouts.backend')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Login</div>

                <div class="panel-body">
                    <form class="form-horizontal" method="POST" action="{{ route('login.magic') }}">
                        {{ csrf_field() }}

                        <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
{{--
                            <label for="email" class="col-md-4 control-label">E-Mail Address</label>
--}}

                            <div class="col-md-8 col-md-offset-2">
                                <input title="E-Mail Address" id="email" type="email" placeholder="E-Mail Address" class="form-control" name="email" value="{{ old('email') }}" required autofocus>

                                @if ($errors->has('email'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>


              {{--          <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                                <div class="checkbox">
                                    <label>
                                        <input type="checkbox" name="remember" {{ old('remember') ? 'checked' : '' }}> Remember Me
                                    </label>
                                </div>
                            </div>
                        </div>
--}}

                        <div class="form-group">
                            <div class="col-md-8 col-md-offset-2">
                                <button dusk="login-button" type="submit" class="btn btn-block btn-primary">
                                  Send Magic Link
                                </button>

                                <a href="{{ route('login') }}" dusk="login-button" type="submit" class="btn btn-block btn-link">
                                    Login with password instead
                                </a>

                            </div>
                        </div>


                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
