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
    <link href="{{asset('css/bootstrap.min.css')}}" rel="stylesheet">
    <!-- Material Design Bootstrap -->
    <link href="{{asset('css/mdb.min.css')}}" rel="stylesheet">
    <!-- Your custom styles (optional) -->
    <link href="{{asset('css/style.css')}}" rel="stylesheet">
</head>
<style>
    ::placeholder { /* Chrome, Firefox, Opera, Safari 10.1+ */
        color: white;
        opacity: 1; /* Firefox */
    }

    .black{
        background:#2d2d2d !important;
    }

</style>
<body>
<form method="POST" action="{{ route('login') }}">
@csrf
<div class="">
    <div class="container-fluid hh black lg-height">
        <div class="container pt-5">
            <div class="row pt-5 mt">
                <div class="col-4 pt-5">
                    <img class="lg-img-ht mt-auto mb-auto" src="{{ asset('receipt/'.$profile->logo_image) }}" />
                </div>
                <div class="col-8 pt-5">
                    <div class="row">
                        <div class="col-4">
                            <h4 class="white-text mb-5 mt-0 pt-0 lg-font">IP Address</h4>
                        </div>
                        <div class="col-3">
                            <h4 class="white-text mb-5 mt-0 pt-0 lg-font" id="ip_addr">{{ $profile->ip_address }}</h4>
                        </div>
                        <div class="col-2">
                        </div>
                        <div class="col-3 pl-0">
                            <span class="bg-info btn mt-0 pt-1 pb-1" style="border-radius:10px !important" data-toggle="modal" data-target="#myModal">
                                <h5 class="white-text mb-0 mt-0 mt-0 pt-0 font-weight-bold lg-change-font" id="change_button">Change</h5>
                            </span>
                        </div>
                    </div>
                    <div class="row mt-3">
                        <div class="col-4">
                            <h4 class="mb-0 white-text lg-font">Role</h4>
                        </div>
                        <div class="col-6 text-left">
                            <select class="custom-input pt-1 pb-1" id="role" name="role" onchange="select_role('role')">
                                <option value="reception" class="select-option">Reception</option>
                                <option value="kitchen" class="select-option">Kitchen</option>
                                <option value="menu" class="select-option">Menu</option>
                                <option value="master" class="select-option">Master</option>
                            </select>
                        </div>
                    </div>
                    <div class="row mt-5 pt-3">
                        <div class="col-4">
                            <h4 class="mb-0 white-text lg-font">Table Number</h4>
                        </div>
                        <div class="col-6">
                            <input class="custom-input" name="table" />
                        </div>
                    </div>
                    <div class="row  mt-5 pt-3">
                        <div class="col-4">
                            <h4 class="mb-0 white-text lg-font">Password</h4>
                        </div>
                        <div class="col-6">
                            <input type="password" class="custom-input ps-hg" name="password" />
                        </div>
                    </div>
                    <div class="row" style="padding-top:10rem">
                        <div class="col-6">
                        </div>
                        <div class="col-6 pl-2 mb-xl-3">
                            <button class="btn bg-info white-text w-100 mb-xl-5">
                                <h5 class="mb-0 white-text font-weight-bold lg-font">Log In</h5>
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- The Modal -->
    <div class="modal fade" id="myModal">
        <div class="modal-dialog">
            <div class="modal-content">

                <!-- Modal Header -->
                <div class="modal-header">
                    <h4 class="modal-title">Please input new IP address!</h4>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>

                <!-- Modal body -->
                <div class="modal-body">
                    <input type="text" class="ch_ip" id="changed_ip_address"/>
                </div>

                <!-- Modal footer -->
                <div class="modal-footer">
                    <button type="button" class="btn btn-gray" data-dismiss="modal">Cancel</button>
                    <button type="button" class="btn btn-success" data-dismiss="modal" onclick="change_ip()">Ok</button>
                </div>

            </div>
        </div>
    </div>

</div>
</form>
@if(Session::has('alert'))
    <div class="alert alert-success alert-dismissible lg-alert" id="success-alert" role="alert">
        <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button>
        {{ Session::get('alert') }}
    </div>
@endif

<script type="text/javascript" src="{{asset('js/jquery-3.2.1.min.js')}}"></script>
<!-- Bootstrap tooltips -->
<script type="text/javascript" src="{{asset('js/popper.min.js')}}"></script>
<!-- Bootstrap core JavaScript -->
<script type="text/javascript" src="{{asset('js/bootstrap.min.js')}}"></script>
<!-- MDB core JavaScript -->
<script type="text/javascript" src="{{asset('js/mdb.min.js')}}"></script>

<script>

    // $("#success-alert").fadeTo(3000, 500).fadeIn(5000, function(){
    $("#success-alert").fadeTo(3000, 500).fadeOut(5000, function(){
        $("#success-alert").alert('close');
    });

    function select_role(idname){

        var table_last = <?php echo json_encode($table_last) ?>;

        var obj = document.getElementById(idname);
        var idx = obj.selectedIndex;
        var val = obj.options[idx].value;
        var txt  = obj.options[idx].text;

        if(val == 'menu') {
            table_last_name = table_last['name'];
            console.log(table_last_name);
            document.querySelector('input[name=table]').value = table_last_name;
        } else {
            document.querySelector('input[name=table]').value = '';
        }

    }

    function change_ip()
    {
        var changed_ip = document.getElementById('changed_ip_address').value;
        $.ajax({
            type:"POST",
            url:"{{ route('change_ip') }}",
            data:{
                changed_ip: changed_ip, _token:"{{ csrf_token() }}"
            },
            success: function(result){
                document.getElementById('ip_addr').innerText = changed_ip;
            }
        });
    }

</script>

</body>

<style>

    .modal-body .ch_ip {
        border: 1px solid black;
        height: 40px;
        font-size: 20px;
        padding: 0px 20px 0px 20px;
        width: 428px;
    }
</style>

