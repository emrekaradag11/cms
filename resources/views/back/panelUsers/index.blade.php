@extends("back/layout")
@section("content")
    <div class="main-content">
        <div class="breadcrumb d-flex align-items-center justify-content-between">
            <h1>Kullanıcılar</h1>
            <a href="{{route("admin.panel_users.create")}}" class="btn btn-primary btn-rounded">Kullanıcı Ekle</a>
        </div>
        <div class="separator-breadcrumb border-top"></div>
        <section class="ul-contact-page">
            <div class="row">

                @foreach($data as $d)
                    @php
                        $d->deleteRoute = route("admin.panel_users.destroy",$d->id);
                    @endphp
                    <div class="col-lg-4 col-xl-4 mb-3">
                        <div class="card">
                            <div class="card-body">
                                <div class="ul-contact-page__profile">
                                    <div class="user-profile"><img class="profile-picture mb-2" src="{{isset($d->image->img) ? asset("uploads/" . $d->image->img) : null}}" alt="alt"></div>
                                    <div class="ul-contact-page__info">
                                        <p class="m-0 text-24">{{$d->name . " " . $d->surname}}</p>
                                        <p class="text-muted m-0">{{$d->getUserTypeName->name}}</p>
                                        <div class="text-muted mt-3 text-right">
                                            <a href="{{route("admin.panel_users.edit",$d->id)}}" class="btn btn-xs btn-xxs px-3 py-2 btn-facebook"><i class="nav-icon i-Pen-2"></i></a>
                                            <a tabindex data-info="{{$d}}" class="btn btn-xs btn-xxs px-3 py-2 btn-danger js_delete"><i class="nav-icon i-Close-Window"></i></a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </section>
    </div>

    <form action="" class="d-none js_delete_form" method="POST">
        @csrf
        @method('DELETE')
    </form>

    <script>
        $(document).on("click",".js_delete",function () {
            $('.js_delete_form').attr("action",$(this).data("info").deleteRoute).submit();
        });
    </script>
@endsection
