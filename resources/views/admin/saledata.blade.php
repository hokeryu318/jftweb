@extends('layout.admin_layout')

@section('title', 'Settings')

@section('content')
<div class="pbb1 blackgrey">

<div style="padding-top:7%;">
</div>

<div class="widthh white pt-0 pb-3 position-relative">
    <a href="#" class="bg-transparent" style="position:relative;top:15px ;right:10px"><h2><span class="">
        <img src="{{ asset('img/Group1100.png') }}" height="18" class="float-right" width="20" />
    </span></h2></a>
    <br><br>
    <div class="row">
        <div class="col-12">
            <label class="text-darkgrey">Daily Review</label>
            <div class="d-inline-block text-blue txtdemibold ml-5 mb-3 text-right" >
                <label class="ml-5 pl-5"><</label>
                <label class="mr-4 ml-2">Previous</label>
                <label class="ml-4 mr-4">Today</label>
                <label class="ml-4 mr-2">Next</label>
                <label> ></label>
            </div>
            <select class="border-blue w-70px heigh2rem float-right"></select>
        </div>
    </div>
    <div class="row">
        <div class="col-9">
            <table class="table table-striped border-black table2 mt-2">
                <thead>
                    <tr class="text-center">
                        <th class="">DATE</th>
                        <th>SALES</th>
                        <th>GROUP</th>
                        <th>GUESTS</th>
                        <th>ORDERS</th>
                        <th>CALLS</th>
                        <th>FEED-BACKS</th>
                    </tr>
                </thead>
                <tbody>
                    <tr onClick="onRow()">
                        <td>Tue 22 May</td>
                        <td>$ 7,000</td>
                        <td>70</td>
                        <td>210</td>
                        <td>630</td>
                        <td>100</td>
                        <td>10</td>
                    </tr>
                    <tr>
                        <td>Tue 22 May</td>
                        <td>$ 7,000</td>
                        <td>70</td>
                        <td>210</td>
                        <td>630</td>
                        <td>100</td>
                        <td>10</td>
                    </tr>
                    <tr>
                        <td>Tue 22 May</td>
                        <td>$ 7,000</td>
                        <td>70</td>
                        <td>210</td>
                        <td>630</td>
                        <td>100</td>
                        <td>10</td>
                    </tr>
                    <tr>
                        <td>Tue 22 May</td>
                        <td>$ 7,000</td>
                        <td>70</td>
                        <td>210</td>
                        <td>630</td>
                        <td>100</td>
                        <td>10</td>
                    </tr>
                    <tr>
                        <td>Tue 22 May</td>
                        <td>$ 7,000</td>
                        <td>70</td>
                        <td>210</td>
                        <td>630</td>
                        <td>100</td>
                        <td>10</td>
                    </tr>
                    <tr>
                        <td>Tue 22 May</td>
                        <td>$ 7,000</td>
                        <td>70</td>
                        <td>210</td>
                        <td>630</td>
                        <td>100</td>
                        <td>10</td>
                    </tr>
                    <tr>
                        <td>Tue 22 May</td>
                        <td>$ 7,000</td>
                        <td>70</td>
                        <td>210</td>
                        <td>630</td>
                        <td>100</td>
                        <td>10</td>
                    </tr>
                </tbody>
            </table>

            <label class="text-darkgrey mt-0">Monthly Sales</label>
            <table class="table table-striped border-black table2">

                <tbody>
                    <tr>
                        <td>Tue 22 May</td>
                        <td>$ 7,000</td>
                        <td>70</td>
                        <td>210</td>
                        <td>630</td>
                        <td>100</td>
                        <td>10</td>


                    </tr>
                    <tr>
                        <td>Tue 22 May</td>
                        <td>$ 7,000</td>
                        <td>70</td>
                        <td>210</td>
                        <td>630</td>
                        <td>100</td>
                        <td>10</td>


                    </tr>
                    <tr>
                        <td>Tue 22 May</td>
                        <td>$ 7,000</td>
                        <td>70</td>
                        <td>210</td>
                        <td>630</td>
                        <td>100</td>
                        <td>10</td>


                    </tr>
                    <tr>
                        <td>Tue 22 May</td>
                        <td>$ 7,000</td>
                        <td>70</td>
                        <td>210</td>
                        <td>630</td>
                        <td>100</td>
                        <td>10</td>


                    </tr>
                    <tr>
                        <td>Tue 22 May</td>
                        <td>$ 7,000</td>
                        <td>70</td>
                        <td>210</td>
                        <td>630</td>
                        <td>100</td>
                        <td>10</td>


                    </tr>
                    <tr>
                        <td>Tue 22 May</td>
                        <td>$ 7,000</td>
                        <td>70</td>
                        <td>210</td>
                        <td>630</td>
                        <td>100</td>
                        <td>10</td>


                    </tr>
                    <tr>
                        <td>Tue 22 May</td>
                        <td>$ 7,000</td>
                        <td>70</td>
                        <td>210</td>
                        <td>630</td>
                        <td>100</td>
                        <td>10</td>


                    </tr>
                    <tr>
                        <td>Tue 22 May</td>
                        <td>$ 7,000</td>
                        <td>70</td>
                        <td>210</td>
                        <td>630</td>
                        <td>100</td>
                        <td>10</td>


                    </tr>
                    <tr>
                        <td>Tue 22 May</td>
                        <td>$ 7,000</td>
                        <td>70</td>
                        <td>210</td>
                        <td>630</td>
                        <td>100</td>
                        <td>10</td>


                    </tr>
                    <tr>
                        <td>Tue 22 May</td>
                        <td>$ 7,000</td>
                        <td>70</td>
                        <td>210</td>
                        <td>630</td>
                        <td>100</td>
                        <td>10</td>


                    </tr>


                </tbody>
            </table>

        </div>
        <div class="col-3">
            <label class="text-darkgrey">Best Sellers</label>
            <table class="bestsellerTable">
                <tbody>
                    <tr>
                        <td>1</td>
                        <td>Nigiri Omakase A</td>
                        <td>200</td>

                    </tr>
                    <tr>
                        <td>1</td>
                        <td>Nigiri Omakase A</td>
                        <td>200</td>

                    </tr>
                    <tr>
                        <td>1</td>
                        <td>Nigiri Omakase A</td>
                        <td>200</td>

                    </tr>
                    <tr>
                        <td>1</td>
                        <td>Nigiri Omakase A</td>
                        <td>200</td>

                    </tr>
                    <tr>
                        <td>1</td>
                        <td>Nigiri Omakase A</td>
                        <td>200</td>

                    </tr>
                    <tr>
                        <td>1</td>
                        <td>Nigiri Omakase A</td>
                        <td>200</td>

                    </tr>
                    <tr>
                        <td>1</td>
                        <td>Nigiri Omakase A</td>
                        <td>200</td>

                    </tr>
                    <tr>
                        <td>1</td>
                        <td>Nigiri Omakase A</td>
                        <td>200</td>

                    </tr>
                    <tr>
                        <td>1</td>
                        <td>Nigiri Omakase A</td>
                        <td>200</td>

                    </tr>
                    <tr>
                        <td>1</td>
                        <td>Nigiri Omakase A</td>
                        <td>200</td>

                    </tr>

                </tbody>
            </table>

            <label class="text-darkgrey mt-1">Worst Sellers</label>
            <table class="bestsellerTable">
                <tbody>
                    <tr>
                        <td>1</td>
                        <td>Nigiri Omakase A</td>
                        <td>200</td>

                    </tr>
                    <tr>
                        <td>1</td>
                        <td>Nigiri Omakase A</td>
                        <td>200</td>

                    </tr>
                    <tr>
                        <td>1</td>
                        <td>Nigiri Omakase A</td>
                        <td>200</td>

                    </tr>
                    <tr>
                        <td>1</td>
                        <td>Nigiri Omakase A</td>
                        <td>200</td>

                    </tr>
                    <tr>
                        <td>1</td>
                        <td>Nigiri Omakase A</td>
                        <td>200</td>

                    </tr>
                    <tr>
                        <td>1</td>
                        <td>Nigiri Omakase A</td>
                        <td>200</td>

                    </tr>
                    <tr>
                        <td>1</td>
                        <td>Nigiri Omakase A</td>
                        <td>200</td>

                    </tr>
                    <tr>
                        <td>1</td>
                        <td>Nigiri Omakase A</td>
                        <td>200</td>

                    </tr>
                    <tr>
                        <td>1</td>
                        <td>Nigiri Omakase A</td>
                        <td>200</td>

                    </tr>
                    <tr>
                        <td>1</td>
                        <td>Nigiri Omakase A</td>
                        <td>200</td>

                    </tr>

                </tbody>
            </table>


        </div>
    </div>
</div>
<script>
    function onRow(){
        window.location = "{{ route('admin.review') }}";
    }
</script>
@endsection
