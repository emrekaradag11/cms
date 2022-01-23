


 <ul class="list-group customLists sortables">
    <?php $__currentLoopData = $tree; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $t): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <li class="list-group-item list-group-item-action" id="item-<?php echo e($t->id); ?>" data-content="<?php echo e($t->id); ?>">
            <div class="d-flex align-items-center justify-content-between customListElement">
                <strong><?php echo e($t->getFirstName->title); ?></strong>
                <div>
                    <a tabindex href="<?php echo e(route('admin.tree.edits',[ $t->id, $t->page_id ])); ?>" class="btn btn-xs btn-xxs px-3 py-2 btn-success"><i class="nav-icon i-Pen-2"></i></a>
                    <a href="javascript:void(0);" data-id="<?php echo e($t->id); ?>" class="btn btn-xs btn-xxs px-3 py-2 btn-danger js_delete"><i class="nav-icon i-Close-Window"></i></a>
                    <a data-id="<?php echo e($t->id); ?>" data-hidden="<?php echo e($t->hidden == '1' ? '0' : '1'); ?>" tabindex class="btn js-hidden btn-sm btn-raised btn-icon btn-vimeo my-0 mr-1"> <i class="fa <?php echo e($t->hidden == '1' ? 'fa-eye-slash' : 'fa-eye'); ?>"></i> </a>
                    <a tabindex class="btn btn-xs btn-xxs px-3 py-2 btn-info list_item"><i class="nav-icon i-Arrow-Cross"></i></a>
                </div>
            </div>

            <?php if(count($t->getSubControl)>0): ?>
                <ul class="list-group customLists sortables">
                    <?php echo $__env->make("back.tree.subCategory",["tree" => $t->getSubCategories], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                </ul>
            <?php endif; ?>
        </li>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?> 
</ul>
<?php /**PATH /Users/emrekaradag/Desktop/cms/resources/views/back/tree/subCategory.blade.php ENDPATH**/ ?>