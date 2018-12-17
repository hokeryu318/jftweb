@extends('layout.admin_layout')

@section('title', 'DISH')

@section('content')
<div class="">
<div style="padding-top:8%;" class="pp"></div>

<div class="widthh pb-1 hh black2 position-relative">
<a href="#" class="bg-transparent" style="position:absolute;top:15px ;right:10px"><h2><span class="">
                   <img src="img/Group 826.png" height="18" class="float-right" width="20" />
</span></h2></a>

<div class="pt-5">
<div class="row">
<div class="col-7">
<div class="row">
<div style="border-right:1px solid grey" class="col-6 pl-0 pr-1">
<h5 class="white-text font-weight-bold mb-5 pl-2">CATEGORY</h5>
<div style="height:350px;overflow-y:auto;overflow-x:hidden;" id="scroll" class="pr-3 hi">
<button class="btn white pt-2 radius pb-2 mb-3 pl-2 w-100 waves-effect waves-light" type="button" data-toggle="modal" data-target="#exampleModalCenter"><h6 class="font-weight-bold black-text mb-0 text-left"><span class="fa fa-navicon"></span> Beer / Sake</h6></button>
<button class="btn grey pt-2 radius pb-2 mb-3 pl-2 w-100 waves-effect waves-light" type="button" data-toggle="modal" data-target="#exampleModalCenter"><h6 class="font-weight-bold white-text mb-0 ml-0 pl-0 text-left"><span class="fa fa-navicon"></span> Main Dish</h6></button>
<button class="btn white pt-2 radius pb-2 mb-3 pl-2 w-100 waves-effect waves-light" type="button" data-toggle="modal" data-target="#exampleModalCenter"><h6 class="font-weight-bold black-text mb-0 ml-0 pl-0 text-left"><span class="fa fa-navicon"></span> SPECIALS! </h6></button>
<button class="btn white pt-2 radius pb-2 mb-3 pl-2 w-100 waves-effect waves-light" type="button" data-toggle="modal" data-target="#exampleModalCenter"><h6 class="font-weight-bold black-text mb-0 ml-0 pl-0 text-left"><span class="fa fa-navicon"></span> Wine / Soft Drinks </h6></button>
<button class="btn white pt-2 radius pb-2 mb-3 pl-2 w-100 waves-effect waves-light" type="button" data-toggle="modal" data-target="#exampleModalCenter"><h6 class="font-weight-bold black-text mb-0 ml-0 pl-0 text-left"><span class="fa fa-navicon"></span> Wine / Soft Drinks </h6></button>
<button class="btn white pt-2 radius pb-2 mb-3 pl-2 w-100 waves-effect waves-light" type="button" data-toggle="modal" data-target="#exampleModalCenter"><h6 class="font-weight-bold black-text mb-0 ml-0 pl-0 text-left"><span class="fa fa-navicon"></span> Wine / Soft Drinks </h6></button>
<button class="btn white pt-2 radius pb-2 mb-3 pl-2 w-100 waves-effect waves-light" type="button" data-toggle="modal" data-target="#exampleModalCenter"><h6 class="font-weight-bold black-text mb-0 ml-0 pl-0 text-left"><span class="fa fa-navicon"></span> Wine / Soft Drinks </h6></button>
<button class="btn white pt-2 radius pb-2 mb-3 pl-2 w-100 waves-effect waves-light" type="button" data-toggle="modal" data-target="#exampleModalCenter"><h6 class="font-weight-bold black-text mb-0 ml-0 pl-0 text-left"><span class="fa fa-navicon"></span> Wine / Soft Drinks </h6></button>
<button class="btn white pt-2 radius pb-2 mb-3 pl-2 w-100 waves-effect waves-light" type="button" data-toggle="modal" data-target="#exampleModalCenter"><h6 class="font-weight-bold black-text mb-0 ml-0 pl-0 text-left"><span class="fa fa-navicon"></span> Wine / Soft Drinks </h6></button>
<button class="btn white pt-2 radius pb-2 mb-3 pl-2 w-100 waves-effect waves-light" type="button" data-toggle="modal" data-target="#exampleModalCenter"><h6 class="font-weight-bold black-text mb-0 ml-0 pl-0 text-left"><span class="fa fa-navicon"></span> Wine / Soft Drinks </h6></button>
<button class="btn white pt-2 radius pb-2 mb-3 pl-2 w-100 waves-effect waves-light" type="button" data-toggle="modal" data-target="#exampleModalCenter"><h6 class="font-weight-bold black-text mb-0 ml-0 pl-0 text-left"><span class="fa fa-navicon"></span> Wine / Soft Drinks </h6></button>
<button class="btn white pt-2 radius pb-2 mb-3 pl-2 w-100 waves-effect waves-light" type="button" data-toggle="modal" data-target="#exampleModalCenter"><h6 class="font-weight-bold black-text mb-0 ml-0 pl-0 text-left"><span class="fa fa-navicon"></span> Wine / Soft Drinks </h6></button>
</div>
<div class="col-lg-12 pl-0 mt-4 ">
<button class="btn bg-info radius pt-2 pb-2 pr-4 pl-4 waves-effect waves-light"><h6 class="mb-0 font-weight-bold">ADD</h6></button>
<button class="btn black radius pt-2 pb-2 pr-4 pl-4 waves-effect waves-light"><h6 class="mb-0 font-weight-bold">Delete</h6></button>

</div>
</div>


<!-- Modal -->
<div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">

        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">×</span>
        </button>
      </div>
      <div class="modal-body pr-4">
        <h5 class="text-info font-weight-normal">English</h5>
		<input class="form-control pl-3" type="text">
		 <h5 class="text-info font-weight-normal">Mandarine</h5>
		<input class="form-control pl-3" type="text">
		 <h5 class="text-info font-weight-normal">Jabanese</h5>
		<input class="form-control pl-3" type="text">
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-light waves-effect waves-light" data-dismiss="modal">CANCEL &gt;</button>
        <button type="button" class="btn btn-primary waves-effect waves-light">APPLY &gt;</button>
      </div>
    </div>
  </div>
</div>
<div class="col-6" style="border-right:1px solid grey">
<h5 class="white-text font-weight-bold pl-2">SUB CATEGORY</h5>
<h6 class="white-text d-inline pl-2">USE SUB CATEGORY</h6>
<label class="switch">
  <input type="checkbox" checked="">
  <span class="slider round"></span>
</label>
<br>
<div style="height:350px ;max-width:285px" class="pr-5 hi" id="scroll">
<button class="btn white pt-2 radius pb-2 mb-3 pl-2 w-100 waves-effect waves-light" type="button" data-toggle="modal" data-target="#exampleModalCenter2"><h6 class="font-weight-bold black-text mb-0 text-left"><span class="fa fa-navicon"></span> Deep-fried</h6></button>
<button class="btn grey pt-2 radius pb-2 mb-3 pl-2 w-100 waves-effect waves-light" type="button" data-toggle="modal" data-target="#exampleModalCenter"><h6 class="font-weight-bold white-text mb-0 ml-0 pl-0 text-left"><span class="fa fa-navicon"></span> Grilled</h6></button>
<button class="btn white pt-2 radius pb-2 mb-3 pl-2 w-100 waves-effect waves-light" type="button" data-toggle="modal" data-target="#exampleModalCenter"><h6 class="font-weight-bold black-text mb-0 ml-0 pl-0 text-left"><span class="fa fa-navicon"></span> Seafood </h6></button>
<button class="btn white pt-2 radius pb-2 pl-2 w-100 waves-effect waves-light" type="button" data-toggle="modal" data-target="#exampleModalCenter"><h6 class="font-weight-bold black-text mb-0 ml-0 pl-0 text-left"><span class="fa fa-navicon"></span> Tempura </h6></button>
</div>
<div class="col-lg-12 pl-0 pr-0 mt-4 pt-2">
<button class="btn bg-info radius pt-2 pb-2 pr-4 pl-4 waves-effect waves-light"><h6 class="mb-0 font-weight-bold">ADD</h6></button>
<button class="btn black radius pt-2 pb-2 pr-4 pl-4 waves-effect waves-light"><h6 class="mb-0 font-weight-bold">Delete</h6></button>

</div>

</div>

</div>

</div>
<div class="col-5 pl-1">
<h5 class="white-text font-weight-bold mb-5 pl-2">DISH</h5>
<div style="height:350px ;overflow-y:auto;overflow-x:hidden;" id="scroll" class="hi">
<button class="btn white pt-2 radius pb-2 mb-3 pl-2 w-100 waves-effect waves-light" type="button" data-toggle="modal" data-target="#exampleModalCenter"><h6 class="font-weight-bold black-text mb-0 text-left"><span class="fa fa-navicon"></span> Chicken Kaust (Schnitzel) + Jap </h6></button>
<button class="btn white pt-2 radius pb-2 mb-3 pl-2 w-100 waves-effect waves-light" type="button" data-toggle="modal" data-target="#exampleModalCenter"><h6 class="font-weight-bold black-text mb-0 ml-0 pl-0 text-left"><span class="fa fa-navicon"></span> Chicken Kaust (Schnitzel) + Jap</h6></button>
<button class="btn white pt-2 radius pb-2 mb-3 pl-2 w-100 waves-effect waves-light" type="button" data-toggle="modal" data-target="#exampleModalCenter"><h6 class="font-weight-bold black-text mb-0 ml-0 pl-0 text-left"><span class="fa fa-navicon"></span> Ebi Fry (Fried) Prawns </h6></button>
<button class="btn white pt-2 radius pb-2 mb-3 pl-2 w-100 waves-effect waves-light" type="button" data-toggle="modal" data-target="#exampleModalCenter"><h6 class="font-weight-bold black-text mb-0 ml-0 pl-0 text-left"><span class="fa fa-navicon"></span> Karaage (Jabanese style Fried c </h6></button>
<button class="btn white pt-2 radius pb-2 mb-3 pl-2 w-100 waves-effect waves-light" type="button" data-toggle="modal" data-target="#exampleModalCenter"><h6 class="font-weight-bold black-text mb-0 ml-0 pl-0 text-left"><span class="fa fa-navicon"></span> Menchi Kastu (Beef and pork mi</h6></button>
<button class="btn white pt-2 radius pb-2 mb-3 pl-2 w-100 waves-effect waves-light" type="button" data-toggle="modal" data-target="#exampleModalCenter"><h6 class="font-weight-bold black-text mb-0 ml-0 pl-0 text-left"><span class="fa fa-navicon"></span> Menchi Kastu (Beef and pork mi</h6></button>
<button class="btn white pt-2 radius pb-2 mb-3 pl-2 w-100 waves-effect waves-light" type="button" data-toggle="modal" data-target="#exampleModalCenter"><h6 class="font-weight-bold black-text mb-0 ml-0 pl-0 text-left"><span class="fa fa-navicon"></span> Menchi Kastu (Beef and pork mi</h6></button>
<button class="btn white pt-2 radius pb-2 mb-3 pl-2 w-100 waves-effect waves-light" type="button" data-toggle="modal" data-target="#exampleModalCenter"><h6 class="font-weight-bold black-text mb-0 ml-0 pl-0 text-left"><span class="fa fa-navicon"></span> Menchi Kastu (Beef and pork mi</h6></button>
<button class="btn white pt-2 radius pb-2 mb-3 pl-2 w-100 waves-effect waves-light" type="button" data-toggle="modal" data-target="#exampleModalCenter"><h6 class="font-weight-bold black-text mb-0 ml-0 pl-0 text-left"><span class="fa fa-navicon"></span> Menchi Kastu (Beef and pork mi</h6></button>
</div>
<div class="col-lg-12 pl-0 mt-4">
<button class="btn bg-info radius pt-2 pb-2 pr-4 pl-4 waves-effect waves-light"><h6 class="mb-0 font-weight-bold">ADD</h6></button>
<button class="btn black radius pt-2 pb-2 pr-4 pl-4 waves-effect waves-light"><h6 class="mb-0 font-weight-bold">Delete</h6></button>

</div>
</div>
</div>
<div class="row mt-4 mb-4 padd">
            <div class="col-12">
                <div class="d-inline-block text-white font-bold border-blue ">
                    <a href="#" class="text-white d-inline-block border-rightBlue p-3 w-60px">DISH</a>
                    <a class="text-white p-3 d-inline-block w-60px" href="#">CATEGORY</a>
                    <a class="text-white p-3 d-inline-block border- w-60px bg-blue2" href="#">OPTION</a>
                    <a class="text-white p-3 d-inline-block border-rightBlue  w-60px" href="#">DISCOUNT</a>

                </div>
                <a href="" class="text-white  btnCreateNewDiscount">
                    CREATE NEW OPTION
                    <img src="img/Group 728white.png" height="20" />
                </a>
            </div>
        </div>
</div>

</div>
<div class="modal fade" id="exampleModalCenter2" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document" style="max-width:90% !important;">
    <div class="modal-content">
      <div class="modal-header">

        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">×</span>
        </button>
      </div>
      <div class="modal-body pr-4">
       <div class="row w-100">
	   <div class="col-5">
	   <div style="border:2px solid lightgrey;height:427px !important;overflow-y:scroll" class="p-2">
	   <a href="#" class="black-text font-weight-bold" id="beer"><span class="fa fa-chevron-right grey-text"></span> Beer / Sake</a>
	   <ul style="list-style-type:square" id="beeritem" class="font-weight-bold">
	   <li>item</li>
	   <li>item</li>
	   </ul>
	   <br><br>
	   <a href="#" class="black-text font-weight-bold" id="wine"><span class="fa fa-chevron-right grey-text"></span> Wine / Soft Drinks</a>
	   <ul style="list-style-type:square" id="wineitem" class="font-weight-bold">
	   <li>item</li>
	   <li>item</li>
	   </ul><br><br>
	   <a href="#" class="black-text font-weight-bold" id="SPECIALS"><span class="fa fa-chevron-right grey-text"></span> SPECIALS!!</a>
	   <ul style="list-style-type:square" id="SPECIALSitem" class="font-weight-bold">
	   <li>item</li>
	   <li>item</li>
	   </ul><br><br>
	    <a href="#" class="black-text font-weight-bold" id="Summer"><span class="fa fa-chevron-right grey-text"></span> Summer Specials</a>
	   <ul style="list-style-type:square" id="Summeritem"  class="font-weight-bold">
	   <li>item</li>
	   <li>item</li>
	   </ul><br><br>
	   <a href="#" class="black-text font-weight-bold" id="Nibbles"><span class="fa fa-chevron-right grey-text"></span> Nibbles / Salad</a>
	   <ul style="list-style-type:square" id="Nibblesitem" class="font-weight-bold">
	   <li>item</li>
	   <li>item</li>
	   </ul>	<br><br>
	   <a href="#" class="black-text font-weight-bold" id="Dish"><span class="fa fa-chevron-right grey-text"></span> Main Dish</a>

	    <ul style="list-style-type:square" id="Dishitem"  class="font-weight-bold">
	   <li>Grilled</li>
	   <li>Deep-fried</li>
	   <li>Seafood</li>
	   <li>Tempuramp</li>
	   </ul><br><br>
	   <a href="#" class="black-text font-weight-bold" id="hot"><span class="fa fa-chevron-right grey-text"></span> Hot Pot</a>

	    <ul style="list-style-type:square" class="font-weight-bold" id="hotitem">
	   <li>item</li>
	   <li>item</li>
	   </ul><br><br>
	    <a href="#" class="black-text font-weight-bold pl-3">Rice Dish</a>
		<br><br>
	    <a href="#" class="black-text font-weight-bold pl-3">Dessert</a>


	   </div>
	   </div>
	   <div class="col-7">

	   <div style="border:2px solid lightgrey;height:427px !important;overflow-y:scroll" class="p-2">
	   <a href="#" class="black-text font-weight-bold" id="chicken"><span class="fa fa-chevron-right grey-text"></span> Chicken Kastsu (Schnitzel) +</a>
	   <ul style="list-style-type:none" id="chickenitem" class="font-weight-bold">
	   <li>&nbsp;&nbsp;Jabanese BBQ Sauce +</li>
	   <li>&nbsp;&nbsp;Daikon Oroshi</li>
	   <li><a href="#" id="sauce"><span class="fa fa-chevron-right grey-text"></span> Sauce</a>

	   <ul style="list-style-type:square" id="sauceitem" class="font-weight-bold">
	   <li>BBQ</li>
	   <li>Tamari Sauce</li>
	   <li>Gomadare</li>
	   	   <li>Ponzu</li>
		   	   <li>Kanzuri (-$0.20)</li>


	   </ul>
	   </li>
	   <li><a href="#"  id="top"><span class="fa fa-chevron-right grey-text"></span> Topping	</a>

	   <ul style="list-style-type:square" id="topitem" class="font-weight-bold">
	   <li>Daikon Oroshi</li>
	   <li>Omiji Oroshi</li>
	   <li>Gomadare</li>
	   	   <li>Non</li>


	   </ul>
	   </li>
	   </ul>
	   <br><br>
	    <a href="#" class="black-text font-weight-bold" id="tuna"><span class="fa fa-chevron-right grey-text"></span> Tuna & Avocado Roll Sushi</a>
	   <ul style="list-style-type:none" id="tunaitem" class="font-weight-bold">
	   <li>item1</li>
	   <li>item2</li>
	   </ul>
	   <br><br>
	   <a href="#" class="black-text font-weight-bold pl-3" id="wine">Uramaki 10pc</a>

	  <br>
	    <a href="#" class="black-text font-weight-bold pl-3">Salmon & Avodcado Roll Sushi<br>&nbsp;&nbsp;&nbsp;&nbsp;with Ikura 6pc/a>


	   </div>


	   </div></div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-light waves-effect waves-light" data-dismiss="modal"><h5 class="mb-0 font-weight-bold">CANCEL &gt;</h4></button>
        <button type="button" class="btn btn-primary waves-effect waves-light"><h5 class="mb-0 font-weight-bold">ADD &gt;</h4></button>
      </div>
    </div>
  </div>
</div>
@endsection
