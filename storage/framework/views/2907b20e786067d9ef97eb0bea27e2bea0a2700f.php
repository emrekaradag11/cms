<form action="<?php echo e(route('admin.updateFieldData')); ?>" class="card-body pb-3" method="post">
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
                    <?php $__currentLoopData = $fields; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $f): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <?php if($f->type == "select"): ?>
                            <div class="col-12">
                                <div class="form-group">
                                    <label><?php echo e($f->fieldDetail[$l]->name); ?></label>
                                    <select name="<?php echo e($f->id); ?>[]" class="form-control">
                                        <?php $__currentLoopData = explode(',', $f->fieldDetail[$l]->properties); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $pr): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <option <?php echo e((!empty($fieldData[$f->id][$l]["text"]) && ($fieldData[$f->id][$l]["text"] == $pr))?"selected":null); ?> value="<?php echo e(@trim($pr)); ?>"><?php echo e(@trim($pr)); ?></option>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    </select>
                                </div>
                            </div>
                        <?php elseif($f->type == "radio"): ?>
                            <div class="col-12">
                                <div class="form-group">
                                    <label><?php echo e($f->fieldDetail[$l]->name); ?></label>
                                    <div class="d-block">
                                        <?php $__currentLoopData = explode(',', $f->fieldDetail[$l]->properties); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $ks => $pr): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <div class="custom-control pr-2 mb-2 d-inline-block custom-radio">
                                                <input type="radio" <?php echo e((!empty($fieldData[$f->id][$l]["text"]) && ($fieldData[$f->id][$l]["text"] == $pr))?"checked":null); ?> value="<?php echo e($pr); ?>" id="custom<?php echo e($ks . $k->lang_short); ?>" name="<?php echo e($f->id); ?>[]" class="custom-control-input">
                                                <label class="custom-control-label" for="custom<?php echo e($ks . $k->lang_short); ?>"><?php echo e($pr); ?></label>
                                            </div>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                                    </div>
                                </div>
                            </div>
                        <?php elseif($f->type == "checkbox"): ?>
                            <div class="col-12">
                                <div class="form-group">
                                    <label><?php echo e($f->fieldDetail[$l]->name); ?></label>
                                    <div class="d-block">
                                        <?php $__currentLoopData = explode(',', $f->fieldDetail[$l]->properties); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $ks => $pr): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <div class="custom-control pr-2 mb-2 d-inline-block custom-checkbox">
                                                <input type="checkbox" value="<?php echo e($pr); ?>" id="<?php echo e(Str::slug($pr, '-')); ?>" name="<?php echo e($f->id); ?>[]" class="custom-control-input">
                                                <label class="custom-control-label" for="<?php echo e(Str::slug($pr, '-')); ?>"><?php echo e($pr); ?></label>
                                            </div>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    </div>
                                </div>
                            </div>
                        <?php else: ?>
                            <div class="col-12">
                                <div class="form-group">
                                    <label><?php echo e($f->fieldDetail[$l]->name); ?></label>
                                    <input value="<?php echo e(!empty($fieldData[$f->id][$l]["text"])?$fieldData[$f->id][$l]["text"]:null); ?>" type="<?php echo e($f->type); ?>" name="<?php echo e($f->id); ?>[]" class="form-control">
                                </div>
                            </div>
                        <?php endif; ?>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </div>
            </div>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        <div class="col-12">
            <div class="form-group text-right">
                <input type="hidden" name="page_id" value="<?php echo e($field_page_id); ?>">
                <input type="hidden" name="parent_id" value="<?php echo e($field_parent); ?>">
                <button type="submit" class="btn btn-primary">Kaydet</button>
            </div>
        </div>
    </div>
</form>
<?php /**PATH /Users/emrekaradag/Desktop/cms/resources/views/back/fields/edit.blade.php ENDPATH**/ ?>