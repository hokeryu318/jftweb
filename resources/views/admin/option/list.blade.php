@extends('layout.admin_layout')

@section('title', 'DISH')

@section('content')
<div style="padding-top:8%;">
</div>
<div class="widthh blackgrey  pt-4">
    <div class="row">
        <div class="col-6">
            <label class="text-white fontbig font-weight-bold">OPTIONS</label>
        </div>
        <div class="col-6">
            <a>
                <span class="">
                    <a href="{{route('admin.home')}}">
                        <img src="{{ asset('img/Group826.png') }}" height="20" class="float-right" width="20" />
                    </a>
                </span>
            </a>
        </div>
    </div>
    <div class="row mb-2">
        <div class="col-12 chh2" style="height: 65vh;overflow-y: auto;">
            <table class="table text-white txtdemibold">
                <thead>
                    <tr>
                        <th class="border-0 fs-3 fontbig" scope="col">NAME
                            <a href="{{route("admin.option.sort", ["sortField" => "name", "sort_type_name" => $sort_type_name, "sort_type_display_name" => $sort_type_display_name])}}" class="text-white">
                                <img
                                        @if($sort_type_name == "asc")
                                            src="{{ asset('img/Path445.png') }}"
                                        @else
                                            src="{{ asset('img/Path444.png') }}"
                                        @endif
                                        height="20"/>
                            </a>
                        </th>
                        <th class="border-0 fs-3 fontbig" scope="col">DISPLAY NAME
                            <a href="{{route("admin.option.sort", ["sortField" => "display_name", "sort_type_display_name" => $sort_type_display_name, "sort_type_name" => $sort_type_name])}}" class="text-white">
                                <img
                                        @if($sort_type_display_name == "asc")
                                        src="{{ asset('img/Path445.png') }}"
                                        @else
                                        src="{{ asset('img/Path444.png') }}"
                                        @endif
                                        height="20"/>
                            </a>
                        </th>
                        <th class="border-0 fs-3 fontbig" scope="col">RELATED DISHES</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($options as $option)
                    <tr onclick="onrow({{ $option->id }})">
                        <td>{{ $option->name }}</td>
                        <td>{{ $option->display_name_en }}</td>
                        <td></td>
                    </tr>
                    @endforeach

                </tbody>
            </table>
        </div>
    </div>

    <div class="row mt-4 mb-4">
        <div class="col-12 mb-3">
            <div class="d-inline-block text-white font-bold border-blue ">
                <table>
                    <tr>
                        <td class="d-inline-block border-rightBlue p-3 w-60px">
                            <a class="font-weight-bold text-white" href="{{ route('admin.dish') }}" >DISH</a>
                        </td>
                        <td class="p-3 d-inline-block border-rightBlue w-60px">
                            <a class="font-weight-bold text-white" href="{{ route('admin.category') }}">CATEGORY</a>
                        </td>
                        <td class="bg-blue2 p-3 d-inline-block border- w-60px border-rightBlue">
                            <a class="font-weight-bold text-white" href="{{ route('admin.option') }}">OPTION</a>
                        </td>
                        <td class="p-3 d-inline-block border-rightBlue  w-60px">
                            <a class="font-weight-bold text-white" href="{{ route('admin.discount') }}">DISCOUNT</a>
                        </td>
                    </tr>
                </table>
            </div>
            <a href="{{ route('admin.option.add') }}" class="text-white  btnCreateNewDiscount">
                CREATE NEW OPTION
                <img src="{{ asset('img/Group728white.png') }}" height="20" />
            </a>
        </div>
    </div>
    <!-- Default switch -->
    <!--<label class="bs-switch">
        <input type="checkbox">
        <span class="slider round"></span>
    </label>-->
</div>
<script>
    function onrow(id){
        window.location = "{{ url('admin/option/edit') }}" + "/" + id;
    }
</script>
@endsection
