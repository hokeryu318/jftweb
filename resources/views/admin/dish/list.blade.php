@extends('layout.admin_layout')

@section('title', 'DISH')

@section('content')
<div style="padding-top:8%;">
</div>
<div class="widthh blackgrey pt-4">
    <div class="row">
        <div class="col-6">
            <label class="text-white fontbig font-weight-bold">DISH</label>
        </div>
        <div class="col-6">
            <a>
                <span class="">
                    <img src="{{ asset('img/Group826.png') }}" height="20" class="float-right" width="20" />
                </span>
            </a>
        </div>
    </div>
    <div class="row mb-2">
        <div class="col-12 chh2" style="height: 65vh;overflow-y: auto;">
            <table class="table text-white txtdemibold">
                <thead>
                    <tr>
                        <th class="border-0 fs-3" scope="col">
                            ITEM
                            <img src="{{ asset('img/Path444.png') }}" height="20" />
                        </th>
                        <th class="border-0 fs-3" scope="col">GROUP</th>
                        <th class="border-0 fs-3" scope="col">PRICE</th>
                        <th class="border-0 fs-3" scope="col">STATUS</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td class="border-0"></td>
                        <td class="border-0"></td>
                        <td class="border-0"></td>
                        <td class="border-0">Sold out</td>
                        <td class="border-0">Active</td>
                        <td class="border-0"></td>
                    </tr>
                    @foreach($dishes as $d)
                    <tr onclick="onrow(this)" data-url="{{ route('admin.dish.preview', ['id' => $d->id]) }}">
                        <td class="">{{ $d->name_en }}</td>
                        <td class="">{{ $d->group->name }}</td>
                        <td class="">$ {{ number_format($d->price, 2) }}</td>

                        <td class="">
                            @if($d->sold_out == 1)
                            <img src="{{ asset('img/Group904.png') }}" height="20" />
                            @endif
                        </td>
                        <td class="">
                            @if($d->active == 1)
                            <img src="{{ asset('img/Group904.png') }}" height="20" />
                            @endif
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>

    <div class="row mt-4 mb-4">
        <div class="col-12 mb-3">
            <div class="d-inline-block text-white font-bold border-blue ">
                <a class="text-white d-inline-block bg-blue2 border-rightBlue p-3 w-60px" href="{{ route('admin.dish') }}" >DISH</a>
                <a class="text-white p-3 d-inline-block border-rightBlue w-60px" href="{{ route('admin.category') }}">CATEGORY</a>
                <a class="text-white p-3 d-inline-block border- w-60px border-rightBlue" href="{{ route('admin.option') }}">OPTION</a>
                <a class="text-white p-3 d-inline-block border-rightBlue  w-60px" href="#">DISCOUNT</a>
            </div>
        </div>
    </div>
</div>
<script>
    function onrow(obj)
    {
        var url = $(obj).data('url');
        window.location = url;
    }
</script>
@endsection
