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
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <!-- Material Design Bootstrap -->
    <link href="css/mdb.min.css" rel="stylesheet">
    <!-- Your custom styles (optional) -->
    <link href="css/style.css" rel="stylesheet">
</head>
<style>
    ::placeholder { /* Chrome, Firefox, Opera, Safari 10.1+ */
        color: white;
        opacity: 1; /* Firefox */
    }

    .black{
        background:#2d2d2d !important;
    }
    .custom-input{
        width:260px !important;
        border:2px solid white !important;
        text-align:center;
        color:white !important;font-size:20px;
        background:transparent;
    }
    select option {
        margin: 40px;
        background: rgba(0, 0, 0, 0.3);
        color: #fff;
        text-shadow: 0 1px 0 rgba(0, 0, 0, 0.4);
    }
</style>
<body>
<form method="POST" action="{{ route('login') }}">
@csrf
<div class="">
    <div class="container-fluid pp hh black">
        <div class="container pt-5">
            <div class="row pt-5 mt">
                <div class="col-4 pt-5">
                    <img class="img-fluid mt-auto mb-auto" src="img/logo.png" />
                </div>
                <div class="col-8 pt-5">
                    <div class="row">
                        <div class="col-4">
                            <h4 class="white-text mb-5 mt-0 pt-0">IP Address</h4>
                        </div>
                        <div class="col-3">
                            <h4 class="white-text mb-5 mt-0 pt-0">127.0.0.1</h4>
                        </div>
                        <div class="col-3">
                            <button class="bg-info btn mt-0 pt-1 pb-1" style="border-radius:10px !important">
                                <h5 class="white-text mb-0 mt-0 mt-0 pt-0 font-weight-bold">Change</h5>
                            </button>
                        </div>
                    </div>
                    <div class="row mt-3">
                        <div class="col-4">
                            <h4 class="mb-0 white-text">Role</h4>
                        </div>
                        <div class="col-6 text-left">
                            <select class="custom-input pt-1 pb-1 w-100" name="role">
                                <option value="reception">Reception</option>
                                <option value="kitchen">Kitchen</option>
                                <option value="menu">Menu</option>
                            </select>
                        </div>
                    </div>
                    <div class="row mt-5 pt-3">
                        <div class="col-4">
                            <h4 class="mb-0 white-text">Table Number</h4>
                        </div>
                        <div class="col-6">
                            <input type="number" class="custom-input" name="table" />
                        </div>
                    </div>
                    <div class="row  mt-5 pt-3">
                        <div class="col-4">
                            <h4 class="mb-0 white-text">Password</h4>
                        </div>
                        <div class="col-6">
                            <input type="password" class="custom-input" name="password" />
                        </div>
                    </div>
                    <div class="row" style="padding-top:10rem">
                        <div class="col-6">
                        </div>
                        <div class="col-6 pl-2 mb-xl-3">
                            <button class="btn bg-info white-text w-100 mb-xl-5">
                                <h5 class="mb-0 white-text font-weight-bold">Log In</h5>
                            </button>
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
