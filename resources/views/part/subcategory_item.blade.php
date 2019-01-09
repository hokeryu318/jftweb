<button class="btn white pt-2 radius pb-2 mb-3 pl-2 w-95 pr-0  waves-effect waves-light subcat" onclick="onSub(this)"
    data-id="{{ $sub->id }}"
    data-parent="{{ $sub->parent_id }}" type="button">
    <h6 class="font-weight-bold black-text mb-0 text-left cat-caption">
        <span class="fa fa-navicon"></span> {{ $sub->name_en }}
    </h6>
</button>
