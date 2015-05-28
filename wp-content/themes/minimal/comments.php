<?php
/* ------------------------------------------------------------------------ */
/* Theme Comments
/* ------------------------------------------------------------------------ */
global $sd_data;
/**
 * @package WordPress
 * @subpackage Default_Theme
 */

// Do not delete these lines
	if (!empty($_SERVER['SCRIPT_FILENAME']) && 'comments.php' == basename($_SERVER['SCRIPT_FILENAME']))
		die ('Please do not load this page directly. Thanks!');

	if ( post_password_required() ) { ?>

<p class="nocomments">
	<?php _e('This post is password protected. Enter the password to view comments.', 'sd-framework') ?>
</p>
<?php
		return;
	}
?>
<!-- You can start editing here. -->
<?php if ( have_comments() ) : ?>
<div id="comments" class="clearfix">
	<?php if ( !empty($comments_by_type['comment']) ) : ?>
	<h3 class="comments-title">
		<?php comments_number(__('', 'sd-framework'), __('1 Comment', 'sd-framework'), __('% Comments', 'sd-framework') );?>
		<span class="title-arrow"></span>
	</h3>
	<ol class="commentlist clearfix">
		<?php wp_list_comments('type=comment&avatar_size=70&callback=sd_custom_comments'); ?>
	</ol>
	<?php endif; ?>
	
	<!-- trackbacks & pings -->
	<?php if ( ! empty($comments_by_type['pings']) ) : ?>
	<div class="trackbacks">
		<h3>
			<?php _e('<h3 class="reply-title">Trackbacks/Pings</h3>', 'sd-framework'); ?>
		</h3>
		<ul>
			<?php wp_list_comments('type=pings&callback=list_pings'); ?>
		</ul>
	</div>
	<!-- trackbacks & pings end -->
	<?php endif; ?>
	<div class="navigation">
		<div class="alignleft">
			<?php previous_comments_link() ?>
		</div>
		<div class="alignright">
			<?php next_comments_link() ?>
		</div>
	</div>
	</div>
<?php else : // this is displayed if there are no comments so far ?>
<?php if ( comments_open() ) : ?>
<!-- If comments are open, but there are no comments. -->

<?php else : // comments are closed ?>
<p class="hidden">
	<?php _e('Comments are closed.', 'sd-framework'); ?>
</p>
<?php endif; ?>
<?php endif; ?>
<?php if ( comments_open() ) : ?>
<?php
		// Customize comments fields
		$fields =  array(
			'author'=> "<div class=\"respond-inputs\" class=\"clearfix\"><p><input onblur=\"this.value = this.value || this.defaultValue; this.style.color = '#d1d1cd';\" onfocus=\"this.value=''; this.style.color = '#737373';\" name=\"author\" type=\"text\" value=\"". __('Name (required)', 'sd-framework') .  "\"size=\"30\" aria-required=\"true\" /></p>",
			
			'email' => "<p><input onblur=\"this.value = this.value || this.defaultValue; this.style.color = '#d1d1cd';\" onfocus=\"this.value=''; this.style.color = '#737373';\" name=\"email\" type=\"text\" value=\"". __('E-Mail (required)', 'sd-framework') .  "\"size=\"30\" aria-required=\"true\" /></p>",
			
			'url' 	=> "<p class=\"last-input\"><input onblur=\"this.value = this.value || this.defaultValue; this.style.color = '#d1d1cd';\" onfocus=\"this.value=''; this.style.color = '#737373';\" name=\"url\" type=\"text\" value=\"". __('Website', 'sd-framework') .  "\"size=\"30\" /></p></div>"
	);
		// Comment Form Args
		$comments_args = array(
			'reply_text' => __('Reply', 'sd-framework'),
			'cancel_reply_link' => __('Cancel reply', 'sd-framework'),
			'fields' => $fields,
			'title_reply'=>'<h3 class="reply-title"><span>'. __('Leave a reply', 'sd-framework') .'</span><span class="title-arrow"></span></h3>',
			'comment_field' => '<div class="respond-textarea"><p><textarea id="comment" name="comment" aria-required="true" cols="58" rows="10" tabindex="4"></textarea></p></div>',
			'label_submit' => __('Submit Comment!','sd-framework')
		);

	// Show Comment Form
	comment_form($comments_args); 
	?>
<?php endif; ?>