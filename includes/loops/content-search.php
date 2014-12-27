<?php
/*
The Search Loop
===============
*/
?>

<?php if(have_posts()): while(have_posts()): the_post(); ?>
    <article role="article" id="post_<?php the_ID()?>" <?php post_class()?>>
        <header>
            <h4><a href="<?php the_permalink(); ?>"><?php the_title()?></a></h4>
        </header>
      <?php the_excerpt(); ?>
    </article>
<?php endwhile; else: ?>
    <div class="alert alert-warning">
        <i class="glyphicon glyphicon-exclamation-sign"></i> <?php _e('Sorry, your search yielded no results.', 'bst'); ?>
    </div>
<?php endif; ?>
