@extends('layout.admin_layout')

@section('title', 'DISH')

@section('content')
<div class="pp">
    <div style="padding-top:6.5%" class="pt"></div>
    <div class=" blackgrey pt-3 pl-4 pr-4 ">
        <div class="row">
            <div class="col-6">
                <h4 class="text-white mb-0 h2-responsive font-weight-bold">Transactions</h4>
            </div>
            <div class="col-6">
                <a>
                    <span class="">
                        <img src="{{ asset('img/Group826.png') }}" height="18" class="float-right" width="19" />
                    </span>
                </a>
            </div>
        </div>
        <br>
        <div class="row mb-3 mt-2">
            <div class="col-12">
                <img src="{{ asset('img/Path501.png') }}" class="mb-2" height="25"/><label class="text-white ml-3 mr-3 font-weight-light fs-4 pt-2">31 MAY 2018</label>
                <img src="{{ asset('img/Path502.png') }}" class="mb-2" height="25" />
            </div>
        </div>
        <br>
        <div class="row">
            <div class="col-12">
                <table class="table text-white txtdemibold" style="width:57%;">
                    <thead>
                        <tr>
                            <th class="border-0" scope="col">
                                Time
                                <img src="{{ asset('img/Path444.png') }}" height="20">
                            </th>
                            <th class="border-0 text-center" scope="col">TABLE</th>
                            <th class="border-0 text-right" scope="col">AMOUNT</th>
                            <th class="border-0 text-center" scope="col">CUSTOMER</th>
                        </tr>
                    </thead>
                </table>
            </div>
            <div class="col-12 chh" style="height: 333px;
                                            overflow-y: auto;">
                <table class="table text-white txtdemibold">
                    <tbody class="thh">
                        <tr>
                            <td class="border-0">09:35 PM</td>
                            <td class="border-0">H-1 + H-2</td>
                            <td class="border-0">$ 235.80</td>
                            <td class="border-0">Ms Jenifer Lopez</td>
                            <td class="border-0"><button class="outline-0 repbtn">REPRINT</button></td>
                        </tr>
                        <tr>
                            <td >09:35 PM</td>
                            <td >A-1</td>
                            <td >$ 2,150.00</td>
                            <td >Walk-in 16</td>
                            <td ><button class="outline-0 repbtn">REPRINT</button></td>
                        </tr>
                        <tr>
                            <td >09:35 PM</td>
                            <td >A-1</td>
                            <td >$ 2,150.00</td>
                            <td >Walk-in 16</td>
                            <td ><button class="outline-0 repbtn">REPRINT</button></td>
                        </tr>
                        <tr>
                            <td >09:35 PM</td>
                            <td >A-1</td>
                            <td >$ 2,150.00</td>
                            <td >Walk-in 16</td>
                            <td ><button class="outline-0 repbtn">REPRINT</button></td>
                        </tr>
                        <tr>
                            <td >09:35 PM</td>
                            <td >B-3</td>
                            <td >$ 550.50</td>
                            <td >Walk-in 15</td>
                            <td ><button class="outline-0 repbtn">REPRINT</button></td>
                        </tr>
                        <tr>
                            <td >09:35 PM</td>
                            <td >B-4</td>
                            <td > $ 100.35</td>
                            <td >John</td>
                            <td ><button class="outline-0 repbtn">REPRINT</button></td>
                        </tr>
                        <tr>
                            <td >09:35 PM</td>
                            <td >A-4</td>
                            <td >$ 456.78</td>
                            <td>Nishikian Japanese Restaurant</td>
                            <td ><button class="outline-0 repbtn">REPRINT</button></td>
                        </tr>
                        <tr>
                            <td >09:35 PM</td>
                            <td >C-2</td>
                            <td >$ 550.00</td>
                            <td >Ms Naomi Osaka</td>
                            <td ><button class="outline-0 repbtn">REPRINT</button></td>
                        </tr>
                    </tbody>
                </table>
                <br>
            </div>
            <div class="mt-4 mb-4 col-12">
            </div>
        </div>
    </div>
</div>
@endsection
