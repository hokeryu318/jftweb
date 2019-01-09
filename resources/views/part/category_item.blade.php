<button class="btn white pt-2 radius pb-2 mb-3 pl-2 w-95 pr-0  waves-effect waves-light cat-button" type="button"
    onclick="onMain(this)"
    data-id="{{ $cat->id }}"
    data-hassubs="{{ $cat->has_subs }}">
    <h6 class="font-weight-bold black-text mb-0 text-left cat-caption">
        <span class="fa fa-navicon"></span> {{ $cat->name_en }}
    </h6>
</button>
