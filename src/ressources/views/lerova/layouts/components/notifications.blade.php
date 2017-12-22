
@if (Session::has('success'))

    <div class="alert alert-success" role="alert">
        <div class="container">
            <div class="row">
                <div class="col-md-10 col-md-offset-2">
                    <span style="margin-right: 15px;" class="label label-success">success</span> {{ Session::get('success') }}
                </div>
            </div>
        </div>
    </div>


@endif

@if (Session::has('warning'))


    <div class="alert alert-warning" role="alert">
        <div class="container">
            <div class="row">
                <div class="col-md-10 col-md-offset-2 ">
                    <span style="margin-right: 15px;" class="label label-warning">warning</span> {{ Session::get('warning') }}

                </div>
            </div>
        </div>
    </div>


@endif

@if (count($errors) > 0)

    <div class="alert alert-danger" role="alert">
        <div class="container">
            <div class="row">
                <div class="col-md-10 col-md-offset-2 text-center">
                    <strong>Fehler:</strong>

                    <ul>
                        @foreach ($errors->all() as $error)

                            <li> {{ $error }}</li>

                        @endforeach
                    </ul>
                </div>
            </div>
        </div>
    </div>

@endif