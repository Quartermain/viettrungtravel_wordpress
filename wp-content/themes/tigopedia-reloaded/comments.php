<?php // Do not delete these lines
	if ('comments.php' == basename($_SERVER['SCRIPT_FILENAME']))
		die ('Please do not load this page directly. Thanks!');

	if (!empty($post->post_password))
	{ // if there's a password
		if ($_COOKIE['wp-postpass_' . COOKIEHASH] != $post->post_password)
		{  // and it doesn't match the cookie
?>
			<div class="center-widget-title">Comments</div>
			<div class="center-widget">
				<p class="nocomments">This post is password protected. Enter the password to view comments.<p>
			</div> <!-- center-widget -->
<?php
			return;
		}
	}

	/* This variable is for alternating comment background */
	$oddcomment = 'alt';
?>

<!-- You can start editing here. -->

<?php if ($comments) : ?>
	<div class="center-widget-title">
		<?php comments_number('No Responses', 'One Response', '% Comments' );?>
	</div> <!-- center-widget-title -->

	<div class="center-widget">
		<div class="comment-list">
			<?php
			$comment_num = 1;
			foreach ($comments as $comment) :
			?>
				<div class="<?php if ($oddcomment) echo "odd-comment"; else echo "even-comment"; ?>"
						 id="comment-<?php comment_ID() ?>">

							<div class="comment-meta">
									<?php if (get_comment_author_url() == '') { ?>
									<span class="comment-author"><?php comment_author(); ?></span>
									<?php } else { ?>
										<a target="_blank" href="<?php comment_author_url(); ?>"><?php comment_author(); ?></a>
									<?php } ?>
								on

									<?php comment_date('F jS, Y') ?> at <?php comment_time() ?>

									<?php edit_comment_link(__('Edit'), ' &#183; ', ''); ?>
									
									<br />
									<?php if ($comment->comment_approved == '0') : ?>
									<em>Your comment is awaiting moderation.</em>
								  <?php endif; ?>
							</div> <!-- comment-meta -->

					<div class="comment-text">
					<?php comment_text() ?>
					</div>

				</div> <!-- even/odd comment -->

			<?php /* Changes every other comment to a different class */
				if ('alt' == $oddcomment)
					$oddcomment = '';
				else
					$oddcomment = 'alt';
			?>

			<?php
				$comment_num++;

			endforeach; /* end for each comment */
			?>

		</div> <!-- comment-list -->
	</div> <!-- center-widget -->
<?php else : // this is displayed if there are no comments so far ?>
	<?php if ('open' == $post->comment_status) : ?>
		<!-- If comments are open, but there are no comments. -->
	<?php else : // comments are closed ?>
		<!-- If comments are closed. -->
	<?php endif; ?>
<?php endif; ?>

<?php if ('open' == $post->comment_status) : ?>
	<div class="center-widget-title" id="respond">Post a Comment</div>
	<div class="center-widget">
		<?php if ( get_option('comment_registration') && !$user_ID ) : ?>
			<p>You must be <a href="<?php echo get_option('siteurl'); ?>/wp-login.php?redirect_to=<?php the_permalink(); ?>">logged in</a> to post a comment.</p>
		<?php else : ?>
			<form action="<?php echo get_option('siteurl'); ?>/wp-comments-post.php" method="post" id="commentform">
			<?php if ( $user_ID ) : ?>
				<p>Logged in as <a href="<?php echo get_option('siteurl'); ?>/wp-admin/profile.php"><?php echo $user_identity; ?></a>. <a href="<?php echo get_option('siteurl'); ?>/wp-login.php?action=logout" title="Log out of this account">Logout &raquo;</a></p>
			<?php else : ?>
				<p>
					<input type="text"
								 name="author"
								 id="author"
								 value="<?php echo $comment_author; ?>"
								 size="22"
								 tabindex="1" />
						<label for="author"><small>Name <?php if ($req) echo "(required)"; ?></small></label>
				</p>

				<p>
					<input type="text"
								 name="email"
								 id="email"
								 value="<?php echo $comment_author_email; ?>"
								 size="22"
								 tabindex="2" />
					<label for="email">
						<small>Mail (will not be published) <?php if ($req) echo "(required)"; ?></small>
					</label>
				</p>

				<p>
					<input type="text"
								 name="url"
								 id="url"
								 value="<?php echo $comment_author_url; ?>"
								 size="22"
								 tabindex="3" />
					<label for="url"><small>Website</small></label>
				</p>

			<?php endif; ?>

			<p><textarea name="comment" id="comment" cols="80" rows="10" tabindex="4"></textarea></p>

                        <input name="submit" type="submit" id="submit" tabindex="5" value="Submit Comment" />
                        <input type="hidden" name="comment_post_ID" value="<?php echo $id; ?>" />
                        <?php do_action('comment_form', $post->ID); ?>

			</form>

			<?php if (function_exists('show_manual_subscription_form')) show_manual_subscription_form(); ?>

		<?php endif; ?>
	</div> <!-- center-widget -->
<?php else : // comments are closed ?>
	<!-- If comments are closed. -->
	<div class="center-widget-title">Post a Comment</div>
	<div class="center-widget">
		<p class="nocomments">Comments are closed.<p>
	</div> <!-- center-widget -->
<?php endif; ?>