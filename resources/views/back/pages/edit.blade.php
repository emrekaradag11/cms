@extends("back.layout")
@section("content") 
    <div class="main-content">
        <div class="breadcrumb d-flex align-items-center justify-content-between">
            <h1>{{$page->getFirstName->title}} Düzenle</h1> 
            <a href="{{route("admin.pages.index")}}" class="btn btn-primary btn-rounded">Geri Dön</a>
        </div>
        <div class="separator-breadcrumb border-top"></div>
        <div class="card mb-4">
            <div class="card-body">
                <div class="row">
                    <div class="col-lg-8"> 
                        <div class="card-content">
                            <div class="card-body">
                                <form class="form row" method="post" enctype="multipart/form-data" action="{{route('admin.pages.update',$page->id)}}">
                                    <input type="hidden" name="id" value="{{$page->id}}">
                                    <div class="col-12">
                                        @csrf
                                        @method("PUT")
                                        <ul class="nav col-12 nav-tabs m-0">
                                            @foreach($lng as $l)
                                                <li class="nav-item">
                                                    <a class="text-uppercase nav-link {{$l->id==1?'active':null}}" id="tab_{{$l->id}}" data-toggle="tab" aria-controls="tabpane_{{$l->id}}" href="#tabpane_{{$l->id}}">{{$l->lang_short}}</a>
                                                </li>
                                            @endforeach
                                        </ul>
                                        <div class="tab-content col-12 px-0 m-0">
                                            @foreach($lng as $l => $k)
                                                <div class="tab-pane px-0 {{$k->id==1?'active':null}}" id="tabpane_{{$k->id}}" aria-labelledby="tabpane_{{$k->id}}">
                                                    <div class="row">
                                                        <div class="col-md-6 col-12">
                                                            <div class="form-group">
                                                                <label for="head{{$l}}">Sayfa İsmi ({{$k->lang_short}})</label>
                                                                <input type="text" id="head{{$l}}" class="form-control" name="title[]" value="{{$page->getDetail[$l]->title ?? null}}">
                                                            </div>
                                                        </div>
                                                        <div class="col-md-6 col-12">
                                                            <div class="form-group">
                                                                <label for="description{{$l}}">Description ({{$k->lang_short}})</label>
                                                                <input type="text" id="description{{$l}}" class="form-control" name="description[]" value="{{$page->getDetail[$l]->description ?? null}}">
                                                            </div>
                                                        </div>
                                                        <div class="col-md-6 col-12">
                                                            <div class="form-group">
                                                                <label for="keywords{{$l}}">Keywords ({{$k->lang_short}})</label>
                                                                <input type="text" id="keywords{{$l}}" class="form-control" name="keywords[]" value="{{$page->getDetail[$l]->keywords ?? null}}">
                                                            </div>
                                                        </div>
                                                        <div class="col-md-6 col-12">
                                                            <div class="form-group">
                                                                <label for="slug{{$l}}">Link ({{$k->lang_short}})</label>
                                                                <input type="text" id="slug{{$l}}" class="form-control" value="{{$page->getDetail[$l]->slug ?? null}}" name="slug[]">
                                                            </div>
                                                        </div>

                                                        <div class="col-12">
                                                            <div class="form-group">
                                                                <label>Açıklama :</label>
                                                                <textarea class="form-control" name="text[]" id="" cols="30" rows="6">{{$page->getDetail[$l]->text ?? null}}</textarea>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            @endforeach
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6 col-12">
                                                <div class="form-group">
                                                    <label for="template">Sayfa Şablonu</label>
                                                    <select name="template" class="form-control" id="template">
                                                        <option {{ $page->template == '1' ? 'selected' : null }} value="1">Text</option>
                                                        <option {{ $page->template == '2' ? 'selected' : null }} value="2">Tree</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-md-6 col-12">
                                                <div class="form-group">
                                                    <label for="redirect">Redirect</label>
                                                    <input type="text" id="redirect" class="form-control" value="{{$page->redirect}}" name="redirect">
                                                </div>
                                            </div>
                                            <div class="col-md-6 col-12">
                                                <div class="form-group">
                                                    <label for="parent_id">Üst Sayfa</label>
                                                    <select name="parent_id" class="form-control" id="parent_id">
                                                        <option value="0">Ana Menü</option>
                                                        @foreach($parent as $p)
                                                            <option {{$page->parent_id == $p->id ? "selected" : null}} value="{{ $p->id }}">{{ $p->getFirstName->title }}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="form-actions col-12 text-right">
                                                <button type="submit" class="btn btn-raised btn-raised btn-primary">
                                                    <i class="fa fa-check-square-o"></i> Kaydet
                                                </button>
                                            </div>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="card-header">
                            <h4 class="card-title">Ek Alanlar</h4>
                            <p>Sayfaya tanımlı ek alanları görebilirsiniz.</p>
                        </div>
                        <div class="card-content">
                            <div class="card-body px-0">
                                <div class="text-right">
                                    <button type="button" class="js-addSpace btn btn-primary btn-lg" data-toggle="modal" data-target="#addField"><i class="fa fa-pencil"></i> Ekle</button>
                                </div>
                                <ul class="list-group customLists sortables mt-4"> 
                                    @if(count($fields)>0)
                                        @foreach($fields as $f)
                                            <li id="item-{{$f->id}}" class="list-group-item list-group-item-action d-block" data-content="{{$f->id}}">
                                                <div class="list_item px-2 d-flex justify-content-between align-items-center">
                                                    <span>{{$f->getFirstName->name}}</span>
                                                    <span>
                                                        
                                                        <a tabindex class="js-edit btn btn-xs btn-xxs px-3 py-2 btn-facebook"  data-id="{{$f->id}}"><i class="nav-icon i-Pen-2"></i></a> 
                                                        <a href="{{route('admin.deleteField',$f->id)}}" class="js-deleteField btn btn-xs btn-xxs px-3 py-2 btn-danger "><i class="nav-icon i-Close-Window"></i></a>
                                                    
                                                    </span>
                                                </div>
                                                <span class="d-block"><hr class="my-0"></span>
                                            </li>
                                        @endforeach
                                    @endif
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div> 
@endsection

@include("back/pages/fieldCreate")
@include("back/pages/fieldEdit")

@section("js")

    <script type="text/javascript">
        $(function(){
            $.ajaxSetup({
                headers:{
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });


            $( ".sortables" ).sortable({
                revert: true,
                handle: ".list_item",
                stop: function (event, ui) {
                    let data = $(this).sortable('toArray', {attribute: 'data-content'});
                    $.ajax({
                        type:"post",
                        method:"post",
                        data: {
                            data : data,
                        },
                        url: "{{ route('admin.fieldSortable') }}",
                        success: function (res) {

                            if(res.type == "success"){

                                toastr.success(
                                    res.message,
                                    res.head,
                                    {progressBar:!0}
                                )

                            }else {

                                toastr.warning(
                                    res.message,
                                    res.head,
                                    {progressBar:!0}
                                )

                            }
                        }
                    });

                }
            });


            $('.sortables').disableSelection();

        });

        $(".js-addSpace").click(function () {
            $(".js-edit_modal form")[0].reset();
            $(".js-inputType").addClass("d-none");
            $(".js-selectType").addClass("d-none");
            $(".js-edit_modal [name='id']").val("");
        });



        $(".js-edit").click(function () {
            let modal = $(".js-edit_modal");
            var id = $(this).data("id");
            $.ajax({
                type: 'post',
                url: '{{route("admin.getFieldWithId")}}',
                data: {
                    "id": id
                },
                success: function (success) {

                    let detail = success.fieldDetail;
                    modal.find("[name='type']").val(success.field.type).trigger("change");
                    modal.find("[name='id']").val(success.field.id);
                    $(detail).each(function (x,y){
                        modal.find("#name" + x).val(detail[x].name);
                        modal.find("#properties" + x).val(detail[x].properties);
                    });

                    modal.modal().show();

                }
            });

        });

        $(".js-selectedType select").on("change",function () {
            if($(this).val() == "checkbox" ||
                $(this).val() == "radio" ||
                $(this).val() == "select"
            ){
                $(".js-selectType").removeClass("d-none");
            }
            else{
                $(".js-selectType").addClass("d-none");
            }
        })
    </script>

@endsection
