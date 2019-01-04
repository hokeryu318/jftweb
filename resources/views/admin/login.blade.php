<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>Material Design Bootstrap</title>
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <!-- Bootstrap core CSS -->
    <link href="{{ asset('css/bootstrap.min.css') }}" rel="stylesheet">
    <!-- Material Design Bootstrap -->
    <link href="{{ asset('css/mdb.min.css') }}" rel="stylesheet">
    <!-- Your custom styles (optional) -->
    <link href="{{ asset('css/style.css') }}" rel="stylesheet">
</head>
<style>
    ::placeholder { /* Chrome, Firefox, Opera, Safari 10.1+ */
        color: white;
        opacity: 1; /* Firefox */
    }
    body,.hh,html {
        min-height: 100vh;
    }
    .black{
        background:#2d2d2d !important;
    }
</style>
<body>
    <form method="POST" action="{{ route('admin.login') }}">
    @csrf
    <div class="">
        <div class="container-fluid hh black pt-5">
            <div class="container pt-5">
                <div class="row pt-5">
                    <div class="col-4 pt-5">
                        <img class="img-fluid mt-auto mb-auto" src="{{ asset('img/logo.png') }}" />
                    </div>
                    <div class="col-8 pt-5">
                        <h4 class="white-text mb-5 mt-0 pt-0">
                        @if($slag == 'setting')
                            Setting
                        @elseif($slag == 'category')
                            Edit Menu
                        @elseif($slag == 'saledata')
                            Sales Data
                        @elseif($slag == 'table')
                            Table Edit
                        @endif
                        </h4>
                        <input type="password" name="password" style="width:250px;border:2px solid white !important;text-align:center;color:white !important;font-size:20px" placeholder="****" />
                        <div class="row" style="padding-top:20rem">
                            <div class="col-6">
                                <button class="btn white w-100"><h5 class="mb-0 black-text font-weight-bold">Cancel</h5></button>
                            </div>
                            <div class="col-6 pl-2">
                                <button class="btn bg-info w-100"><h5 class="mb-0 white-text font-weight-bold">Log In</h5></button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </form>
    <script type="text/javascript" src="js/jquery-3.2.1.min.js"></script>
    <!-- Bootstrap tooltips -->
    <script type="text/javascript" src="js/popper.min.js"></script>
    <!-- Bootstrap core JavaScript -->
    <script type="text/javascript" src="js/bootstrap.min.js"></script>
    <!-- MDB core JavaScript -->
    <script type="text/javascript" src="js/mdb.min.js"></script>
</body>
