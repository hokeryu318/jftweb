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
        <div class="col-12">
            <table class="table text-white txtdemibold" style="width:95%">
                <thead>
                    <tr>
                        <th class="border-0 fs-3" scope="col">
                            ITEM
                            <img src="{{ asset('img/Path444.png') }}" height="20" />
                        </th>
                        <th class="border-0 fs-3 text-right" scope="col">GROUP</th>
                        <th class="border-0 fs-3 text-center" scope="col">PRICE</th>
                        <th class="border-0 fs-3" scope="col">STATUS</th>
                    </tr>
                </thead>
            </table>
        </div>
        <div class="col-12 chh" style="height: 52vh;overflow-y: auto;">
            <table class="table text-white txtdemibold">
                <tbody>
                    <tr>
                        <td class="border-0"></td>
                        <td class="border-0"></td>
                        <td class="border-0"></td>
                        <td class="border-0">Sold out</td>
                        <td class="border-0">Active</td>
                        <td class="border-0"></td>
                    </tr>
                    <tr>
                        <td class="border-top-0"> Avocado Roll Sushi with Ikura</td>
                        <td class="border-top-0">Sushi</td>
                        <td class="border-top-0">$ 14.25</td>

                        <td class="border-top-0"><img src="{{ asset('img/Group904.png') }}" height="20" /></td>
                        <td class="border-top-0"><img src="{{ asset('img/Group904.png') }}" height="20" /></td>
                    </tr>
                    <tr>
                        <td class=""> Bireley’s Orange</td>
                        <td class="">Drink</td>
                        <td class="">$ 12.00</td>

                        <td class=""><img src="{{ asset('img/Group904.png') }}" height="20" /></td>
                        <td class=""><img src="{{ asset('img/Group904.png') }}" height="20" /></td>
                    </tr>
                    <tr >
                        <td class=""> Crab Claw Croquette</td>
                        <td class="">Deep Fry</td>
                        <td class="">$ 8.50</td>

                        <td class=""></td>
                        <td class=""></td>
                    </tr>
                    <tr>
                        <td class=""> Denemon Pure Rice Wine</td>
                        <td class="">Drink</td>
                        <td class="">$ 14.25</td>

                        <td class=""><img src="{{ asset('img/Group904.png') }}" height="20" /></td>
                        <td class=""><img src="{{ asset('img/Group904.png') }}" height="20" /></td>
                    </tr>
                    <tr>
                        <td class=""> Ebi Nigiri Sushi 2PC</td>
                        <td class="">Sushi</td>
                        <td class="">$ 12.00</td>

                        <td class=""><img src="{{ asset('img/Group904.png') }}" height="20" /></td>
                        <td class=""><img src="{{ asset('img/Group904.png') }}" height="20" /></td>
                    </tr>
                    <tr>
                        <td class=""> Fried Chicken (Karaage)</td>
                        <td class="">Deep Fry</td>
                        <td class="">$ 14.25</td>

                        <td class=""><img src="{{ asset('img/Group904.png') }}" height="20" /></td>
                        <td class=""><img src="{{ asset('img/Group904.png') }}" height="20" /></td>
                    </tr>
                    <tr>
                        <td class=""> Hiramasa Nigiri Sushi 2PC</td>
                        <td class="">Sushi</td>
                        <td class="">$ 12.00</td>

                        <td class=""><img src="{{ asset('img/Group904.png') }}" height="20" /></td>
                        <td class=""><img src="{{ asset('img/Group904.png') }}" height="20" /></td>
                    </tr>
                    <tr>
                        <td class=""> Iced Coffee Home Made Style</td>
                        <td class="">Drink</td>
                        <td class="">$ 8.50</td>

                        <td class=""><img src="{{ asset('img/Group904.png') }}" height="20" /></td>
                        <td class=""><img src="{{ asset('img/Group904.png') }}" height="20" /></td>
                    </tr>
                    <tr>
                        <td class=""> Jagaimo Croquette</td>
                        <td class="">                                Deep Fry

                            </td>
                        <td class="">$ 8.50</td>

                        <td class=""><img src="{{ asset('img/Group904.png') }}" height="20" /></td>
                        <td class=""><img src="{{ asset('img/Group904.png') }}" height="20" /></td>
                    </tr>
                    <tr >
                        <td class=""> Kirin Beer Ichiban</td>
                        <td class="">Drink</td>
                        <td class="">$ 14.25</td>

                        <td class=""><img src="{{ asset('img/Group904.png') }}" height="20" /></td>
                        <td class=""><img src="{{ asset('img/Group904.png') }}" height="20" /></td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>

    <div class="row mt-4 mb-4 pb-4">
        <div class="col-12 mb-3">
            <div class="d-inline-block text-white font-bold border-blue ">
                <a href="#" class="text-white d-inline-block bg-blue2 border-rightBlue p-3 w-60px">DISH</a>
                <a class="text-white p-3 d-inline-block border-rightBlue w-60px" href="#">CATEGORY</a>
                <a class="text-white p-3 d-inline-block border- w-60px border-rightBlue" href="#">OPTION</a>
                <a class="text-white p-3 d-inline-block border-rightBlue  w-60px" href="#">DISCOUNT</a>
            </div>
        </div>
    </div>
</div>
@endsection
