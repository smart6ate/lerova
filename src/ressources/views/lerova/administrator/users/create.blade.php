@extends('lerova.layouts.backend')

@section('content')

    <div class="container">

        <div class="row">

            <div class="col-md-8 col-md-offset-2">


                <h2>Add a new User</h2>

                <ol style="padding: 0; background-color: transparent" class="breadcrumb">
                    <li><a href="{{ route('lerova.administrator.index') }}">Administrator</a></li>
                    <li><a href="{{ route('lerova.administrator.users.index') }}">Users</a></li>
                    <li class="active">Add a new User</li>
                </ol>


                <hr>

            </div>

            <div class="col-md-8 col-md-offset-2">


                <form class="form-horizontal" method="POST"
                      action="{{ route('lerova.administrator.users.store') }}">
                    {{ csrf_field() }}

                    <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">

                        <div class="col-md-10 col-md-offset-1">
                            <input id="name" type="text" placeholder="Name" class="form-control" name="name"
                                   value="{{ old('name') }}" required autofocus>

                            @if ($errors->has('name'))
                                <span class="help-block">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                            @endif
                        </div>
                    </div>

                    <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">

                        <div class="col-md-10 col-md-offset-1">
                            <input id="email" type="email" placeholder="E-Mail Address" class="form-control"
                                   name="email" value="{{ old('email') }}" required>

                            @if ($errors->has('email'))
                                <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                            @endif
                        </div>
                    </div>

                    <div class="form-group{{ $errors->has('role_id') ? ' has-error' : '' }}">

                        <div class="col-md-10 col-md-offset-1">
                            <select title="Role id" id="role_id" class="form-control" name="role_id">

                                <option value="" selected>No Role selected</option>

                            @foreach($roles as $role)
                                    <option value="{{ $role->id }}"

                                            @if (old('role_id') == $role->id) selected @endif

                                    >{{ ucfirst($role->name) }}</option>
                                @endforeach
                            </select>

                            @if ($errors->has('role_id'))
                                <span class="help-block">
                                        <strong>{{ $errors->first('role_id') }}</strong>
                                    </span>
                            @endif
                        </div>
                    </div>

                    <div class="form-group{{ $errors->has('notification') ? ' has-error' : '' }}">

                        <div class="col-md-10 col-md-offset-1">


                            <label class="checkbox-inline"><input type="checkbox" name="notification" id="notification" value="1" >Notify User</label>

                        @if ($errors->has('notification'))
                                <span class="help-block">
                                        <strong>{{ $errors->first('notification') }}</strong>
                                    </span>
                            @endif
                        </div>
                    </div>


                    <div class="form-group">
                        <div class="col-md-10 col-md-offset-1">
                            <button type="submit" class="btn btn-block btn-success">
                                Add a new User
                            </button>
                        </div>
                    </div>
                </form>

                
            </div>


        </div>

    </div>
@endsection
