@extends('lerova.layouts.backend')

@section('content')

    <div class="container">

        <div class="row">

            <div class="col-md-8 col-md-offset-2">

                <h2>Notifications</h2>

                <ol style="padding: 0; background-color: transparent" class="breadcrumb">
                    <li><a href="{{ route('lerova.administrator.index') }}">Administrator</a></li>
                    <li class="active">Notifications</li>
                </ol>


                <hr>

            </div>

            <div class="col-md-8 col-md-offset-2">

                <form class="form-horizontal" method="POST"
                      action="{{ route('lerova.administrator.modules.notifications.update') }}">
                    {{ csrf_field() }}
                    {{ method_field('PATCH') }}

                        <h5>User<span class="pull-right label label-info">required</span></h5>

                        <div class="form-group{{ $errors->has('user_id') ? ' has-error' : '' }}">

                            <div class="col-md-12">

                                <select title="user_id" id="user_id" class="form-control" name="user_id">

                                    @foreach($users as $user)
                                        <option value="{{ $user->id }}" @if ($notifications->user_id == $user->id) selected @endif>{{ $user->email }}</option>
                                    @endforeach

                                </select>

                                @if ($errors->has('user_id'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('user_id') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                    <div class="form-group">
                        <div class="col-md-12">
                            <button type="submit" class="btn btn-block btn-success">
                                Save
                            </button>
                        </div>
                    </div>
                </form>

                
            </div>


        </div>

    </div>
@endsection
