<?php if ( !empty($post->post_password) && $_COOKIE['wp-postpass_' . COOKIEHASH] != $post->post_password) : ?>
<p>This page is password-protected. Enter your password to continue!</p>
<?php return; endif; ?>

<?php if ( $comments ) : ?>
	<h3 id="comments"><?php comments_number('No Responses', 'One Response', '% Responses' );?> to &#8220;<?php the_title(); ?>&#8221;</h3>

<?php foreach ($comments as $comment) : ?>

<div class="comment">
<div class="gravatarside"><?php if (function_exists('get_avatar')) { echo get_avatar($comment,$size='48'); } ?></div>
<p class="commenticon">
<strong><?php comment_type('Comment','Trackback','Pingback'); ?></strong> from <strong><?php if ('' != get_comment_author_url()) { ?><a href="<?php comment_author_url(); ?>"><?php comment_author() ?></a><?php } else { comment_author(); } ?></strong>
<?php edit_comment_link('[e]',' | '); ?><br />
<strong>Time</strong> <?php comment_date() ?> at <?php comment_time(); ?></p>
<?php comment_text() ?>

<?php if ($comment->comment_approved == '0') : ?>
<p><strong>Thank you for your comment! It has been added to the moderation queue and will be published here if approved by the webmaster.</strong></p>
<?php endif; ?>
</div>

<?php endforeach; ?>
<?php endif; ?>

<?php if ($post->comment_status == "open") : ?>
<div id="respond">
<h3>Write a comment</h3>
<?php if (get_option('comment_registration') && !$user_ID) : ?>
<p>You need to <a href="<?php echo get_option('siteurl'); ?>/wp-login.php?redirect_to=<?php the_permalink(); ?>">login</a> to post comments!</p>
</div>

<?php else : ?>
<form action="<?php echo get_option('siteurl'); ?>/wp-comments-post.php" method="post" id="commentform">
<?php if ($user_ID) : ?>
<p class="loggedin">You are logged in as <a href="<?php echo get_option('siteurl'); ?>/wp-admin/profile.php"><?php echo $user_identity; ?></a>. <a href="<?php echo get_option('siteurl'); ?>/wp-login.php?action=logout" title="Log out">Log out</a>.</p>

<?php else : ?>
<p><input type="text" name="author" id="author" value="<?php echo $comment_author; ?>" size="22" tabindex="1" />
<label for="author"><small>Name <?php if ($req) echo "(required)"; ?></small></label></p>
<p><input type="text" name="email" id="email" value="<?php echo $comment_author_email; ?>" size="22" tabindex="2" />
<label for="email"><small>Mail (will not be published) <?php if ($req) echo "(required)"; ?></small></label></p>
<p><input type="text" name="url" id="url" value="<?php echo $comment_author_url; ?>" size="22" tabindex="3" />
<label for="url"><small>Website</small></label></p>

<?php endif; ?>
<p><textarea name="comment" id="area1" cols="50%" rows="10" tabindex="4"></textarea></p>    	
<p><input type="hidden" name="comment_post_ID" value="<?php echo $id; ?>" />
<input type="image" src="<?php bloginfo('template_directory');?>/images/submit.gif" value="Add Comment" id="submit" name="submit" alt="Add Comment"/>
<p><?php do_action('comment_form', $post->ID); ?></p>
</form>
</div>

<?php endif; ?>
<?php endif; ?>
