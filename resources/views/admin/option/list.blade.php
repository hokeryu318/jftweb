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
                    <img src="{{ asset('img/Group826.png') }}" height="20" class="float-right" width="20" />
                </span>
            </a>
        </div>
    </div>
    <div class="row mb-2">
        <div class="col-12">
            <table class="table text-white txtdemibold" style="width:75%;">
                <thead>
                    <tr>
                        <th class="border-0 fs-3 fontbig" scope="col">NAME
                            <img src="{{ asset('img/Path444.png') }}" height="20"/>
                        </th>
                        <th class="border-0 fs-3 fontbig text-center" scope="col">DISPLAY NAME
                            <img src="{{ asset('img/Path444.png') }}" height="20" />
                        </th>
                        <th class="border-0 fs-3 fontbig text-left" scope="col">RELATED DISHES</th>
                    </tr>
                </thead>
            </table>
        </div>
        <div class="col-12 chh2" style="height: 52vh;overflow-y: auto;">
            <table class="table text-white txtdemibold">
                <tbody>
                    <tr>
                        <td class="border-0">Main for Lunch Bento A</td>
                        <td class="border-0">Main</td>
                        <td class="border-0"></td>
                    </tr>
                    <tr>
                        <td>Wasabi</td>
                        <td>Wasabi</td>
                        <td>Lunch Bento A Rainbow Roll Sushi, Nigiri Set A</td>
                    </tr>
                    <tr>
                        <td>Sides for Lunch Bento A</td>
                        <td>Sides</td>
                        <td>Lunch Bento A</td>
                    </tr>
                    <tr>
                        <td> Sides for Lunch Bento B</td>
                        <td>Sides</td>
                        <td>Lunch Bento B</td>
                    </tr>
                    <tr>
                        <td>Sauces for Hamburg</td>
                        <td>Sauce</td>
                        <td>Hamburg Teishoku, Hamburg Bento</td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>

    <div class="row mt-4 mb-4">
        <div class="col-12 mb-3">
            <div class="d-inline-block text-white font-bold border-blue ">
                <a href="#" class="text-white d-inline-block border-rightBlue fontbig p-3 w-60px">DISH</a>
                <a class="text-white p-3 d-inline-block w-60px fontbig" href="#">CATEGORY</a>
                <a class="text-white p-3 d-inline-block border- w-60px bg-blue2 fontbig" href="#">OPTION</a>
                <a class="text-white p-3 d-inline-block border-rightBlue  w-60px fontbig" href="#">DISCOUNT</a>

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

@endsection
