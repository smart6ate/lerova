@extends('lerova.layouts.backend')

@section('content')
<div class="container">
    <div class="row">


        <div class="col-md-8 col-md-offset-2">

            <h2>Archived Notifications <span class="badge">{{ $notifications->count() }}</span></h2>

            <ol style="padding: 0; background-color: transparent" class="breadcrumb">
                <li><a href="{{ route('lerova.notifications.index') }}">Notifications</a></li>
                <li class="active">Archived</li>
            </ol>

            <hr>

            <a href="{{ route('lerova.notifications.index') }}">
                <span class="label @if(Route::currentRouteName() === 'lerova.notifications.index') label-primary @else label-default @endif">All Notifications</span>
            </a>

            <a href="{{ route('lerova.notifications.archived') }}">
                <span class="label @if(Route::currentRouteName() === 'lerova.notifications.archived') label-primary @else label-default @endif">Archived</span>
            </a>

            <hr>

        </div>

        <div class="col-md-8 col-md-offset-2">

        @if($notifications->count())

            <div class="panel panel-default">

                    <div class="panel-body">
                        <table class="table table-hover table-responsive">

                            <thead>
                            <tr>
                                <th>Notifications from</th>
                                <th class="hidden-sm hidden-xs">Archived at</th>
                                <th class="text-center">Restore</th>

                                @role('administrator')
                                <th class="text-center">Delete</th>
                                @endrole

                            </tr>
                            </thead>
                            <tbody>


                            @foreach($notifications as $notification)

                                <tr>

                                    <td>{{ $notification->name }}</td>

                                    <td class="hidden-sm hidden-xs">{{ $notification->deleted_at->diffForHumans() }}</td>

                                    <td class="text-center">

                                        <form id="withdraw" class="" role="form" method="POST"
                                              action="{{ route('lerova.notifications.restore', $notification->id) }}">

                                            {{ csrf_field() }}

                                            <button type="submit" style="color:orange; padding: 0; border: none; background: none; ">
                                                <i class="fa fa-undo" aria-hidden="true"></i>
                                            </button>

                                        </form>


                                    </td>


                                    @role('administrator')
                                    <td class="text-center">

                                        <form id="withdraw" class="" role="form" method="POST"
                                              action="{{ route('lerova.notifications.delete', $notification) }}">

                                            {{ csrf_field() }}

                                            <button type="submit" style="color:white; padding: 0; border: none; background: none; ">
                                                <i style="color:indianred;" class="fa fa-trash-o" aria-hidden="true"></i>
                                            </button>

                                        </form>


                                    </td>
                                    @endrole

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
