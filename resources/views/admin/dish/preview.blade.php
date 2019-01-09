@extends('layout.admin_layout')

@section('title', 'DISH')

@section('content')
<div class="blackgrey pb-5">
<div style="padding-top:8.5%;">
</div>
    <div class="widthh bg-lightgrey pl-5 pb pt-2">
        <div class="row">
            <div class="col-6">
                <label class="txtdemibold font-weight-bold">Preview</label>
            </div>
            <div class="col-6">
                <a>
                    <span class="">
                        <img src="{{ asset('img/Group826.png') }}" height="20" class="float-right" width="20" />
                    </span>
                </a>
            </div>
        </div>
        <div class="row">
            <div class="col-10 bg-white mb-5">
                <div class="row">
                    <div class="col-11">
                        <h4 class="font-weight-bold mb-0">{{ $obj->name_en }}</h4>
                        <h5 class="font-weight-bold mb-0">{{ $obj->desc_en }}</h5>
                        <h5 class="text-movee font-weight-bold mb-0">${{ number_format($obj->price, 2) }}</h5>
                    </div>
                    <div class="col-1">
                        <a class="fa fa-s text-white float-right close_times mt-3">
                            <span class="fa fa-times text-white pt-1"></span>
                        </a>
                    </div>

                </div>
                <div class="row">
                    <div class="col-6">
                        <img src="{{ asset('dishes/'.$obj->image) }}" class="img-fluid w-100" style="height:50vh" />
                        <p class="text-center text-movee font-weight-bold ">This dish will be prepared<br /> straight away.</p>
                    </div>
                    <div class="col-6">
                        <p class="text-white d-block bg-movee pl-1 pt-1 pb-1 font-weight-bold fs-3">Please Choose:</p>
                        <div style="height:40vh; overflow:auto">
                            @foreach ($obj->options as $op)
                            @if($op->photo_visible != "1")
                            <h5 class="font-weight-bold d-block border-bottom mt">{{ $op->name }}</h5>
                            <div class="ml-4 pl-3">
                                @foreach ($op->items as $it)
                                    <div class="form-check mb-3">
                                        <input type="radio" class="fform-check-input rdobtn" id="materialUnchecked{{ $it->id }}" name="option[{{ $op->id }}]">
                                        <label class="form-check-label  txtdemibold font-weight-bold" for="materialUnchecked{{ $it->id }}">
                                            {{ $it->name }}
                                            @if($it->price > 0)
                                                <span style="color:#9A9828">(+{{ number_format($it->price, 2) }})</span>
                                            @elseif($it->price < 0)
                                                <span style="color:#C74E95">({{ number_format($it->price, 2) }})</span>
                                            @endif
                                        </label>
                                    </div>
                                @endforeach
                            </div>
                            @endif
                            @endforeach
                        </div>
                        <i class="fa fa-minus-circle fa-4x text-movee ml-5 mr-3 mt"></i> <label class="fs-5 font-weight-normal">00</label><i class="fa fa-plus-circle fa-4x text-movee ml-3"></i>
                        <button class="border-0 bg-movee text-center text-white pt-2 pb-2 mt w-100 fs-3 borderadious mb-3">ORDER NOW </button>
                        </div>
                </div>

            </div>
            <div class="col-2">
                <form action="{{ route('admin.dish.previewpost') }}" method="POST">
                <input type="hidden" name="id" value="{{ $obj->id }}">
                <div style="position:absolute;bottom:6%;">
                    <div>
                        <p class="txtdemibold">Sold out</p>
                        <label class="bs-switch ml-100">
                            <input type="checkbox" name="sold_out"
                            @if($obj->sold_out == 1)
                                checked
                            @endif
                            >
                            <span class="slider round"></span>
                        </label>
                    </div>

                    <div>
                        <p class="txtdemibold">Active</p>
                        <label class="bs-switch ml-100">
                            <input type="checkbox" name="active"
                            @if($obj->active == 1)
                                checked
                            @endif
                            >
                            <span class="slider round"></span>
                        </label>
                    </div>

                    <button class="editbttnn align-bottom">
                        EDIT
                        <img src="{{ asset('img/Group728.png') }}" height="20" class="mb-1" />
                    </button>
                </div>
                @csrf
                </form>
            </div>
        </div>

    </div>
</div>
@endsection
