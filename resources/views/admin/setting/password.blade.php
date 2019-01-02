@extends('admin.setting')

@section('setting')
<div class="col-9 pl-0 pt-5">
    <form method="POST" action="{{ route('admin.setting.password.save') }}" id="saveForm">
    <div class="mt-5">
        <h6 class="font-weight-bold text-info">Menu</h6>
        <input style="border:1px solid grey;border-radius:5px;" class="white pl-2" type="password" name="password_menu"
            @if($profile->password_menu != '')
                value="********"
            @endif
            />
    </div>
    <div class=" mt-2">
        <h6 class="font-weight-bold text-info">Kitchen</h6>
        <input style="border:1px solid grey;border-radius:5px;" class="white pl-2" type="password" name="password_kitchen"
            @if($profile->password_kitchen != '')
                value="********"
            @endif
        />
    </div>
    <div class="mt-2">
        <h6 class="font-weight-bold text-info">Reception</h6>
        <input style="border:1px solid grey;border-radius:5px;" class="white pl-2" type="password" name="password_reception"
            @if($profile->password_reception != '')
                value="********"
            @endif
        />
    </div>
    <div class="mt-2">
        <h6 class="font-weight-bold text-info">Admin</h6>
        <input style="border:1px solid grey;border-radius:5px;" class="white pl-2" type="password" name="password_admin"
            @if($profile->password_admin != '')
                value="********"
            @endif
        />
    </div>
    @csrf
    </form>
    <div style="margin-bottom:155px">
    </div>

    <div class="col-11 mt-5 pr-2 text-right margin" >
        <a href="#" class="btn bg-white black-text pt-2 pb-2 pr-2 pl-2"><h5 class="black-text mb-0">Cancel ></h5></a>
        <a href="#" class="btn bg-info black-text pt-2 pb-2 pr-2 pl-2"><h5 class="white-text mb-0" onclick="onapply()">Apply ></h5></a>
    </div>
</div>
<script>
    function onapply()
    {
        $('#saveForm').submit();
    }
</script>
@endsection
