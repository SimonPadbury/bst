<?php get_template_part('parts/header'); ?>

<div class="container">
  <div class="row">
    
    <div class="col-xs-12 col-sm-8">
      <div id="content" role="main">
        <?php if(have_posts()): while(have_posts()): the_post();?>
        <article role="article" id="post_<?php the_ID()?>">
          <header>
            <h2><a href="<?php the_permalink(); ?>"><?php the_title()?></a></h2>
            <h4>
              <em>
                <span class="text-muted" class="author"><?php _e('By', 'bst'); echo " "; the_author() ?>,</span>
                <time  class="text-muted" datetime="<?php the_time('d-m-Y')?>"><?php the_time('jS F Y') ?></time>
              </em>
            </h4>
          </header>
          <?php the_post_thumbnail(); ?>
          <?php the_content( __( '&hellip; ' . __('Continue reading', 'bst' ) . ' <i class="glyphicon glyphicon-arrow-right"></i>', 'bst' ) ); ?>
          <p class="text-muted" style="margin-bottom: 20px;">
            <i class="glyphicon glyphicon-folder-open"></i>&nbsp; <?php _e('Filed under', 'bst'); ?>: <?php the_category(', ') ?><br/>
            <i class="glyphicon glyphicon-comment"></i>&nbsp; <?php _e('Comments', 'bst'); ?>: <?php comments_popup_link(__('None', 'bst'), '1', '%'); ?>
          </p>
          <hr/>
        </article>
        <?php endwhile; ?>
        <ul class="pagination">
          <li class="older"><?php next_posts_link('&laquo; ' . __('Older', 'bst')) ?></li>
          <li class="newer"><?php previous_posts_link(__('Newer', 'bst') . ' &raquo;') ?></li>
        </ul>
        <?php else: ?>
        <?php wp_redirect(get_bloginfo('siteurl').'/404', 404); exit; ?>
        <?php endif;?>
      </div><!-- /#content -->
    </div>
    
    <div class="col-xs-6 col-sm-4" id="sidebar" role="navigation">
       <?php get_template_part('parts/sidebar'); ?>
    </div>
    
  </div><!-- /.row -->
</div><!-- /.container -->

<?php get_template_part('parts/footer'); ?>
