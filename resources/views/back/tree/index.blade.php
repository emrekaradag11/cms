@extends("back.layout")
@section("content") 
    <div class="main-content">
        <div class="breadcrumb d-flex align-items-center justify-content-between">
            <h1>{{$page->getFirstName->title}}</h1>
            <a href="{{route('admin.tree.creates',$page->id)}}" class="btn btn-primary btn-rounded">Ekle {{$page->getFirstName->title}}</a>
        </div>
        <div class="separator-breadcrumb border-top"></div>
        <div class="card">
            <div class="card-body">
                <section class="ul-contact-page">  
                    @include("back.tree.subCategory",["tree" => $tree])
                </section>
            </div>
        </div>
    </div> 
@endsection
@section("js")
    <script type="text/javascript">
        $(".js_delete").on("click",function () {
            $(".js_delete_form").attr("action","tree/" + $(this).data("id")).submit();
        })

        $( ".sortables" ).sortable({
            revert: true,
            handle: ".list_item",
            stop: function (event, ui) {
                let data = $(this).sortable('toArray', {attribute: 'data-content'});
                $.ajax({
                    type:"post",
                    method:"post",
                    data: {
                        data : data,
                    },
                    url: "{!!route('admin.tree.sortable')!!}",
                    success: function (res) {

                        if(res.type == "success"){

                            toastr.success(
                                res.message,
                                res.head,
                                {progressBar:!0}
                            )

                        }else {

                            toastr.warning(
                                res.message,
                                res.head,
                                {progressBar:!0}
                            )

                        }
                    }
                });

            }
        });

        $('.sortables').disableSelection();

        $(document).on("click",".js-hidden",function (){
            item = $(this);
            $.ajax({
                type:"post",
                method:"post",
                data: {
                    id : this.dataset.id,
                    hidden : this.dataset.hidden,
                },
                url: "{!!route('admin.tree.hidden')!!}",
                success: function (res) {
                    item.find("i").removeAttr("class").addClass("fa " + res.icon);
                }
            });
        });

    </script>
@endsection
