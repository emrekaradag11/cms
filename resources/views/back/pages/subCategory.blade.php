

 <ul class="list-group customLists sortables">
    @foreach($pages as $p) 
        <li class="list-group-item list-group-item-action" id="item-{{$p->id}}" data-content="{{$p->id}}">
            <div class="d-flex align-items-center justify-content-between customListElement">
                <strong>{{$p->getFirstName->title}} (Şablon {{$p->template}})</strong>
                <div>

                    @if ($p->template == 1)
                        <a  href="{{route('admin.text.edit',$p->id)}}" class="btn btn-xs btn-xxs px-3 py-2 btn-facebook"><i class="nav-icon i-Pen-2"></i></a>
                    @elseif($p->template == 2)
                        <a  href="tree/{{$p->id}}" class="btn btn-xs btn-xxs px-3 py-2 btn-facebook"><i class="nav-icon i-Pen-2"></i></a>
                    @else
                        <a tabindex class="btn btn-xs btn-xxs px-3 py-2 btn-facebook"><i class="nav-icon i-Pen-2"></i></a>
                    @endif
                    <a tabindex href="{{route('admin.pages.edit',$p->id)}}" class="btn btn-xs btn-xxs px-3 py-2 btn-success"><i class="nav-icon i-Pen-2"></i></a>
                    <a tabindex class="btn btn-xs btn-xxs px-3 py-2 btn-danger js_delete"><i class="nav-icon i-Close-Window"></i></a>
                    <a tabindex class="btn btn-xs btn-xxs px-3 py-2 btn-info list_item"><i class="nav-icon i-Arrow-Cross"></i></a>
                </div>
            </div>

            @if(count($p->getSubControl)>0)
                <ul class="list-group customLists sortables">
                    @include("back.pages.subCategory",["pages" => $p->getSubCategories])
                </ul>
            @endif
        </li>
    @endforeach 
</ul>