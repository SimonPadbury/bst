<?php
 
// Do not delete this section
if (isset($_SERVER['SCRIPT_FILENAME']) && 'comments.php' == basename($_SERVER['SCRIPT_FILENAME'])){
  die ('Please do not load this page directly. Thanks!'); }
if ( post_password_required() ) { ?>
  <div class="alert alert-warning">
    <?php _e('This post is password protected. Enter the password to view comments.', 'bst'); ?>
  </div>
<?php
  return; 
}
// End do not delete section
 
if (have_comments()) : ?>

<h3>Feedback</h3>
<p class="text-muted" style="margin-bottom: 20px;">
 <i class="glyphicon glyphicon-comment"></i>&nbsp; Comments: <?php comments_number('None', '1', '%'); ?>
</p>
  
<ol class="commentlist">
  <?php wp_list_comments('type=comment&callback=bst_comment');?>
</ol>

<ul class="pagination">
  <li class="older"><?php previous_comments_link() ?></li>
  <li class="newer"><?php next_comments_link() ?></li>
</ul>

<?php
  else :
	  if (comments_open()) :
  echo"<p class='alert alert-info'>Be the first to write a comment.</p>";
		else :
			echo"<p class='alert alert-warning'>Comments are closed for this post.</p>";
		endif;
	endif;
?>

<?php if (comments_open()) : ?>
<section id="respond">
  <h3><?php comment_form_title(__('Your feedback', 'bst'), __('Responses to %s', 'bst')); ?></h3>
  <p><?php cancel_comment_reply_link(); ?></p>
  <?php if (get_option('comment_registration') && !is_user_logged_in()) : ?>
  <p><?php printf(__('You must be <a href="%s">logged in</a> to post a comment.', 'bst'), wp_login_url(get_permalink())); ?></p>
  <?php else : ?>
  <form action="<?php echo get_option('siteurl'); ?>/wp-comments-post.php" method="post" id="commentform">
    <?php if (is_user_logged_in()) : ?>
    <p>
      <?php printf(__('Logged in as <a href="%s/wp-admin/profile.php">%s</a>.', 'bst'), get_option('siteurl'), $user_identity); ?>
      <a href="<?php echo wp_logout_url(get_permalink()); ?>" title="<?php __('Log out of this account', 'bst'); ?>"><?php _e('Log out <i class="glyphicon glyphicon-arrow-right"></i>', 'bst'); ?></a>
    </p>
    <?php else : ?>
    <div class="form-group">
      <label for="author"><?php _e('Your name', 'bst'); if ($req) _e(' <span class="text-muted">(required)</span>', 'bst'); ?></label>
      <input type="text" class="form-control" name="author" id="author" placeholder="Your name" value="<?php echo esc_attr($comment_author); ?>" <?php if ($req) echo 'aria-required="true"'; ?>>
    </div>
    <div class="form-group">
      <label for="email"><?php _e('Your email address', 'bst'); if ($req) _e(' <span class="text-muted">(required, but will not be published)</span>', 'bst'); ?></label>
      <input type="email" class="form-control" name="email" id="email" placeholder="Your email address" value="<?php echo esc_attr($comment_author_email); ?>" <?php if ($req) echo 'aria-required="true"'; ?>>
    </div>
    <div class="form-group">
      <label for="url"><?php _e('Your website <span class="text-muted">if you have one (not required)</span>', 'bst'); ?></label>
      <input type="url" class="form-control" name="url" id="url" placeholder="Your website url" value="<?php echo esc_attr($comment_author_url); ?>">
    </div>
    <?php endif; ?>
    <div class="form-group">
      <label for="comment"><?php _e('Your comment', 'bst'); ?></label>
      <textarea name="comment" class="form-control" id="comment" placeholder="Your comment" rows="8" aria-required="true"></textarea>
    </div>
    <p><input name="submit" class="btn btn-default" type="submit" id="submit" value="<?php _e('Submit comment', 'bst'); ?>"></p>
    <?php comment_id_fields(); ?>
    <?php do_action('comment_form', $post->ID); ?>
  </form>
  <?php endif; ?>
</section>
<?php endif; ?>
