<!DOCTYPE html>
<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta name="theme-color" content="<?php echo $_SESSION["companysettings.mainColor"] ?>">

<link rel="shortcut icon" href="/favicon.ico" />
<link rel="apple-touch-icon" href="/apple-touch-icon.png">

<title><?php echo $_SESSION["companysettings.sitename"]; ?></title>

<?php echo $frontController->includeAction('general.header'); ?>

    <link rel="stylesheet" href="/css/style.default.css?v=<?php echo $settings->appVersion; ?>" type="text/css" />
    <link rel="stylesheet" href="/css/style.custom.php?color=<?php echo $_SESSION["companysettings.mainColor"]; ?>&v=<?php echo $settings->appVersion; ?>" type="text/css" />
    <link rel="stylesheet" href="/css/main.css"/>

    <script type="text/javascript" src="/js/libs/jquery-1.9.1.min.js"></script>
    <script type="text/javascript" src="/js/libs/jquery-migrate-1.1.1.min.js"></script>
    <script type="text/javascript" src="/js/libs/jquery-ui-1.9.2.min.js"></script>
    <script type="text/javascript" src="/js/libs/modernizr.min.js"></script>
    <script type="text/javascript" src="/js/libs/bootstrap.min.js"></script>
    <script type="text/javascript" src="/js/libs/jquery.cookie.js"></script>
    <script type="text/javascript" src="/js/libs/custom.js"></script>

    <!--[if lte IE 8]><script language="javascript" type="text/javascript" src="/js/libs/excanvas.min.js"></script><![endif]-->
</head>

<script type="text/javascript">
    jQuery(document).ready(function(){
        
        if(jQuery('.login-alert .alert-error').text() != ''){
            jQuery('.login-error').fadeIn();
        }
        
        if(jQuery('.login-alert .alert-success').text() != ''){
            jQuery('.login-success').fadeIn();
        }

    });
</script>
</head>

<body class="loginpage" style="height:100%;">

<div class="header hidden-gt-sm">

    <div class="logo" style="margin-left:0px;">
        <a href="/" style="background-image:url(<?php echo $config->logoPath; ?>">&nbsp;</a>
    </div>

</div>

<div class="row " style="height:100%; width: 99%;">
    <div class="col-md-6 hidden-phone regLeft" style="background:#<?php echo $_SESSION["companysettings.mainColor"]; ?>" >
        <div class="row">
            <div class="col-md-5">

            </div>
            <div class="col-md-6" style="position:relative;">
                <a href="/" target="_blank"><img src="<?php echo $_SESSION["companysettings.logoPath"]; ?>" /></a>
                <h1 style="font-family:Exo;  font-size: 64px; padding-left:15px; font-weight:400;">Drive Impact</h1>
                <span class="iq-objects-04 iq-fadebounce">
				    <span class="iq-round"></span>
                </span>
            </div>
        </div>
    </div>
    <div class="col-md-6 col-sm-12 regRight"  style="box-shadow: -2px 0px 2px #494949; padding-top:14%; border-left: 1px solid #ddd;">

        <div class="regpanel">
            <div class="regpanelinner">
                <div class="pageheader">
                    <div class="pageicon"><span class="iconfa-signin"></span></div>
                    <div class="pagetitle">
                        <h5><?php echo $_SESSION["companysettings.sitename"]; ?></h5>
                        <h1>Reset Password</h1>
                    </div>
                </div>
                <div class="regcontent"  style="margin-left: 90px;">
        
                    <form id="resetPassword" action="" method="post">
            
                        <div class="inputwrapper login-alert login-error">
                            <div class="alert alert-error"><?php echo $login->error;?></div>
                        </div>
                        <div class="inputwrapper login-alert login-success">
                            <div class="alert alert-success"><?php echo $login->success;?></div>
                        </div>

                        <?php
                        if((isset($_GET["hash"]) === true && $login->validateResetLink()) || $login->resetInProgress === true) { ?>

                            <p>Enter your new password to reset it. <br /><br /></p>
                            <div class="">
                                <input type="password" name="password" id="password" placeholder="Enter New Password" />
                            </div>
                            <div class=" ">
                                <input type="password" name="password2" id="password2" placeholder="Confirm Password" />
                            </div>
                            <div class="">
                                <a href="/" style="float:right; margin-top:10px;">Back to login</a>
                                <input type="submit" name="resetPassword" value="Reset Password" />
                            </div>

                        <?php }else{ ?>
                            <p>Enter your email address to reset your password. <br /><br /></p>
                            <div class="">
                                <input type="text" name="username" id="username" placeholder="Enter Email Address" />
                            </div>

                            <div class="">
                                <a href="/" style="float:right; margin-top:10px;">Back to login</a>
                                <input type="submit" name="resetPassword" value="Reset Password" />
                            </div>
                        <?php } ?>

                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

</body>
</html>
