<?php get_template_part('parts/header'); ?>

<div class="container">
  <div class="row">
    
    <div class="col-xs-12 col-sm-8">
      <div id="content" role="main">
        <h2>Search Results for &ldquo;<?php the_search_query(); ?>&rdquo;</h2>
        <hr/>
        <?php if(have_posts()): while(have_posts()): the_post();?>
        <article role="article" id="post_<?php the_ID()?>" <?php post_class()?>>
          <header>
            <h4><a href="<?php the_permalink(); ?>"><?php the_title()?></a></h4>
          </header>
          <?php the_excerpt(); ?>
          <hr/>
        </article>
        <?php endwhile; ?> 
        <?php else: ?>
        <div class="alert alert-warning">
          <i class="glyphicon glyphicon-exclamation-sign"></i> Sorry, your search yielded no results.
        </div>
        <?php endif;?>
      </div><!-- /#content -->
    </div>
    
    <div class="col-xs-6 col-sm-4" id="sidebar" role="navigation">
        <?php get_template_part('parts/sidebar'); ?>
    </div>
    
  </div><!-- /.row -->
</div><!-- /.container -->

<?php get_template_part('parts/footer'); ?>
