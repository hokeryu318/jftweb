@foreach ($dishes as $ds)
    <button class="btn white pt-2 radius pb-2 mb-3 pl-2 pr-2 w-95 waves-effect waves-light" type="button"
        data-toggle="modal"
        data-target="#exampleModalCenter">
        <h6 class="font-weight-bold black-text mb-0 text-left" style="white-space:nowrap;overflow:hidden">
            <span class="fa fa-navicon"></span> {{ $ds->name_en }}
        </h6>
    </button>
@endforeach
