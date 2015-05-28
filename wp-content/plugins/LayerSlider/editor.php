<?php

	// Skin
	if(isset($_GET['skin']) && !empty($_GET['skin'])) {
		$skin = $_GET['skin'];
	} else {

		// Open folder
		$handle = opendir(dirname(__FILE__) . '/skins');

		// Iterate over the contents
		while (false !== ($entry = readdir($handle))) {
			if($entry == '.' || $entry == '..' || $entry == 'preview') {
				continue;
			} else {
				$skin = $entry;
				break;
			}
		}
	}

	// File
	$file = dirname(__FILE__) . '/skins/' . $skin . '/skin.css';

	// Get screen options
	$lsScreenOptions = get_option('lsScreenOptions', '0');
	$lsScreenOptions = ($lsScreenOptions == 0) ? array() : $lsScreenOptions;
	$lsScreenOptions = is_array($lsScreenOptions) ? $lsScreenOptions : unserialize($lsScreenOptions);

	// Defaults
	if(!isset($lsScreenOptions['showTooltips'])) {
		$lsScreenOptions['showTooltips'] = 'true';
	}
?>

<div id="ls-screen-options" class="metabox-prefs hidden">
	<div id="screen-options-wrap" class="hidden">
		<form id="ls-screen-options-form" action="<?php echo $_SERVER['REQUEST_URI']?>" method="post">
			<h5>Show on screen</h5>
			<label>
				<input type="checkbox" name="showTooltips"<?php echo $lsScreenOptions['showTooltips'] == 'true' ? ' checked="checked"' : ''?>> Tooltips
			</label>
		</form>
	</div>
	<div id="screen-options-link-wrap" class="hide-if-no-js screen-meta-toggle">
		<a href="#screen-options-wrap" id="show-settings-link" class="show-settings">Screen Options</a>
	</div>
</div>

<div class="wrap">

	<!-- Page title -->
	<div class="ls-icon-layers"></div>
	<h2>
		<?php _e('LayerSlider Skin Editor', 'LayerSlider') ?>
		<a href="?page=layerslider" class="add-new-h2"><?php _e('Back to the list', 'LayerSlider') ?></a>
	</h2>

	<?php if(isset($_GET['edited'])) : ?>
	<div class="updated"><?php _e('Your changes has been saved!', 'LayerSlider') ?></div>
	<?php  endif; ?>

	<!-- Editor box -->
	<div class="ls-box ls-skin-editor-box">
		<h3 class="header">
			<?php _e('Skin Editor', 'LayerSlider') ?>
			<p>
				<span><?php _e('Choose a skin:', 'LayerSlider') ?></span>
				<select name="skin" class="ls-skin-editor-select">
					<?php $handle = opendir(dirname(__FILE__) . '/skins'); ?>
					<?php while (false !== ($entry = readdir($handle))) : ?>
					<?php if($entry == '.' || $entry == '..' || $entry == 'preview') continue; ?>
					<?php if($entry == $skin) { ?>
					<option selected="selected"><?php echo $entry ?></option>
					<?php } else { ?>
					<option><?php echo $entry ?></option>
					<?php } ?>
					<?php endwhile; ?>
					<?php closedir($handle); ?>
				</select>
			</p>
		</h3>
		<form action="<?php echo $_SERVER['REQUEST_URI'] ?>" method="post" class="inner">
			<input type="hidden" name="posted_ls_skin_editor" value="1">
			<textarea rows="10" cols="50" name="contents" id="editor"><?php echo file_get_contents($file); ?></textarea>
			<p>
				<?php if(!is_writable($file)) { ?>
				<?php _e('You need to make this file writable before you can save your changes. See the <a href="http://codex.wordpress.org/Changing_File_Permissions" target="_blank">Codex</a> for more information.', 'LayerSlider') ?>
				<?php } else { ?>
				<button class="button-primary"><?php _e('Save changes', 'LayerSlider') ?></button>
				<?php _e("Modifying a skin could be dangerous, these changes will be permanent, you can't revert it.", "LayerSlider") ?>
				<?php } ?>
			</p>
		</form>
	</div>
</div>

<script type="text/javascript">
	// Screen options
	var lsScreenOptions = <?php echo json_encode($lsScreenOptions) ?>;
</script>
