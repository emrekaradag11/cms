<!doctype html>
<html lang="tr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Giriş Yap | E-Commerce</title>
    <link rel="icon" type="image/png" href="<?php echo e(asset("back/img/favicon.jpg")); ?>"/>
    <link href="https://fonts.googleapis.com/css?family=Nunito:300,400,400i,600,700,800,900" rel="stylesheet">
    <link href="<?php echo e(asset("back/css/lite-purple.min.css")); ?>" rel="stylesheet">
    <link href="<?php echo e(asset("back/css/toastr.css")); ?>" rel="stylesheet" />
    <script src="<?php echo e(asset("back/js/jquery-3.3.1.min.js")); ?>"></script>
</head>
<body>
    <div class="auth-layout-wrap" style="background-image: url(<?php echo e(asset("back/img/photo-wide-4.jpg")); ?>)">
        <div class="auth-content">
            <div class="card o-hidden">
                <div class="row">
                    <div class="col-md-12">
                        <div class="p-4">
                            <div class="auth-logo text-center mb-4"><img src="<?php echo e(asset("back/img/logo.svg")); ?>" alt=""></div>
                            <h1 class="mb-3 text-18">Giriş Yap</h1>
                            <form method="post">
                                <?php echo csrf_field(); ?>
                                <div class="form-group">
                                    <label for="email">E-Posta Adresiniz</label>
                                    <input class="form-control form-control-rounded" value="demo@demo.com" name="email" id="email" type="email" required>
                                </div>
                                <div class="form-group">
                                    <label for="password">Şifre</label>
                                    <input class="form-control form-control-rounded" value="demo" id="password" name="password" type="password" required>
                                </div>
                                <button class="btn btn-rounded btn-primary btn-block mt-2">Giriş Yap</button>
                            </form>
                            <div class="mt-3 text-center"><a class="text-muted" href="#"><u>Şifrenizi mi unuttunuz?</u></a></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="<?php echo e(asset("back/js/toastr.min.js")); ?>"></script>
    <?php if(Session::has("message")): ?>
        <script>
            $(document).ready(function () {
                toastr.<?php echo e(Session::get('type','info')); ?>(
                    "<?php echo e(Session::get('message')); ?>",
                    "<?php echo e(Session::get('head','İşlem Başarılı')); ?>",
                    {
                        "progressBar":!0,
                        "timeOut": "2000",
                    },

                )
            })
        </script>
    <?php endif; ?>
</body>
</html>
<?php /**PATH /Users/emrekaradag/Desktop/cms/resources/views/back/login.blade.php ENDPATH**/ ?>