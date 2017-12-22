@extends('lerova.layouts.backend')

@section('content')

    <div class="container">

        <div class="row">

            <div class="col-md-8 col-md-offset-2">


                <h2>Edit {{ $user->name }}</h2>

                <ol style="padding: 0; background-color: transparent" class="breadcrumb">
                    <li><a href="{{ route('lerova.administrator.index') }}">Administrator</a></li>
                    <li><a href="{{ route('lerova.administrator.users.index') }}">Users</a></li>
                    <li class="active">Edit {{ $user->name }}</li>
                </ol>


                <hr>

            </div>

            <div class="col-md-8 col-md-offset-2">

                <form class="form-horizontal" method="POST"
                      action="{{ route('lerova.administrator.users.update', $user) }}">
                    {{ csrf_field() }}

                    <div class="form-group{{ $errors->has('role') ? ' has-error' : '' }}">

                        <div class="col-md-10 col-md-offset-1">
                            <select id="role" class="form-control" name="role">

                                <option value="" selected>No Role selected</option>

                                @foreach($roles as $role)

                                    @if(count($user->roles))
                                        <option value="{{ $role->id }}"
                                                @if ($user->roles->first()->id == $role->id) selected @endif
                                        >{{ ucfirst($role->name) }}</option>

                                    @else

                                        <option value="{{ $role->id }}">{{ ucfirst($role->name) }}</option>
                                    @endif

                                @endforeach
                            </select>

                            @if ($errors->has('role'))
                                <span class="help-block">
                                        <strong>{{ $errors->first('role') }}</strong>
                                    </span>
                            @endif
                        </div>
                    </div>


                    <div class="form-group">
                        <div class="col-md-10 col-md-offset-1">
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
