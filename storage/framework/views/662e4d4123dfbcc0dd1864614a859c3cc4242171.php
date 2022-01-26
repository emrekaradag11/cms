<?php $__env->startSection("content"); ?>

    <div class="main-content">
        <div class="breadcrumb d-flex align-items-center justify-content-between">
            <h1><?php echo e($page->getFirstName->title); ?> Düzenle</h1>
            <a class="btn btn-primary btn-rounded" href="<?php echo e(url()->previous()); ?>">Geri Dön</a>
        </div>
        <div class="separator-breadcrumb border-top"></div>
        <div class="card">
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
                                    <div class="card-content">
                                        <div class="card-body">
                                            <form class="form row" method="post" enctype="multipart/form-data" action="<?php echo e(route('admin.tree.update',$data->id)); ?>">
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
                                                            <div class="tab-pane px-0  <?php echo e($k->id == 1 ? 'active' : null); ?>" id="tabpane_<?php echo e($k->id); ?>" aria-labelledby="tabpane_<?php echo e($k->id); ?>">
                                                                <div class="row">
                                                                    <div class="col-md-6 col-12">
                                                                        <div class="form-group">
                                                                            <label for="title<?php echo e($l); ?>">Başlık (<?php echo e($k->lang_short); ?>)</label>
                                                                            <input required type="text" id="title<?php echo e($l); ?>" class="form-control" value="<?php echo e($data->getDetail[$l] ? $data->getDetail[$l]->title : null); ?>" name="title[]">
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-md-6 col-12">
                                                                        <div class="form-group">
                                                                            <label for="slug<?php echo e($l); ?>">Slug (<?php echo e($k->lang_short); ?>)</label>
                                                                            <input required type="text" id="slug<?php echo e($l); ?>" class="form-control" value="<?php echo e($data->getDetail[$l] ? $data->getDetail[$l]->slug : null); ?>" name="slug[]">
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-md-6 col-12">
                                                                        <div class="form-group">
                                                                            <label for="description<?php echo e($l); ?>">Description (<?php echo e($k->lang_short); ?>)</label>
                                                                            <input type="text" value="<?php echo e($data->getDetail[$l] ? $data->getDetail[$l]->description : null); ?>" id="description<?php echo e($l); ?>" class="form-control" name="description[]">
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-md-6 col-12">
                                                                        <div class="form-group">
                                                                            <label for="keywords<?php echo e($l); ?>">Keywords (<?php echo e($k->lang_short); ?>)</label>
                                                                            <input type="text" value="<?php echo e($data->getDetail[$l] ? $data->getDetail[$l]->keywords : null); ?>" id="keywords<?php echo e($l); ?>" class="form-control" name="keywords[]">
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-12 form-group">
                                                                        <label for="text<?php echo e($l); ?>">Text (<?php echo e($k->lang_short); ?>)</label>
                                                                        <div class="d-block">
                                                                            <textarea name="text[]" id="text<?php echo e($l); ?>" rows="10" cols="80"><?php echo e($data->getDetail[$l] ? $data->getDetail[$l]->text : null); ?></textarea>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col-md-6 col-12">
                                                            <div class="form-group">
                                                                <label for="parent_id">Üst Veri</label>
                                                                <select name="parent_id" class="form-control" id="parent_id">
                                                                    <option <?php echo e($data->getDetail[$l]->parent_id == "0" ? "selected" : null); ?> value="0">Üst Kategori</option>
                                                                    <?php $__currentLoopData = $tree; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $t): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                                        <option <?php echo e($data->getDetail[$l]->parent_id == $t ? "selected" : null); ?> value="<?php echo e($t->id); ?>"><?php echo e($t->getFirstName->title); ?></option>
                                                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                                </select>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-6 col-12">
                                                            <div class="form-group">
                                                                <label for="type">Tip</label>
                                                                <select name="type" class="form-control" id="type">
                                                                    <option <?php echo e($data->getDetail[$l]->type == "1" ? "selected" : null); ?> value="1">İçerik</option>
                                                                    <option <?php echo e($data->getDetail[$l]->type == "0" ? "selected" : null); ?> value="0">Kategori</option>
                                                                </select>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    
                                                    <div class="form-actions col-12 px-0 mt-4 text-right"> 
                                                        <button type="submit" class="btn btn-raised btn-raised btn-primary">
                                                            <i class="fa fa-check-square-o"></i> Kaydet
                                                        </button>
                                                    </div>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-4">

                                    <?php if(count($fields)>0): ?>
                                        <?php echo $__env->make("back.fields.edit" , ['field_page_id' => $page->id,'field_parent' => $data->id], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                                    <?php endif; ?>

                                </div>
                            </div>
                        </div>
                        <div class="tab-pane px-0" id="tabpaneCont_2" aria-labelledby="tabpaneCont_2">
                            <div class="col-12">
                                <div class="card-body px-1">
                                    <form action="<?php echo e(route('admin.tree.uploadPictures')); ?>" class="dropzone  dropzone-area"  method="post" enctype="multipart/form-data" id="dpz-multiple-files">
                                        <?php echo csrf_field(); ?>
                                        <input type="hidden" name="id" value="<?php echo e($data->id); ?>"> 
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
        
        Dropzone.options.dpzMultipleFiles = {
            paramName: "file", // The name that will be used to transfer the file
            maxFilesize: 5, // MB
            clickable: true,
            addRemoveLinks: true,
            acceptedFiles: "image/jpeg,image/png,image/gif",
            dictRemoveFile: " Trash",
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
            
            <?php if($data->image()->count() > 0): ?>

            init: function() {
                var thisDropzone = this; 
                <?php $__currentLoopData = $data->image()->get(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $im): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    var mockFile = { id: '<?php echo e($im->id); ?>', name: '<?php echo e($im->img); ?>', size: <?php echo e(filesize("uploads/" . $im->img)); ?>, type: '<?php echo e(image_type_to_mime_type(exif_imagetype("uploads/" . $im->img))); ?>' };
                    thisDropzone.emit("addedfile", mockFile);
                    thisDropzone.emit("success", mockFile);
                    thisDropzone.emit("complete",mockFile);
                    thisDropzone.emit("thumbnail", mockFile, "<?php echo e(url("uploads/" . $im->img)); ?>");
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                this.on("maxfilesexceeded", function(file){
                    this.removeFile(file);
                    alert("No more files please!");
                });
            }

            <?php endif; ?>
        }


    </script>
<?php $__env->stopSection(); ?> 

<?php echo $__env->make("back.layout", \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /Users/emrekaradag/Desktop/cms/resources/views/back/tree/edit.blade.php ENDPATH**/ ?>