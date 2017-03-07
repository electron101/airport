<!DOCTYPE html>
<html lang="en">

  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="shortcut icon" href="../../assets/ico/favicon.ico">

    <title>Система заявок</title>

    <!-- Bootstrap core CSS -->
    <link href="bootstrap/css/bootstrap.css" rel="stylesheet">
    <!-- <link href="bootstrap/css/dashboard.css" rel="stylesheet"> -->
    <!-- <link href="bootstrap/css/bootstrap&#45;select.css" rel="stylesheet"> -->
    <link rel="stylesheet" href="font-awesome/css/font-awesome.min.css">
    <link rel="stylesheet" href="css/AdminLTE.css">
    <link rel="stylesheet" href="css/skin-blue.css">
    <!-- <link rel="stylesheet" href="css/bootstrap&#45;datetimepicker.min.css"> -->

    <style>
        body 
	{
          padding-top: 50px;
          margin-left: -10px;
        }

        .vniz{
            padding-top: 10px;
        }

        .sidebar
        {
            overflow:  hidden;
            /*display: block;*/
            top: 0;
            left: 0;
            padding-top: 50px;
            padding-left: 0px;
            min-height: 100%;
            width: 230px;
            z-index: 810;
            -webkit-transition: -webkit-transform 0.3s cubic-bezier(0.32, 1.25, 0.375, 1.15);
            -moz-transition: -moz-transform 0.3s cubic-bezier(0.32, 1.25, 0.375, 1.15);
            -o-transition: -o-transform 0.3s cubic-bezier(0.32, 1.25, 0.375, 1.15);
            transition: transform 0.3s cubic-bezier(0.32, 1.25, 0.375, 1.15);

            background: #222d32;
        }

        .skin-blue .navbar .nav > li > a {color: #ffffff; }         /*цвет ссылок в навигации*/
        .skin-blue .navbar .nav > li > a:hover,                     /*без наведения - по умолчанию*/
        .skin-blue .navbar .nav > li > a:focus {color: #222d32; };  /*при наведении*/
        
        .skin-blue .navbar-header .logo 
        {
            background-color: #367fa9;
            color: #ffffff;
            border-bottom: 0px solid transparent;
        }

        .navbar-header .logo 
        {
            display: block;
            float: left;
            height: 50px;
            font-size: 20px;
            line-height: 50px;
            text-align: left;
            width: 230px;
            /*font-family: Helvetica, Arial, sans-serif;*/
            padding: 0px;
            font-weight: 300;
        }

        .skin-blue .navbar .navbar-header > a {color: #ffffff; }         /*цвет ссылок в навигации*/
        .skin-blue .navbar .navbar-header > a:hover,                     /*без наведения - по умолчанию*/
        .skin-blue .navbar .navbar-header > a:focus {color: #222d32; };  /*при наведении*/
        

    </style>


    <!-- Just for debugging purposes. Don't actually copy this line! -->
    <!--[if lt IE 9]><script src="../../assets/js/ie8-responsive-file-warning.js"></script><![endif]-->

    <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
      <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
    <script src="jquery/jquery-3.1.1.min.js"></script>
    <script src="bootstrap/js/bootstrap.min.js"></script>
    <!-- <script src="bootstrap/js/bootstrap&#45;select.min.js"></script> -->
    <!-- <script src="bootstrap/js/i18n/defaults&#45;ru_RU.min.js"></script> -->
    <!-- <script src="js/app.js"></script> -->
    <!-- <script src="bootstrap/js/bootstrap&#45;paginator.js"></script> -->
    <!-- <script src="js/moment&#45;with&#45;locales.min.js"></script> -->
    <!-- <script src="js/bootstrap&#45;datetimepicker.min.js"></script> -->
<!--
    <script src="js/icheck.min.js"></script>
    <script src="js/titlealert.js"></script>
    <script src="js/jquery.noty.packaged.min.js"></script>
    <script src="js/ion.sound.min.js"></script>
    <script src="js/moment-with-locales.min.js"></script>
    <script src="js/moment-timezone-with-data-2010-2020.min.js"></script>
    <script src="js/moment-with-langs.js"></script>
    <script src="js/jquery-ui-1.10.4.custom.min.js"></script>
    <script src="js/chosen.jquery.min.js"></script>
    <script src="js/bootbox.min.js"></script>
-->

  </head>

  <body>

    <div class="navbar bg-blue navbar-fixed-top" role="navigation">
      <div class="container-fluid">
        <div class="navbar-header">

        </div>
        <?php
            switch ($_SESSION['priv']) 
            {
                /* админ */
                case 0:                    
                $role = "Администратор";
                    break;

                /* координатор */
                case 1:                    
                $role = "Координатор";
                    break;

                /* исполнитель */
                case 2:                    
                $role = "Исполнитель";
                    break;

                default:
                $role = "";
                    break;
            }
        ?>

	<div class="collapse navbar-collapse ">
          <ul class="nav navbar-nav navbar-right ">            
	    <li><a href="?act=lk" class="text-teal"><span class="glyphicon glyphicon-user  aria-hidden="true">
                                  </span><?php echo " ".$_SESSION['login']. " (".$role.")" ?>
                </a>
            </li>
            <li>
              <a href="?act=logout" class="text-teal"><span class="glyphicon glyphicon-log-out" aria-hidden="true">
                                  </span> Выйти</a>
            </li>
          </ul>
        </div><!--/.nav-collapse -->
     
	 </div>
    </div>

<div class="container">

      <div class="starter-template">
        <h1>Bootstrap starter template</h1>
        <p class="lead">Use this document as a way to quickly start any new project.<br> All you get is this text and a mostly barebones HTML document.</p>
      </div>

    </div><!-- /.container -->


  </body>
</html>
