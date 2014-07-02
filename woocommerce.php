<?php get_template_part('parts/header'); ?>

<div class="container">
  <div class="row">

    <div class="col-xs-12 col-sm-8">
      <div id="content" role="main">
        <div class="woocommerce">
					<?php woocommerce_content(); ?>
				</div>
      </div><!-- /#content -->      
    </div>

    <div class="col-xs-6 col-sm-4" id="sidebar" role="navigation">
      <?php get_template_part('parts/sidebar'); ?>
    </div>

  </div><!-- /.row -->
</div><!-- /.container -->

<?php get_template_part('parts/footer'); ?>
