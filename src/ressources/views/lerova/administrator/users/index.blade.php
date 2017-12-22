@extends('lerova.layouts.backend')

@section('content')

    <div class="container">

        <div class="row">

            <div class="col-md-8 col-md-offset-2">


                <h2>Users <span class="badge">{{ $users->count() }}</span></h2>

                <ol style="padding: 0; background-color: transparent" class="breadcrumb">
                    <li><a href="{{ route('lerova.administrator.index') }}">Administrator</a></li>
                    <li class="active">Users</li>
                </ol>


                <hr>


                <a href="{{ route('lerova.administrator.users.index') }}">
                    <span class="label @if(Route::currentRouteName() === 'lerova.administrator.users.index') label-primary @else label-default @endif">All users</span>
                </a>

                <a href="{{ route('lerova.administrator.users.create') }}" class="pull-right btn btn-xs btn-success">Add a new User</a>

            </div>


            @if($users->count())



                <div class="col-md-8 col-md-offset-2">

                    <hr>

                    <div class="panel panel-default">

                        <div class="panel-body">


                            <table class="table table-striped">
                                <thead>
                                <tr>
                                    <th>Page</th>
                                    <th>Roles</th>
                                    <th class="text-center">Archive</th>
                                </tr>
                                </thead>
                                <tbody>

                                @foreach($users as $user)
                                    <tr>

                                        <td>
                                            {{ $user->name }}
                                        </td>
                                        <td>


                                            @if(!count($user->roles))
                                                <a href="{{ route('lerova.administrator.users.edit', $user) }}{{ $user->uuid }}">
                                                    Add a Role
                                                </a>
                                            @else

                                                @foreach($user->roles as $role)

                                                    @if(Auth::user()->isSameAs($user))
                                                        <span class="label label-default">{{ $role->name }}</span>
                                                    @else
                                                        <a href="{{ route('lerova.administrator.users.edit', $user) }}{{ $user->uuid }}">
                                                            <span class="label label-default">{{ $role->name }}</span>
                                                        </a>
                                                    @endif
                                                @endforeach

                                            @endif




                                        </td>

                                        <td class="text-center">
                                            @if(!Auth::user()->isSameAs($user))

                                                <form id="withdraw" class="" role="form" method="POST"
                                                      action="{{ route('lerova.administrator.users.archive', $user) }}">

                                                    {{ csrf_field() }}

                                                    <button type="submit" style="color:white; padding: 0; border: none; background: none; ">
                                                        <i style="color:indianred;" class="fa fa-trash-o" aria-hidden="true"></i>
                                                    </button>

                                                </form>
                                            @endif

                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>


                        </div>

                    </div>

            </div>
            @endif


        </div>

    </div>









@endsection
