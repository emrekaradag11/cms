<?php $__env->startSection("content"); ?> 
    <div class="main-content">
        <div class="breadcrumb d-flex align-items-center justify-content-between">
            <h1><?php echo e($page->getFirstName->title); ?></h1>
            <a href="<?php echo e(route('admin.tree.creates',$page->id)); ?>" class="btn btn-primary btn-rounded">Ekle <?php echo e($page->getFirstName->title); ?></a>
        </div>
        <div class="separator-breadcrumb border-top"></div>
        <div class="card">
            <div class="card-body">
                <section class="ul-contact-page">  
                    <?php echo $__env->make("back.tree.subCategory",["tree" => $tree], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                </section>
            </div>
        </div>
    </div> 
<?php $__env->stopSection(); ?>
<?php $__env->startSection("js"); ?>
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
                    url: "<?php echo route('admin.tree.sortable'); ?>",
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
                url: "<?php echo route('admin.tree.hidden'); ?>",
                success: function (res) {
                    item.find("i").removeAttr("class").addClass("fa " + res.icon);
                }
            });
        });

    </script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make("back.layout", \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /Users/emrekaradag/Desktop/cms/resources/views/back/tree/index.blade.php ENDPATH**/ ?>