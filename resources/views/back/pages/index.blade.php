@extends("back/layout")
@section("content")
    <div class="main-content">
        <div class="breadcrumb d-flex align-items-center justify-content-between">
            <h1>Menüler</h1>
            <a href="{{route('admin.pages.create')}}" class="btn btn-primary btn-rounded">Menü Ekle</a>
        </div>
        <div class="separator-breadcrumb border-top"></div>
        <div class="card">
            <div class="card-body">
                <section class="ul-contact-page">  
                    @include("back.pages.subCategory",["pages" => $pages]) 
                </section>
            </div>
        </div>
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
