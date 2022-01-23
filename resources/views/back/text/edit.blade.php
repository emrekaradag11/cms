@extends("back.layout")
@section("content")


    <div class="main-content">
        <div class="breadcrumb d-flex align-items-center justify-content-between">
            <h1>{{$page->getFirstName->title}}</h1> 
        </div>
        <div class="separator-breadcrumb border-top"></div>
        <div class="card mb-4">
            <div class="card-body">
                <div class="row">
                    <div class="col-12">
                        <ul class="nav row nav-tabs tabVol2 m-0">
                            <li class="nav-item">
                                <a class="text-uppercase nav-link active" id="tabCont_1" data-toggle="tab" aria-controls="tabpaneCont_1" href="#tabpaneCont_1">Genel Bilgiler</a>
                            </li>
                            <li class="nav-item">
                                <a class="text-uppercase nav-link" id="tabCont_2" data-toggle="tab" aria-controls="tabpaneCont_2" href="#tabpaneCont_2">Görseller</a>
                            </li>
                        </ul>
                    </div>
                    <div class="tab-content col-12 px-0 m-0">
                        <div class="tab-pane px-0 active" id="tabpaneCont_1" aria-labelledby="tabpaneCont_1">
                            <div class="row">
                                <div class="col-lg-8">
                                    <form action="{{route('admin.text.update',$page->id)}}" method="post" enctype="multipart/form-data" class="card-body pb-3">
                                        @csrf
                                        @method('PUT')
                                        <ul class="nav col-12 nav-tabs m-0">
                                            @foreach($lng as $l)
                                                <li class="nav-item">
                                                    <a class="text-uppercase nav-link {{$l->id==1?'active':null}}" id="tab_{{$l->id}}" data-toggle="tab" aria-controls="tabpane_{{$l->id}}" href="#tabpane_{{$l->id}}">{{$l->lang_short}}</a>
                                                </li>
                                            @endforeach
                                        </ul>
                                        <div class="tab-content col-12 px-0 m-0">
                                            @foreach($lng as $l => $k)
                                                <div class="tab-pane px-0  {{$k->id==1?'active':null}}" id="tabpane_{{$k->id}}" aria-labelledby="tabpane_{{$k->id}}">
                                                    <div class="row form-group">
                                                        <div class="col-12">
                                                            <div class="form-group">
                                                                <label for="description{{$l}}">Description ({{$k->lang_short}})</label>
                                                                <input type="text" id="description{{$l}}" class="form-control" name="description[]" value="{{!empty($page->getDetail[$l]->description)?$page->getDetail[$l]->description:null}}">
                                                            </div>
                                                        </div>
                                                        <div class="col-12">
                                                            <div class="form-group">
                                                                <label for="keywords{{$l}}">Keywords ({{$k->lang_short}})</label>
                                                                <input type="text" id="keywords{{$l}}" class="form-control" name="keywords[]" value="{{!empty($page->getDetail[$l]->keywords)?$page->getDetail[$l]->keywords:null}}">
                                                            </div>
                                                        </div>
                                                        <div class="col-12 form-group">
                                                            <label for="text{{$l}}">Content ({{$k->lang_short}})</label>
                                                            <div class="d-block">
                                                                <textarea name="text[]" id="text{{$l}}" rows="10" cols="80">{{!empty($page->getDetail[$l]->text)?$page->getDetail[$l]->text:null}}</textarea>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            @endforeach
                                        </div> 
                                        <div class="row form-group">
                                            <div class="col-12 form-group text-right">
                                                <input type="hidden" name="page_id" value="{{$page->id}}">
                                                <button type="submit" class="btn btn-primary">Kaydet</button>
                                            </div>
                                        </div>
                                    </form>
                                </div>

                                <div class="col-lg-4">

                                    @if(count($fields)>0)
                                        @include("back.fields.edit" , ['field_page_id' => $page->id,"field_parent"=>$page->id])
                                    @endif

                                </div>
                            </div>
                        </div>
                        <div class="tab-pane px-0" id="tabpaneCont_2" aria-labelledby="tabpaneCont_2">
                            <div class="col-12">
                                <div class="card-body px-1"> 
                                    <form class="dropzone dropzone-area form-group" enctype="multipart/form-data" method="post" id="multple-file-upload" action="{{route("admin.text.uploadPictures")}}">
                                        @csrf
                                        <input type="hidden" name="id" value="{{$page->id}}">
                                    </form>
                                </div>
                            </div>
                        </div>
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

        Dropzone.autoDiscover = false;

        var myDropzone = new Dropzone(".dropzone", {
            paramName: "file", // The name that will be used to transfer the file
            maxFilesize: 5, // MB
            clickable: true,
            addRemoveLinks: true,
            acceptedFiles: "image/jpeg,image/png,image/gif",
            removedfile: function(file)
            {

                $.ajax({
                    type: 'POST',
                    url: '{{Route("admin.deleteImages")}}',
                    data: {
                        id: file.id,
                    },
                    success: function (data){
                        //console.log(data);
                    },
                    error: function(e) {
                        //console.log(e);
                    }});
                var fileRef;
                return (fileRef = file.previewElement) != null ?
                    fileRef.parentNode.removeChild(file.previewElement) : void 0;
            },
            @if(isset($pictures) && !empty($pictures))
            init: function() {
                var thisDropzone = this;

                @foreach($pictures as $p)
                    var mockFile = {
                        id: '{{$p->id}}',
                        name: '{{$p->img}}',
                        size: {{filesize(public_path("uploads/" . $p->img))}},
                        type: '{{image_type_to_mime_type(exif_imagetype("uploads/" . $p->img))}}'
                    };
                    thisDropzone.emit("addedfile", mockFile);
                    thisDropzone.emit("success", mockFile);
                    thisDropzone.emit("complete",mockFile);
                    thisDropzone.emit("thumbnail", mockFile, "{{url("uploads/" . $p->img)}}");
                @endforeach

                $(".dz-preview").each(function (){
                    $(this).attr("data-content",$(this).find("[data-dz-id]").html());
                })

                this.on("maxfilesexceeded", function(file){
                    this.removeFile(file);
                    alert("No more files please!");
                });

            }
            @endif
        });

        /*
        $( ".dropzone" ).sortable({
            revert: true,
            items:'.dz-preview',
            cursor: 'move',
            opacity: 0.5,
            containment: '.dropzone',
            distance: 20,
            tolerance: 'pointer',
            stop: function (event, ui) {
                let data = $(this).sortable('toArray', {attribute: 'data-content'});
                $.ajax({
                    type:"post",
                    method:"post",
                    data: {
                        data : data,
                    },
                    url: "{!!route('admin.img.sortable')!!}",
                    success: function (res) {
                        console.log(res)
                    }
                });
            }
        });*/
    </script>
@endsection


@section("css")
    <link rel="stylesheet" type="text/css" href="/back/app-assets/vendors/css/dropzone.min.css">
    <link rel="stylesheet" type="text/css" href="/back/app-assets/vendors/css/katex.min.css">
    <link rel="stylesheet" type="text/css" href="/back/app-assets/vendors/css/monokai-sublime.min.css">
    <link rel="stylesheet" type="text/css" href="/back/dropify/css/dropify.min.css">
@endsection

