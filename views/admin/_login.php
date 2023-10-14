<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8"/>
    <title>Админка</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta content="A fully featured admin theme which can be used to build CRM, CMS, etc." name="description"/>
    <meta content="Coderthemes" name="author"/>
    <meta http-equiv="X-UA-Compatible" content="IE=edge"/>
    <!-- App favicon -->
    <link rel="shortcut icon" href="/assets/assetsAdmin/images/favicon.ico">

    <!-- App css -->
    <link href="/assets/assetsAdmin/css/bootstrap.min.css" rel="stylesheet" type="text/css"/>
    <link href="/assets/assetsAdmin/css/icons.min.css" rel="stylesheet" type="text/css"/>
    <link href="/assets/assetsAdmin/css/app.min.css" rel="stylesheet" type="text/css"/>

</head>


<body class="authentication-bg">

<div class="home-btn d-none d-sm-block">
    <a href="/"><i class="fas fa-home h2 text-dark"></i></a>
</div>

<div class="account-pages mt-5 mb-5">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8 col-lg-6 col-xl-5">

                <div class="text-center">
                    <a href="index.html">
                        <span class="logo-lg"><h2 class="text-muted">Farm Engine</h2></span>
                    </a>
                    <p class="text-muted mt-2 mb-4"><?php if (isset($errors)) echo $errors; ?></p>
                </div>
                <div class="card">
                    <div class="card-body p-4">

                        <div class="text-center mb-4">
                            <h4 class="text-uppercase mt-0">Авторизация</h4>
                        </div>

                        <form action="" method="post">
                            <input type="hidden" name="_tocken" value="<?= Session::$tocken; ?>">
                            <div class="form-group mb-3">
                                <label>Login</label>
                                <input class="form-control" name="admlogin" type="text" required="" placeholder="Введите логин">
                            </div>
                            <div class="form-group mb-3">
                                <label>Password</label>
                                <input class="form-control" name="admpass" type="password" required="" placeholder="Введите пароль">
                            </div>
                            <div class="form-group mb-0 text-center">
                                <button class="btn btn-primary btn-block" type="submit"> Log In</button>
                            </div>
                        </form>

                    </div>
                </div>

            </div>
        </div>
    </div>
</div>
<!-- end page -->


<script src="/assets/assetsAdmin/js/vendor.min.js"></script>
<script src="/assets/assetsAdmin/js/app.min.js"></script>

</body>
</html>