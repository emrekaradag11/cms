@extends("back.layout")
@section("content")


    <div class="main-content">
        <div class="breadcrumb d-flex align-items-center justify-content-between">
            <h1>{{$page->getFirstName->title}} Ekle</h1>
            <a class="btn btn-primary btn-rounded" href="{{url()->previous()}}">Geri Dön</a>
        </div>
        <div class="separator-breadcrumb border-top"></div>
        <div class="card mb-4">
            <div class="card-body">
                <div class="row">
                    <div class="col-lg-8"> 
                        <form method="post" class="row" enctype="multipart/form-data" action="{{route('admin.tree.store')}}">
                            <div class="col-12">
                                @csrf
                                @method("post")
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
                                                        <label for="title{{$l}}">Başlık ({{$k->lang_short}})</label>
                                                        <input required type="text" id="title{{$l}}" class="form-control" name="title[]">
                                                    </div>
                                                </div>
                                                <div class="col-md-6 col-12">
                                                    <div class="form-group">
                                                        <label for="slug{{$l}}">Slug ({{$k->lang_short}})</label>
                                                        <input required type="text" id="slug{{$l}}" class="form-control" name="slug[]">
                                                    </div>
                                                </div>
                                                <div class="col-md-6 col-12">
                                                    <div class="form-group">
                                                        <label for="description{{$l}}">Description ({{$k->lang_short}})</label>
                                                        <input type="text" id="description{{$l}}" class="form-control" name="description[]">
                                                    </div>
                                                </div>
                                                <div class="col-md-6 col-12">
                                                    <div class="form-group">
                                                        <label for="keywords{{$l}}">Keywords ({{$k->lang_short}})</label>
                                                        <input type="text" id="keywords{{$l}}" class="form-control" name="keywords[]">
                                                    </div>
                                                </div>

                                                <div class="col-12 form-group">
                                                    <label for="text{{$l}}">Text ({{$k->lang_short}})</label>
                                                    <div class="d-block">
                                                        <textarea name="text[]" id="text{{$l}}" rows="10" cols="80"></textarea>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    @endforeach
                                </div>
                                <div class="row">
                                    <div class="col-md-6 col-12">
                                        <div class="form-group">
                                            <label for="parent_id">Üst Veri</label>
                                            <select name="parent_id" class="form-control" id="parent_id">
                                                <option value="0">Üst Kategori</option>
                                                @foreach($tree as $t)
                                                    <option value="{{$t->id}}">{{$t->getFirstName->title}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-6 col-12">
                                        <div class="form-group">
                                            <label for="type">Tip</label>
                                            <select name="type" class="form-control" id="type">
                                                <option value="1">İçerik</option>
                                                <option value="0">Kategori</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-actions col-12 text-right">
                                    <input type="hidden" name="page_id" value="{{$page->id}}">
                                    <button type="submit" class="btn btn-raised btn-raised btn-primary">
                                        <i class="fa fa-check-square-o"></i> Save
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                    <div class="col-lg-4">

                    </div>
                </div>
            </div>
        </div>
    </div>
    
@endsection



@section("js")
    <script src="/back/app-assets/vendors/js/katex.min.js" type="text/javascript"></script>
    <script src="/back/app-assets/vendors/js/highlight.min.js" type="text/javascript"></script>
    <script src="/back/app-assets/vendors/ckeditor/ckeditor.js" type="text/javascript"></script>
    <script src="/back/app-assets/vendors/js/dropzone.min.js" type="text/javascript"></script>
    <script src="/back/dropify/js/dropify.min.js"></script>
    <script>
        $(document).ready(function () {
            @foreach($lng as $l => $k)
            CKEDITOR.replace( 'text{{$l}}' );
            @endforeach
                CKEDITOR.config.height = 400;
            $('.dropify').dropify();
        });
    </script>
@endsection

@section("css")
    <link rel="stylesheet" type="text/css" href="/back/app-assets/vendors/css/dropzone.min.css">
    <link rel="stylesheet" type="text/css" href="/back/app-assets/vendors/css/katex.min.css">
    <link rel="stylesheet" type="text/css" href="/back/app-assets/vendors/css/monokai-sublime.min.css">
    <link rel="stylesheet" type="text/css" href="/back/dropify/css/dropify.min.css">
@endsection
