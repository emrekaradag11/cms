@extends("back.layout")

@section("content")

    <div class="breadcrumb">
        <h1 class="mr-2">Eklentiler</h1> 
    </div>
    <div class="separator-breadcrumb border-top"></div>
    <form method="post" action="{{route('admin.plugin.update')}}" class="row">
        @csrf

        @foreach($plugins as $p) 
            <div class="col-lg-3">
                <div class="card card-profile-1 mb-4">
                    <div class="card-body text-center">
                        <div class="avatar box-shadow-2 mb-3 text bg-dark text-white"> {{mb_substr($p->name,0,1)}} </div>
                        <h5 class="mb-4">{{$p->name}}</h5> 
                        @if($p->id == 1)
                            <div class="form-group">
                                <label>Whatsapp Numarası</label>
                                <input class="form-control" type="text" name="data[{{$p->id}}][options][{{$p->pluginDetail[0]->id}}]" value="{{$p->pluginDetail[0]->option ?? ''}}">
                                <p class="text-warning mb-0 mt-1">Ülke Kodu ile Telefon Numarasını Girin</p>
                            </div>
                            <div class="form-group">
                                <label>WhatsApp Mesaj Başlığı</label>
                                <input class="form-control" type="text" name="data[{{$p->id}}][options][{{$p->pluginDetail[1]->id}}]" value="{{$p->pluginDetail[1]->option ?? ''}}">
                            </div>
                            <div class="form-group">
                                <label>WhatsApp Popup Mesajı</label>
                                <textarea class="form-control" rows="3" name="data[{{$p->id}}][options][{{$p->pluginDetail[2]->id}}]">{{$p->pluginDetail[2]->option ?? ''}}</textarea>
                            </div>
                        @else 
                            <div class="form-group">
                                <label>{{$p->name}} Script</label>
                                <textarea class="form-control" rows="8" name="data[{{$p->id}}][options][{{$p->pluginDetail[0]->id}}]">{{$p->pluginDetail[0]->option ?? ''}}</textarea>
                                @if($p->id == 2)
                                    <p class="text-warning mb-0 mt-1">Tawk.to'yu etkinleştirirseniz, WhatsApp devre dışı bırakılmalıdır. </p>
                                @endif
                            </div>
                        @endif
                        <div class="switches mt-4">
                            <label class="switch switch-success mr-3">
                                <span>Aktif</span>
                                <input type="radio" name="data[{{$p->id}}][status_id]" value="1" {{$p->status_id == '1' ? 'checked' : null}} >
                                <span class="slider"></span>
                            </label>
                            <label class="switch switch-danger mr-3">
                                <span>Pasif</span>
                                <input type="radio" name="data[{{$p->id}}][status_id]" value="0" {{$p->status_id == '0' ? 'checked' : null}} >
                                <span class="slider"></span>
                            </label>
                        </div>
                    </div>
                </div>
            </div> 
        @endforeach
        <div class="col-12 text-center">
            <button type="submit" class="btn btn-success btn-xl">Kaydet</button>
        </div>
    </form> 
@endsection
