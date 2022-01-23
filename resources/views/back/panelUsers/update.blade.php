@extends("back/layout")
@section("content")
    <div class="main-content">
        <div class="breadcrumb d-flex align-items-center justify-content-between">
            <h1>Kullanıcı Düzenle</h1>
        </div>
        <div class="separator-breadcrumb border-top"></div>
        <div class="card mb-4">
            <div class="card-body">
                <div class="col-lg-7 px-0">
                    <form action="{{route("admin.panel_users.update",$user->id)}}" enctype="multipart/form-data" class="row" method="post">
                        @csrf
                        @method("put ")
                        <div class="form-group col-lg-6">
                            <label for="name">@lang("variable.adi"):</label>
                            <input type="text" name="name" id="name" value="{{$user->name}}" class="form-control form-control-solid"/>
                        </div>
                        <div class="form-group col-lg-6">
                            <label for="surname">@lang("variable.soyadi"):</label>
                            <input type="text" name="surname" id="surname" value="{{$user->surname}}" class="form-control form-control-solid"/>
                        </div>
                        <div class="form-group col-lg-6">
                            <label for="email">@lang("variable.email"):</label>
                            <input type="email" name="email" id="email" value="{{$user->email}}" class="form-control form-control-solid"/>
                        </div>
                        {{--<div class="form-group col-lg-6">
                            <label for="permissions">İzinler:</label>
                            <input type="text" name="permissions" id="permissions" class="form-control form-control-solid"/>
                        </div>--}}
                        <div class="form-group col-lg-6">
                            <label for="type_id">Kullanıcı Tipi:</label>
                            <select name="type_id" id="type_id" required class="form-control form-control-solid">
                                <option value="">Kullanıcı Tipi Seçiniz</option>
                                @foreach($user_types as $u)
                                    <option {{$user->type_id == $u->id ? "selected" : null }} value="{{$u->id}}">{{$u->name}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group col-lg-12">
                            <label for="default_password">Mevcut Şifre:</label>
                            <input type="password" name="default_password" required id="default_password" class="form-control form-control-solid"/>
                        </div>
                        <div class="form-group col-lg-6">
                            <label for="password">Yeni Şifre:</label>
                            <input type="password" name="password" id="password" class="form-control form-control-solid"/>
                        </div>
                        <div class="form-group col-lg-6">
                            <label for="password_confirmation">Şifre Tekrarı:</label>
                            <input type="password" name="password_confirmation" id="password_confirmation" class="form-control form-control-solid"/>
                        </div>
                        <div class="form-group col-12">
                            <label for="img">Görsel:</label>
                            <input type="file" name="img" data-default-file="{{isset($user->image->img) ? asset("uploads/" . $user->image->img) : null}}" id="img" class="form-control form-control-solid dropify"/>
                        </div>
                        <div class="col-lg-12 text-right">
                            <button type="submit" class="btn btn-primary">Kaydet</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
