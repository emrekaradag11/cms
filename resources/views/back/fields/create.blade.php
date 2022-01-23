<form action="{{route("setFieldData")}}" class="card-body pb-3" method="post">
    @csrf
    <ul class="nav col-12 nav-tabs m-0 px-3">
        @foreach($lng as $l)
            <li class="nav-item">
                <a class="text-uppercase nav-link {{$l->id==1?'active':null}}" id="tab_{{$l->id}}_add" data-toggle="tab" aria-controls="tabpane_{{$l->id}}_add" href="#tabpane_{{$l->id}}_add">{{$l->lang_short}}</a>
            </li>
        @endforeach
    </ul>

    <div class="tab-content col-12 m-0">
        @foreach($lng as $l => $k)
            <div class="tab-pane px-0  {{$k->id==1?'active':null}}" id="tabpane_{{$k->id}}_add" aria-labelledby="tabpane_{{$k->id}}_add">
                <div class="row">
                    @foreach($fields as $f)
                        @if($f->type == "select")
                            <div class="col-12">
                                <div class="form-group">
                                    <label>{{$f->fieldDetail[$l]->name}}</label>
                                    <select name="{{$f->id}}[]" class="form-control">
                                        @foreach(explode(',', $f->fieldDetail[$l]->properties) as $pr)
                                            <option value="{{@trim($pr)}}">{{@trim($pr)}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                        @elseif($f->type == "radio")
                            <div class="col-12">
                                <div class="form-group">
                                    <label>{{$f->fieldDetail[$l]->name}}</label>
                                    <div class="d-block">
                                        @foreach(explode(',', $f->fieldDetail[$l]->properties) as $ks => $pr)
                                            <div class="custom-control pr-2 mb-2 d-inline-block custom-radio">
                                                <input type="radio" value="{{$pr}}" id="custom{{$ks . $k->lang_short}}" name="{{$f->id}}[]" class="custom-control-input">
                                                <label class="custom-control-label" for="custom{{$ks . $k->lang_short}}">{{$pr}}</label>
                                            </div>
                                        @endforeach

                                    </div>
                                </div>
                            </div>
                        @elseif($f->type == "checkbox")
                            <div class="col-12">
                                <div class="form-group">
                                    <label>{{$f->fieldDetail[$l]->name}}</label>
                                    <div class="d-block">
                                        @foreach(explode(',', $f->fieldDetail[$l]->properties) as $ks => $pr)
                                            <div class="custom-control pr-2 mb-2 d-inline-block custom-checkbox">
                                                <input type="checkbox" value="{{$pr}}" id="{{Str::slug($pr, '-')}}" name="{{$f->id}}[]" class="custom-control-input">
                                                <label class="custom-control-label" for="{{Str::slug($pr, '-')}}">{{$pr}}</label>
                                            </div>
                                        @endforeach

                                    </div>
                                </div>
                            </div>
                        @else
                            <div class="col-12">
                                <div class="form-group">
                                    <label>{{$f->fieldDetail[$l]->name}}</label>
                                    <input type="{{$f->type}}" name="{{$f->id}}[]" class="form-control">
                                </div>
                            </div>
                        @endif
                    @endforeach
                </div>
            </div>
        @endforeach
        <div class="col-12">
            <div class="form-group text-right">
                <input type="hidden" name="page_id" value="{{$field_page_id}}">
                <input type="hidden" name="parent" value="{{$field_parent}}">
                <button type="submit" class="btn btn-primary">Kaydet</button>
            </div>
        </div>
    </div>
</form>
