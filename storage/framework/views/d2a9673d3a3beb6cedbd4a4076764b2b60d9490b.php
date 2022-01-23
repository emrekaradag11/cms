<?php $__env->startSection("content"); ?>


    <div class="main-content">
        <div class="breadcrumb d-flex align-items-center justify-content-between">
            <h1><?php echo e($page->getFirstName->title); ?> Ekle</h1>
            <a class="btn btn-primary btn-rounded" href="<?php echo e(url()->previous()); ?>">Geri Dön</a>
        </div>
        <div class="separator-breadcrumb border-top"></div>
        <div class="card mb-4">
            <div class="card-body">
                <div class="row">
                    <div class="col-lg-8"> 
                        <form method="post" class="row" enctype="multipart/form-data" action="<?php echo e(route('admin.tree.store')); ?>">
                            <div class="col-12">
                                <?php echo csrf_field(); ?>
                                <?php echo method_field("post"); ?>
                                <ul class="nav col-12 nav-tabs m-0">
                                    <?php $__currentLoopData = $lng; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $l): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <li class="nav-item">
                                            <a class="text-uppercase nav-link <?php echo e($l->id==1?'active':null); ?>" id="tab_<?php echo e($l->id); ?>" data-toggle="tab" aria-controls="tabpane_<?php echo e($l->id); ?>" href="#tabpane_<?php echo e($l->id); ?>"><?php echo e($l->lang_short); ?></a>
                                        </li>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </ul>
                                <div class="tab-content col-12 px-0 m-0">
                                    <?php $__currentLoopData = $lng; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $l => $k): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <div class="tab-pane px-0 <?php echo e($k->id==1?'active':null); ?>" id="tabpane_<?php echo e($k->id); ?>" aria-labelledby="tabpane_<?php echo e($k->id); ?>">
                                            <div class="row">
                                                <div class="col-md-6 col-12">
                                                    <div class="form-group">
                                                        <label for="title<?php echo e($l); ?>">Başlık (<?php echo e($k->lang_short); ?>)</label>
                                                        <input required type="text" id="title<?php echo e($l); ?>" class="form-control" name="title[]">
                                                    </div>
                                                </div>
                                                <div class="col-md-6 col-12">
                                                    <div class="form-group">
                                                        <label for="title<?php echo e($l); ?>">Slug (<?php echo e($k->lang_short); ?>)</label>
                                                        <input required type="text" id="title<?php echo e($l); ?>" class="form-control" name="slug[]">
                                                    </div>
                                                </div>
                                                <div class="col-md-6 col-12">
                                                    <div class="form-group">
                                                        <label for="description<?php echo e($l); ?>">Description (<?php echo e($k->lang_short); ?>)</label>
                                                        <input type="text" id="description<?php echo e($l); ?>" class="form-control" name="description[]">
                                                    </div>
                                                </div>
                                                <div class="col-md-6 col-12">
                                                    <div class="form-group">
                                                        <label for="keywords<?php echo e($l); ?>">Keywords (<?php echo e($k->lang_short); ?>)</label>
                                                        <input type="text" id="keywords<?php echo e($l); ?>" class="form-control" name="keywords[]">
                                                    </div>
                                                </div>

                                                <div class="col-12 form-group">
                                                    <label for="text<?php echo e($l); ?>">Text (<?php echo e($k->lang_short); ?>)</label>
                                                    <div class="d-block">
                                                        <textarea name="text[]" id="text<?php echo e($l); ?>" rows="10" cols="80"></textarea>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </div>
                                <div class="row">
                                    <div class="col-md-6 col-12">
                                        <div class="form-group">
                                            <label for="parent_id">Üst Veri</label>
                                            <select name="parent_id" class="form-control" id="parent_id">
                                                <option value="0">Üst Kategori</option>
                                                <?php $__currentLoopData = $tree; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $t): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                    <option value="<?php echo e($t->id); ?>"><?php echo e($t->getFirstName->title); ?></option>
                                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-6 col-12">
                                        <div class="form-group">
                                            <label for="type">Tip</label>
                                            <select name="type" class="form-control" id="type">
                                                <option value="1">İçerik</option>
                                                <option value="0">Kategori</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-actions col-12 text-right">
                                    <input type="hidden" name="page_id" value="<?php echo e($page->id); ?>">
                                    <button type="submit" class="btn btn-raised btn-raised btn-primary">
                                        <i class="fa fa-check-square-o"></i> Save
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                    <div class="col-lg-4">

                    </div>
                </div>
            </div>
        </div>
    </div>
    
<?php $__env->stopSection(); ?>



<?php $__env->startSection("js"); ?>
    <script src="/back/app-assets/vendors/js/katex.min.js" type="text/javascript"></script>
    <script src="/back/app-assets/vendors/js/highlight.min.js" type="text/javascript"></script>
    <script src="/back/app-assets/vendors/ckeditor/ckeditor.js" type="text/javascript"></script>
    <script src="/back/app-assets/vendors/js/dropzone.min.js" type="text/javascript"></script>
    <script src="/back/dropify/js/dropify.min.js"></script>
    <script>
        $(document).ready(function () {
            <?php $__currentLoopData = $lng; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $l => $k): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            CKEDITOR.replace( 'text<?php echo e($l); ?>' );
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                CKEDITOR.config.height = 400;
            $('.dropify').dropify();
        });
    </script>
<?php $__env->stopSection(); ?>

<?php $__env->startSection("css"); ?>
    <link rel="stylesheet" type="text/css" href="/back/app-assets/vendors/css/dropzone.min.css">
    <link rel="stylesheet" type="text/css" href="/back/app-assets/vendors/css/katex.min.css">
    <link rel="stylesheet" type="text/css" href="/back/app-assets/vendors/css/monokai-sublime.min.css">
    <link rel="stylesheet" type="text/css" href="/back/dropify/css/dropify.min.css">
<?php $__env->stopSection(); ?>

<?php echo $__env->make("back.layout", \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /Users/emrekaradag/Desktop/cms/resources/views/back/tree/create.blade.php ENDPATH**/ ?>