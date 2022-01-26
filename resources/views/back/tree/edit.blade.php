@extends("back.layout")
@section("content")

    <div class="main-content">
        <div class="breadcrumb d-flex align-items-center justify-content-between">
            <h1>{{$page->getFirstName->title}} Düzenle</h1>
            <a class="btn btn-primary btn-rounded" href="{{url()->previous()}}">Geri Dön</a>
        </div>
        <div class="separator-breadcrumb border-top"></div>
        <div class="card">
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
                                    <div class="card-content">
                                        <div class="card-body">
                                            <form class="form row" method="post" enctype="multipart/form-data" action="{{route('admin.tree.update',$data->id)}}">
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
                                                            <div class="tab-pane px-0  {{ $k->id == 1 ? 'active' : null }}" id="tabpane_{{ $k->id }}" aria-labelledby="tabpane_{{ $k->id }}">
                                                                <div class="row">
                                                                    <div class="col-md-6 col-12">
                                                                        <div class="form-group">
                                                                            <label for="title{{ $l }}">Başlık ({{$k->lang_short}})</label>
                                                                            <input required type="text" id="title{{ $l }}" class="form-control" value="{{ $data->getDetail[$l] ? $data->getDetail[$l]->title : null }}" name="title[]">
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-md-6 col-12">
                                                                        <div class="form-group">
                                                                            <label for="slug{{ $l }}">Slug ({{$k->lang_short}})</label>
                                                                            <input required type="text" id="slug{{ $l }}" class="form-control" value="{{ $data->getDetail[$l] ? $data->getDetail[$l]->slug : null }}" name="slug[]">
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-md-6 col-12">
                                                                        <div class="form-group">
                                                                            <label for="description{{ $l }}">Description ({{ $k->lang_short }})</label>
                                                                            <input type="text" value="{{ $data->getDetail[$l] ? $data->getDetail[$l]->description : null }}" id="description{{ $l }}" class="form-control" name="description[]">
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-md-6 col-12">
                                                                        <div class="form-group">
                                                                            <label for="keywords{{ $l }}">Keywords ({{ $k->lang_short }})</label>
                                                                            <input type="text" value="{{ $data->getDetail[$l] ? $data->getDetail[$l]->keywords : null }}" id="keywords{{ $l }}" class="form-control" name="keywords[]">
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-12 form-group">
                                                                        <label for="text{{ $l }}">Text ({{ $k->lang_short }})</label>
                                                                        <div class="d-block">
                                                                            <textarea name="text[]" id="text{{ $l }}" rows="10" cols="80">{{ $data->getDetail[$l] ? $data->getDetail[$l]->text : null }}</textarea>
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
                                                                    <option {{ $data->getDetail[$l]->parent_id == "0" ? "selected" : null }} value="0">Üst Kategori</option>
                                                                    @foreach($tree as $t)
                                                                        <option {{ $data->getDetail[$l]->parent_id == $t ? "selected" : null }} value="{{ $t->id }}">{{ $t->getFirstName->title }}</option>
                                                                    @endforeach
                                                                </select>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-6 col-12">
                                                            <div class="form-group">
                                                                <label for="type">Tip</label>
                                                                <select name="type" class="form-control" id="type">
                                                                    <option {{ $data->getDetail[$l]->type == "1" ? "selected" : null }} value="1">İçerik</option>
                                                                    <option {{ $data->getDetail[$l]->type == "0" ? "selected" : null }} value="0">Kategori</option>
                                                                </select>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    
                                                    <div class="form-actions col-12 px-0 mt-4 text-right"> 
                                                        <button type="submit" class="btn btn-raised btn-raised btn-primary">
                                                            <i class="fa fa-check-square-o"></i> Kaydet
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
                                    <form action="{{ route('admin.tree.uploadPictures') }}" class="dropzone  dropzone-area"  method="post" enctype="multipart/form-data" id="dpz-multiple-files">
                                        @csrf
                                        <input type="hidden" name="id" value="{{ $data->id }}"> 
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
    <script>
        $(document).ready(function () {
            @foreach($lng as $l => $k) 
                ClassicEditor
                .create( document.querySelector( '#text{{$l}}' ) )
                .catch( error => {
                    //console.error( error );
                } );
            @endforeach 
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
            
            @if($data->image()->count() > 0)

            init: function() {
                var thisDropzone = this; 
                @foreach($data->image()->get() as $im)
                    var mockFile = { id: '{{$im->id}}', name: '{{$im->img}}', size: {{filesize("uploads/" . $im->img)}}, type: '{{image_type_to_mime_type(exif_imagetype("uploads/" . $im->img))}}' };
                    thisDropzone.emit("addedfile", mockFile);
                    thisDropzone.emit("success", mockFile);
                    thisDropzone.emit("complete",mockFile);
                    thisDropzone.emit("thumbnail", mockFile, "{{url("uploads/" . $im->img)}}");
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
