<?php $__env->startSection("content"); ?>

    <div class="breadcrumb">
        <h1 class="mr-2">Eklentiler</h1> 
    </div>
    <div class="separator-breadcrumb border-top"></div>
    <form method="post" action="<?php echo e(route('admin.plugin.update')); ?>" class="row">
        <?php echo csrf_field(); ?>

        <?php $__currentLoopData = $plugins; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $p): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?> 
            <div class="col-lg-3">
                <div class="card card-profile-1 mb-4">
                    <div class="card-body text-center">
                        <div class="avatar box-shadow-2 mb-3 text bg-dark text-white"> <?php echo e(mb_substr($p->name,0,1)); ?> </div>
                        <h5 class="mb-4"><?php echo e($p->name); ?></h5> 
                        <?php if($p->id == 1): ?>
                            <div class="form-group">
                                <label>Whatsapp Numarası</label>
                                <input class="form-control" type="text" name="data[<?php echo e($p->id); ?>][options][<?php echo e($p->pluginDetail[0]->id); ?>]" value="<?php echo e($p->pluginDetail[0]->option ?? ''); ?>">
                                <p class="text-warning mb-0 mt-1">Ülke Kodu ile Telefon Numarasını Girin</p>
                            </div>
                            <div class="form-group">
                                <label>WhatsApp Mesaj Başlığı</label>
                                <input class="form-control" type="text" name="data[<?php echo e($p->id); ?>][options][<?php echo e($p->pluginDetail[1]->id); ?>]" value="<?php echo e($p->pluginDetail[1]->option ?? ''); ?>">
                            </div>
                            <div class="form-group">
                                <label>WhatsApp Popup Mesajı</label>
                                <textarea class="form-control" rows="3" name="data[<?php echo e($p->id); ?>][options][<?php echo e($p->pluginDetail[2]->id); ?>]"><?php echo e($p->pluginDetail[2]->option ?? ''); ?></textarea>
                            </div>
                        <?php else: ?> 
                            <div class="form-group">
                                <label><?php echo e($p->name); ?> Script</label>
                                <textarea class="form-control" rows="8" name="data[<?php echo e($p->id); ?>][options][<?php echo e($p->pluginDetail[0]->id); ?>]"><?php echo e($p->pluginDetail[0]->option ?? ''); ?></textarea>
                                <?php if($p->id == 2): ?>
                                    <p class="text-warning mb-0 mt-1">Tawk.to'yu etkinleştirirseniz, WhatsApp devre dışı bırakılmalıdır. </p>
                                <?php endif; ?>
                            </div>
                        <?php endif; ?>
                        <div class="switches mt-4">
                            <label class="switch switch-success mr-3">
                                <span>Aktif</span>
                                <input type="radio" name="data[<?php echo e($p->id); ?>][status_id]" value="1" <?php echo e($p->status_id == '1' ? 'checked' : null); ?> >
                                <span class="slider"></span>
                            </label>
                            <label class="switch switch-danger mr-3">
                                <span>Pasif</span>
                                <input type="radio" name="data[<?php echo e($p->id); ?>][status_id]" value="0" <?php echo e($p->status_id == '0' ? 'checked' : null); ?> >
                                <span class="slider"></span>
                            </label>
                        </div>
                    </div>
                </div>
            </div> 
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        <div class="col-12 text-center">
            <button type="submit" class="btn btn-success btn-xl">Kaydet</button>
        </div>
    </form> 
<?php $__env->stopSection(); ?>

<?php echo $__env->make("back.layout", \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /Users/emrekaradag/Desktop/cms/resources/views/back/plugin/index.blade.php ENDPATH**/ ?>