<?php $__env->startSection("content"); ?>
    <div class="main-content">
        <div class="breadcrumb d-flex align-items-center justify-content-between">
            <h1>Kullanıcı Düzenle</h1>
        </div>
        <div class="separator-breadcrumb border-top"></div>
        <div class="card mb-4">
            <div class="card-body">
                <div class="col-lg-7 px-0">
                    <form action="<?php echo e(route("admin.panel_users.update",$user->id)); ?>" enctype="multipart/form-data" class="row" method="post">
                        <?php echo csrf_field(); ?>
                        <?php echo method_field("put "); ?>
                        <div class="form-group col-lg-6">
                            <label for="name"><?php echo app('translator')->get("variable.adi"); ?>:</label>
                            <input type="text" name="name" id="name" value="<?php echo e($user->name); ?>" class="form-control form-control-solid"/>
                        </div>
                        <div class="form-group col-lg-6">
                            <label for="surname"><?php echo app('translator')->get("variable.soyadi"); ?>:</label>
                            <input type="text" name="surname" id="surname" value="<?php echo e($user->surname); ?>" class="form-control form-control-solid"/>
                        </div>
                        <div class="form-group col-lg-6">
                            <label for="email"><?php echo app('translator')->get("variable.email"); ?>:</label>
                            <input type="email" name="email" id="email" value="<?php echo e($user->email); ?>" class="form-control form-control-solid"/>
                        </div>
                        
                        <div class="form-group col-lg-6">
                            <label for="type_id">Kullanıcı Tipi:</label>
                            <select name="type_id" id="type_id" required class="form-control form-control-solid">
                                <option value="">Kullanıcı Tipi Seçiniz</option>
                                <?php $__currentLoopData = $user_types; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $u): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <option <?php echo e($user->type_id == $u->id ? "selected" : null); ?> value="<?php echo e($u->id); ?>"><?php echo e($u->name); ?></option>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </select>
                        </div>
                        <div class="form-group col-lg-12">
                            <label for="default_password">Mevcut Şifre:</label>
                            <input type="password" name="default_password" required id="default_password" class="form-control form-control-solid"/>
                        </div>
                        <div class="form-group col-lg-6">
                            <label for="password">Yeni Şifre:</label>
                            <input type="password" name="password" id="password" class="form-control form-control-solid"/>
                        </div>
                        <div class="form-group col-lg-6">
                            <label for="password_confirmation">Şifre Tekrarı:</label>
                            <input type="password" name="password_confirmation" id="password_confirmation" class="form-control form-control-solid"/>
                        </div>
                        <div class="form-group col-12">
                            <label for="img">Görsel:</label>
                            <input type="file" name="img" data-default-file="<?php echo e(isset($user->image->img) ? asset("uploads/" . $user->image->img) : null); ?>" id="img" class="form-control form-control-solid dropify"/>
                        </div>
                        <div class="col-lg-12 text-right">
                            <button type="submit" class="btn btn-primary">Kaydet</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make("back/layout", \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /Users/emrekaradag/Desktop/cms/resources/views/back/panelUsers/update.blade.php ENDPATH**/ ?>