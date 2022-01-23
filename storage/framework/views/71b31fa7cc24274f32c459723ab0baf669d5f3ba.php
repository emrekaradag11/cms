<?php $__env->startSection("content"); ?>
    <div class="main-content">
        <div class="breadcrumb d-flex align-items-center justify-content-between">
            <h1>Menüler</h1>
            <a href="<?php echo e(route('admin.pages.create')); ?>" class="btn btn-primary btn-rounded">Menü Ekle</a>
        </div>
        <div class="separator-breadcrumb border-top"></div>
        <div class="card">
            <div class="card-body">
                <section class="ul-contact-page">  
                    <?php echo $__env->make("back.pages.subCategory",["pages" => $pages], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?> 
                </section>
            </div>
        </div>
    </div>

    <form action="" class="d-none js_delete_form" method="POST">
        <?php echo csrf_field(); ?>
        <?php echo method_field('DELETE'); ?>
    </form>

    <script>
        $(document).on("click",".js_delete",function () {
            $('.js_delete_form').attr("action",$(this).data("info").deleteRoute).submit();
        });
    </script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make("back/layout", \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /Users/emrekaradag/Desktop/cms/resources/views/back/pages/index.blade.php ENDPATH**/ ?>