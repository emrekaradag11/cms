@extends("back.layout")
@section("content")
    <div class="breadcrumb d-flex align-items-center justify-content-between">
        <h1 class="mr-2">Durum Listesi</h1>
        <div class="col-auto">
            <a tabindex="" data-toggle="modal" data-target="#addStatus" class="btn btn-primary btn-rounded">Durum Ekle</a>
            <a tabindex="" data-toggle="modal" data-target="#addStatusType" class="btn btn-primary btn-rounded">Durum Tipi Ekle</a>
        </div>
    </div>
    <div class="separator-breadcrumb border-top"></div>
    <label for="" class="text-white rounded px-4 py-1 bg-danger">Buradaki durumlar silinemez</label>

    <div class="col-12 px-0">
        <div class="card text-left">
            <div class="card-body">
                <ul class="list-group customLists">
                    @foreach($status_list as $s)
                        <li class="list-group-item list-group-item-action" id="item-{{$s->id}}" data-content="{{$s->id}}">
                            <div class="d-flex align-items-center justify-content-between customListElement">
                                <div class="col-auto">
                                    <span class="customListNumber">{{$s->id}}</span>
                                    <strong>{{$s->title}}</strong>
                                </div>
                                <div class="col-auto">
                                    <a tabindex data-info="{{$s}}" class="btn btn-xs btn-xxs px-3 py-2 btn-facebook js-edit"><i class="nav-icon i-Pen-2"></i></a>
                                </div>
                            </div>
                        </li>
                    @endforeach
                </ul>
            </div>
        </div>
    </div>



    <div class="modal fade" id="addStatus" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <form action="{{route("admin.addStatusList")}}" method="post" class="modal-content">
                @csrf
                <div class="modal-header">
                    <h5 class="modal-title">Durum Ekle</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <label>Durum Adı <span class="text-danger">*</span></label>
                        <input type="text" required class="form-control" name="title" placeholder="Lütfen Durum Adı Girin">
                    </div>
                    <div class="form-group">
                        <label>Durum Tipi <span class="text-danger">*</span></label>
                        <select class="form-control" required name="status_type_id">
                            <option value="">Durum tipi Seçiniz</option>
                            @foreach($status_list_types as $s)
                                <option value="{{$s->id}}">{{$s->title}}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary">Kaydet</button>
                </div>
            </form>
        </div>
    </div>

    <div class="modal fade" id="addStatusType" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <form action="{{route("admin.addStatusListType")}}" method="post" class="modal-content">
                @csrf
                <div class="modal-header">
                    <h5 class="modal-title">Durum Tipi Ekle</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <label>Durum Tipi <span class="text-danger">*</span></label>
                        <input type="text" name="title" required class="form-control" placeholder="Lütfen Durum Tipini Girin">
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary">Kaydet</button>
                </div>
            </form>
        </div>
    </div>

@endsection
