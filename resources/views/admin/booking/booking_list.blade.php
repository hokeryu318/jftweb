@extends('layout.admin_layout')

@section('title', 'DISH')

@section('content')
<div style="padding-top:8%;" class="pp"></div>
    <div class="widthh pt-4 blackgrey">
        <div class="row">
            <div class="col-6">
                <h4 class="text-white h2-responsive font-weight-bold">Bookings</h4>
            </div>
            <div class="col-6">
                <a>
                    <span class="">
                        <img src="{{ URL::asset('img/Group826.png') }}" height="18" class="float-right" width="20" />
                    </span>
                </a>
            </div>
        </div>
		<br>
        <div class="row mb-3 mt-3">
            <div class="col-12">
                <img src="{{ URL::asset('img/Path501.png') }}" class="mb-2" height="25" /><label class="text-white ml-3 mr-3 font-weight-light fs-4 pt-2">31 MAY 2018</label>
                <img src="{{ URL::asset('img/Path502.png') }}" class="mb-2" height="25" />
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
                                <img src="{{ URL::asset('img/Path444.png') }}" height="20">
                            </th>
                            <th class="border-0 text-center" scope="col">TABLE</th>
                            <th class="border-0 text-right" scope="col">NUMBER</th>
                            <th class="border-0 text-center" scope="col">CUSTOMER</th>
                        </tr>
                    </thead>
				</table>
			</div>
            <div class="col-12 chh" style="height: 333px;overflow-y: auto;">
                <table class="table text-white txtdemibold">
                    <tbody class="thh" >
                        <tr>
                            <td class="border-0">09:35 PM</td>
                            <td class="border-0">H-1 + H-2</td>
                            <td class="border-0">12</td>
                            <td class="border-0">Ms Jenifer Lopez</td>
                            <td class="border-0"><a href="{{ route('admin.booking.edit') }}" class="outline-0 editbtn">EDIT</a></td>
                        </tr>
                        <tr>
                            <td>09:30 PM</td>
                            <td>A-1</td>
                            <td>1</td>
                            <td>Mr Johny English</td>
                            <td><a class="outline-0 editbtn">EDIT</a></td>
                        </tr>
						   <tr>
                            <td>09:30 PM</td>
                            <td>A-1</td>
                            <td>1</td>
                            <td>Mr Johny English</td>
                            <td><a class="outline-0 editbtn">EDIT</a></td>
                        </tr>
						   <tr>
                            <td>09:30 PM</td>
                            <td>A-1</td>
                            <td>1</td>
                            <td>Mr Johny English</td>
                            <td><a class="outline-0 editbtn">EDIT</a></td>
                        </tr>
						<tr>
                            <td>09:30 PM</td>
                            <td>A-1</td>
                            <td>1</td>
                            <td>Mr Johny English</td>
                            <td><a class="outline-0 editbtn">EDIT</a></td>
                        </tr>
						<tr>
                            <td>09:30 PM</td>
                            <td>A-1</td>
                            <td>1</td>
                            <td>Mr Johny English</td>
                            <td><a class="outline-0 editbtn">EDIT</a></td>
                        </tr>
                        <tr>
                            <td>09:06 PM</td>
                            <td>B-3</td>
                            <td>2</td>
                            <td>Akihiko Mino</td>
                            <td><a class="outline-0 editbtn">EDIT</a></td>
                        </tr>
                        <tr>
                            <td>08:58 PM</td>
                            <td>B-4</td>
                            <td>2</td>
                            <td>Melbourne University</td>
                            <td><a class="outline-0 editbtn">EDIT</a></td>
                        </tr>
                        <tr>
                            <td>08:45 PM</td>
                            <td>A-4</td>
                            <td>1</td>
                            <td>Nishikian Japanese Restaurant</td>
                            <td><a class="outline-0 editbtn">EDIT</a></td>
                        </tr>
                        <tr>
                            <td>08:36 PM</td>
                            <td>C-2</td>
                            <td>4</td>
                            <td>Ms Naomi Osaka</td>
                            <td><a class="outline-0 editbtn">EDIT</a></td>
                        </tr>
                    </tbody>
                </table>
				<br>
            </div>
			<div class="mt-4 mb-4 col-12">
            </div>
        </div>

        <!-- Default switch -->
        <!--<label class="bs-switch">
            <input type="checkbox">
            <span class="slider round"></span>
        </label>-->
    </div>
@endsection
