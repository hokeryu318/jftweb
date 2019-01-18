@extends('layout.admin_layout')

@section('title', 'DISH')

@section('content')
<div style="padding-top:8%;">
</div>
<div class="widthh blackgrey pt-4">
    <div class="row">
        <div class="col-6">
            <label class="text-white fontbig font-weight-bold">DISCOUNT</label>
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
                            START
                            <img src="img/Path 444.png" height="20" />
                        </th>
                        <th class="border-0 fs-3" scope="col">END <img src="img/Path 444.png" height="20" /></th>
                        <th class="border-0 fs-3 text-left" scope="col">ITEM</th>
                        <th class="border-0 fs-3 text-center" scope="col">RRP</th>
                        <th class="border-0 fs-3 text-left" scope="col">DISCOUNT</th>
                        <th class="border-0 fs-3 text-left" scope="col">TIME SLOTS</th>
                    </tr>
                    <tr>
                        <td class="border-0"></td>
                        <td class="border-0"></td>
                        <td class="border-0"></td>
                        <td class="border-0"></td>
                        <td class="border-0">PRICE</td>
                        <td class="border-0">Morning</td>
                        <td class="border-0">Lunch</td>
                        <td class="border-0">Tea</td>
                        <td class="border-0">Dinner</td>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td class="border-top-0"> 5 MAY 2018</td>
                        <td class="border-top-0">30 JUN 2018</td>
                        <td class="border-top-0">Roll Sushi</td>
                        <td class="border-top-0">$ 12.30</td>
                        <td class="border-top-0">$ 10.50</td>
                        <td class="border-top-0"><img src="img/Group 904.png" height="20"/></td>
                        <td class="border-top-0"><img src="img/Group 904.png" height="20" /></td>
                        <td class="border-top-0"><img src="img/Group 904.png" height="20" /></td>
                        <td class="border-top-0"><img src="img/Group 904.png" height="20" /></td>
                    </tr>
                    <tr>
                        <td>5 MAY 2018</td>
                        <td>30 JUN 2018</td>
                        <td>Lunch Teishoku</td>
                        <td>$ 12.30</td>
                        <td>$ 10.50</td>
                        <td class=""></td>
                        <td class=""><img src="img/Group 904.png" height="20" /></td>
                        <td class=""></td>
                        <td class=""><img src="img/Group 904.png" height="20" /></td>
                    </tr>
                    <tr  class="text-discount bg-lightgrey">
                        <td> 2 APR 2018</td>
                        <td>30 JUN 2018</td>
                        <td>Nigiri</td>
                        <td>$ 12.30</td>
                        <td>$ 10.50</td>
                        <td class="">                            </td>
                        <td class=""></td>
                        <td class=""></td>
                        <td class=""><img src="img/Repeat Grid 13.png" height="20" /></td>
                    </tr>
                    <tr >
                        <td> 1 APR 2018</td>
                        <td>10 APR 2018</td>
                        <td>Miso Soup</td>
                        <td>$ 12.30</td>
                        <td>$ 10.50</td>
                        <td class="">
                            <img src="img/Group 904.png" height="20" />
                        </td>
                        <td class=""><img src="img/Group 904.png" height="20" /></td>
                        <td class=""><img src="img/Group 904.png" height="20" /></td>
                        <td class=""><img src="img/Group 904.png" height="20" /></td>
                    </tr>
                    <tr  class="text-discount bg-lightgrey">
                        <td>  2 MAR 2018</td>
                        <td> 20 JUN 2018</td>
                        <td>Soba</td>
                        <td>$ 12.30</td>
                        <td>$ 10.50</td>
                        <td class=""></td>
                        <td class=""><img src="img/Repeat Grid 13.png" height="20" /></td>
                        <td class=""></td>
                        <td class=""><img src="img/Repeat Grid 13.png" height="20" /></td>
                    </tr>
                    <tr>
                        <td> 2 MAR 2018</td>
                        <td>30 JUN 2018</td>
                        <td>Udon</td>
                        <td>$ 12.30</td>
                        <td>$ 10.50</td>
                        <td class=""></td>
                        <td class=""><img src="img/Group 904.png" height="20" /></td>
                        <td class=""></td>
                        <td class=""><img src="img/Group 904.png" height="20" /></td>
                    </tr>
                    <tr>
                        <td> 2 MAR 2018</td>
                        <td>Indefinite</td>
                        <td>Ramen</td>
                        <td>$ 12.30</td>
                        <td>$ 10.50</td>
                        <td class=""></td>
                        <td class=""><img src="img/Group 904.png" height="20" /></td>
                        <td class=""></td>
                        <td class=""><img src="img/Group 904.png" height="20" /></td>
                    </tr>
                    <tr class="text-discount bg-lightgrey">
                        <td>2 MAR 2018</td>
                        <td>5 MAR 2018</td>
                        <td>Inari</td>
                        <td>$ 12.30</td>
                        <td>$ 10.50</td>
                        <td class=""></td>
                        <td class=""><img src="img/Repeat Grid 13.png" height="20" /></td>
                        <td class=""></td>
                        <td class=""><img src="img/Repeat Grid 13.png" height="20" /></td>
                    </tr>
                    <tr class="text-discount bg-lightgrey">
                        <td>2 MAR 2018</td>
                        <td>5 MAR 2018</td>
                        <td>Yakiniki</td>
                        <td>$ 12.30</td>
                        <td>$ 10.50</td>
                        <td class=""></td>
                        <td class=""><img src="img/Repeat Grid 13.png" height="20" /></td>
                        <td class=""></td>
                        <td class=""><img src="img/Repeat Grid 13.png" height="20" /></td>
                    </tr>
                    <tr  class="text-discount bg-lightgrey" >
                        <td class="">2 MAR 2018</td>
                        <td>      5 MAR 2018</td>
                        <td>Inari</td>
                        <td>$ 12.30</td>
                        <td>$ 10.50</td>
                        <td class="">
                        </td>
                        <td class=""><img src="img/Repeat Grid 13.png" height="20" /></td>
                        <td class=""></td>
                        <td class=""><img src="img/Repeat Grid 13.png" height="20" /></td>
                    </tr>

                </tbody>
            </table>
        </div>
    </div>

    <div class="row mt-4 mb-4">
        <div class="col-12 mb-4">
            <div class="d-inline-block text-white font-bold border-blue ">
                <table>
                    <tr>
                        <td class="d-inline-block border-rightBlue p-3 w-60px">
                            <a class="font-weight-bold text-white" href="{{ route('admin.dish') }}" >DISH</a>
                        </td>
                        <td class="p-3 d-inline-block border-rightBlue w-60px">
                            <a class="font-weight-bold text-white" href="{{ route('admin.category') }}">CATEGORY</a>
                        </td>
                        <td class="p-3 d-inline-block border- w-60px border-rightBlue">
                            <a class="font-weight-bold text-white" href="{{ route('admin.option') }}">OPTION</a>
                        </td>
                        <td class="bg-blue2 p-3 d-inline-block border-rightBlue  w-60px">
                            <a class="font-weight-bold text-white" href="#">DISCOUNT</a>
                        </td>
                    </tr>
                </table>

            </div>
            <a href="" class="text-white  btnCreateNewDiscount">CREATE NEW DISCOUNT
                <img src="img/Group 728white.png"  height="20" /> </a>
        </div>
    </div>


    <!-- Default switch -->
    <!--<label class="bs-switch">
        <input type="checkbox">
        <span class="slider round"></span>
    </label>-->
</div>
@endsection
