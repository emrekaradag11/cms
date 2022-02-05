<?php $__env->startSection("content"); ?> 
    <div class="breadcrumb">
        <h1 class="mr-2">Site Ayarları</h1> 
    </div>
    <div class="separator-breadcrumb border-top"></div>
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body"> 
                    <form class="form row" method="post" enctype="multipart/form-data" action="<?php echo e(route('admin.settings.post')); ?>">
                        <div class="col-lg-8">
                            <?php echo csrf_field(); ?>
                            <?php echo method_field("POST"); ?>
                            <ul class="nav col-12 nav-tabs m-0">
                                <?php $__currentLoopData = $lng; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $l): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <li class="nav-item">
                                        <a class="text-uppercase nav-link <?php echo e($l->id == 1 ? 'active' : null); ?>" id="tab_<?php echo e($l->id); ?>" data-toggle="tab" aria-controls="tabpane_<?php echo e($l->id); ?>" href="#tabpane_<?php echo e($l->id); ?>"><?php echo e($l->lang_short); ?></a>
                                    </li>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </ul>
                            <div class="tab-content col-12 px-0 m-0">
                                <?php $__currentLoopData = $lng; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $l => $k): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <div class="tab-pane px-0  <?php echo e($k->id == 1 ? 'active' : null); ?>" id="tabpane_<?php echo e($k->id); ?>" aria-labelledby="tabpane_<?php echo e($k->id); ?>">
                                        <div class="row">
                                            <div class="col-md-6 col-12">
                                                <div class="form-group">
                                                    <label for="title<?php echo e($l); ?>">Site Title (<?php echo e($k->lang_short); ?>)</label>
                                                    <input type="text" id="title<?php echo e($l); ?>" class="form-control" name="title[]" value="<?php echo e($data[0]->getDetail[$l]->option); ?>">
                                                </div>
                                            </div>
                                            <div class="col-md-6 col-12">
                                                <div class="form-group">
                                                    <label for="keywords<?php echo e($l); ?>">Keywords (<?php echo e($k->lang_short); ?>)</label>
                                                    <input type="text" id="keywords<?php echo e($l); ?>" class="form-control" name="keywords[]" value="<?php echo e($data[1]->getDetail[$l]->option); ?>">
                                                </div>
                                            </div>
                                            <div class="col-md-6 col-12">
                                                <div class="form-group">
                                                    <label for="description<?php echo e($l); ?>">Description (<?php echo e($k->lang_short); ?>)</label>
                                                    <input type="text" id="description<?php echo e($l); ?>" class="form-control" name="description[]" value="<?php echo e($data[2]->getDetail[$l]->option); ?>">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                <div class="row mt-5"> 
                                    <div class="col-md-6 col-12">
                                        <div class="form-group">
                                            <label for="default_lang">Varsayılan Dil</label>
                                            <select name="default_lang" class="form-control" id="default_lang">
                                                <?php $__currentLoopData = $lng; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $l => $k): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                    <option <?php echo e($data[3]->getDetail[0]->option == $k->id ? 'selected' : null); ?> value="<?php echo e($k->id); ?>"><?php echo e(strtoupper($k->lang_short)); ?></option>
                                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-6 col-12">
                                        <div class="form-group">
                                            <label for="landing">Bakım Aşaması</label>
                                            <select name="landing" class="form-control" id="landing">
                                                <option <?php echo e($data[4]->getDetail[0]->option == '0' ? 'selected' : null); ?> value="0">Pasif</option>
                                                <option <?php echo e($data[4]->getDetail[0]->option == '1' ? 'selected' : null); ?> value="1">Aktif</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-6 col-12">
                                        <div class="form-group">
                                            <label for="facebook">Facebook </label>
                                            <input type="text" id="facebook" class="form-control" name="facebook" value="<?php echo e($data[5]->getDetail[0]->option); ?>">
                                        </div>
                                    </div>
                                    <div class="col-md-6 col-12">
                                        <div class="form-group">
                                            <label for="twitter">Twitter </label>
                                            <input type="text" id="twitter" class="form-control" name="twitter" value="<?php echo e($data[6]->getDetail[0]->option); ?>">
                                        </div>
                                    </div>
                                    <div class="col-md-6 col-12">
                                        <div class="form-group">
                                            <label for="instagram">Instagram </label>
                                            <input type="text" id="instagram" class="form-control" name="instagram" value="<?php echo e($data[7]->getDetail[0]->option); ?>">
                                        </div>
                                    </div>
                                    <div class="col-md-6 col-12">
                                        <div class="form-group">
                                            <label for="linkedin">Linked-in </label>
                                            <input type="text" id="linkedin" class="form-control" name="linkedin" value="<?php echo e($data[8]->getDetail[0]->option); ?>">
                                        </div>
                                    </div>
                                    <div class="col-md-6 col-12">
                                        <div class="form-group">
                                            <label for="youtube">Youtube </label>
                                            <input type="text" id="youtube" class="form-control" name="youtube" value="<?php echo e($data[9]->getDetail[0]->option); ?>">
                                        </div>
                                    </div>
                                    <div class="col-md-6 col-12">
                                        <div class="form-group">
                                            <label for="tiktok">Tiktok </label>
                                            <input type="text" id="tiktok" class="form-control" name="tiktok" value="<?php echo e($data[10]->getDetail[0]->option); ?>">
                                        </div>
                                    </div>
                                    <div class="col-md-6 col-12">
                                        <div class="form-group">
                                            <label for="pinterest">Pinterest </label>
                                            <input type="text" id="pinterest" class="form-control" name="pinterest" value="<?php echo e($data[11]->getDetail[0]->option); ?>">
                                        </div>
                                    </div>
                                    <div class="col-md-6 col-12">
                                        <div class="form-group">
                                            <label for="telegram">Telegram </label>
                                            <input type="text" id="telegram" class="form-control" name="telegram" value="<?php echo e($data[12]->getDetail[0]->option); ?>">
                                        </div>
                                    </div>
                                    <div class="col-md-6 col-12">
                                        <div class="form-group">
                                            <label for="medium">Medium </label>
                                            <input type="text" id="medium" class="form-control" name="medium" value="<?php echo e($data[13]->getDetail[0]->option); ?>">
                                        </div>
                                    </div>
                                    <div class="col-12 mt-4 text-right"> 
                                        <button type="submit" class="btn btn-raised btn-raised btn-primary"> Kaydet </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div> 
<?php $__env->stopSection(); ?>

<?php echo $__env->make("back.layout", \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /Users/emrekaradag/Desktop/cms/resources/views/back/settings/index.blade.php ENDPATH**/ ?>