@extends("back.layout")
@section("content")
    <div class="col-12">
        <div class="card">
            <div class="card-header">
                <h4 class="card-title d-flex justify-content-between align-items-center">{{$page->getFirstName->title}} Düzenle<a class="btn btn-success btn-sm" href="tree/{{$page->id}}">Geri Dön</a></h4>
            </div>

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
                            <div class="card-content">
                                <div class="card-body">
                                    <form class="form row" method="post" enctype="multipart/form-data" action="/admin/tree/{{$data->id}}">
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
                                                    <div class="tab-pane px-0  {{$k->id==1?'active':null}}" id="tabpane_{{$k->id}}" aria-labelledby="tabpane_{{$k->id}}">
                                                        <div class="row">
                                                            <div class="col-12">
                                                                <div class="form-group">
                                                                    <label for="title{{$l}}">Başlık ({{$lng[$l]["lang_short"]}})</label>
                                                                    <input type="text" id="title{{$l}}" class="form-control" value="{{!empty($data->getDetail[$l]->title)?$data->getDetail[$l]->title:null}}" name="title[]">
                                                                </div>
                                                            </div>
                                                            <div class="col-md-6 col-12">
                                                                <div class="form-group">
                                                                    <label for="description{{$l}}">Description ({{$lng[$l]["lang_short"]}})</label>
                                                                    <input type="text" value="{{!empty($data->getDetail[$l]->description)?$data->getDetail[$l]->description:null}}" id="description{{$l}}" class="form-control" name="description[]">
                                                                </div>
                                                            </div>
                                                            <div class="col-md-6 col-12">
                                                                <div class="form-group">
                                                                    <label for="keywords{{$l}}">Keywords ({{$lng[$l]["lang_short"]}})</label>
                                                                    <input type="text" value="{{!empty($data->getDetail[$l]->keywords)?$data->getDetail[$l]->keywords:null}}" id="keywords{{$l}}" class="form-control" name="keywords[]">
                                                                </div>
                                                            </div>

                                                            <div class="col-12 form-group">
                                                                <label for="text{{$l}}">Text ({{$k->lang_short}})</label>
                                                                <div class="d-block">
                                                                    <textarea name="text[]" id="text{{$l}}" rows="10" cols="80">{{!empty($data->getDetail[$l]->text)?$data->getDetail[$l]->text:null}}</textarea>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                @endforeach
                                            </div>
                                            <div class="row">
                                                <div class="col-md-6 col-12">
                                                    <div class="form-group">
                                                        <label for="parent">Üst Veri</label>
                                                        <select name="parent" class="form-control" id="parent">
                                                            <option {{$data->getDetail[$l]->parent == "0"?"selected":null}} value="0">Üst Kategori</option>
                                                            @foreach($tree as $t)
                                                                <option {{$data->getDetail[$l]->parent == $t?"selected":null}} value="{{$t->id}}">{{$t->getFirstName->title}}</option>
                                                            @endforeach
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="col-md-6 col-12">
                                                    <div class="form-group">
                                                        <label for="type">Tip</label>
                                                        <select name="type" class="form-control" id="type">
                                                            <option {{$data->getDetail[$l]->parent == "1"?"selected":null}} value="1">İçerik</option>
                                                            <option {{$data->getDetail[$l]->parent == "0"?"selected":null}} value="0">Kategori</option>
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="row form-group">
                                                <div class="col-12">
                                                    <input type="hidden" name="imgParent" value="{{$data->id}}">
                                                    <input type="hidden" name="imgType" value="1">
                                                    <input type="hidden" name="imgDeleted">
                                                    <input type="hidden" name="imgSlugName" value="{{$data->getFirstName->title}}">
                                                    <input type="hidden" name="imgID" value="{{!empty($homeImg[0]->id)?$homeImg[0]->id:null}}">
                                                    <input type="file" class="dropify" data-default-file="{{!empty($homeImg[0]->img)?url("img/" .$homeImg[0]->img):null}}" data-height="300" name="file" />
                                                </div>
                                            </div>
                                            <div class="form-actions col-12 text-right">
                                                <input type="hidden" name="page_id" value="{{$page->id}}">
                                                <input type="hidden" name="id" value="{{$data->id}}">
                                                <button type="submit" class="btn btn-raised btn-raised btn-primary">
                                                    <i class="fa fa-check-square-o"></i> Save
                                                </button>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-4">

                            @if(count($fields)>0)
                                @include("back.fields.edit" , ['field_page_id' => $page->id,'field_parent' => $data->id])
                            @endif

                        </div>
                    </div>
                </div>
                <div class="tab-pane px-0" id="tabpaneCont_2" aria-labelledby="tabpaneCont_2">
                    <div class="col-12">
                        <div class="card-body px-1">
                            <form action="{{Route("setImg")}}" class="dropzone  dropzone-area"  method="post" enctype="multipart/form-data" id="dpz-multiple-files">
                                @csrf
                                <input type="hidden" name="imgParent" value="{{$data->id}}">
                                <input type="hidden" name="page_id" value="{{$page->id}}">
                                <input type="hidden" name="imgType" value="2">
                                <input type="hidden" name="imgSlugName" value="{{$data->getFirstName->title}}">
                                <div class="dz-message">Görselleri sürükleyip bırakın</div>
                            </form>
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


        var drEvent = $('.dropify').dropify();

        drEvent.on('dropify.afterClear', function(event, element){
            $("[name='imgDeleted']").val("1");
        });



        Dropzone.options.dpzMultipleFiles = {
            paramName: "file", // The name that will be used to transfer the file
            maxFilesize: 5, // MB
            clickable: true,
            addRemoveLinks: true,
            acceptedFiles: "image/jpeg,image/png,image/gif",
            dictRemoveFile: " Trash",
            removedfile: function(file)
            {

                $.ajax({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    type: 'POST',
                    url: '{{Route("deleteImg")}}',
                    data: {
                        imgID: file.id,
                        page_id : "{{$page->id}}"
                    },
                    success: function (data){
                        console.log("File has been successfully removed!!");
                    },
                    error: function(e) {
                        //console.log(e);
                    }});
                var fileRef;
                return (fileRef = file.previewElement) != null ?
                    fileRef.parentNode.removeChild(file.previewElement) : void 0;
            },
            @if(!empty($img))
            init: function() {
                var thisDropzone = this;
                @foreach($img as $im)
                var mockFile = { id: '{{$im->id}}', name: '{{$im->img}}', size: {{filesize("img/" . $im->img)}}, type: '{{image_type_to_mime_type(exif_imagetype("img/" . $im->img))}}' };
                thisDropzone.emit("addedfile", mockFile);
                thisDropzone.emit("success", mockFile);
                thisDropzone.emit("complete",mockFile);
                thisDropzone.emit("thumbnail", mockFile, "{{url("img/" . $im->img)}}");
                @endforeach
                    this.on("maxfilesexceeded", function(file){
                    this.removeFile(file);
                    alert("No more files please!");
                });
            }
            @endif
        }


    </script>
@endsection

@section("css")
    <link rel="stylesheet" type="text/css" href="/back/app-assets/vendors/css/dropzone.min.css">
    <link rel="stylesheet" type="text/css" href="/back/app-assets/vendors/css/katex.min.css">
    <link rel="stylesheet" type="text/css" href="/back/app-assets/vendors/css/monokai-sublime.min.css">
    <link rel="stylesheet" type="text/css" href="/back/dropify/css/dropify.min.css">
@endsection
