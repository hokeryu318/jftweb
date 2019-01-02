@extends('admin.setting')

@section('setting')
<div class="col-9 pl-0">
    <h5 class="black-text font-weight-bold pl-5">New Customer</h5>
    <h6 class="font-weight-bold text-info pl-5 pt-3 mt-2">Default duration</h6>
    <div class="card ml-5 col-lg-5 col-8 pt-4 mr-auto pb-4 ml-auto">
        <div id="example-picker">

        </div>
        <form method="POST" action="{{ route('admin.setting.customer.save') }}" id="saveForm">
            <input type="hidden" id="customer_time" name="customer_time">
            @csrf
        </form>
    </div>
    <div style="margin-bottom:150px" class="margin"></div>
    <div class="col-11 mt-5 pr-2 text-right">
        <a href="#" class="btn bg-white black-text pt-2 pb-2 pr-2 pl-2"><h5 class="black-text mb-0">Cancel</h5></a>
        <a href="#" class="btn bg-info black-text pt-2 pb-2 pr-2 pl-2"><h5 class="white-text mb-0" onclick="onapply()">Apply</h5></a>
    </div>
</div>
<script type="text/javascript" src="{{ asset('js/jquery.ios.picker.js') }}"></script>
<script>
    $('#example-picker').picker({
        data: ['Takeaway', '30min', '60min', '90min', '120min', 'Unlimited'],
        selected: {{ $profile->customer }},
        lineHeight: 40,
    }, function(s){
    });
    function onapply()
    {
        $('#saveForm').submit();
    }
</script>
@endsection
