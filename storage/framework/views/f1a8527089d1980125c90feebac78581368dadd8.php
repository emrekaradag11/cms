<?php $__env->startSection("content"); ?>
    <div class="main-content">
        <div class="breadcrumb d-flex align-items-center justify-content-between">
            <h1>Kullanıcılar</h1>
            <a href="<?php echo e(route("admin.panel_users.create")); ?>" class="btn btn-primary btn-rounded">Kullanıcı Ekle</a>
        </div>
        <div class="separator-breadcrumb border-top"></div>
        <section class="ul-contact-page">
            <div class="row">

                <?php $__currentLoopData = $data; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $d): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <?php
                        $d->deleteRoute = route("admin.panel_users.destroy",$d->id);
                    ?>
                    <div class="col-lg-4 col-xl-4 mb-3">
                        <div class="card">
                            <div class="card-body">
                                <div class="ul-contact-page__profile">
                                    <div class="user-profile"><img class="profile-picture mb-2" src="<?php echo e(isset($d->image->img) ? asset("uploads/" . $d->image->img) : null); ?>" alt="alt"></div>
                                    <div class="ul-contact-page__info">
                                        <p class="m-0 text-24"><?php echo e($d->name . " " . $d->surname); ?></p>
                                        <p class="text-muted m-0"><?php echo e($d->getUserTypeName->name); ?></p>
                                        <div class="text-muted mt-3 text-right">
                                            <a href="<?php echo e(route("admin.panel_users.edit",$d->id)); ?>" class="btn btn-xs btn-xxs px-3 py-2 btn-facebook"><i class="nav-icon i-Pen-2"></i></a>
                                            <a tabindex data-info="<?php echo e($d); ?>" class="btn btn-xs btn-xxs px-3 py-2 btn-danger js_delete"><i class="nav-icon i-Close-Window"></i></a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </div>
        </section>
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

<?php echo $__env->make("back/layout", \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /Users/emrekaradag/Desktop/cms/resources/views/back/panelUsers/index.blade.php ENDPATH**/ ?>