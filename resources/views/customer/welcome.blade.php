<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, user-scalable=0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Welcome</title>

    <meta name="csrf-token" content="{{ csrf_token() }}">

    <link rel="stylesheet" href="{{asset('customer_css/style.css')}}">
    <link rel="stylesheet" href="{{asset('customer_css/all.css')}}">
    <script type="text/javascript" src="{{ asset('js/jquery-3.2.1.min.js') }}"></script>
</head>
<style>
    .scrolling-content {
        overflow-y: scroll;
        overflow-x: hidden; 
        -webkit-overflow-scrolling: touch;
        scroll-behavior: smooth;
    }
    #screensaver { position: absolute; width: 100%; height:100%; left:0px; top: 0px; z-index:9999; }    
</style>

<body>
<div id="app">
    <input type="hidden" id="img_name" value="{{ $img_name }}">
    <input type="hidden" id="table_id" value="{{ $table_id }}" />
    <nav>
        <div class="brand">
            <p>
                <fix-mode-component table_id="{{ $table_id }}"></fix-mode-component>
            </p>
        </div>
    </nav>
</div>
<div id="screensaver"></div>

<script src="{{ asset('js/app.js') }}"></script>
<script type="text/javascript">
    var csrfToken = $('[name="csrf_token"]').attr('content');

    setInterval(refreshToken, 120000); // 2 min

    function refreshToken(){
        $.ajax({
            type:"GET",
            url:"{{ url('refresh-csrf') }}",
            data:{},
            success: function(result){
                csrfToken = result;
            }
        });
    }

    setInterval(refreshToken, 120000); //2 min

</script>
<script type="text/javascript" src="{{ asset('js/bootstrap.min.js') }}"></script>
<script>
    $(document).ready(function(){
        var img_path = img_name.value;
        img_path = img_path.substr(1,img_path.length-2);
        var div_img = img_path.split(",");
        document.getElementById("screensaver").innerHTML='<img src={!! asset("welcome/'+div_img[0].substr(1,div_img[0].length-2)+'") !!} width="100%">';
        (function(poll, timeout){

            var _idle = false,
                _lastActive = 0,
                _poll = function() {

                    var elapsed = (new Date()) - _lastActive;
                    var img_path = img_name.value;
                    img_path = img_path.substr(1,img_path.length-2);
                    var div_img = img_path.split(",");
                    var cnt = div_img.length;
                    var i = cnt - 1;

                    if ((elapsed > timeout) && !_idle) {
                        $('#screensaver').fadeIn();
                        _idle = true;

                        setInterval(function(){
                            document.getElementById("screensaver").innerHTML='<img src={!! asset("welcome/'+div_img[i].substr(1,div_img[i].length-2)+'") !!} width="100%">';
                            if( cnt > i + 1 ) i++;
                            else i = 0;
                        }, 5000);

                    }
                }

            window.setInterval(_poll, poll);

        })(1000, 0);
    });

</script>
</body>
</html>
