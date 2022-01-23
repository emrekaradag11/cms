<div class="modal fade" id="addField" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Alan Ekle</h5>
                <button type="button" class="close" data-dismiss="modal"
                        aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form class="form row" method="post" enctype="multipart/form-data" action="<?php echo e(Route('admin.setField')); ?>">
                    <?php echo csrf_field(); ?>
                    <ul class="nav col-12 nav-tabs m-0 px-3">
                        <?php $__currentLoopData = $lng; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $l): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <li class="nav-item">
                                <a class="text-uppercase nav-link <?php echo e($l->id==1?'active':null); ?>" id="tab_<?php echo e($l->id); ?>_add" data-toggle="tab" aria-controls="tabpane_<?php echo e($l->id); ?>_add" href="#tabpane_<?php echo e($l->id); ?>_add"><?php echo e($l->lang_short); ?></a>
                            </li>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </ul>
                    <div class="tab-content col-12 m-0">
                        <?php $__currentLoopData = $lng; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $l => $k): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <div class="tab-pane px-0  <?php echo e($k->id==1?'active':null); ?>" id="tabpane_<?php echo e($k->id); ?>_add" aria-labelledby="tabpane_<?php echo e($k->id); ?>_add">
                                <div class="row">
                                    <div class="col-12">
                                        <div class="form-group">
                                            <label for="name<?php echo e($l); ?>">Alan İsmi (<?php echo e($k->lang_short); ?>)</label>
                                            <input type="text" id="name<?php echo e($l); ?>" required class="form-control" name="name[]">
                                        </div>
                                    </div>
                                    <div class="col-12 js-selectType d-none">
                                        <div class="form-group">
                                            <label for="properties<?php echo e($l); ?>">Özellikler</label>
                                            <div class="d-block">
                                                <textarea id="properties<?php echo e($l); ?>" name="properties[]" class="form-control" cols="30" rows="5"></textarea>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </div>
                    <div class="col-12 js-selectedType">
                        <div class="form-group">
                            <label for="type">Alan Tipi</label>
                            <select name="type" class="form-control" required id="type">
                                <option>Lütfen Seçiniz</option>
                                <option value="checkbox">Checkbox (Çoklu Özellik Çoklu Seçim)</option>
                                <option value="radio">Radio Buton (Çoklu Özellik Tekli Seçim)</option>
                                <option value="select">Selectbox</option>
                                <option value="textarea">Textarea (Büyük Yazı Alanı)</option>
                                <option value="text">Text (Yazı)</option>
                                <option value="number">Sayı</option>
                                <option value="color">Renk</option>
                                <option value="date">Tarih</option>
                                <option value="month">Tarih (Ay)</option>
                                <option value="week">Tarih (Hafta)</option>
                                <option value="datetime-local">Tarih ve Saat</option>
                                <option value="email">E-Posta</option>
                                <option value="file">Dosya</option>
                                <option value="number">Sayı</option>
                                <option value="range">Aralık Seçimi</option>
                                <option value="tel">Telefon Numarası</option>
                                <option value="time">Time (Saat)</option>
                                <option value="url">Url (Web Site Uzantısı)</option>
                            </select>
                        </div>
                    </div>
                    <input type="hidden" name="page_id" value="<?php echo e($page->id); ?>">
                    <div class="col-12 text-right">
                        <button type="submit" class="btn btn-raised btn-raised btn-primary">
                            <i class="fa fa-check-square-o"></i> Save
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<?php /**PATH /Users/emrekaradag/Desktop/cms/resources/views/back/pages/fieldCreate.blade.php ENDPATH**/ ?>