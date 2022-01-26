<?php $__env->startSection("content"); ?>


    <div class="main-content">
        <div class="breadcrumb d-flex align-items-center justify-content-between">
            <h1>Menü Ekle</h1> 
            <a class="btn btn-primary btn-rounded" href="<?php echo e(url()->previous()); ?>">Geri Dön</a>
        </div>
        <div class="separator-breadcrumb border-top"></div>
        <div class="card mb-4">
            <div class="card-body">
                <div class="col-lg-7 px-0">
                    <form action="<?php echo e(route('admin.pages.store')); ?>" method="post" class="form row" enctype="multipart/form-data">
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
                                    <div class="tab-pane px-0  <?php echo e($k->id==1?'active':null); ?>" id="tabpane_<?php echo e($k->id); ?>" aria-labelledby="tabpane_<?php echo e($k->id); ?>">
                                        <div class="row">
                                            <div class="col-md-6 col-12">
                                                <div class="form-group">
                                                    <label for="head">Sayfa İsmi (<?php echo e($k->lang_short); ?>)</label>
                                                    <input type="text" id="head" class="form-control" name="title[]">
                                                </div>
                                            </div>
                                            <div class="col-md-6 col-12">
                                                <div class="form-group">
                                                    <label for="description">Description (<?php echo e($k->lang_short); ?>)</label>
                                                    <input type="text" id="description" class="form-control" name="description[]">
                                                </div>
                                            </div>
                                            <div class="col-md-6 col-12">
                                                <div class="form-group">
                                                    <label for="keywords">Keywords (<?php echo e($k->lang_short); ?>)</label>
                                                    <input type="text" id="keywords" class="form-control" name="keywords[]">
                                                </div>
                                            </div>
                                            <div class="col-md-6 col-12">
                                                <div class="form-group">
                                                    <label for="keywords">Link (<?php echo e($k->lang_short); ?>)</label>
                                                    <input type="text" id="keywords" class="form-control" name="slug[]">
                                                </div>
                                            </div>

                                            <div class="col-12">
                                                <div class="form-group">
                                                    <label>Açıklama :</label>
                                                    <textarea class="form-control" name="text[]" id="" cols="30" rows="6"></textarea>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </div>
                            <div class="row">
                                <div class="col-md-6 col-12">
                                    <div class="form-group">
                                        <label for="template">Sayfa Şablonu</label>
                                        <select name="template" class="form-control" id="template">
                                            <option value="1">Text</option>
                                            <option value="2">Tree</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-6 col-12">
                                    <div class="form-group">
                                        <label for="redirect">Redirect</label>
                                        <input type="text" id="redirect" class="form-control" name="redirect">
                                    </div>
                                </div>
                                <div class="col-md-6 col-12">
                                    <div class="form-group">
                                        <label for="parent">Üst Sayfa</label>
                                        <select name="parent_id" class="form-control" id="parent">
                                            <option value="0">Ana Menü</option>
                                            <?php $__currentLoopData = $parent; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $p): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                <option value="<?php echo e($p->id); ?>"><?php echo e($p->getFirstName->title); ?></option>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-actions col-12 text-right">
                                    <button type="submit" class="btn btn-raised btn-raised btn-primary">
                                        <i class="fa fa-check-square-o"></i> Kaydet
                                    </button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div> 
    </div> 
<?php $__env->stopSection(); ?>


<?php echo $__env->make("back.layout", \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /Users/emrekaradag/Desktop/cms/resources/views/back/pages/create.blade.php ENDPATH**/ ?>