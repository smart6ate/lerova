@extends('lerova.layouts.backend')

@section('content')
    <div class="container">
        <div class="row">

            <div class="col-md-8 col-md-offset-2">

                <h2>Notification</h2>

                <ol style="padding: 0; background-color: transparent" class="breadcrumb">
                    <li><a href="{{ route('lerova.notifications.index') }}">Notifications</a></li>
                    <li class="active">{{ $notification->name }}</li>
                </ol>

            </div>

            <div class="col-md-8 col-md-offset-2">

                <hr>

                <div class="panel panel-default">

                    <div class="panel-heading"><strong>From: </strong> {{ $notification->name }}<span class="pull-right label label-info">{{ $notification->created_at->diffForHumans() }}</span>

                    </div>

                    <div class="panel-body">

                        <p>{{ $notification->body }}
                        </p>

                    </div>


                    <div class="panel-footer">

                            @if(!empty($notification->email))
                            <span class="label label-info">E-Mail</span>
                           <a style="color: black;" class="" href="mailto:{{ $notification->email }}">{{ $notification->email }}</a>

                            @endif

                            @if(!empty($notification->phone))
                                    <span style="margin-left: 30px;" class="label label-info">Phone</span>
                                <a style="color: black;" class="" href="tel:{{ $notification->phone }}">{{ $notification->phone }}</a>

                            @endif

                    </div>

            </div>


        </div>
    </div>
@endsection
