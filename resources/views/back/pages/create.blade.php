@extends("back.layout")
@section("content")


    <div class="main-content">
        <div class="breadcrumb d-flex align-items-center justify-content-between">
            <h1>Menü Ekle</h1> 
            <a class="btn btn-primary btn-rounded" href="{{url()->previous()}}">Geri Dön</a>
        </div>
        <div class="separator-breadcrumb border-top"></div>
        <div class="card mb-4">
            <div class="card-body">
                <div class="col-lg-7 px-0">
                    <form action="{{route('admin.pages.store')}}" method="post" class="form row" enctype="multipart/form-data">
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
                                    <div class="tab-pane px-0  {{$k->id==1?'active':null}}" id="tabpane_{{$k->id}}" aria-labelledby="tabpane_{{$k->id}}">
                                        <div class="row">
                                            <div class="col-md-6 col-12">
                                                <div class="form-group">
                                                    <label for="head">Sayfa İsmi ({{$k->lang_short}})</label>
                                                    <input type="text" id="head" class="form-control" name="title[]">
                                                </div>
                                            </div>
                                            <div class="col-md-6 col-12">
                                                <div class="form-group">
                                                    <label for="description">Description ({{$k->lang_short}})</label>
                                                    <input type="text" id="description" class="form-control" name="description[]">
                                                </div>
                                            </div>
                                            <div class="col-md-6 col-12">
                                                <div class="form-group">
                                                    <label for="keywords">Keywords ({{$k->lang_short}})</label>
                                                    <input type="text" id="keywords" class="form-control" name="keywords[]">
                                                </div>
                                            </div>
                                            <div class="col-md-6 col-12">
                                                <div class="form-group">
                                                    <label for="keywords">Link ({{$k->lang_short}})</label>
                                                    <input type="text" id="keywords" class="form-control" name="slug[]">
                                                </div>
                                            </div>

                                            <div class="col-12">
                                                <div class="form-group">
                                                    <label>Açıklama :</label>
                                                    <textarea class="form-control" name="text[]" id="" cols="30" rows="6"></textarea>
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
                                            <option value="1">Text</option>
                                            <option value="2">Tree</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-6 col-12">
                                    <div class="form-group">
                                        <label for="redirect">Redirect</label>
                                        <input type="text" id="redirect" class="form-control" name="redirect">
                                    </div>
                                </div>
                                <div class="col-md-6 col-12">
                                    <div class="form-group">
                                        <label for="parent">Üst Sayfa</label>
                                        <select name="parent_id" class="form-control" id="parent">
                                            <option value="0">Ana Menü</option>
                                            @foreach($parent as $p)
                                                <option value="{{$p->id}}">{{$p->getFirstName->title}}</option>
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
    </div> 
@endsection

