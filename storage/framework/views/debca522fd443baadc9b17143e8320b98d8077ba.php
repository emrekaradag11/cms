<?php $__env->startSection("content"); ?>


    <div class="main-content">
        <div class="breadcrumb d-flex align-items-center justify-content-between">
            <h1><?php echo e($page->getFirstName->title); ?></h1> 
        </div>
        <div class="separator-breadcrumb border-top"></div>
        <div class="card mb-4">
            <div class="card-body">
                <div class="row">
                    <div class="col-12">
                        <ul class="nav row nav-tabs tabVol2 m-0">
                            <li class="nav-item">
                                <a class="text-uppercase nav-link active" id="tabCont_1" data-toggle="tab" aria-controls="tabpaneCont_1" href="#tabpaneCont_1">Genel Bilgiler</a>
                            </li>
                            <li class="nav-item">
                                <a class="text-uppercase nav-link" id="tabCont_2" data-toggle="tab" aria-controls="tabpaneCont_2" href="#tabpaneCont_2">Görseller</a>
                            </li>
                        </ul>
                    </div>
                    <div class="tab-content col-12 px-0 m-0">
                        <div class="tab-pane px-0 active" id="tabpaneCont_1" aria-labelledby="tabpaneCont_1">
                            <div class="row">
                                <div class="col-lg-8">
                                    <form action="<?php echo e(route('admin.text.update',$page->id)); ?>" method="post" enctype="multipart/form-data" class="card-body pb-3">
                                        <?php echo csrf_field(); ?>
                                        <?php echo method_field('PUT'); ?>
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
                                                    <div class="row form-group">
                                                        <div class="col-12">
                                                            <div class="form-group">
                                                                <label for="description<?php echo e($l); ?>">Description (<?php echo e($k->lang_short); ?>)</label>
                                                                <input type="text" id="description<?php echo e($l); ?>" class="form-control" name="description[]" value="<?php echo e(!empty($page->getDetail[$l]->description)?$page->getDetail[$l]->description:null); ?>">
                                                            </div>
                                                        </div>
                                                        <div class="col-12">
                                                            <div class="form-group">
                                                                <label for="keywords<?php echo e($l); ?>">Keywords (<?php echo e($k->lang_short); ?>)</label>
                                                                <input type="text" id="keywords<?php echo e($l); ?>" class="form-control" name="keywords[]" value="<?php echo e(!empty($page->getDetail[$l]->keywords)?$page->getDetail[$l]->keywords:null); ?>">
                                                            </div>
                                                        </div>
                                                        <div class="col-12 form-group">
                                                            <label for="text<?php echo e($l); ?>">Content (<?php echo e($k->lang_short); ?>)</label>
                                                            <div class="d-block">
                                                                <textarea name="text[]" id="text<?php echo e($l); ?>" rows="10" cols="80"><?php echo e(!empty($page->getDetail[$l]->text)?$page->getDetail[$l]->text:null); ?></textarea>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                        </div> 
                                        <div class="row form-group">
                                            <div class="col-12 form-group text-right">
                                                <input type="hidden" name="page_id" value="<?php echo e($page->id); ?>">
                                                <button type="submit" class="btn btn-primary">Kaydet</button>
                                            </div>
                                        </div>
                                    </form>
                                </div>

                                <div class="col-lg-4">

                                    <?php if(count($fields)>0): ?>
                                        <?php echo $__env->make("back.fields.edit" , ['field_page_id' => $page->id,"field_parent"=>$page->id], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                                    <?php endif; ?>

                                </div>
                            </div>
                        </div>
                        <div class="tab-pane px-0" id="tabpaneCont_2" aria-labelledby="tabpaneCont_2">
                            <div class="col-12">
                                <div class="card-body px-1"> 
                                    <form class="dropzone dropzone-area form-group" enctype="multipart/form-data" method="post" id="multple-file-upload" action="<?php echo e(route('admin.text.uploadPictures')); ?>">
                                        <?php echo csrf_field(); ?>
                                        <input type="hidden" name="id" value="<?php echo e($page->id); ?>">
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div> 
<?php $__env->stopSection(); ?>


<?php $__env->startSection("js"); ?> 
    <script>
        $(document).ready(function () {
            <?php $__currentLoopData = $lng; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $l => $k): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?> 
                ClassicEditor
                .create( document.querySelector( '#text<?php echo e($l); ?>' ) )
                .catch( error => {
                    //console.error( error );
                } );
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?> 
        });

        Dropzone.autoDiscover = false;

        var myDropzone = new Dropzone(".dropzone", {
            paramName: "file", // The name that will be used to transfer the file
            maxFilesize: 5, // MB
            clickable: true,
            addRemoveLinks: true,
            acceptedFiles: "image/jpeg,image/png,image/gif",
            removedfile: function(file)
            {

                $.ajax({
                    type: 'POST',
                    url: '<?php echo e(Route("admin.deleteImages")); ?>',
                    data: {
                        id: file.id,
                    },
                    success: function (data){
                        //console.log(data);
                    },
                    error: function(e) {
                        //console.log(e);
                    }});
                var fileRef;
                return (fileRef = file.previewElement) != null ?
                    fileRef.parentNode.removeChild(file.previewElement) : void 0;
            },
            <?php if(isset($pictures) && !empty($pictures)): ?>
            init: function() {
                var thisDropzone = this;

                <?php $__currentLoopData = $pictures; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $p): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    var mockFile = {
                        id: '<?php echo e($p->id); ?>',
                        name: '<?php echo e($p->img); ?>',
                        size: <?php echo e(filesize(public_path("uploads/" . $p->img))); ?>,
                        type: '<?php echo e(image_type_to_mime_type(exif_imagetype("uploads/" . $p->img))); ?>'
                    };
                    thisDropzone.emit("addedfile", mockFile);
                    thisDropzone.emit("success", mockFile);
                    thisDropzone.emit("complete",mockFile);
                    thisDropzone.emit("thumbnail", mockFile, "<?php echo e(url('uploads/' . $p->img)); ?>");
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                $(".dz-preview").each(function (){
                    $(this).attr("data-content",$(this).find("[data-dz-id]").html());
                })

                this.on("maxfilesexceeded", function(file){
                    this.removeFile(file);
                    alert("No more files please!");
                });

            }
            <?php endif; ?>
        });

        /*
        $( ".dropzone" ).sortable({
            revert: true,
            items:'.dz-preview',
            cursor: 'move',
            opacity: 0.5,
            containment: '.dropzone',
            distance: 20,
            tolerance: 'pointer',
            stop: function (event, ui) {
                let data = $(this).sortable('toArray', {attribute: 'data-content'});
                $.ajax({
                    type:"post",
                    method:"post",
                    data: {
                        data : data,
                    },
                    url: "<?php echo route('admin.img.sortable'); ?>",
                    success: function (res) {
                        console.log(res)
                    }
                });
            }
        });*/
    </script>
<?php $__env->stopSection(); ?>


<?php echo $__env->make("back.layout", \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /Users/emrekaradag/Desktop/cms/resources/views/back/text/edit.blade.php ENDPATH**/ ?>