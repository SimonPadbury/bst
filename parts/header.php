<!DOCTYPE html>
<html>
<head>
	<title><?php is_front_page() ? bloginfo('description') : wp_title('•', true, ''); ?></title>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>

<!--[if lt IE 8]>
<div class="alert alert-warning">
	You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.
</div>
<![endif]-->    

<nav class="navbar navbar-default navbar-static-top" role="navigation">
  <div class="container">
    <div class="navbar-header">
      <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      <a class="navbar-brand" href="<?php echo home_url('/'); ?>"><?php bloginfo('name'); ?></a>
    </div><!-- /.navbar-header -->
    <div class="collapse navbar-collapse navbar-ex1-collapse">    
      <?php				
          $args = array(
            'theme_location' => 'top-bar',
            'depth' => 0,
            'container'	=> false,
            'fallback_cb' => false,
            'menu_class' => 'nav navbar-nav',
            'walker' => new BootstrapNavMenuWalker()
          );
          wp_nav_menu($args);
      ?>
	  </div><!-- /.navbar-collapse -->
  </div>
</nav>

<div class="container">
  <div class="row">
    <div class="col-sm-12">
      <h1 id="site-title">
        <a class="text-muted" href="<?php echo home_url('/'); ?>" title="<?php echo esc_attr(get_bloginfo('name', 'display')); ?>" rel="home"><?php bloginfo('name'); ?></a>
      </h1>
    </div>
  </div>
  <hr/>
</div>
