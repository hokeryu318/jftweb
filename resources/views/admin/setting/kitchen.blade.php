@extends('admin.setting')

@section('setting')
<div class="col-9 pl-0">
    <h5 class="black-text pl-5 pbb"><span class=" font-weight-bold ">Kitchen Group</h5>
    <form action="{{ route('admin.setting.kitchen.post') }}" method="POST" id="post_form">
    <div id="content">
        @foreach($kitchens as $kitchen)
        <div class="row ml-4 pl-2 element">
            <div class="col-9">
                <input class="card pt-2 mt-3 pl-2 font-weight-bold name" style="width:100%" value="{{ $kitchen->name }}" name="orgitem">
            </div>
            <div class="col-3 pt-2 mt-1">
                <button type="button" class="btn black radius pt-2 pb-2 pr-4 pl-4 delete-btn" data-id="{{ $kitchen->id }}" onclick="deleteGroup(this)">
                    <h6 class="mb-0 font-weight-bold">Delete</h6>
                </button>
            </div>
        </div>
        @endforeach
    </div>
    @csrf
    </form>
    <div class="row mt-4 ml-4 pl-2">
        <div class="col-9">
            <input class="card pt-2 mt-3 pl-2 font-weight-bold addinput" style="width:100%">
        </div>
        <div class="col-3 pt-2 mt-1">
            <button class="btn black radius pt-2 pb-2 pr-4 pl-4" onclick="addGroup()">
                <h6 class="mb-0 font-weight-bold">Add</h6>
            </button>
        </div>
    </div>
    <div class="row mt-4 ml-5 pl-2">
        <div class="col-9"></div>
    </div>
    <div class="row ml-4 pl-2 element" id="original" style="display:none">
        <div class="col-9">
            <input class="card pt-2 mt-3 pl-2 font-weight-bold name" style="width:100%" name="new[]">
        </div>
        <div class="col-3 pt-2 mt-1">
            <button class="btn black radius pt-2 pb-2 pr-4 pl-4" data-id="0" onclick="deleteGroup(this)">
                <h6 class="mb-0 font-weight-bold">Delete</h6>
            </button>
        </div>
    </div>
    <div class="margin"></div>
    <div class="col-lg-12 mt-5 pt-2 pr-4 text-right">
        <a href="#" class="btn bg-white black-text pt-2 pb-2 pr-2 pl-2"><h5 class="black-text mb-0">Cancel</h5></a>
        <a href="#" class="btn bg-info black-text pt-2 pb-2 pr-2 pl-2"><h5 class="white-text mb-0" onclick="onApply()">Apply</h5></a>
    </div>
</div>
<script>
    function addGroup()
    {
        var name = $('.addinput').val();
        if(name == "") return;
        var div = $('#original').clone();
        $(div).show();
        $('.name', div).val(name);
        $('#content').append(div);
        $('.addinput').val('');
    }
    function deleteGroup(obj){
        var id = $(obj).data('id');
        if(id > 0){
            var parent = $(obj).closest('.element');
            parent.hide();
            var name_edit = $('.name', parent);
            name_edit.attr('name', 'removed[]');
            name_edit.attr('value', id);
        }
        else
            $(obj).closest('.element').remove();
    }
    function onApply(){
        $('#post_form').submit();
    }
</script>
@endsection
