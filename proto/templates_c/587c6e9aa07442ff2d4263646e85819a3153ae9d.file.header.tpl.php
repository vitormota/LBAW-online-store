<?php /* Smarty version Smarty-3.1.15, created on 2014-04-18 17:19:43
         compiled from "C:\Users\Francisco\Documents\lbaw-loja-online\proto\templates\common_proto\header.tpl" */ ?>
<?php /*%%SmartyHeaderCode:3975534bbbd4d03916-67468853%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '587c6e9aa07442ff2d4263646e85819a3153ae9d' => 
    array (
      0 => 'C:\\Users\\Francisco\\Documents\\lbaw-loja-online\\proto\\templates\\common_proto\\header.tpl',
      1 => 1397841569,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '3975534bbbd4d03916-67468853',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.15',
  'unifunc' => 'content_534bbbd4d07141_00363353',
  'variables' => 
  array (
    'BASE_URL' => 0,
    'USERNAME' => 0,
    'SUCCESS_MESSAGES' => 0,
    'success' => 0,
    'ERROR_MESSAGES' => 0,
    'error' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_534bbbd4d07141_00363353')) {function content_534bbbd4d07141_00363353($_smarty_tpl) {?><!DOCTYPE html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9"> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js"> <!--<![endif]-->
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <title></title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width">

    <link rel="stylesheet" href="<?php echo $_smarty_tpl->tpl_vars['BASE_URL']->value;?>
css/bootstrap.min.css">
    <style>
        body {
            padding-top: 50px;
            padding-bottom: 20px;
        }
    </style>
    <link rel="stylesheet" href="<?php echo $_smarty_tpl->tpl_vars['BASE_URL']->value;?>
css/bootstrap-theme.min.css">
    <link rel="stylesheet" href="<?php echo $_smarty_tpl->tpl_vars['BASE_URL']->value;?>
css/main.css">

    <link href="<?php echo $_smarty_tpl->tpl_vars['BASE_URL']->value;?>
css/shop-homepage.css" rel="stylesheet">
    <link href="<?php echo $_smarty_tpl->tpl_vars['BASE_URL']->value;?>
css/general.css" rel="stylesheet">

    <script src="<?php echo $_smarty_tpl->tpl_vars['BASE_URL']->value;?>
javascript/vendor/modernizr-2.6.2-respond-1.1.0.min.js"></script>
</head>


<body>

<nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
    <div class="container">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>

            </button>
            <a class="navbar-brand" href="<?php echo $_smarty_tpl->tpl_vars['BASE_URL']->value;?>
">Loja Online</a>
        </div>

        <!-- Collect the nav links, forms, and other content for toggling -->
        <div class="collapse navbar-collapse navbar-ex1-collapse">
            <ul class="nav navbar-nav">
                <li><a href="shop-item.html">About</a>
                </li>
                <li><a href="shop-item.html">Services</a>
                </li>
                <li><a href="shop-item.html">Contact</a>
                </li>


            </ul>

            <ul class="nav navbar-nav navbar-right">
                <li>
                    <form class="navbar-form navbar-right" action="<?php echo $_smarty_tpl->tpl_vars['BASE_URL']->value;?>
pages/products/search-prods.php" method="get">
                        <div class="form-group">
                            <input type="text" placeholder="Search" name="search" class="form-control">
                        </div>
                        <button type="submit" class="btn btn-default"><span class="glyphicon glyphicon-search"></span></button>
                        <button type="submit" class="btn btn-danger active"><span class="glyphicon glyphicon-shopping-cart"></span>
                            <span class="badge shopping-cart" >0</span></button>
                    </form>
                </li>

                <?php if ($_smarty_tpl->tpl_vars['USERNAME']->value) {?>
                    <?php echo $_smarty_tpl->getSubTemplate ('common_proto/menu_logged_in.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>

                <?php } else { ?>
                    <?php echo $_smarty_tpl->getSubTemplate ('common_proto/menu_logged_out.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>

                <?php }?>


            </ul>


        </div>
        <!-- /.navbar-collapse -->
    </div>
    <!-- /.container -->
</nav>

<div class="container">
    <div class="row">
        <?php  $_smarty_tpl->tpl_vars['success'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['success']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['SUCCESS_MESSAGES']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['success']->key => $_smarty_tpl->tpl_vars['success']->value) {
$_smarty_tpl->tpl_vars['success']->_loop = true;
?>

        <div class="col-md-12 message">
            <div class="panel panel-success">
                <div class="panel-heading">
                    <h3 class="panel-title"><?php echo $_smarty_tpl->tpl_vars['success']->value;?>
 </h3>
                    <span class="pull-right clickable message-closer"><i class="glyphicon glyphicon-remove"></i></span>
                </div>

            </div>
        </div>
        <?php } ?>

    </div>

    <div class="row">
        <?php  $_smarty_tpl->tpl_vars['error'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['error']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['ERROR_MESSAGES']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['error']->key => $_smarty_tpl->tpl_vars['error']->value) {
$_smarty_tpl->tpl_vars['error']->_loop = true;
?>
            <div class="col-md-12 message">
                <div class="panel panel-danger">
                    <div class="panel-heading">
                        <h3 class="panel-title"><?php echo $_smarty_tpl->tpl_vars['error']->value;?>
</h3>
                        <span class="pull-right clickable message-closer"><i class="glyphicon glyphicon-remove"></i></span>
                    </div>

                </div>
            </div>
        <?php } ?>

    </div>
<!-- TODO adicionar field erros
    <div class="row">

        <div class="col-md-12">
            <div class="panel panel-warning">
                <div class="panel-heading">
                    <h3 class="panel-title">Warning1</h3>
                    <span class="pull-right clickable message-closer"><i class="glyphicon glyphicon-remove"></i></span>
                </div>

            </div>
        </div>

    </div>
</div>

--><?php }} ?>
