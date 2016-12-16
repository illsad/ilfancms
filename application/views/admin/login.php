<!DOCTYPE html>
<html lang="en">

    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <!-- Meta, title, CSS, favicons, etc. -->
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>SYSCMS | LOGIN</title>
        <link rel="icon" href="<?php echo media_url('ico/favicon.jpg'); ?>" type="image/x-icon">

        <!-- Bootstrap core CSS -->

        <link href="<?php echo media_url() ?>/css/bootstrap.min.css" rel="stylesheet">

        <link href="<?php echo media_url() ?>/fonts/css/font-awesome.min.css" rel="stylesheet">
        <link href="<?php echo media_url() ?>/css/animate.min.css" rel="stylesheet">

        <!-- Custom styling plus plugins -->
        <link href="<?php echo media_url() ?>/css/custom.css" rel="stylesheet">

        <script src="<?php echo media_url() ?>/js/jquery.min.js"></script>

        <!--[if lt IE 9]>
            <script src="../assets/js/ie8-responsive-file-warning.js"></script>
            <![endif]-->

        <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
        <!--[if lt IE 9]>
              <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
              <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
            <![endif]-->

    </head>


    <body style="background:#F7F7F7;">

        <div class="">

            <div id="wrapper">
                <div id="login" class="animate form">
                    <section class="login_content">
                        <form role="form" action="<?php echo site_url('admin/auth/login') ?>" method="post">
                            <?php
                            echo form_open(current_url(), array('role' => 'form', 'class' => 'form-signin'));
                            if (isset($_GET['location'])) {
                                echo '<input type="hidden" name="location" value="';
                                if (isset($_GET['location'])) {
                                    echo htmlspecialchars($_GET['location']);
                                }
                                echo '" />';
                            }
                            ?>
                            <h1>Admin Login</h1>
                            <div>
                                <input autofocus type="text" class="form-control" placeholder="Username" name="username" required="" />
                            </div>
                            <div>
                                <input type="password" class="form-control" placeholder="Password" name="password" required="" />
                            </div>
                            <div>
                                <button class="btn btn-default submit" type="submit" >Log in</button>
                            </div>
                            <div class="clearfix"></div>
                            <div class="separator">

                                <div class="clearfix"></div>
                                <br />
                                <div>
                                    <p>©2015 All Rights Reserved. Syscms. Privacy and Terms</p>
                                </div>
                            </div>
                        </form>
                        <!-- form -->
                    </section>
                    <!-- content -->
                </div>
            </div>
        </div>

    </body>

</html>