

 <ul class="list-group customLists sortables">
    <?php $__currentLoopData = $pages; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $p): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?> 
        <li class="list-group-item list-group-item-action" id="item-<?php echo e($p->id); ?>" data-content="<?php echo e($p->id); ?>">
            <div class="d-flex align-items-center justify-content-between customListElement">
                <strong><?php echo e($p->getFirstName->title); ?> (Şablon <?php echo e($p->template); ?>)</strong>
                <div>

                    <?php if($p->template == 1): ?>
                        <a  href="<?php echo e(route('admin.text.edit',$p->id)); ?>" class="btn btn-xs btn-xxs px-3 py-2 btn-facebook"><i class="nav-icon i-Pen-2"></i></a>
                    <?php elseif($p->template == 2): ?>
                        <a  href="tree/<?php echo e($p->id); ?>" class="btn btn-xs btn-xxs px-3 py-2 btn-facebook"><i class="nav-icon i-Pen-2"></i></a>
                    <?php else: ?>
                        <a tabindex class="btn btn-xs btn-xxs px-3 py-2 btn-facebook"><i class="nav-icon i-Pen-2"></i></a>
                    <?php endif; ?>
                    <a tabindex href="<?php echo e(route('admin.pages.edit',$p->id)); ?>" class="btn btn-xs btn-xxs px-3 py-2 btn-success"><i class="nav-icon i-Pen-2"></i></a>
                    <a tabindex class="btn btn-xs btn-xxs px-3 py-2 btn-danger js_delete"><i class="nav-icon i-Close-Window"></i></a>
                    <a tabindex class="btn btn-xs btn-xxs px-3 py-2 btn-info list_item"><i class="nav-icon i-Arrow-Cross"></i></a>
                </div>
            </div>

            <?php if(count($p->getSubControl)>0): ?>
                <ul class="list-group customLists sortables">
                    <?php echo $__env->make("back.pages.subCategory",["pages" => $p->getSubCategories], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                </ul>
            <?php endif; ?>
        </li>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?> 
</ul><?php /**PATH /Users/emrekaradag/Desktop/cms/resources/views/back/pages/subCategory.blade.php ENDPATH**/ ?>