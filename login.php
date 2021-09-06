<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Address</title>
    <?php include('_headerlink.php') ?>
</head>

<body class="hold-transition login-page">
    <div class="login-box">
        <!-- /.login-logo -->
        <div class="card card-outline card-primary">
            <div class="card-body">
                <p class="login-box-msg">Sign in</p>

                <div>
                    <div class="input-group mb-3">
                        <input type="email" id='email' class="form-control" placeholder="Email">
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-envelope"></span>
                            </div>
                        </div>
                    </div>
                    <div class="input-group mb-3">
                        <input type="password" id='password' class="form-control" placeholder="Password">
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-lock"></span>
                            </div>
                        </div>
                    </div>
                    <div class="row">

                        <!-- /.col -->
                        <div class="col-12">
                            <button type="button" id='btnLogin' class="btn btn-primary btn-block">Sign In</button>
                        </div>
                        <!-- /.col -->
                    </div>
                </div>
            </div>
            <!-- /.card-body -->
        </div>
        <!-- /.card -->
    </div>
    <!-- /.login-box -->
    <?php include('_footerlink.php') ?>

    <script type='text/javascript'>
        $(function() {
            $('#email').val('');
            $('#password').val('');
            $("#btnLogin").click(function() {
                if ($('#email').val() == '<?php echo $GLOBALS['loginuser']; ?>' && $('#password').val() == '<?php echo $GLOBALS['password']; ?>') {
                    localStorage.setItem("username", $('#email').val());
                    location.replace('./');
                }
            })
        })
    </script>
</body>

</html>