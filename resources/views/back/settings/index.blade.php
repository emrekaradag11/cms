@extends("back.layout")

@section("content") 
    <div class="breadcrumb">
        <h1 class="mr-2">Site Ayarları</h1> 
    </div>
    <div class="separator-breadcrumb border-top"></div>
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body"> 
                    <form class="form row" method="post" enctype="multipart/form-data" action="{{ route('admin.settings.post') }}">
                        <div class="col-lg-8">
                            @csrf
                            @method("POST")
                            <ul class="nav col-12 nav-tabs m-0">
                                @foreach($lng as $l)
                                    <li class="nav-item">
                                        <a class="text-uppercase nav-link {{ $l->id == 1 ? 'active' : null }}" id="tab_{{ $l->id }}" data-toggle="tab" aria-controls="tabpane_{{ $l->id }}" href="#tabpane_{{ $l->id }}">{{ $l->lang_short }}</a>
                                    </li>
                                @endforeach
                            </ul>
                            <div class="tab-content col-12 px-0 m-0">
                                @foreach($lng as $l => $k)
                                    <div class="tab-pane px-0  {{ $k->id == 1 ? 'active' : null }}" id="tabpane_{{ $k->id }}" aria-labelledby="tabpane_{{ $k->id }}">
                                        <div class="row">
                                            <div class="col-md-6 col-12">
                                                <div class="form-group">
                                                    <label for="title{{$l}}">Site Title ({{ $k->lang_short }})</label>
                                                    <input type="text" id="title{{$l}}" class="form-control" name="title[]" value="{{ $data[0]->getDetail[$l]->option }}">
                                                </div>
                                            </div>
                                            <div class="col-md-6 col-12">
                                                <div class="form-group">
                                                    <label for="keywords{{$l}}">Keywords ({{ $k->lang_short }})</label>
                                                    <input type="text" id="keywords{{$l}}" class="form-control" name="keywords[]" value="{{ $data[1]->getDetail[$l]->option }}">
                                                </div>
                                            </div>
                                            <div class="col-md-6 col-12">
                                                <div class="form-group">
                                                    <label for="description{{$l}}">Description ({{ $k->lang_short }})</label>
                                                    <input type="text" id="description{{$l}}" class="form-control" name="description[]" value="{{ $data[2]->getDetail[$l]->option }}">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                                <div class="row mt-5"> 
                                    <div class="col-md-6 col-12">
                                        <div class="form-group">
                                            <label for="default_lang">Varsayılan Dil</label>
                                            <select name="default_lang" class="form-control" id="default_lang">
                                                @foreach($lng as $l => $k)
                                                    <option {{ $data[3]->getDetail[0]->option == $k->id ? 'selected' : null }} value="{{ $k->id }}">{{ strtoupper($k->lang_short) }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-6 col-12">
                                        <div class="form-group">
                                            <label for="landing">Bakım Aşaması</label>
                                            <select name="landing" class="form-control" id="landing">
                                                <option {{ $data[4]->getDetail[0]->option == '0' ? 'selected' : null }} value="0">Pasif</option>
                                                <option {{ $data[4]->getDetail[0]->option == '1' ? 'selected' : null }} value="1">Aktif</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-6 col-12">
                                        <div class="form-group">
                                            <label for="facebook">Facebook </label>
                                            <input type="text" id="facebook" class="form-control" name="facebook" value="{{ $data[5]->getDetail[0]->option }}">
                                        </div>
                                    </div>
                                    <div class="col-md-6 col-12">
                                        <div class="form-group">
                                            <label for="twitter">Twitter </label>
                                            <input type="text" id="twitter" class="form-control" name="twitter" value="{{ $data[6]->getDetail[0]->option }}">
                                        </div>
                                    </div>
                                    <div class="col-md-6 col-12">
                                        <div class="form-group">
                                            <label for="instagram">Instagram </label>
                                            <input type="text" id="instagram" class="form-control" name="instagram" value="{{ $data[7]->getDetail[0]->option }}">
                                        </div>
                                    </div>
                                    <div class="col-md-6 col-12">
                                        <div class="form-group">
                                            <label for="linkedin">Linked-in </label>
                                            <input type="text" id="linkedin" class="form-control" name="linkedin" value="{{ $data[8]->getDetail[0]->option }}">
                                        </div>
                                    </div>
                                    <div class="col-md-6 col-12">
                                        <div class="form-group">
                                            <label for="youtube">Youtube </label>
                                            <input type="text" id="youtube" class="form-control" name="youtube" value="{{ $data[9]->getDetail[0]->option }}">
                                        </div>
                                    </div>
                                    <div class="col-md-6 col-12">
                                        <div class="form-group">
                                            <label for="tiktok">Tiktok </label>
                                            <input type="text" id="tiktok" class="form-control" name="tiktok" value="{{ $data[10]->getDetail[0]->option }}">
                                        </div>
                                    </div>
                                    <div class="col-md-6 col-12">
                                        <div class="form-group">
                                            <label for="pinterest">Pinterest </label>
                                            <input type="text" id="pinterest" class="form-control" name="pinterest" value="{{ $data[11]->getDetail[0]->option }}">
                                        </div>
                                    </div>
                                    <div class="col-md-6 col-12">
                                        <div class="form-group">
                                            <label for="telegram">Telegram </label>
                                            <input type="text" id="telegram" class="form-control" name="telegram" value="{{ $data[12]->getDetail[0]->option }}">
                                        </div>
                                    </div>
                                    <div class="col-md-6 col-12">
                                        <div class="form-group">
                                            <label for="medium">Medium </label>
                                            <input type="text" id="medium" class="form-control" name="medium" value="{{ $data[13]->getDetail[0]->option }}">
                                        </div>
                                    </div>
                                    <div class="col-12 mt-4 text-right"> 
                                        <button type="submit" class="btn btn-raised btn-raised btn-primary"> Kaydet </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div> 
@endsection
