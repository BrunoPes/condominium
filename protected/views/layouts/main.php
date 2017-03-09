<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
	<meta name="language" content="en">

	<link href="<?php echo Yii::app()->request->baseUrl; ?>/protected/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
	<link href="<?php echo Yii::app()->request->baseUrl; ?>/protected/vendor/metisMenu/metisMenu.min.css" rel="stylesheet">
	<link href="<?php echo Yii::app()->request->baseUrl; ?>/protected/vendor/dist/css/sb-admin-2.css" rel="stylesheet">
	<link href="<?php echo Yii::app()->request->baseUrl; ?>/protected/vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet">
	<script src="<?php echo Yii::app()->request->baseUrl; ?>/protected/vendor/jquery/jquery.min.js"></script>
	<script src="<?php echo Yii::app()->request->baseUrl; ?>/protected/vendor/jquery-ui/jquery-ui.min.js"></script>
	<script src="<?php echo Yii::app()->request->baseUrl; ?>/protected/vendor/bootstrap/js/bootstrap.min.js"></script>
	<script src="<?php echo Yii::app()->request->baseUrl; ?>/protected/vendor/metisMenu/metisMenu.min.js"></script>
	<script src="<?php echo Yii::app()->request->baseUrl; ?>/protected/vendor/dist/js/sb-admin-2.js"></script>
	<script src='<?php echo Yii::app()->request->baseUrl; ?>/protected/vendor/moment/moment.js'></script>

	<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/print.css" media="print">
	<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/main.css">
	<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/form.css">

	<title><?php echo CHtml::encode($this->pageTitle); ?></title>
</head>
<body>
	<div id="wrapper">
		<nav class="navbar navbar-default navbar-static-top" role="navigation" style="background-color: #337ab7; margin-bottom: 0;">
		    <div class="navbar-header">
		        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
		            <span class="sr-only">Toggle navigation</span>
		            <span class="icon-bar"></span>
		            <span class="icon-bar"></span>
		            <span class="icon-bar"></span>
		        </button>
		        <a class="navbar-brand" style="color: #FFF" href="index.php">Condominium</a>
		    </div>
		    <!-- /.navbar-header -->

		    <ul class="nav navbar-top-links navbar-right">
		        <li class="dropdown">
		            <a class="dropdown-toggle" data-toggle="dropdown" href="#" style="color: white;">
		                <i class="fa fa-envelope fa-fw"></i> <i class="fa fa-caret-down"></i>
		            </a>
		            <ul class="dropdown-menu dropdown-messages">
		                <li>
		                    <a href="#">
		                        <div>
		                            <strong>John Smith</strong>
		                            <span class="pull-right text-muted">
		                                <em>Yesterday</em>
		                            </span>
		                        </div>
		                        <div>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Pellentesque eleifend...</div>
		                    </a>
		                </li>
		                <li class="divider"></li>
		                <li>
		                    <a href="#">
		                        <div>
		                            <strong>John Smith</strong>
		                            <span class="pull-right text-muted">
		                                <em>Yesterday</em>
		                            </span>
		                        </div>
		                        <div>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Pellentesque eleifend...</div>
		                    </a>
		                </li>
		                <li class="divider"></li>
		                <li>
		                    <a href="#">
		                        <div>
		                            <strong>John Smith</strong>
		                            <span class="pull-right text-muted">
		                                <em>Yesterday</em>
		                            </span>
		                        </div>
		                        <div>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Pellentesque eleifend...</div>
		                    </a>
		                </li>
		                <li class="divider"></li>
		                <li>
		                    <a class="text-center" href="#">
		                        <strong>Read All Messages</strong>
		                        <i class="fa fa-angle-right"></i>
		                    </a>
		                </li>
		            </ul>
		            <!-- /.dropdown-messages -->
		        </li>

		        <!-- /.dropdown -->
		        <li class="dropdown">
		            <a class="dropdown-toggle" data-toggle="dropdown" href="#" style="color: white;">
		                <i class="fa fa-bell fa-fw"></i> <i class="fa fa-caret-down"></i>
		            </a>
		            <ul class="dropdown-menu dropdown-alerts">
		                <li>
		                    <a href="#">
		                        <div>
		                            <i class="fa fa-comment fa-fw"></i> New Comment
		                            <span class="pull-right text-muted small">4 minutes ago</span>
		                        </div>
		                    </a>
		                </li>
		                <li class="divider"></li>
		                <li>
		                    <a href="#">
		                        <div>
		                            <i class="fa fa-twitter fa-fw"></i> 3 New Followers
		                            <span class="pull-right text-muted small">12 minutes ago</span>
		                        </div>
		                    </a>
		                </li>
		                <li class="divider"></li>
		                <li>
		                    <a href="#">
		                        <div>
		                            <i class="fa fa-envelope fa-fw"></i> Message Sent
		                            <span class="pull-right text-muted small">4 minutes ago</span>
		                        </div>
		                    </a>
		                </li>
		                <li class="divider"></li>
		                <li>
		                    <a href="#">
		                        <div>
		                            <i class="fa fa-tasks fa-fw"></i> New Task
		                            <span class="pull-right text-muted small">4 minutes ago</span>
		                        </div>
		                    </a>
		                </li>
		                <li class="divider"></li>
		                <li>
		                    <a href="#">
		                        <div>
		                            <i class="fa fa-upload fa-fw"></i> Server Rebooted
		                            <span class="pull-right text-muted small">4 minutes ago</span>
		                        </div>
		                    </a>
		                </li>
		                <li class="divider"></li>
		                <li>
		                    <a class="text-center" href="#">
		                        <strong>See All Alerts</strong>
		                        <i class="fa fa-angle-right"></i>
		                    </a>
		                </li>
		            </ul>
		            <!-- /.dropdown-alerts -->
		        </li>
		        <!-- /.dropdown -->
		        <li class="dropdown">
		            <a class="dropdown-toggle" data-toggle="dropdown" href="#" style="color: white;">
		                <i class="fa fa-user fa-fw"></i> <i class="fa fa-caret-down"></i>
		            </a>
		            <ul class="dropdown-menu dropdown-user">
		                <li><a href="#"><i class="fa fa-user fa-fw"></i> User Profile</a>
		                </li>
		                <li><a href="#"><i class="fa fa-gear fa-fw"></i> Settings</a>
		                </li>
		                <li class="divider"></li>
		                <li><a href="<?= Yii::app()->createUrl('site/logout'); ?>"><i class="fa fa-sign-out fa-fw"></i> Logout</a>
		                </li>
		            </ul>
		            <!-- /.dropdown-user -->
		        </li>
		        <!-- /.dropdown -->
		    </ul>
		    <!-- /.navbar-top-links -->

		    <div class="navbar-default sidebar" role="navigation">
		        <div class="sidebar-nav navbar-collapse">
		            <ul class="nav in" id="side-menu">
		                <li class="sidebar-search" style="display:none">
		                    <div class="input-group custom-search-form">
		                        <input type="text" class="form-control" placeholder="Search...">
		                        <span class="input-group-btn">
		                        <button class="btn btn-default" type="button">
		                            <i class="fa fa-search"></i>
		                        </button>
		                    </span>
		                    </div>
		                    <!-- /input-group -->
		                </li>
		                <li>
		                    <a href="<?= Yii::app()->createUrl('site/index'); ?>" class="active"><i class="fa fa-home fa-fw"></i> Início</a>
		                </li>
		                <li>
		                    <a href="<?= Yii::app()->createUrl('reserva/index'); ?>" class="active"><i class="fa fa-calendar fa-fw"></i> Reservar Espaço</a>
		                </li>
		                <li>
		                    <a href="" class="active"><i class="fa fa-barcode fa-fw"></i> Pagamentos e Boletos</a>
		                </li>
		                <li>
		                    <a href="" class="active"><i class="fa fa-briefcase fa-fw"></i> Contratar</a>
		                </li>
		                <li>
		                    <a href="" class="active"><i class="fa fa-exclamation-triangle fa-fw"></i> Reclamações</a>
		                </li>
		                <li>
		                    <a href="" class="active"><i class="fa fa-phone-square fa-fw"></i> Portaria</a>
		                </li>
		                <li>
		                    <a href="" class="active"><i class="fa fa-check fa-fw"></i> Autorizações</a>
		                </li>
		            </ul>
		        </div>
		        <!-- /.sidebar-collapse -->
		    </div>
		    <!-- /.navbar-static-side -->
		</nav>
		<div id="page-wrapper" style="background-color: #FFF">
			<div id="page">
				<?php echo $content; ?>
				<div class="clear"></div>
			</div>
		</div>
	</div>
</body>
