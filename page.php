<?php get_template_part('parts/header'); ?>

<div class="container">

  <div class="row visible-xs">
    <div class="col-xs-12">
      <button style="margin-bottom: 20px;" type="button" class="pull-right btn btn-default" data-toggle="offcanvas">Off-canvas sidebar <i class="glyphicon glyphicon-arrow-right"></i>
      </button>
		</div>
  </div>
  <div class="row row-offcanvas row-offcanvas-right">
    
    <div class="col-xs-12 col-sm-8">
      <div id="content" role="main">
        <?php if(have_posts()): while(have_posts()): the_post();?>
        <article role="article" id="post_<?php the_ID()?>" <?php post_class()?>>
          <header>
            <h2><?php the_title()?></h2>
            <hr/>
          </header>
          <?php the_content()?>
        </article>
        <?php endwhile; ?> 
        <?php else: ?>
        <?php wp_redirect(get_bloginfo('siteurl').'/404', 404); exit; ?>
        <?php endif;?>
      </div><!-- #content -->
    </div>
    
    <div class="col-xs-6 col-sm-4 sidebar-offcanvas" id="sidebar" role="navigation">
      <div class="panel panel-default">
        <?php get_template_part('parts/sidebar'); ?>
      </div>
    </div>
    
  </div><!-- .row -->
</div><!-- .container -->

<?php get_template_part('parts/footer'); ?>
