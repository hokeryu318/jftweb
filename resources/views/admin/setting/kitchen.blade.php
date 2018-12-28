@extends('admin.setting')

@section('setting')
<div class="col-9 pl-0">
    <h5 class="black-text pl-5 pbb"><span class=" font-weight-bold ">Kitchen Group</h5>
    <div id="content">
    @foreach($kitchens as $kitchen)
    <div class="row ml-4 pl-2">
        <div class="col-9">
            <div class="card pt-2 mt-3 pl-2">
                <h5 class="font-weight-bold">&nbsp;&nbsp; {{ $kitchen->name }}</h5>
            </div>
        </div>
        <div class="col-3 pt-2 mt-1">
            <button class="btn black radius pt-2 pb-2 pr-4 pl-4"><h6 class="mb-0 font-weight-bold">Delete</h6></button>
        </div>
    </div>
    @endforeach
    </div>
    <div class="row mt-4 ml-4 pl-2">
        <div class="col-9">
        </div>
        <div class="col-3">
            <button class="btn black radius pt-2 pb-2 pr-4 pl-4" onclick="addGroup()"><h6 class="mb-0 font-weight-bold">Add</h6></button>
        </div>
    </div>
    <div class="row mt-4 ml-5 pl-2">
        <div class="col-9"></div>
    </div>
    <div class="row ml-4 pl-2" id="original" style="display:none">
        <div class="col-9">
            <div class="card pt-2 mt-3 pl-2">
                <h5 class="font-weight-bold">&nbsp;&nbsp; </h5>
            </div>
        </div>
        <div class="col-3 pt-2 mt-1">
            <button class="btn black radius pt-2 pb-2 pr-4 pl-4"><h6 class="mb-0 font-weight-bold">Delete</h6></button>
        </div>
    </div>
    <div class="margin"></div>
    <div class="col-lg-12 mt-5 pt-2 pr-4 text-right">
        <a href="#" class="btn bg-white black-text pt-2 pb-2 pr-2 pl-2"><h5 class="black-text mb-0">Cancel</h5></a>
        <a href="#" class="btn bg-info black-text pt-2 pb-2 pr-2 pl-2"><h5 class="white-text mb-0">Apply</h5></a>
    </div>
</div>
<script>
    function addGroup()
    {
        var div = $('#original').clone();
        $(div).css('display', 'block');
        $('#content').append(div);
    }
</script>
@endsection
