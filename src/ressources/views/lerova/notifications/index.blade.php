@extends('lerova.layouts.backend')

@section('content')

    <div class="container">

        <div class="row">

            <div class="col-md-8 col-md-offset-2">

                <h2>All Notifications <span class="badge">{{ $notifications->count() }}</span></h2>

                <ol style="padding: 0; background-color: transparent" class="breadcrumb">
                    <li class="active">Overview</li>
                </ol>


                <hr>

                <a href="{{ route('lerova.notifications.index') }}">
                    <span class="label @if(Route::currentRouteName() === 'lerova.notifications.index') label-primary @else label-default @endif">All Notifications</span>
                </a>

                <a href="{{ route('lerova.notifications.archived') }}">
                    <span class="label @if(Route::currentRouteName() === 'lerova.notifications.archived') label-primary @else label-default @endif">Archived</span>
                </a>



                @role('administrator')
                <a href="{{ route('send.notification') }}" class="pull-right btn btn-xs btn-success">Add a new Notification</a>
                @endrole


                <hr>

            </div>


            <div class="col-md-8 col-md-offset-2">


                @if($notifications->count())

                    <div class="panel panel-default">

                        <div class="panel-body">
                            <table class="table table-hover table-responsive">

                                <thead>
                                <tr>
                                    <th>Origin</th>
                                    <th>Name</th>
                                    <th>Received at</th>
                                    <th class="text-center">Archive</th>
                                </tr>
                                </thead>
                                <tbody>

                                @foreach($notifications as $notification)

                                    <tr>
                                        <td><span class="label label-info">{{ $notification->origin }}</span></td>
                                        <td><a href="{{ route('lerova.notifications.show',$notification) }}">{{ $notification->name }}</a></td>

                                        <td class="hidden-sm hidden-xs">{{ $notification->created_at->diffForHumans() }}</td>


                                        <td class="text-center">


                                            <form id="withdraw" class="" role="form" method="POST"
                                                  action="{{ route('lerova.notifications.archive', $notification) }}">

                                                {{ csrf_field() }}

                                                <button type="submit" style="color:white; padding: 0; border: none; background: none; ">
                                                    <i style="color:darkgrey;" class="fa fa-archive" aria-hidden="true"></i>
                                                </button>

                                            </form>

                                        </td>

                                    </tr>
                                @endforeach

                                </tbody>
                            </table>
                        </div>
                    </div>

                @else

                    <div class="panel panel-danger">
                        <div class="panel-body">

                            <span class="pull-right label label-danger">Info</span> No
                            Notifications available
                        </div>

                    </div>


                @endif

            </div>
        </div>
    </div>

@endsection
