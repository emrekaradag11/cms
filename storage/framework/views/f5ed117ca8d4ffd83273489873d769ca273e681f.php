<?php $__env->startSection("content"); ?> 
    <div class="main-content">
        <div class="breadcrumb d-flex align-items-center justify-content-between">
            <h1><?php echo e($page->getFirstName->title); ?> Düzenle</h1> 
            <a href="<?php echo e(route("admin.pages.index")); ?>" class="btn btn-primary btn-rounded">Geri Dön</a>
        </div>
        <div class="separator-breadcrumb border-top"></div>
        <div class="card mb-4">
            <div class="card-body">
                <div class="row">
                    <div class="col-lg-8"> 
                        <div class="card-content">
                            <div class="card-body">
                                <form class="form row" method="post" enctype="multipart/form-data" action="<?php echo e(route('admin.pages.update',$page->id)); ?>">
                                    <input type="hidden" name="id" value="<?php echo e($page->id); ?>">
                                    <div class="col-12">
                                        <?php echo csrf_field(); ?>
                                        <?php echo method_field("PUT"); ?>
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
                                                                <label for="head<?php echo e($l); ?>">Sayfa İsmi (<?php echo e($k->lang_short); ?>)</label>
                                                                <input type="text" id="head<?php echo e($l); ?>" class="form-control" name="title[]" value="<?php echo e($page->getDetail[$l]->title ?? null); ?>">
                                                            </div>
                                                        </div>
                                                        <div class="col-md-6 col-12">
                                                            <div class="form-group">
                                                                <label for="description<?php echo e($l); ?>">Description (<?php echo e($k->lang_short); ?>)</label>
                                                                <input type="text" id="description<?php echo e($l); ?>" class="form-control" name="description[]" value="<?php echo e($page->getDetail[$l]->description ?? null); ?>">
                                                            </div>
                                                        </div>
                                                        <div class="col-md-6 col-12">
                                                            <div class="form-group">
                                                                <label for="keywords<?php echo e($l); ?>">Keywords (<?php echo e($k->lang_short); ?>)</label>
                                                                <input type="text" id="keywords<?php echo e($l); ?>" class="form-control" name="keywords[]" value="<?php echo e($page->getDetail[$l]->keywords ?? null); ?>">
                                                            </div>
                                                        </div>
                                                        <div class="col-md-6 col-12">
                                                            <div class="form-group">
                                                                <label for="slug<?php echo e($l); ?>">Link (<?php echo e($k->lang_short); ?>)</label>
                                                                <input type="text" id="slug<?php echo e($l); ?>" class="form-control" value="<?php echo e($page->getDetail[$l]->slug ?? null); ?>" name="slug[]">
                                                            </div>
                                                        </div>

                                                        <div class="col-12">
                                                            <div class="form-group">
                                                                <label>Açıklama :</label>
                                                                <textarea class="form-control" name="text[]" id="" cols="30" rows="6"><?php echo e($page->getDetail[$l]->text ?? null); ?></textarea>
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
                                                        <option <?php echo e($page->template == '1' ? 'selected' : null); ?> value="1">Text</option>
                                                        <option <?php echo e($page->template == '2' ? 'selected' : null); ?> value="2">Tree</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-md-6 col-12">
                                                <div class="form-group">
                                                    <label for="redirect">Redirect</label>
                                                    <input type="text" id="redirect" class="form-control" value="<?php echo e($page->redirect); ?>" name="redirect">
                                                </div>
                                            </div>
                                            <div class="col-md-6 col-12">
                                                <div class="form-group">
                                                    <label for="parent_id">Üst Sayfa</label>
                                                    <select name="parent_id" class="form-control" id="parent_id">
                                                        <option value="0">Ana Menü</option>
                                                        <?php $__currentLoopData = $parent; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $p): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                            <option <?php echo e($page->parent_id == $p->id ? "selected" : null); ?> value="<?php echo e($p->id); ?>"><?php echo e($p->getFirstName->title); ?></option>
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
                    <div class="col-lg-4">
                        <div class="card-header">
                            <h4 class="card-title">Ek Alanlar</h4>
                            <p>Sayfaya tanımlı ek alanları görebilirsiniz.</p>
                        </div>
                        <div class="card-content">
                            <div class="card-body px-0">
                                <div class="text-right">
                                    <button type="button" class="js-addSpace btn btn-primary btn-lg" data-toggle="modal" data-target="#addField"><i class="fa fa-pencil"></i> Ekle</button>
                                </div>
                                <ul class="list-group customLists sortables mt-4"> 
                                    <?php if(count($fields)>0): ?>
                                        <?php $__currentLoopData = $fields; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $f): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <li id="item-<?php echo e($f->id); ?>" class="list-group-item list-group-item-action d-block" data-content="<?php echo e($f->id); ?>">
                                                <div class="list_item px-2 d-flex justify-content-between align-items-center">
                                                    <span><?php echo e($f->getFirstName->name); ?></span>
                                                    <span>
                                                        
                                                        <a tabindex class="js-edit btn btn-xs btn-xxs px-3 py-2 btn-facebook"  data-id="<?php echo e($f->id); ?>"><i class="nav-icon i-Pen-2"></i></a> 
                                                        <a href="<?php echo e(route('admin.deleteField',$f->id)); ?>" class="js-deleteField btn btn-xs btn-xxs px-3 py-2 btn-danger "><i class="nav-icon i-Close-Window"></i></a>
                                                    
                                                    </span>
                                                </div>
                                                <span class="d-block"><hr class="my-0"></span>
                                            </li>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    <?php endif; ?>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div> 
<?php $__env->stopSection(); ?>

<?php echo $__env->make("back/pages/fieldCreate", \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php echo $__env->make("back/pages/fieldEdit", \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

<?php $__env->startSection("js"); ?>

    <script type="text/javascript">
        $(function(){
            $.ajaxSetup({
                headers:{
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });


            $( ".sortables" ).sortable({
                revert: true,
                handle: ".list_item",
                stop: function (event, ui) {
                    let data = $(this).sortable('toArray', {attribute: 'data-content'});
                    $.ajax({
                        type:"post",
                        method:"post",
                        data: {
                            data : data,
                        },
                        url: "<?php echo e(route('admin.fieldSortable')); ?>",
                        success: function (res) {

                            if(res.type == "success"){

                                toastr.success(
                                    res.message,
                                    res.head,
                                    {progressBar:!0}
                                )

                            }else {

                                toastr.warning(
                                    res.message,
                                    res.head,
                                    {progressBar:!0}
                                )

                            }
                        }
                    });

                }
            });


            $('.sortables').disableSelection();

        });

        $(".js-addSpace").click(function () {
            $(".js-edit_modal form")[0].reset();
            $(".js-inputType").addClass("d-none");
            $(".js-selectType").addClass("d-none");
            $(".js-edit_modal [name='id']").val("");
        });



        $(".js-edit").click(function () {
            let modal = $(".js-edit_modal");
            var id = $(this).data("id");
            $.ajax({
                type: 'post',
                url: '<?php echo e(route("admin.getFieldWithId")); ?>',
                data: {
                    "id": id
                },
                success: function (success) {

                    let detail = success.fieldDetail;
                    modal.find("[name='type']").val(success.field.type).trigger("change");
                    modal.find("[name='id']").val(success.field.id);
                    $(detail).each(function (x,y){
                        modal.find("#name" + x).val(detail[x].name);
                        modal.find("#properties" + x).val(detail[x].properties);
                    });

                    modal.modal().show();

                }
            });

        });

        $(".js-selectedType select").on("change",function () {
            if($(this).val() == "checkbox" ||
                $(this).val() == "radio" ||
                $(this).val() == "select"
            ){
                $(".js-selectType").removeClass("d-none");
            }
            else{
                $(".js-selectType").addClass("d-none");
            }
        })
    </script>

<?php $__env->stopSection(); ?>

<?php echo $__env->make("back.layout", \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /Users/emrekaradag/Desktop/cms/resources/views/back/pages/edit.blade.php ENDPATH**/ ?>