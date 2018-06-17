<?php
if( !function_exists('topdeal_comment') ){
	function topdeal_comment($comment, $args, $depth) {
		$GLOBALS['comment'] = $comment; ?>
		<div id="comment-<?php comment_ID(); ?>" <?php comment_class('media'); ?>>
			<div class="author pull-left">
				<?php echo get_avatar($comment, $size = '100'); ?>
			</div>
			<div class="media-body">
				<div class="media">
					<div class="media-heading clearfix">
						<div class="author-name custom-font pull-left">
							<span><?php echo comment_author_link(get_comment_ID())?></span>
						</div>
						<div class="time pull-left">
							<?php edit_comment_link(__('(Edit)', 'topdeal'), '', ''); ?>
							<time datetime="<?php echo comment_date('c'); ?>"><?php printf(__('%1$s', 'topdeal'), get_comment_date(),  get_comment_time()); ?></time>
						</div>
						<div class="reply pull-right"><?php comment_reply_link(array_merge($args, array('depth' => $depth, 'max_depth' => $args['max_depth']))); ?></div>
					</div>
					<?php if ($comment->comment_approved == '0') : ?>
						<div class="awaiting row-fluid">
						  <i><?php esc_html_e('Your comment is awaiting moderation.', 'topdeal'); ?></i>
						</div>
					<?php endif; ?>
					<div class="media-content row-fluid">
						<?php comment_text(); ?>						
					</div> 
				</div>
		 	 </div>
		</div>
<?php } } ?>

<?php if (have_comments()) : ?>
	<div id="comments">
		<h3 class="title"><?php esc_html_e( 'Comments', 'topdeal' ) ?> <small>(<?php echo get_post()->comment_count;?>)</small></h3>
		<?php if (post_password_required()) : ?>
			<div class="alert alert-warning alert-dismissible" role="alert">
				<a class="close" data-dismiss="alert">&times;</a>
				<p><?php esc_html_e('This post is password protected. Enter the password to view comments.', 'topdeal'); ?></p>
			</div>
		<?php else:  ?>
		
		<div class="commentlist">
			<div class="entry-summary">
				<?php wp_list_comments(array('callback' => 'topdeal_comment')); ?>
			</div>
		</div>

		<?php if (get_comment_pages_count() > 1 && get_option('page_comments')) : // are there comments to navigate through ?>
			<nav id="comments-nav" class="pager">
				<ul class="pager">
					<?php if (get_previous_comments_link()) : ?>
						<li class="previous"><?php previous_comments_link(__('&larr; Older comments', 'topdeal')); ?></li>
					<?php else: ?>
						<li class="previous disabled"><a><?php esc_html_e('&larr; Older comments', 'topdeal'); ?></a></li>
					<?php endif; ?>
					<?php if (get_next_comments_link()) : ?>
						<li class="next"><?php next_comments_link(__('Newer comments &rarr;', 'topdeal')); ?></li>
					<?php else: ?>
						<li class="next disabled"><a><?php esc_html_e('Newer comments &rarr;', 'topdeal'); ?></a></li>
					<?php endif; ?>
				</ul>
			</nav>
		<?php endif; // check for comment navigation ?>
	<?php endif; ?>
	</div><!-- /#comments -->
<?php endif; ?>

<?php if (comments_open()) : ?>
<div id="respond">
	<div class="wp-comment">
		<h2 class="title"><?php esc_html_e('Leave Your Comment','topdeal');?></h2>
		<p class="cancel-comment-reply"><?php cancel_comment_reply_link(); ?></p>
		
		<form action="<?php echo get_option('siteurl'); ?>/wp-comments-post.php" method="post" id="commentform" name="commentform" onsubmit="return submitform()" class="form-horizontal row-fluid">		
			<?php if (is_user_logged_in()) : ?>
				<p><?php printf(__('Logged in as <a href="%s/wp-admin/profile.php">%s</a>.', 'topdeal'), get_option('siteurl'), $user_identity); ?> <a href="<?php echo wp_logout_url(get_permalink()); ?>" title="<?php esc_attr_e('Log out of this account', 'topdeal'); ?>"><?php esc_html_e('Log out &raquo;', 'topdeal'); ?></a></p>
			<?php else : ?>
	        <div class="cmm-box-top clearfix">
				<div class="control-group your-name pull-left">
					<div class="controls">
						<input type="text" class="input-block-level" placeholder="<?php esc_attr_e( 'Name*', 'topdeal' ) ?>" name="author" id="author" value="<?php echo esc_attr($comment_author); ?>" size="22" tabindex="1" <?php if ($req) echo "aria-required='true'"; ?>>	
					</div>
				</div>
				<div class="control-group your-email pull-left">
					<div class="controls">
						<input placeholder="<?php esc_attr_e( 'Email*', 'topdeal' ) ?>" type="email" class="input-block-level" name="email" id="email" value="<?php echo esc_attr($comment_author_email); ?>" size="22" tabindex="2" <?php if ($req) echo "aria-required='true'"; ?>>
					</div>
				</div>
				<div class="control-group website pull-left">		
					<input placeholder="<?php esc_attr_e( 'Your Website', 'topdeal' ) ?>" type="url" class="input-block-level" name="url" id="url" value="<?php echo esc_attr($comment_author_url); ?>" size="22" tabindex="3">
				</div>
			</div>
			<?php endif; ?>
	        <div class="cmm-box-bottom clearfix">
				<div class="control-group your-comment">			
					<div class="controls">
						<textarea name="comment" placeholder="<?php esc_attr_e( 'Your Comment *', 'topdeal' ) ?>" id="comment" class="input-block-level" rows="7" tabindex="4" <?php if ($req) echo "aria-required='true'"; ?>></textarea>
					</div>
				</div>
				<button type="submit" class="btn btn-default"><?php esc_html_e('submit', 'topdeal'); ?></button>
	        </div>
			<?php comment_id_fields(); ?>
			<?php do_action('comment_form', $post->ID ); ?>
		</form>
	</div> <!-- /.wp-comment -->
</div><!-- /#respond -->
<?php endif; ?>