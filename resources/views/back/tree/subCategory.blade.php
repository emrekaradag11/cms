<ul class="list-group customLists sortables">
    @foreach($tree as $t)
        <li class="list-group-item list-group-item-action" id="item-{{ $t->id }}" data-content="{{ $t->id }}">
            <div class="d-flex align-items-center justify-content-between customListElement">
                <strong>{{$t->getFirstName->title}}</strong>
                <div>
                    <a tabindex href="{{ route('admin.tree.edits',[ $t->id, $t->page_id ]) }}" class="btn btn-xs btn-xxs px-3 py-2 btn-success"><i class="nav-icon i-Pen-2"></i></a>
                    <a href="javascript:void(0);" data-id="{{ $t->id }}" class="btn btn-xs btn-xxs px-3 py-2 btn-danger js_delete"><i class="nav-icon i-Close-Window"></i></a>
                    <a data-id="{{ $t->id }}" data-hidden="{{ $t->hidden == '1' ? '0' : '1' }}" tabindex class="js-hidden btn btn-xs btn-xxs px-3 py-2 btn-linkedin"> <i class="fal {{ $t->hidden == '1' ? 'fa-eye-slash' : 'fa-eye' }}"></i> </a>
                    <a tabindex class="btn btn-xs btn-xxs px-3 py-2 btn-info list_item"><i class="nav-icon i-Arrow-Cross"></i></a>
                </div>
            </div>

            @if(count($t->getSubControl)>0)
                <ul class="list-group customLists sortables">
                    @include("back.tree.subCategory",["tree" => $t->getSubCategories])
                </ul>
            @endif
        </li>
    @endforeach 
</ul>
