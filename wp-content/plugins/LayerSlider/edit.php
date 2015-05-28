<?php

	// Get WPDB Object
	global $lsPluginPath;

	// Get the IF of the slider
	$id = (int) $_GET['id'];

	// Get slider
	$slider = lsSliderById($id);
	$slider = $slider['data'];

	if(function_exists( 'wp_enqueue_media' )) {
		$uploadClass = 'ls-mass-upload';
	} else {
		$uploadClass = 'ls-upload';
	}

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

<div id="ls-sample">
	<div class="ls-box ls-layer-box">
		<input type="hidden" name="layerkey" value="0">
		<table>
			<thead class="ls-layer-options-thead">
				<tr>
					<td colspan="7">
						<span id="ls-icon-layer-options"></span>
						<h4>
							<?php _e('Slide Options', 'LayerSlider') ?>
							<a href="#" class="duplicate ls-layer-duplicate"><?php _e('Duplicate this slide', 'LayerSlider') ?></a>
						</h4>
					</td>
				</tr>
			</thead>
			<tbody class="ls-slide-options">
				<input type="hidden" name="3d_transitions" value="">
				<input type="hidden" name="2d_transitions" value="">
				<input type="hidden" name="custom_3d_transitions" value="">
				<input type="hidden" name="custom_2d_transitions" value="">
				<tr>
					<td class="right"><?php _e('Slide options', 'LayerSlider') ?></td>
					<td class="right"><?php _e('Image', 'LayerSlider') ?></td>
					<td>
						<div class="reset-parent">
							<input type="text" name="background" class="ls-upload" value="" data-help="<?php _e('The slide image/background. Click into the field to open the WordPress Media Library to choose or upload an image.', 'LayerSlider') ?>">
							<span class="ls-reset">x</span>
						</div>
					</td>
					<td class="right"><?php _e('Thumbnail', 'LayerSlider') ?></td>
					<td>
						<div class="reset-parent">
							<input type="text" name="thumbnail" class="ls-upload" value="" data-help="<?php _e('The thumbnail image of this slide. Click into the field to open the WordPress Media Library to choose or upload an image. If you leave this field empty, the slide image will be used.', 'LayerSlider') ?>">
							<span class="ls-reset">x</span>
						</div>
					</td>
					<td class="right"><?php _e('Slide delay', 'LayerSlider') ?></td>
					<td><input type="text" name="slidedelay" class="layerprop" value="4000" data-help="<?php _e("Here you can set the time interval between slide changes, this slide will stay visible for the time specified here. This value is in millisecs, so the value 1000 means 1 second. Please don't use 0 or very low values.", "LayerSlider") ?>"> (ms)</td>
				</tr>
				<tr>
					<td class="right"><?php _e('Slide transition', 'LayerSlider') ?></td>
					<td class="right">Use 3D/2D</td>
					<td>
						<input type="checkbox" name="new_transitions" checked="checked" data-help="<?php _e('You can choose between the old and the new 3D/2D slide transitions introduced in version 4.0.0.', 'LayerSlider') ?>">
						<span>Old transition</span>
					</td>
					<td class="right">
						<span class="new"><?php _e('Transitions', 'LayerSlider') ?></span>
						<span class="ls-hidden old"><?php _e('Direction', 'LayerSlider') ?></span>
					</td>
					<td>
						<select name="slidedirection" class="layerprop ls-hidden old" data-help="<?php _e('The slide will slide in from this direction.', 'LayerSlider') ?>">
							<option value="top"><?php _e('top', 'LayerSlider') ?></option>
							<option value="right" selected="selected"><?php _e('right', 'LayerSlider') ?></option>
							<option value="bottom"><?php _e('bottom', 'LayerSlider') ?></option>
							<option value="left"><?php _e('left', 'LayerSlider') ?></option>
						</select>
						<button class="button ls-select-transitions new" data-help="<?php _e('You can select your desired slide transitions by clicking on this button.', 'LayerSlider') ?>">Select transitions</button>
					</td>
					<td class="right"><span class="new"><?php _e('Time shift', 'LayerSlider') ?></span></td>
					<td><input type="text" name="timeshift" class="new layerprop" value="0" data-help="<?php _e('You can control here the timing of the layer animations when the slider changes to this slide with a 3D/2D transition. Zero means that the layers of this slide will animate in when the slide transition ends. You can time-shift the starting time of the layer animations with positive or negative values.', 'LayerSlider') ?>"> <span class="new">(ms)</span></td>
				</tr>
				<tr class="ls-old-transitions ls-hidden">
					<td class="right"><?php _e('Slide in', 'LayerSlider') ?></td>
					<td class="right"><?php _e('Duration', 'LayerSlider') ?></td>
					<td><input type="text" name="durationin" class="layerprop" value="1500" data-help="<?php _e('The duration of the slide in animation. This value is in millisecs, so the value 1000 means 1 second.', 'LayerSlider') ?>"> (ms)</td>
					<td class="right"><a href="http://easings.net/" target="_blank"><?php _e('Easing', 'LayerSlider') ?></a></td>
					<td>
						<select name="easingin" class="layerprop" data-help="<?php _e('The timing function of the animation, with it you can manipualte the slide movement. Please click on the link next to this select field to open easings.net for more information and real-time examples.', 'LayerSlider') ?>">
							<option>linear</option>
							<option>swing</option>
							<option>easeInQuad</option>
							<option>easeOutQuad</option>
							<option>easeInOutQuad</option>
							<option>easeInCubic</option>
							<option>easeOutCubic</option>
							<option>easeInOutCubic</option>
							<option>easeInQuart</option>
							<option>easeOutQuart</option>
							<option>easeInOutQuart</option>
							<option>easeInQuint</option>
							<option>easeOutQuint</option>
							<option selected="selected">easeInOutQuint</option>
							<option>easeInSine</option>
							<option>easeOutSine</option>
							<option>easeInOutSine</option>
							<option>easeInExpo</option>
							<option>easeOutExpo</option>
							<option>easeInOutExpo</option>
							<option>easeInCirc</option>
							<option>easeOutCirc</option>
							<option>easeInOutCirc</option>
							<option>easeInElastic</option>
							<option>easeOutElastic</option>
							<option>easeInOutElastic</option>
							<option>easeInBack</option>
							<option>easeOutBack</option>
							<option>easeInOutBack</option>
							<option>easeInBounce</option>
							<option>easeOutBounce</option>
							<option>easeInOutBounce</option>
						</select>
					</td>
					<td class="right"><?php _e('Delay in', 'LayerSlider') ?></td>
					<td><input type="text" name="delayin" class="layerprop"value="0"  data-help="<?php _e('Delay before the animation start when the slide slides in. This value is in millisecs, so the value 1000 means 1 second.', 'LayerSlider') ?>"> (ms)</td>
				</tr>
				<tr class="ls-old-transitions ls-hidden">
					<td class="right"><?php _e('Slide out', 'LayerSlider') ?></td>
					<td class="right"><?php _e('Duration', 'LayerSlider') ?></td>
					<td><input type="text" name="durationout" class="layerprop" value="1500"  data-help="<?php _e('The duration of the slide out animation. This value is in millisecs, so the value 1000 means 1 second.', 'LayerSlider') ?>"> (ms)</td>
					<td class="right"><a href="http://easings.net/" target="_blank"><?php _e('Easing', 'LayerSlider') ?></a></td>
					<td>
						<select name="easingout" class="layerprop" data-help="<?php _e('The timing function of the animation, with it you can manipualte the slide movement. Please click on the link next to this select field to open easings.net for more information and real-time examples.', 'LayerSlider') ?>">
							<option>linear</option>
							<option>swing</option>
							<option>easeInQuad</option>
							<option>easeOutQuad</option>
							<option>easeInOutQuad</option>
							<option>easeInCubic</option>
							<option>easeOutCubic</option>
							<option>easeInOutCubic</option>
							<option>easeInQuart</option>
							<option>easeOutQuart</option>
							<option>easeInOutQuart</option>
							<option>easeInQuint</option>
							<option>easeOutQuint</option>
							<option selected="selected">easeInOutQuint</option>
							<option>easeInSine</option>
							<option>easeOutSine</option>
							<option>easeInOutSine</option>
							<option>easeInExpo</option>
							<option>easeOutExpo</option>
							<option>easeInOutExpo</option>
							<option>easeInCirc</option>
							<option>easeOutCirc</option>
							<option>easeInOutCirc</option>
							<option>easeInElastic</option>
							<option>easeOutElastic</option>
							<option>easeInOutElastic</option>
							<option>easeInBack</option>
							<option>easeOutBack</option>
							<option>easeInOutBack</option>
							<option>easeInBounce</option>
							<option>easeOutBounce</option>
							<option>easeInOutBounce</option>
						</select>
					</td>
					<td class="right"><?php _e('Delay out', 'LayerSlider')  ?></td>
					<td><input type="text" name="delayout" class="layerprop" value="0"  data-help="<?php _e('Delay before the animation start when the slide slides out. This value is in millisecs, so the value 1000 means 1 second.', 'LayerSlider') ?>"> (ms)</td>
				</tr>
				<tr>
					<td class="right"><?php _e('Link this slide', 'LayerSlider'); ?></td>
					<td class="right"><?php _e('Link URL', 'LayerSlider') ?></td>
					<td><input type="text" name="layer_link" value="" data-help="<?php _e('If you want to link the whole slide, enter the URL of your link here.', 'LayerSlider') ?>"></td>
					<td class="right"><?php _e('Link target', 'LayerSlider') ?></td>
					<td>
						<select name="layer_link_target" data-help="<?php _e('You can control here the link behaviour: _self means the linked page will open in the current tab/window, _blank will create a new tab/window.', 'LayerSlider') ?>">
							<option>_self</option>
							<option>_blank</option>
							<option>_parent</option>
							<option>_top</option>
						</select>
					</td>
					<td></td>
					<td></td>
				</tr>
				<tr>
					<td class="right"><?php _e('Misc', 'LayerSlider') ?></td>
					<td class="right"><?php _e('#ID', 'LayerSlider') ?></td>
					<td><input type="text" name="id" value="" data-help="<?php _e('You can apply an ID attribute on the HTML element of this slide to work with it in your custom CSS or Javascript code.', 'LayerSlider') ?>"></td>
					<td class="right"><?php _e('Deeplink', 'LayerSlider') ?></td>
					<td><input type="text" name="deeplink" data-help="<?php _e('You can specify a slide alias name which you can use in your URLs with a hash mark, so LayerSlider will start with the correspondig slide.', 'LayerSlider') ?>"></td>
					<td class="right"><?php _e('Hidden', 'LayerSlider') ?></td>
					<td><input type="checkbox" name="skip" class="checkbox" data-help="<?php _e("If you don't want to use this slide in your front-page, but you want to keep it, you can hide it with this switch.", "LayerSlider") ?>"></td>
				</tr>
			</tbody>
		</table>
		<table>
			<thead>
				<tr>
					<td>
						<span id="ls-icon-preview"></span>
						<h4><?php _e('Preview', 'LayerSlider') ?></h4>
					</td>
				</tr>
			</thead>
			<tbody>
				<tr>
					<td class="ls-preview-td">
						<div class="ls-preview-wrapper">
							<div class="ls-preview">
								<div class="draggable ls-layer"></div>
							</div>
							<div class="ls-real-time-preview"></div>
							<button class="button ls-preview-button"><?php _e('Enter Preview', 'LayerSlider') ?></button>
						</div>
					</td>
				</tr>
			</tbody>
		</table>
		<table>
			<thead>
				<tr>
					<td>
						<span id="ls-icon-sublayers"></span>
						<h4><?php _e('Layers', 'LayerSlider') ?></h4>
					</td>
				</tr>
			</thead>
			<tbody class="ls-sublayers ls-sublayer-sortable">
				<tr>
					<td>
						<div class="ls-sublayer-wrapper">
							<span class="ls-sublayer-number">1</span>
							<span class="ls-highlight"><input type="checkbox" class="noreplace"></span>
							<span class="ls-icon-eye"></span>
							<span class="ls-icon-lock"></span>
							<input type="text" name="subtitle" class="ls-sublayer-title" value="Layer #1">
							<div class="clear"></div>
							<div class="ls-sublayer-nav">
								<a href="#" class="active"><?php _e('Basic', 'LayerSlider') ?></a>
								<a href="#"><?php _e('Options', 'LayerSlider') ?></a>
								<a href="#"><?php _e('Link', 'LayerSlider') ?></a>
								<a href="#"><?php _e('Style', 'LayerSlider') ?></a>
								<a href="#"><?php _e('Attributes', 'LayerSlider') ?></a>
								<a href="#" title="<?php _e('Remove this layer', 'LayerSlider') ?>" class="remove">x</a>
							</div>
							<div class="ls-sublayer-pages">
								<div class="ls-sublayer-page ls-sublayer-basic active">
									<select name="type">
										<option selected="selected">img</option>
										<option>div</option>
										<option>p</option>
										<option>span</option>
										<option>h1</option>
										<option>h2</option>
										<option>h3</option>
										<option>h4</option>
										<option>h5</option>
										<option>h6</option>
									</select>

									<div class="ls-sublayer-types">
										<span class="ls-type">
											<span class="ls-icon-img"></span><br>
											<?php _e('Image', 'LayerSlider') ?>
										</span>

										<span class="ls-type">
											<span class="ls-icon-div"></span><br>
											<?php _e('Div / Video', 'LayerSlider') ?>
										</span>

										<span class="ls-type">
											<span class="ls-icon-p"></span><br>
											<?php _e('Paragraph', 'LayerSlider') ?>
										</span>

										<span class="ls-type">
											<span class="ls-icon-span"></span><br>
											<?php _e('Span', 'LayerSlider') ?>
										</span>

										<span class="ls-type">
											<span class="ls-icon-h1"></span><br>
											<?php _e('H1', 'LayerSlider') ?>
										</span>

										<span class="ls-type">
											<span class="ls-icon-h2"></span><br>
											<?php _e('H2', 'LayerSlider') ?>
										</span>

										<span class="ls-type">
											<span class="ls-icon-h3"></span><br>
											<?php _e('H3', 'LayerSlider') ?>
										</span>

										<span class="ls-type">
											<span class="ls-icon-h4"></span><br>
											<?php _e('H4', 'LayerSlider') ?>
										</span>

										<span class="ls-type">
											<span class="ls-icon-h5"></span><br>
											<?php _e('H5', 'LayerSlider') ?>
										</span>

										<span class="ls-type">
											<span class="ls-icon-h6"></span><br>
											<?php _e('H6', 'LayerSlider') ?>
										</span>
									</div>

									<div class="ls-image-uploader">
										<img src="<?php echo $GLOBALS['lsPluginPath'].'/img/transparent.png' ?>" alt="layer image">
										<input type="text" name="image" class="<?php echo $uploadClass ?>" value="">
										<p>
											<?php _e('Click into this text field to open WordPress Media Library where you can upload new images or select previously used ones.', 'LayerSlider') ?>
										</p>
									</div>

									<div class="ls-html-code">
										<h5><?php _e('Custom HTML content', 'LayerSlider') ?></h5>
										<textarea name="html" cols="50" rows="5" data-help="<?php _e('Type here the contents of your layer. You can use any HTML codes in this field to insert other contents then text. This field is also shortcode-aware, so you can insert content from other plugins as well as video embed codes.', 'LayerSlider') ?>"></textarea>
									</div>
								</div>
								<div class="ls-sublayer-page ls-sublayer-options">
									<table>
										<tbody>
											<tr>
												<td rowspan="2"><?php _e('Transition in', 'LayerSlider') ?></td>
												<td class="right"><?php _e('Type', 'LayerSlider') ?></td>
												<td>
													<select name="slidedirection" class="sublayerprop" data-help="<?php _e('The type of the transition.', 'LayerSlider') ?>">
														<option value="fade"><?php _e('Fade', 'LayerSlider') ?></option>
														<option value="auto" selected="selected"><?php _e('Auto (Slide from auto direction)', 'LayerSlider') ?></option>
														<option value="top"><?php _e('Top (Slide from top)', 'LayerSlider') ?></option>
														<option value="right"><?php _e('Right (Slide from right)', 'LayerSlider') ?></option>
														<option value="bottom"><?php _e('Bottom (Slide from bottom)', 'LayerSlider') ?></option>
														<option value="left"><?php _e('Left (Slide from left)', 'LayerSlider') ?></option>
													</select>
												</td>
												<td class="right"><?php _e('Duration', 'LayerSlider') ?></td>
												<td><input type="text" name="durationin" class="sublayerprop" value="1000" data-help="<?php _e('The duration of the slide in animation. This value is in millisecs, so the value 1000 means 1 second. Lower values results faster animations.', 'LayerSlider') ?>"> (ms)</td>
												<td class="right"><a href="http://easings.net/" target="_blank"><?php _e('Easing', 'LayerSlider') ?></a></td>
												<td>
													<select name="easingin" class="sublayerprop" data-help="<?php _e('The timing function of the animation, with it you can manipualte the layer movement. Please click on the link next to this select field to open easings.net for more information and real-time examples.', 'LayerSlider') ?>">
														<option>linear</option>
														<option>swing</option>
														<option>easeInQuad</option>
														<option>easeOutQuad</option>
														<option>easeInOutQuad</option>
														<option>easeInCubic</option>
														<option>easeOutCubic</option>
														<option>easeInOutCubic</option>
														<option>easeInQuart</option>
														<option>easeOutQuart</option>
														<option>easeInOutQuart</option>
														<option>easeInQuint</option>
														<option>easeOutQuint</option>
														<option selected="selected">easeInOutQuint</option>
														<option>easeInSine</option>
														<option>easeOutSine</option>
														<option>easeInOutSine</option>
														<option>easeInExpo</option>
														<option>easeOutExpo</option>
														<option>easeInOutExpo</option>
														<option>easeInCirc</option>
														<option>easeOutCirc</option>
														<option>easeInOutCirc</option>
														<option>easeInElastic</option>
														<option>easeOutElastic</option>
														<option>easeInOutElastic</option>
														<option>easeInBack</option>
														<option>easeOutBack</option>
														<option>easeInOutBack</option>
														<option>easeInBounce</option>
														<option>easeOutBounce</option>
														<option>easeInOutBounce</option>
													</select>
												</td>
												<td class="right"><?php _e('Delay', 'LayerSlider') ?></td>
												<td><input type="text" name="delayin" class="sublayerprop" value="0" data-help="<?php _e('Delay before the animation start when the layer slides in. This value is in millisecs, so the value 1000 means 1 second.', 'LayerSlider') ?>"> (ms)</td>
											</tr>

											<tr>
												<td class="right notfirst"><?php _e('Rotation', 'LayerSlider') ?></td>
												<td><input type="text" name="rotatein" value="0" class="sublayerprop" data-help="You can set the initial rotation of this layer here which will animate to the default (0deg) value. You can use negative values."></td>
												<td class="right"><?php _e('Scale', 'LayerSlider') ?></td>
												<td><input type="text" name="scalein" value="1.0" class="sublayerprop" data-help="You can set the initial scale of this layer here which will be animated to the default (1.0) value."></td>
												<td class="right"></td>
												<td></td>
												<td class="right"></td>
												<td></td>
											</tr>

											<tr>
												<td rowspan="2"><?php _e('Transition out', 'LayerSlider') ?></td>
												<td class="right"><?php _e('Type', 'LayerSlider') ?></td>
												<td>
													<select name="slideoutdirection" class="sublayerprop" data-help="<?php _e('The type of the transition.', 'LayerSlider') ?>">
														<option value="fade"><?php _e('Fade', 'LayerSlider') ?></option>
														<option value="auto" selected="selected"><?php _e('Auto (Slide to auto direction)', 'LayerSlider') ?></option>
														<option value="top"><?php _e('Top (Slide to top)', 'LayerSlider') ?></option>
														<option value="right"><?php _e('Right (Slide to right)', 'LayerSlider') ?></option>
														<option value="bottom"><?php _e('Bottom (Slide to bottom)', 'LayerSlider') ?></option>
														<option value="left"><?php _e('Left (Slide to left)', 'LayerSlider') ?></option>
													</select>
												</td>
												<td class="right"><?php _e('Duration', 'LayerSlider') ?></td>
												<td><input type="text" name="durationout" class="sublayerprop" value="1000" data-help="<?php _e('The duration of the slide out animation. This value is in millisecs, so the value 1000 means 1 second. Lower values results faster animations.', 'LayerSlider') ?>"> (ms)</td>
												<td class="right"><a href="http://easings.net/" target="_blank"><?php _e('Easing', 'LayerSlider') ?></a></td>
												<td>
													<select name="easingout" class="sublayerprop" data-help="<?php _e('The timing function of the animation, with it you can manipualte the layer movement. Please click on the link next to this select field to open easings.net for more information and real-time examples.', 'LayerSlider') ?>">
														<option>linear</option>
														<option>swing</option>
														<option>easeInQuad</option>
														<option>easeOutQuad</option>
														<option>easeInOutQuad</option>
														<option>easeInCubic</option>
														<option>easeOutCubic</option>
														<option>easeInOutCubic</option>
														<option>easeInQuart</option>
														<option>easeOutQuart</option>
														<option>easeInOutQuart</option>
														<option>easeInQuint</option>
														<option>easeOutQuint</option>
														<option selected="selected">easeInOutQuint</option>
														<option>easeInSine</option>
														<option>easeOutSine</option>
														<option>easeInOutSine</option>
														<option>easeInExpo</option>
														<option>easeOutExpo</option>
														<option>easeInOutExpo</option>
														<option>easeInCirc</option>
														<option>easeOutCirc</option>
														<option>easeInOutCirc</option>
														<option>easeInElastic</option>
														<option>easeOutElastic</option>
														<option>easeInOutElastic</option>
														<option>easeInBack</option>
														<option>easeOutBack</option>
														<option>easeInOutBack</option>
														<option>easeInBounce</option>
														<option>easeOutBounce</option>
														<option>easeInOutBounce</option>
													</select>
												</td>
												<td class="right"><?php _e('Delay', 'LayerSlider') ?></td>
												<td><input type="text" name="delayout" class="sublayerprop" value="0" data-help="<?php _e('Delay before the animation start when the layer slides out. This value is in millisecs, so the value 1000 means 1 second.', 'LayerSlider') ?>"> (ms)</td>
											</tr>

											<tr>
												<td class="right notfirst"><?php _e('Rotation', 'LayerSlider') ?></td>
												<td><input type="text" name="rotateout" value="0" class="sublayerprop" data-help="You can set the ending rotation here, this sublayer will be animated from the default (0deg) value to yours. You can use negative values."></td>
												<td class="right"><?php _e('Scale', 'LayerSlider') ?></td>
												<td><input type="text" name="scaleout" value="1.0" class="sublayerprop" data-help="You can set the ending scale value here, this sublayer will be animated from the default (1.0) value to yours."></td>
												<td class="right"></td>
												<td></td>
												<td class="right"></td>
												<td></td>
											</tr>

											<tr>
												<td><?php _e('Other options', 'LayerSlider') ?></td>
												<td class="right"><?php _e('Distance', 'LayerSlider') ?></td>
												<td><input type="text" name="level" value="-1" data-help="<?php _e('The default value is -1 which means that the layer will be positioned exactly outside of the slide container. You can use the default setting in most of the cases. If you need to set the start or end position of the layer from further of the edges of the slide container, you can use 2, 3 or higher values.', 'LayerSlider') ?>"></td>
												<td class="right"><?php _e('Show until', 'LayerSlider') ?></td>
												<td><input type="text" name="showuntil" class="sublayerprop" value="0" data-help="<?php _e('The layer will be visible for the time you specify here, then it will slide out. You can use this setting for layers to leave the slide before the slide itself animates out, or for example before other layers will slide in. This value in millisecs, so the value 1000 means 1 second.', 'LayerSlider') ?>"> (ms)</td>
												<td class="right"><?php _e('Hidden', 'LayerSlider') ?></td>
												<td><input type="checkbox" name="skip" class="checkbox" data-help="<?php _e("If you don't want to use this layer, but you want to keep it, you can hide it with this switch.", "LayerSlider") ?>"></td>
												<td colspan="3"><button class="button duplicate" data-help="<?php _e('If you will use similar settings for other layers or you want to experiment on a copy, you can duplicate this layer.', 'LayerSlider') ?>"><?php _e('Duplicate this layer', 'LayerSlider') ?></button></td>
											</tr>
									</table>
								</div>
								<div class="ls-sublayer-page ls-sublayer-link">
									<table>
										<tbody>
											<tr>
												<td><?php _e('URL', 'LayerSlider') ?></td>
												<td class="url"><input type="text" name="url" value="" data-help="<?php _e('If you want to link your layer, type here the URL. You can use a hash mark followed by a number to link this layer to another slide. Example: #3 - this will switch to the third slide.', 'LayerSlider') ?>"></td>
												<td>
													<select name="target" data-help="<?php _e('You can control here the link behaviour: _self means the linked page will open in the current tab/window, _blank will open it in a new tab/window.', 'LayerSlider') ?>">
														<option>_self</option>
														<option>_blank</option>
														<option>_parent</option>
														<option>_top</option>
													</select>
												</td>
											</tr>
										</tbody>
									</table>
								</div>
								<div class="ls-sublayer-page ls-sublayer-style">
									<input type="hidden" name="styles">
									<table>
										<tbody>
											<tr>
												<td><?php _e('Layout & Positions', 'LayerSlider') ?></td>
												<td class="right"><?php _e('Width', 'LayerSlider') ?></td>
												<td><input type="text" name="width" class="auto" value="" data-help="<?php _e("You can set the width of your layer. You can use pixels, percents, or the default value 'auto'. Examples: 100px, 50% or auto", "LayerSlider") ?>"></td>
												<td class="right"><?php _e('Height', 'LayerSlider') ?></td>
												<td><input type="text" name="height" class="auto" value="" data-help="<?php _e("You can set the height of your layer. You can use pixels, percents, or the default value 'auto'. Examples: 100px, 50% or auto", "LayerSlider") ?>"></td>
												<td class="right"><?php _e('Top', 'LayerSlider') ?></td>
												<td><input type="text" name="top" value="0px" data-help="<?php _e("The layer position from the top of the slide. You can use pixels and percents. Examples: 100px or 50%. You can move your layers in the preview above with a drag n' drop, or set the exact values here.", "LayerSlider") ?>"></td>
												<td class="right"><?php _e('Left', 'LayerSlider') ?></td>
												<td><input type="text" name="left" value="0px" data-help="<?php _e("The layer position from the left side of the slide. You can use pixels and percents. Examples: 100px or 50%. You can move your layers in the preview above with a drag n' drop, or set the exact values here.", "LayerSlider") ?>"></td>
											</tr>
											<tr>
												<td><?php _e('Padding', 'LayerSlider') ?></td>
												<td class="right"><?php _e('Top', 'LayerSlider') ?></td>
												<td><input type="text" name="padding-top" class="auto" value="" data-help="<?php _e('Padding on the top of the layer. Example: 10px', 'LayerSlider') ?>"></td>
												<td class="right"><?php _e('Right', 'LayerSlider') ?></td>
												<td><input type="text" name="padding-right" class="auto" value="" data-help="<?php _e('Padding on the right side of the layer. Example: 10px', 'LayerSlider') ?>"></td>
												<td class="right"><?php _e('Bottom', 'LayerSlider') ?></td>
												<td><input type="text" name="padding-bottom" class="auto" value="" data-help="<?php _e('Padding on the bottom of the layer. Example: 10px', 'LayerSlider') ?>"></td>
												<td class="right"><?php _e('Left', 'LayerSlider') ?></td>
												<td><input type="text" name="padding-left" class="auto" value="" data-help="<?php _e('Padding on the left side of the layer. Example: 10px', 'LayerSlider') ?>"></td>
											</tr>
											<tr>
												<td><?php _e('Border', 'LayerSlider') ?></td>
												<td class="right"><?php _e('Top', 'LayerSlider') ?></td>
												<td><input type="text" name="border-top" class="auto" value="" data-help="<?php _e('Border on the top of the layer. Example: 5px solid #000', 'LayerSlider') ?>"></td>
												<td class="right"><?php _e('Right', 'LayerSlider') ?></td>
												<td><input type="text" name="border-right" class="auto" value="" data-help="<?php _e('Border on the right side of the layer. Example: 5px solid #000', 'LayerSlider') ?>"></td>
												<td class="right"><?php _e('Bottom', 'LayerSlider') ?></td>
												<td><input type="text" name="border-bottom" class="auto" value="" data-help="<?php _e('Border on the bottom of the layer. Example: 5px solid #000', 'LayerSlider') ?>"></td>
												<td class="right"><?php _e('Left', 'LayerSlider') ?></td>
												<td><input type="text" name="border-left" class="auto" value="" data-help="<?php _e('Border on the left side of the layer. Example: 5px solid #000', 'LayerSlider') ?>"></td>
											</tr>
											<tr>
												<td><?php _e('Font', 'LayerSlider') ?></td>
												<td class="right"><?php _e('Family', 'LayerSlider') ?></td>
												<td><input type="text" name="font-family" class="auto" value="" data-help="<?php _e('List of your chosen fonts separated with a comma. Please use apostrophes if your font names contains white spaces. Example: Helvetica, Arial, sans-serif', 'LayerSlider') ?>"></td>
												<td class="right"><?php _e('Size', 'LayerSlider') ?></td>
												<td><input type="text" name="font-size" class="auto" value="" data-help="<?php _e('The font size in pixels. Example: 16px.', 'LayerSlider') ?>"></td>
												<td class="right"><?php _e('Line-height', 'LayerSlider') ?></td>
												<td><input type="text" name="line-height" class="auto" value="" data-help="<?php _e("The line height of your text. The default setting is 'normal'. Example: 22px", "LayerSlider") ?>"></td>
												<td class="right"><?php _e('Color', 'LayerSlider') ?></td>
												<td><input type="text" name="color" class="auto ls-colorpicker" value="" data-help="<?php _e('The color of your text. You can use color names, hexadecimal, RGB or RGBA values. Example: #333', 'LayerSlider') ?>"></td>
											</tr>
											<tr>
												<td><?php _e('Misc', 'LayerSlider') ?></td>
												<td class="right"><?php _e('Background', 'LayerSlider') ?></td>
												<td><input type="text" name="background" class="auto ls-colorpicker" value="" data-help="<?php _e("The background color of your layer. You can use color names, hexadecimal, RGB or RGBA values as well as the 'transparent' keyword. Example: #FFF", "LayerSlider") ?>"></td>
												<td class="right"><?php _e('Rounded corners', 'LayerSlider') ?></td>
												<td><input type="text" name="border-radius" class="auto" value="" data-help="<?php _e('If you want rounded corners, you can set here its radius. Example: 5px', 'LayerSlider') ?>"></td>
												<td class="right"><?php _e('Word-wrap', 'LayerSlider') ?></td>
												<td colspan="3"><input type="checkbox" name="wordwrap" class="checkbox" data-help="<?php _e('If you use custom sized layers, you have to enable this setting to wrap your text.', 'LayerSlider') ?>"></td>
											</tr>
											<tr>
												<td><?php _e('Custom style settings', 'LayerSlider') ?></td>
												<td class="right"><?php _e('Custom styles', 'LayerSlider') ?></td>
												<td colspan="7"><textarea rows="5" cols="50" name="style" class="style" data-help="<?php _e('If you want to set style settings other then above, you can use here any CSS codes. Please make sure to write valid markup.', 'LayerSlider') ?>"></textarea></td>
											</tr>
										</tbody>
									</table>
								</div>
								<div class="ls-sublayer-page ls-sublayer-attributes">
									<table>
										<tbody>
											<tr>
												<td><?php _e('Attributes', 'LayerSlider') ?></td>
												<td class="right"><?php _e('ID', 'LayerSlider') ?></td>
												<td><input type="text" name="id" value="" data-help="<?php _e('You can apply an ID attribute on the HTML element of this layer to work with it in your custom CSS or Javascript code.', 'LayerSlider') ?>"></td>
												<td class="right"><?php _e('Classes', 'LayerSlider') ?></td>
												<td><input type="text" name="class" value="" data-help="<?php _e('You can apply classes on the HTML element of this layer to work with it in your custom CSS or Javascript code.', 'LayerSlider') ?>"></td>
												<td class="right"><?php _e('Title', 'LayerSlider') ?></td>
												<td><input type="text" name="title" value="" data-help="<?php _e('You can add a title to this layer which will display as a tooltip if someone holds his mouse cursor over the layer.', 'LayerSlider') ?>"></td>
												<td class="right"><?php _e('Alt', 'LayerSlider') ?></td>
												<td><input type="text" name="alt" value="" data-help="<?php _e('You can add an alternative text to your layer which is indexed by search engine robots and it helps people with certain disabilities.', 'LayerSlider') ?>"></td>
												<td class="right"><?php _e('Rel', 'LayerSlider') ?></td>
												<td><input type="text" name="rel" value="" data-help="<?php _e('Some plugin may use the rel attribute of a linked content, here you can specify it to make interaction with these plugins.', 'LayerSlider') ?>"></td>
											</tr>
										</tbody>
									</table>
								</div>
							</div>
						</div>
					</td>
				</tr>
			</tbody>
		</table>
		<a href="#" class="ls-add-sublayer"><?php _e('Add new layer', 'LayerSlider') ?></a>
	</div>
</div>

<form action="<?php echo $_SERVER['REQUEST_URI']?>" method="post" class="wrap" id="ls-slider-form">

	<input type="hidden" name="posted_edit" value="1">

	<!-- Title -->
	<div class="ls-icon-layers"></div>
	<h2>
		<?php _e('Edit this LayerSlider', 'LayerSlider') ?>
		<a href="?page=layerslider" class="add-new-h2"><?php _e('Back to the list', 'LayerSlider') ?></a>
	</h2>

	<!-- Main menu bar -->
	<div id="ls-main-nav-bar">
		<a href="#" class="settings"><?php _e('Global Settings', 'LayerSlider') ?></a>
		<a href="#" class="layers active"><?php _e('Slides', 'LayerSlider') ?></a>
		<a href="#" class="callbacks"><?php _e('Event Callbacks', 'LayerSlider') ?></a>
		<a href="http://support.kreaturamedia.com/faq/4/layerslider-for-wordpress/" target="_blank" class="faq right unselectable"><?php _e('FAQ', 'LayerSlider') ?></a>
		<a href="#" class="help right unselectable support"><?php _e('Documentation', 'LayerSlider') ?></a>
		<span class="right help">Need help? Try these:</span>
		<a href="#" class="clear unselectable"></a>
	</div>

	<!-- Pages -->
	<div id="ls-pages">

		<!-- Global Settings -->
		<div class="ls-page ls-settings">

			<div id="post-body-content">
				<div id="titlediv">
					<div id="titlewrap">
						<input type="text" name="title" value="<?php echo $slider['properties']['title'] ?>" id="title" autocomplete="off" placeholder="<?php _e('Type your slider name here', 'LayerSlider') ?>">
					</div>
				</div>
			</div>

			<div class="ls-box">
				<h3 class="header"><?php _e('Global Settings', 'LayerSlider') ?></h3>
				<table>
					<thead>
						<tr>
							<td colspan="3">
								<span id="ls-icon-basic"></span>
								<h4><?php _e('Basic', 'LayerSlider') ?></h4>
							</td>
						</tr>
					</thead>
					<tbody>
						<tr>
							<td><?php _e('Slider width', 'LayerSlider') ?></td>
							<td><input type="text" name="width" value="<?php echo $slider['properties']['width'] ?>" class="input"></td>
							<td class="desc">(px) <?php _e('The slider width in pixels. For compatibility reasons, we still support percentage values, but for responsive layout, you should use pixels.', 'LayerSlider') ?></td>
						</tr>
						<tr>
							<td><?php _e('Slider height', 'LayerSlider') ?></td>
							<td><input type="text" name="height" value="<?php echo $slider['properties']['height'] ?>" class="input"></td>
							<td class="desc">(px) <?php _e('The slider height in pixels.', 'LayerSlider') ?></td>
						</tr>
						<tr>
							<td><?php _e('Responsive', 'LayerSlider') ?></td>
							<td><input type="checkbox" name="responsive" <?php echo isset($slider['properties']['responsive']) ? 'checked="checked"' : '' ?>></td>
							<td class="desc"><?php _e('Enable this option to turn LayerSlider into a responsive slider.', 'LayerSlider') ?></td>
						</tr>
						<tr>
							<td><?php _e('Full-width slider', 'LayerSlider') ?></td>
							<td><input type="checkbox" name="forceresponsive" <?php echo ( isset($slider['properties']['forceresponsive']) && $slider['properties']['forceresponsive'] != 'false') ? 'checked="checked"' : '' ?>></td>
							<td class="desc"><?php _e('When you are using a responsiveness or percentage dimensions for the slider, it will respond the parent element size changes. With this option you can bypass this behaviour and LayerSlider will be a full-width slider.', 'LayerSlider') ?></td>
						</tr>
						<tr>
							<td><?php _e('Responsive under', 'LayerSlider') ?></td>
							<td><input type="text" name="responsiveunder" value="<?php echo !empty($slider['properties']['responsiveunder']) ? $slider['properties']['responsiveunder'] : '0' ?>"></td>
							<td class="desc">(px) <?php _e('You can force the slider to change automatically into responsive mode but only if the slider width is smaller than responsiveUnder pixels. It can be used if you need a full-width slider with fixed height but you also need it to be responsive if the browser is smaller... Important! If you enter a value higher than 0, the normal responsive mode will be switched off automatically!', 'LayerSlider') ?></td>
						</tr>
						<tr>
							<td><?php _e('Layers Container', 'LayerSlider') ?></td>
							<td><input type="text" name="sublayercontainer" value="<?php echo !empty($slider['properties']['sublayercontainer']) ? $slider['properties']['sublayercontainer'] : '0' ?>"></td>
							<td class="desc">(px) <?php _e("This feature is useful if you are using a full-width slider and you want to avoid stretching your layers across the full viewport horizontally. Just specify a custom width in pixels, and the slider will create a centered inner area to place your content into that. Note that this feature is working only with pixel-positioned layers, but you can still use the value '50%' if you want centered positions.", "LayerSlider") ?></td>
						</tr>
					</tbody>
					<thead>
						<tr>
							<td colspan="3">
								<span id="ls-icon-slideshow"></span>
								<h4><?php _e('Slideshow', 'LayerSlider') ?></h4>
							</td>
						</tr>
					</thead>
					<tbody>
						<tr>
							<td><?php _e('Automatically start slideshow', 'LayerSlider') ?></td>
							<td><input type="checkbox" name="autostart" <?php echo ( isset($slider['properties']['autostart']) && $slider['properties']['autostart'] != 'false') ? 'checked="checked"' : '' ?>></td>
							<td class="desc"><?php _e('If enabled, slideshow will automatically start after loading the page.', 'LayerSlider') ?></td>
						</tr>
						<tr>
							<td><?php _e('Pause on hover', 'LayerSlider') ?></td>
							<td><input type="checkbox" name="pauseonhover" <?php echo ( isset($slider['properties']['pauseonhover']) && $slider['properties']['pauseonhover'] != 'false') ? 'checked="checked"' : '' ?>></td>
							<td class="desc"><?php _e('Slideshow will pause when mouse pointer is over LayerSlider.', 'LayerSlider') ?></td>
						</tr>
						<tr>
							<td><?php _e('First slide', 'LayerSlider') ?></td>
							<td><input type="text" name="firstlayer" value="<?php echo $slider['properties']['firstlayer'] ?>" class="input"></td>
							<td class="desc"><?php _e('LayerSlider will start with this slide (you can type the word <i>random</i> if you want the slider to start with a random slide).', 'LayerSlider') ?></td>
						</tr>
						<tr>
							<td><?php _e('Animate first slide', 'LayerSlider') ?></td>
							<td><input type="checkbox" name="animatefirstlayer" <?php echo ( isset($slider['properties']['animatefirstlayer']) && $slider['properties']['animatefirstlayer'] != 'false') ? 'checked="checked"' : '' ?>></td>
							<td class="desc"><?php _e('If enabled, the layers of the first slide will animate (slide in) instead of fading in with the slide.', 'LayerSlider') ?></td>
						</tr>
						<tr>
							<td><?php _e('Random slideshow', 'LayerSlider') ?></td>
							<td><input type="checkbox" name="randomslideshow" <?php echo ( isset($slider['properties']['randomslideshow']) && $slider['properties']['randomslideshow'] != 'false') ? 'checked="checked"' : '' ?>></td>
							<td class="desc"><?php _e("LayerSlider will change to a random slide instead of changing to the next / prev slide. Note that 'loops' feature won't work with this option.", "LayerSlider") ?></td>
						</tr>
						<tr>
							<td><?php _e('Two way slideshow', 'LayerSlider') ?></td>
							<td><input type="checkbox" name="twowayslideshow" <?php echo ( isset($slider['properties']['twowayslideshow']) && $slider['properties']['twowayslideshow'] != 'false') ? 'checked="checked"' : '' ?>></td>
							<td class="desc"><?php _e('If enabled, slideshow will go backwards if you click the prev button.', 'LayerSlider') ?></td>
						</tr>
						<tr>
							<td><?php _e('Loops', 'LayerSlider') ?></td>
							<td>
								<select name="loops">
									<?php for($c = 0; $c < 11; $c++) : ?>
									<?php if($slider['properties']['loops'] == $c) { ?>
									<option selected="selected"><?php echo $c ?></option>
									<?php } else {  ?>
									<option><?php echo $c ?></option>
									<?php } ?>
									<?php endfor; ?>
								</select>
							</td>
							<td class="desc"><?php _e('Number of loops if automatically start slideshow is enabled (0 means infinite!)', 'LayerSlider') ?></td>
						</tr>
						<tr>
							<td><?php _e('Force the number of loops', 'LayerSlider') ?></td>
							<td><input type="checkbox" name="forceloopnum" <?php echo ( isset($slider['properties']['forceloopnum']) && $slider['properties']['forceloopnum'] != 'false') ? 'checked="checked"' : '' ?>></td>
							<td class="desc"><?php _e('If enabled, the slider will always stop at the given number of loops even if the user restarts the slideshow.', 'LayerSlider') ?></td>
						</tr>
						<tr>
							<td><?php _e('Automatically play videos', 'LayerSlider') ?></td>
							<td><input type="checkbox" name="autoplayvideos" <?php echo ( isset($slider['properties']['autoplayvideos']) && $slider['properties']['autoplayvideos'] != 'false') ? 'checked="checked"' : '' ?>></td>
							<td class="desc"><?php _e('If enabled, the slider will automatically play youtube and vimeo videos.', 'LayerSlider') ?></td>
						</tr>
						<tr>
							<td><?php _e('Automatically pause slideshow', 'LayerSlider') ?></td>
							<td>
								<select name="autopauseslideshow">
									<option value="auto"<?php echo ($slider['properties']['autopauseslideshow'] == 'auto') ? 'selected="selected"' : '' ?>>auto</option>
									<option value="enabled"<?php echo ($slider['properties']['autopauseslideshow'] == 'enabled') ? 'selected="selected"' : '' ?>>enabled</option>
									<option value="disabled"<?php echo ($slider['properties']['autopauseslideshow'] == 'disabled') ? 'selected="selected"' : '' ?>>disabled</option>
								</select>
							</td>
							<td class="desc"><?php _e("If you enabled the 'automatically play videos' option, the 'auto' value means that the slideshow will pause UNTIL the video is finished playing and after that it will continue. The 'enabled' value means that the slideshow will stop and will not resume after the video has been played.", "LayerSlider") ?></td>
						</tr>
						<tr>
							<td><?php _e('Youtube preview', 'LayerSlider') ?></td>
							<td>
								<select name="youtubepreview">
									<option value="maxresdefault.jpg"<?php echo ($slider['properties']['youtubepreview'] == 'maxresdefault.jpg') ? 'selected="selected"' : '' ?>><?php _e('Maximum quality', 'LayerSlider') ?></option>
									<option value="hqdefault.jpg"<?php echo ($slider['properties']['youtubepreview'] == 'hqdefault.jpg') ? 'selected="selected"' : '' ?>><?php _e('High quality', 'LayerSlider') ?></option>
									<option value="mqdefault.jpg"<?php echo ($slider['properties']['youtubepreview'] == 'mqdefault.jpg') ? 'selected="selected"' : '' ?>><?php _e('Medium quality', 'LayerSlider') ?></option>
									<option value="default.jpg"<?php echo ($slider['properties']['youtubepreview'] == 'default.jpg') ? 'selected="selected"' : '' ?>><?php _e('Default quality', 'LayerSlider') ?></option>
								</select>
							</td>
							<td class="desc"><?php _e('Default thumbnail picture of YouTube videos. Note, that Maximum quaility is not available to all (not HD) videos.', 'LayerSlider') ?></td>
						</tr>
						<tr>
							<td><?php _e('Keyboard navigation', 'LayerSlider') ?></td>
							<td><input type="checkbox" name="keybnav" <?php echo ( isset($slider['properties']['keybnav']) && $slider['properties']['keybnav'] != 'false') ? 'checked="checked"' : '' ?>></td>
							<td class="desc"><?php _e('You can navigate with the left and right arrow keys.', 'LayerSlider') ?></td>
						</tr>
						<tr>
							<td><?php _e('Touch navigation', 'LayerSlider') ?></td>
							<td><input type="checkbox" name="touchnav" <?php echo ( isset($slider['properties']['touchnav']) && $slider['properties']['touchnav'] != 'false') ? 'checked="checked"' : '' ?>></td>
							<td class="desc"><?php _e('Touch-control (on mobile devices).', 'LayerSlider') ?></td>
						</tr>
					</tbody>
					<thead>
						<tr>
							<td colspan="3">
								<span id="ls-icon-appearance"></span>
								<h4><?php _e('Appearance', 'LayerSlider') ?></h4>
							</td>
						</tr>
					</thead>
					<tbody>
						<tr>
							<td><?php _e('Skin', 'LayerSlider') ?></td>
							<td>
								<select name="skin">
									<?php $skins = array_map('basename', glob(dirname(__FILE__) . '/skins/*', GLOB_ONLYDIR)); ?>
									<?php foreach($skins as $skin) : ?>
									<?php $selected = ($skin == $slider['properties']['skin']) ? ' selected="selected"' : '' ?>
									<option<?php echo $selected ?>><?php echo $skin ?></option>
									<?php endforeach; ?>
								</select>
							</td>
							<td class="desc"><?php _e("You can change the skin of the slider. The 'noskin' skin is a border- and buttonless skin. Your custom skins will appear in the list when you create their folders as well.", "LayerSlider") ?></td>
						</tr>
						<tr>
							<td><?php _e('Background color', 'LayerSlider') ?></td>
							<td>
								<div class="reset-parent">
									<input type="text" name="backgroundcolor" value="<?php echo ($slider['properties']['backgroundcolor'] != 'transparent') ? $slider['properties']['backgroundcolor'] : '' ?>" class="input ls-colorpicker">
								</div>
							</td>
							<td class="desc"><?php _e('Background color of LayerSlider. You can use all CSS methods, like hexa colors, rgb(r,g,b) method, color names, etc. Note, that slides with background will cover up the global background image.', 'LayerSlider') ?></td>
						</tr>
						<tr>
							<td><?php _e('Background image', 'LayerSlider') ?></td>
							<td>
								<div class="reset-parent">
									<input type="text" name="backgroundimage" value="<?php echo $slider['properties']['backgroundimage'] ?>" class="input ls-upload">
									<span class="ls-reset">x</span>
								</div>
							</td>
							<td class="desc"><?php _e('Background image of LayerSlider. This will be a fixed background image of LayerSlider by default. Note, that slides with background will cover up the global background image.', 'LayerSlider') ?></td>
						</tr>
						<tr>
							<td><?php _e('Slider style', 'LayerSlider') ?></td>
							<td>
								<div class="reset-parent">
									<input type="text" name="sliderstyle" value="<?php echo isset($slider['properties']['sliderstyle']) ? $slider['properties']['sliderstyle'] : '' ?>" class="input">
									<span class="ls-reset">x</span>
								</div>
							</td>
							<td class="desc"><?php _e('Here you can apply your custom CSS style settings to the slider.', 'LayerSlider') ?></td>
						</tr>
					</tbody>
					<thead>
						<tr>
							<td colspan="3">
								<span id="ls-icon-nav"></span>
								<h4><?php _e('Navigation', 'LayerSlider') ?></h4>
							</td>
						</tr>
					</thead>
					<tbody>
						<tr>
							<td><?php _e('Prev and Next buttons', 'LayerSlider') ?></td>
							<td><input type="checkbox" name="navprevnext" <?php echo ( isset($slider['properties']['navprevnext']) && $slider['properties']['navprevnext'] != 'false') ? 'checked="checked"' : '' ?>></td>
							<td class="desc"><?php _e('If disabled, Prev and Next buttons will be invisible.', 'LayerSlider') ?></td>
						</tr>
						<tr>
							<td><?php _e('Start and Stop buttons', 'LayerSlider') ?></td>
							<td><input type="checkbox" name="navstartstop" <?php echo ( isset($slider['properties']['navstartstop']) && $slider['properties']['navstartstop'] != 'false') ? 'checked="checked"' : '' ?>></td>
							<td class="desc"><?php _e('If disabled, Start and Stop buttons will be invisible.', 'LayerSlider') ?></td>
						</tr>
						<tr>
							<td><?php _e('Navigation buttons', 'LayerSlider') ?></td>
							<td><input type="checkbox" name="navbuttons" <?php echo ( isset($slider['properties']['navbuttons']) && $slider['properties']['navbuttons'] != 'false') ? 'checked="checked"' : '' ?>></td>
							<td class="desc"><?php _e('If disabled, slide buttons will be invisible.', 'LayerSlider') ?></td>
						</tr>
						<tr>
							<td><?php _e('Prev and next buttons on hover', 'LayerSlider') ?></td>
							<td><input type="checkbox" name="hoverprevnext" <?php echo ( isset($slider['properties']['hoverprevnext']) && $slider['properties']['hoverprevnext'] != 'false') ? 'checked="checked"' : '' ?>></td>
							<td class="desc"><?php _e('If enabled, the prev and next buttons will be shown only if you move your mouse cursor over the slider.', 'LayerSlider') ?></td>
						</tr>
						<tr>
							<td><?php _e('Bottom navigation on hover', 'LayerSlider') ?></td>
							<td><input type="checkbox" name="hoverbottomnav" <?php echo ( isset($slider['properties']['hoverbottomnav']) && $slider['properties']['hoverbottomnav'] != 'false') ? 'checked="checked"' : '' ?>></td>
							<td class="desc"><?php _e('The bottom navigation controls (with also thumbnails) will be shown only if you move your mouse cursor over the slider.', 'LayerSlider') ?></td>
						</tr>
						<tr>
							<td><?php _e('Show bar timer', 'LayerSlider') ?></td>
							<td><input type="checkbox" name="bartimer" <?php echo ( isset($slider['properties']['bartimer']) && $slider['properties']['bartimer'] != 'false') ? 'checked="checked"' : '' ?>></td>
							<td class="desc"><?php _e('You can hide or show the bar timer with this option.', 'LayerSlider') ?></td>
						</tr>
						<tr>
							<td><?php _e('Show circle timer', 'LayerSlider') ?></td>
							<td><input type="checkbox" name="circletimer" <?php echo ( isset($slider['properties']['circletimer']) && $slider['properties']['circletimer'] != 'false') ? 'checked="checked"' : '' ?>></td>
							<td class="desc"><?php _e('You can hide or show the circle timer with this option.', 'LayerSlider') ?></td>
						</tr>
						<tr>
							<td><?php _e('Thumbnail navigation', 'LayerSlider') ?></td>
							<td>
								<?php $slider['properties']['thumb_nav'] = !empty($slider['properties']['thumb_nav']) ? $slider['properties']['thumb_nav'] : 'hover'; ?>
								<select name="thumb_nav">
									<option <?php echo ($slider['properties']['thumb_nav'] == 'disabled') ? 'selected="selected"' : '' ?>>disabled</option>
									<option <?php echo ($slider['properties']['thumb_nav'] == 'hover') ? 'selected="selected"' : '' ?>>hover</option>
									<option <?php echo ($slider['properties']['thumb_nav'] == 'always') ? 'selected="selected"' : '' ?>>always</option>
								</select>
							</td>
							<td class="desc"></td>
						</tr>
						<tr>
							<td><?php _e('Thumbnail width', 'LayerSlider') ?></td>
							<td><input type="text" name="thumb_width" value="<?php echo !empty($slider['properties']['thumb_width']) ? $slider['properties']['thumb_width'] : '100' ?>"></td>
							<td class="desc"><?php _e('The width of the thumbnails in the navigation area.', 'LayerSlider') ?></td>
						</tr>
						<tr>
							<td><?php _e('Thumbnail height', 'LayerSlider') ?></td>
							<td><input type="text" name="thumb_height" value="<?php echo !empty($slider['properties']['thumb_height']) ? $slider['properties']['thumb_height'] : '60' ?>"></td>
							<td class="desc"><?php _e('The height of the thumbnails in the navigation area.', 'LayerSlider') ?></td>
						</tr>
						<tr>
							<td><?php _e('Thumbnail container width', 'LayerSlider') ?></td>
							<td><input type="text" name="thumb_container_width" value="<?php echo !empty($slider['properties']['thumb_container_width']) ? $slider['properties']['thumb_container_width'] : '60%' ?>"></td>
							<td class="desc"><?php _e('The width of the thumbnail navigation area.', 'LayerSlider') ?></td>
						</tr>
						<tr>
							<td><?php _e('Thumbnail active opacity', 'LayerSlider') ?></td>
							<td><input type="text" name="thumb_active_opacity" value="<?php echo !empty($slider['properties']['thumb_active_opacity']) ? $slider['properties']['thumb_active_opacity'] : '35' ?>"></td>
							<td class="desc"><?php _e('The selected thumbnail opacity (0-100).', 'LayerSlider') ?></td>
						</tr>
						<tr>
							<td><?php _e('Thumbnail inactive opacity', 'LayerSlider') ?></td>
							<td><input type="text" name="thumb_inactive_opacity" value="<?php echo !empty($slider['properties']['thumb_inactive_opacity']) ? $slider['properties']['thumb_inactive_opacity'] : '100' ?>"></td>
							<td class="desc"><?php _e('The opacity of inactive thumbnails (0-100).', 'LayerSlider') ?></td>
						</tr>
					</tbody>
					<thead>
						<tr>
							<td colspan="3">
								<span id="ls-icon-misc"></span>
								<h4><?php _e('Misc', 'LayerSlider') ?></h4>
							</td>
						</tr>
					</thead>
					<tbody>
						<tr>
							<td><?php _e('Image preload', 'LayerSlider') ?></td>
							<td><input type="checkbox" name="imgpreload" <?php echo ( isset($slider['properties']['imgpreload']) && $slider['properties']['imgpreload'] != 'false') ? 'checked="checked"' : '' ?>></td>
							<td class="desc"><?php _e('Preloads all images and background-images of the next slide.', 'LayerSlider') ?></td>
						</tr>
						<tr>
							<td><?php _e('Use relative URLs', 'LayerSlider') ?></td>
							<td><input type="checkbox" name="relativeurls" <?php echo ( isset($slider['properties']['relativeurls']) && $slider['properties']['relativeurls'] != 'false') ? 'checked="checked"' : '' ?>></td>
							<td class="desc"><?php _e('If enabled, LayerSlider WP will use relative URLs for images.', 'LayerSlider') ?></td>
						</tr>
					</tbody>
					<thead>
						<tr>
							<td colspan="3">
								<span id="ls-icon-troubleshooting"></span>
								<h4><?php _e('Troubleshooting', 'LayerSlider') ?></h4>
							</td>
						</tr>
					</thead>
					<tbody>
						<tr>
							<td><?php _e('Put JS includes to body', 'LayerSlider') ?></td>
							<td><input type="checkbox" name="bodyinclude" <?php echo ( isset($slider['properties']['bodyinclude']) && $slider['properties']['bodyinclude'] != 'false') ? 'checked="checked"' : '' ?>></td>
							<td class="desc"><?php _e("If the slider doesn't showing up on your front-end page, you probably have a jQuery conflict when multiple libraries loaded to the document and causes a Javascript error. Enabling this option may solve your problem. Please don't enable this option if you don't experiencing any issues.", "LayerSlider") ?></td>
						</tr>
					</tbody>
					<thead>
						<tr>
							<td colspan="3">
								<span id="ls-icon-yourlogo"></span>
								<h4><?php _e('YourLogo', 'LayerSlider') ?></h4>
							</td>
						</tr>
					</thead>
					<tbody>
						<tr>
							<td><?php _e('YourLogo', 'LayerSlider') ?></td>
							<td>
								<div class="reset-parent">
									<input type="text" name="yourlogo" value="<?php echo !empty($slider['properties']['yourlogo']) ? $slider['properties']['yourlogo'] : '' ?>" class="input ls-upload">
									<span class="ls-reset">x</span>
								</div>
							</td>
							<td class="desc"><?php _e('This is a fixed layer that will be shown above of LayerSlider container. For example if you want to display your own logo, etc., you can upload an image or choose one from the Media Library.', 'LayerSlider') ?></td>
						</tr>
						<tr>
							<td><?php _e('YourLogo style', 'LayerSlider') ?></td>
							<td><input type="text" name="yourlogostyle" value="<?php echo !empty($slider['properties']['yourlogostyle']) ? $slider['properties']['yourlogostyle'] : '' ?>" class="input"></td>
							<td class="desc"><?php _e('You can style your logo. You can use any CSS properties, for example you can add left and top properties to place the image inside the LayerSlider container anywhere you want.', 'LayerSlider') ?></td>
						</tr>
						<tr>
							<td><?php _e('YourLogo link', 'LayerSlider') ?></td>
							<td>
								<div class="reset-parent">
									<input type="text" name="yourlogolink" value="<?php echo !empty($slider['properties']['yourlogolink']) ? $slider['properties']['yourlogolink'] : '' ?>" class="input">
									<span class="ls-reset">x</span>
								</div>
							</td>
							<td class="desc"><?php _e('You can add a link to your logo. Set false is you want to display only an image without a link.', 'LayerSlider') ?></td>
						</tr>
						<tr>
							<td><?php _e('YourLogo link target', 'LayerSlider') ?></td>
							<td>
								<?php $slider['properties']['yourlogotarget'] = !empty($slider['properties']['yourlogotarget']) ? $slider['properties']['yourlogotarget'] : '' ?>
								<select name="yourlogotarget">
									<option <?php echo ($slider['properties']['yourlogotarget'] == '_self') ? 'selected="selected"' : '' ?>>_self</option>
									<option <?php echo ($slider['properties']['yourlogotarget'] == '_blank') ? 'selected="selected"' : '' ?>>_blank</option>
									<option <?php echo ($slider['properties']['yourlogotarget'] == '_parent') ? 'selected="selected"' : '' ?>>_parent</option>
									<option <?php echo ($slider['properties']['yourlogotarget'] == '_top') ? 'selected="selected"' : '' ?>>_top</option>
								</select>
							</td>
							<td class="desc"><?php _e("If '_blank', the clicked url will open in a new window.", "LayerSlider") ?></td>
						</tr>
					</tbody>
				</table>
			</div>
		</div>

		<!-- Layers -->
		<div class="ls-page active">

			<div id="ls-layer-tabs">
				<?php foreach($slider['layers'] as $key => $layer) : ?>
				<?php $active = empty($key) ? 'active' : '' ?>
				<a href="#" class="<?php echo $active ?>">Slide #<?php echo ($key+1) ?><span>x</span></a>
				<?php endforeach; ?>
				<a href="#" class="unsortable" id="ls-add-layer"><?php _e('Add new slide', 'LayerSlider') ?></a>
				<div class="unsortable clear"></div>
			</div>
			<div id="ls-layers">
				<?php if(!empty($slider['layers'])) : ?>
				<?php foreach($slider['layers'] as $key => $layer) : ?>
				<?php $active = empty($key) ? 'active' : '' ?>
				<div class="ls-box ls-layer-box <?php echo $active ?>">
					<input type="hidden" name="layerkey" value="0">
					<table>
						<thead class="ls-layer-options-thead">
							<tr>
								<td colspan="7">
									<span id="ls-icon-layer-options"></span>
									<h4>
										<?php _e('Slide Options', 'LayerSlider') ?>
										<a href="#" class="duplicate ls-layer-duplicate"><?php _e('Duplicate this slide', 'LayerSlider') ?></a>
									</h4>
								</td>
							</tr>
						</thead>
						<tbody class="ls-slide-options">
							<input type="hidden" name="3d_transitions" value="<?php echo isset($layer['properties']['3d_transitions']) ? $layer['properties']['3d_transitions'] : '' ?>">
							<input type="hidden" name="2d_transitions" value="<?php echo isset($layer['properties']['2d_transitions']) ? $layer['properties']['2d_transitions'] : '' ?>">
							<input type="hidden" name="custom_3d_transitions" value="<?php echo isset($layer['properties']['custom_3d_transitions']) ? $layer['properties']['custom_3d_transitions'] : '' ?>">
							<input type="hidden" name="custom_2d_transitions" value="<?php echo isset($layer['properties']['custom_2d_transitions']) ? $layer['properties']['custom_2d_transitions'] : '' ?>">
							<tr>
								<td class="right"><?php _e('Slide options', 'LayerSlider') ?></td>
								<td class="right"><?php _e('Image', 'LayerSlider') ?></td>
								<td>
									<div class="reset-parent">
										<input type="text" name="background" class="ls-upload" value="<?php echo $layer['properties']['background']?>" data-help="<?php _e('The slide image/background. Click into the field to open the WordPress Media Library to choose or upload an image.', 'LayerSlider') ?>">
										<span class="ls-reset">x</span>
									</div>
								</td>
								<td class="right"><?php _e('Thumbnail', 'LayerSlider') ?></td>
								<td>
									<div class="reset-parent">
										<input type="text" name="thumbnail" class="ls-upload" value="<?php echo isset($layer['properties']['thumbnail']) ? $layer['properties']['thumbnail'] : '' ?>" data-help="<?php _e('The thumbnail image of this slide. Click into the field to open the WordPress Media Library to choose or upload an image. If you leave this field empty, the slide image will be used.', 'LayerSlider') ?>">
										<span class="ls-reset">x</span>
									</div>
								</td>
								<td class="right"><?php _e('Slide delay', 'LayerSlider') ?></td>
								<td><input type="text" name="slidedelay" class="layerprop" value="<?php echo $layer['properties']['slidedelay']?>" data-help="<?php _e("Here you can set the time interval between slide changes, this slide will stay visible for the time specified here. This value is in millisecs, so the value 1000 means 1 second. Please don't use 0 or very low values.", "LayerSlider") ?>"> (ms)</td>
							</tr>
							<tr>
								<td class="right"><?php _e('Slide transition', 'LayerSlider') ?></td>
								<td class="right">Use 3D/2D</td>
								<td>
									<input type="checkbox" name="new_transitions"<?php echo isset($layer['properties']['new_transitions']) ? 'checked="checked"' : '' ?> data-help="<?php _e('You can choose between the old and the new 3D/2D slide transitions introduced in version 4.0.0.', 'LayerSlider') ?>">
									<span>Old transition</span>
								</td>
								<td class="right">
									<span class="new <?php echo !isset($layer['properties']['new_transitions']) ? ' ls-hidden' : '' ?>"><?php _e('Transitions', 'LayerSlider') ?></span>
									<span class="old <?php echo isset($layer['properties']['new_transitions']) ? ' ls-hidden' : '' ?>"><?php _e('Direction', 'LayerSlider') ?></span>
								</td>
								<td>
									<select name="slidedirection" class="layerprop<?php echo isset($layer['properties']['new_transitions']) ? ' ls-hidden' : '' ?> old"  data-help="<?php _e('The slide will slide in from this direction.', 'LayerSlider') ?>">
										<option value="top" <?php echo ($layer['properties']['slidedirection'] == 'top') ? 'selected="selected"' : '' ?>><?php _e('top', 'LayerSlider') ?></option>
										<option value="right" <?php echo ($layer['properties']['slidedirection'] == 'right') ? 'selected="selected"' : '' ?>><?php _e('right', 'LayerSlider') ?></option>
										<option value="bottom" <?php echo ($layer['properties']['slidedirection'] == 'bottom') ? 'selected="selected"' : '' ?>><?php _e('bottom', 'LayerSlider') ?></option>
										<option value="left" <?php echo ($layer['properties']['slidedirection'] == 'left') ? 'selected="selected"' : '' ?>><?php _e('left', 'LayerSlider') ?></option>
									</select>
									<button class="button ls-select-transitions new<?php echo !isset($layer['properties']['new_transitions']) ? ' ls-hidden' : '' ?>" data-help="<?php _e('You can select your desired slide transitions by clicking on this button.', 'LayerSlider') ?>">Select transitions</button>
								</td>
								<td class="right"><span class="new<?php echo !isset($layer['properties']['new_transitions']) ? ' ls-hidden' : '' ?>"><?php _e('Time shift', 'LayerSlider') ?></span></td>
								<td><input type="text" name="timeshift" class="new layerprop<?php echo !isset($layer['properties']['new_transitions']) ? ' ls-hidden' : '' ?>" value="<?php echo isset($layer['properties']['timeshift']) ? $layer['properties']['timeshift'] : '0' ?>" data-help="<?php _e('You can control here the timing of the layer animations when the slider changes to this slide with a 3D/2D transition. Zero means that the layers of this slide will animate in when the slide transition ends. You can time-shift the starting time of the layer animations with positive or negative values.', 'LayerSlider') ?>"> <span class="new<?php echo !isset($layer['properties']['new_transitions']) ? ' ls-hidden' : '' ?>">(ms)</span></td>
							</tr>
							<tr class="ls-old-transitions <?php echo isset($layer['properties']['new_transitions']) ? ' ls-hidden' : '' ?>">
								<td class="right"><?php _e('Slide in', 'LayerSlider') ?></td>
								<td class="right"><?php _e('Duration', 'LayerSlider') ?></td>
								<td><input type="text" name="durationin" class="layerprop" value="<?php echo $layer['properties']['durationin']?>" data-help="T<?php _e('The duration of the slide in animation. This value is in millisecs, so the value 1000 means 1 second.', 'LayerSlider') ?>"> (ms)</td>
								<td class="right"><a href="http://easings.net/" target="_blank"><?php _e('Easing', 'LayerSlider') ?></a></td>
								<td>
									<select name="easingin" class="layerprop" data-help="<?php _e('The timing function of the animation, with it you can manipualte the slide movement. Please click on the link next to this select field to open easings.net for more information and real-time examples.', 'LayerSlider') ?>">
										<option <?php echo ($layer['properties']['easingin'] == 'linear') ? 'selected="selected"' : '' ?>>linear</option>
										<option <?php echo ($layer['properties']['easingin'] == 'swing') ? 'selected="selected"' : '' ?>>swing</option>
										<option <?php echo ($layer['properties']['easingin'] == 'easeInQuad') ? 'selected="selected"' : '' ?>>easeInQuad</option>
										<option <?php echo ($layer['properties']['easingin'] == 'easeOutQuad') ? 'selected="selected"' : '' ?>>easeOutQuad</option>
										<option <?php echo ($layer['properties']['easingin'] == 'easeInOutQuad') ? 'selected="selected"' : '' ?>>easeInOutQuad</option>
										<option <?php echo ($layer['properties']['easingin'] == 'easeInCubic') ? 'selected="selected"' : '' ?>>easeInCubic</option>
										<option <?php echo ($layer['properties']['easingin'] == 'easeOutCubic') ? 'selected="selected"' : '' ?>>easeOutCubic</option>
										<option <?php echo ($layer['properties']['easingin'] == 'easeInOutCubic') ? 'selected="selected"' : '' ?>>easeInOutCubic</option>
										<option <?php echo ($layer['properties']['easingin'] == 'easeInQuart') ? 'selected="selected"' : '' ?>>easeInQuart</option>
										<option <?php echo ($layer['properties']['easingin'] == 'easeOutQuart') ? 'selected="selected"' : '' ?>>easeOutQuart</option>
										<option <?php echo ($layer['properties']['easingin'] == 'easeInOutQuart') ? 'selected="selected"' : '' ?>>easeInOutQuart</option>
										<option <?php echo ($layer['properties']['easingin'] == 'easeInQuint') ? 'selected="selected"' : '' ?>>easeInQuint</option>
										<option <?php echo ($layer['properties']['easingin'] == 'easeOutQuint') ? 'selected="selected"' : '' ?>>easeOutQuint</option>
										<option <?php echo ($layer['properties']['easingin'] == 'easeInOutQuint') ? 'selected="selected"' : '' ?>>easeInOutQuint</option>
										<option <?php echo ($layer['properties']['easingin'] == 'easeInSine') ? 'selected="selected"' : '' ?>>easeInSine</option>
										<option <?php echo ($layer['properties']['easingin'] == 'easeOutSine') ? 'selected="selected"' : '' ?>>easeOutSine</option>
										<option <?php echo ($layer['properties']['easingin'] == 'easeInOutSine') ? 'selected="selected"' : '' ?>>easeInOutSine</option>
										<option <?php echo ($layer['properties']['easingin'] == 'easeInExpo') ? 'selected="selected"' : '' ?>>easeInExpo</option>
										<option <?php echo ($layer['properties']['easingin'] == 'easeOutExpo') ? 'selected="selected"' : '' ?>>easeOutExpo</option>
										<option <?php echo ($layer['properties']['easingin'] == 'easeInOutExpo') ? 'selected="selected"' : '' ?>>easeInOutExpo</option>
										<option <?php echo ($layer['properties']['easingin'] == 'easeInCirc') ? 'selected="selected"' : '' ?>>easeInCirc</option>
										<option <?php echo ($layer['properties']['easingin'] == 'easeOutCirc') ? 'selected="selected"' : '' ?>>easeOutCirc</option>
										<option <?php echo ($layer['properties']['easingin'] == 'easeInOutCirc') ? 'selected="selected"' : '' ?>>easeInOutCirc</option>
										<option <?php echo ($layer['properties']['easingin'] == 'easeInElastic') ? 'selected="selected"' : '' ?>>easeInElastic</option>
										<option <?php echo ($layer['properties']['easingin'] == 'easeOutElastic') ? 'selected="selected"' : '' ?>>easeOutElastic</option>
										<option <?php echo ($layer['properties']['easingin'] == 'easeInOutElastic') ? 'selected="selected"' : '' ?>>easeInOutElastic</option>
										<option <?php echo ($layer['properties']['easingin'] == 'easeInBack') ? 'selected="selected"' : '' ?>>easeInBack</option>
										<option <?php echo ($layer['properties']['easingin'] == 'easeOutBack') ? 'selected="selected"' : '' ?>>easeOutBack</option>
										<option <?php echo ($layer['properties']['easingin'] == 'easeInOutBack') ? 'selected="selected"' : '' ?>>easeInOutBack</option>
										<option <?php echo ($layer['properties']['easingin'] == 'easeInBounce') ? 'selected="selected"' : '' ?>>easeInBounce</option>
										<option <?php echo ($layer['properties']['easingin'] == 'easeOutBounce') ? 'selected="selected"' : '' ?>>easeOutBounce</option>
										<option <?php echo ($layer['properties']['easingin'] == 'easeInOutBounce') ? 'selected="selected"' : '' ?>>easeInOutBounce</option>
									</select>
								</td>
								<td class="right"><?php _e('Delay in', 'LayerSlider') ?></td>
								<td><input type="text" name="delayin" class="layerprop"value="<?php echo $layer['properties']['delayin']?>"  data-help="<?php _e('Delay before the animation start when the slide slides in. This value is in millisecs, so the value 1000 means 1 second.', 'LayerSlider') ?>"> (ms)</td>
							</tr>
							<tr class="ls-old-transitions <?php echo isset($layer['properties']['new_transitions']) ? ' ls-hidden' : '' ?>">
								<td class="right"><?php _e('Slide out', 'LayerSlider') ?></td>
								<td class="right"><?php _e('Duration', 'LayerSlider') ?></td>
								<td><input type="text" name="durationout" class="layerprop" value="<?php echo $layer['properties']['durationout']?>" data-help="<?php _e('The duration of the slide out animation. This value is in millisecs, so the value 1000 means 1 second.', 'LayerSlider') ?>"> (ms)</td>
								<td class="right"><a href="http://easings.net/" target="_blank"><?php _e('Easing', 'LayerSlider') ?></a></td>
								<td>
									<select name="easingout" class="layerprop" data-help="<?php _e('The timing function of the animation, with it you can manipualte the slide movement. Please click on the link next to this select field to open easings.net for more information and real-time examples.', 'LayerSlider') ?>">
										<option <?php echo ($layer['properties']['easingout'] == 'linear') ? 'selected="selected"' : '' ?>>linear</option>
										<option <?php echo ($layer['properties']['easingout'] == 'swing') ? 'selected="selected"' : '' ?>>swing</option>
										<option <?php echo ($layer['properties']['easingout'] == 'easeInQuad') ? 'selected="selected"' : '' ?>>easeInQuad</option>
										<option <?php echo ($layer['properties']['easingout'] == 'easeOutQuad') ? 'selected="selected"' : '' ?>>easeOutQuad</option>
										<option <?php echo ($layer['properties']['easingout'] == 'easeInOutQuad') ? 'selected="selected"' : '' ?>>easeInOutQuad</option>
										<option <?php echo ($layer['properties']['easingout'] == 'easeInCubic') ? 'selected="selected"' : '' ?>>easeInCubic</option>
										<option <?php echo ($layer['properties']['easingout'] == 'easeOutCubic') ? 'selected="selected"' : '' ?>>easeOutCubic</option>
										<option <?php echo ($layer['properties']['easingout'] == 'easeInOutCubic') ? 'selected="selected"' : '' ?>>easeInOutCubic</option>
										<option <?php echo ($layer['properties']['easingout'] == 'easeInQuart') ? 'selected="selected"' : '' ?>>easeInQuart</option>
										<option <?php echo ($layer['properties']['easingout'] == 'easeOutQuart') ? 'selected="selected"' : '' ?>>easeOutQuart</option>
										<option <?php echo ($layer['properties']['easingout'] == 'easeInOutQuart') ? 'selected="selected"' : '' ?>>easeInOutQuart</option>
										<option <?php echo ($layer['properties']['easingout'] == 'easeInQuint') ? 'selected="selected"' : '' ?>>easeInQuint</option>
										<option <?php echo ($layer['properties']['easingout'] == 'easeOutQuint') ? 'selected="selected"' : '' ?>>easeOutQuint</option>
										<option <?php echo ($layer['properties']['easingout'] == 'easeInOutQuint') ? 'selected="selected"' : '' ?>>easeInOutQuint</option>
										<option <?php echo ($layer['properties']['easingout'] == 'easeInSine') ? 'selected="selected"' : '' ?>>easeInSine</option>
										<option <?php echo ($layer['properties']['easingout'] == 'easeOutSine') ? 'selected="selected"' : '' ?>>easeOutSine</option>
										<option <?php echo ($layer['properties']['easingout'] == 'easeInOutSine') ? 'selected="selected"' : '' ?>>easeInOutSine</option>
										<option <?php echo ($layer['properties']['easingout'] == 'easeInExpo') ? 'selected="selected"' : '' ?>>easeInExpo</option>
										<option <?php echo ($layer['properties']['easingout'] == 'easeOutExpo') ? 'selected="selected"' : '' ?>>easeOutExpo</option>
										<option <?php echo ($layer['properties']['easingout'] == 'easeInOutExpo') ? 'selected="selected"' : '' ?>>easeInOutExpo</option>
										<option <?php echo ($layer['properties']['easingout'] == 'easeInCirc') ? 'selected="selected"' : '' ?>>easeInCirc</option>
										<option <?php echo ($layer['properties']['easingout'] == 'easeOutCirc') ? 'selected="selected"' : '' ?>>easeOutCirc</option>
										<option <?php echo ($layer['properties']['easingout'] == 'easeInOutCirc') ? 'selected="selected"' : '' ?>>easeInOutCirc</option>
										<option <?php echo ($layer['properties']['easingout'] == 'easeInElastic') ? 'selected="selected"' : '' ?>>easeInElastic</option>
										<option <?php echo ($layer['properties']['easingout'] == 'easeOutElastic') ? 'selected="selected"' : '' ?>>easeOutElastic</option>
										<option <?php echo ($layer['properties']['easingout'] == 'easeInOutElastic') ? 'selected="selected"' : '' ?>>easeInOutElastic</option>
										<option <?php echo ($layer['properties']['easingout'] == 'easeInBack') ? 'selected="selected"' : '' ?>>easeInBack</option>
										<option <?php echo ($layer['properties']['easingout'] == 'easeOutBack') ? 'selected="selected"' : '' ?>>easeOutBack</option>
										<option <?php echo ($layer['properties']['easingout'] == 'easeInOutBack') ? 'selected="selected"' : '' ?>>easeInOutBack</option>
										<option <?php echo ($layer['properties']['easingout'] == 'easeInBounce') ? 'selected="selected"' : '' ?>>easeInBounce</option>
										<option <?php echo ($layer['properties']['easingout'] == 'easeOutBounce') ? 'selected="selected"' : '' ?>>easeOutBounce</option>
										<option <?php echo ($layer['properties']['easingout'] == 'easeInOutBounce') ? 'selected="selected"' : '' ?>>easeInOutBounce</option>
									</select>
								</td>
								<td class="right"><?php _e('Delay out', 'LayerSlider')  ?></td>
								<td><input type="text" name="delayout" class="layerprop" value="<?php echo $layer['properties']['delayout']?>"  data-help="<?php _e('Delay before the animation start when the slide slides out. This value is in millisecs, so the value 1000 means 1 second.', 'LayerSlider') ?>"> (ms)</td>
							</tr>
							<tr>
								<td class="right"><?php _e('Link this slide ', 'LayerSlider'); ?></td>
								<td class="right"><?php _e('Link URL', 'LayerSlider') ?></td>
								<td><input type="text" name="layer_link" value="<?php echo !empty($layer['properties']['layer_link']) ? $layer['properties']['layer_link'] : '' ?>" data-help="<?php _e('If you want to link the whole slide, enter the URL of your link here.', 'LayerSlider') ?>"></td>
								<td class="right"><?php _e('Link target', 'LayerSlider') ?></td>
								<td>
									<?php $layer['properties']['layer_link_target'] = isset($layer['properties']['layer_link_target']) ? $layer['properties']['layer_link_target'] : '' ?>
									<select name="layer_link_target" data-help="<?php _e('You can control here the link behaviour: _self means the linked page will open in the current tab/window, _blank will create a new tab/window.', 'LayerSlider') ?>">
										<option<?php echo ($layer['properties']['layer_link_target'] == '_self') ? ' selected="selected"' : ''?>>_self</option>
										<option<?php echo ($layer['properties']['layer_link_target'] == '_blank') ? ' selected="selected"' : ''?>>_blank</option>
										<option<?php echo ($layer['properties']['layer_link_target'] == '_parent') ? ' selected="selected"' : ''?>>_parent</option>
										<option<?php echo ($layer['properties']['layer_link_target'] == '_top') ? ' selected="selected"' : ''?>>_top</option>
									</select>
								</td>
								<td></td>
								<td></td>
							</tr>
							<tr>
								<td class="right"><?php _e('Misc', 'LayerSlider') ?></td>
								<td class="right"><?php _e('#ID', 'LayerSlider') ?></td>
								<td><input type="text" name="id" value="<?php echo $layer['properties']['id'] ?>" data-help="<?php _e('You can apply an ID attribute on the HTML element of this slide to work with it in your custom CSS or Javascript code.', 'LayerSlider') ?>"></td>
								<td class="right"><?php _e('Deeplink', 'LayerSlider') ?></td>
								<td><input type="text" name="deeplink" value="<?php echo isset($layer['properties']['deeplink']) ? $layer['properties']['deeplink'] : '' ?>" data-help="<?php _e('You can specify a slide alias name which you can use in your URLs with a hash mark, so LayerSlider will start with the correspondig slide.', 'LayerSlider') ?>"></td>
								<td class="right"><?php _e('Hidden', 'LayerSlider') ?></td>
								<td><input type="checkbox" name="skip" class="checkbox" <?php echo isset($layer['properties']['skip']) ? 'checked="checked"' : '' ?> data-help="<?php _e("If you don't want to use this slide in your front-page, but you want to keep it, you can hide it with this switch.", "LayerSlider") ?>"></td>
							</tr>
						</tbody>
					</table>
					<table>
						<thead>
							<tr>
								<td>
									<span id="ls-icon-preview"></span>
									<h4><?php _e('Preview', 'LayerSlider') ?></h4>
								</td>
							</tr>
						</thead>
						<tbody>
							<tr>
								<td class="ls-preview-td">
									<div class="ls-preview-wrapper">
										<div class="ls-preview">
											<div class="draggable ls-layer"></div>
										</div>
										<div class="ls-real-time-preview"></div>
										<button class="button ls-preview-button"><?php _e('Enter Preview', 'LayerSlider') ?></button>
									</div>
								</td>
							</tr>
						</tbody>
					</table>
					<table>
						<thead>
							<tr>
								<td>
									<span id="ls-icon-sublayers"></span>
									<h4><?php _e('Layers', 'LayerSlider') ?></h4>
								</td>
							</tr>
						</thead>
						<tbody class="ls-sublayers ls-sublayer-sortable">
							<?php if(!empty($layer['sublayers'])) : ?>
							<?php foreach($layer['sublayers'] as $key => $sublayer) : ?>
							<?php $active = (count($layer['sublayers']) == ($key+1)) ? ' class="active"' : '' ?>
							<?php $title = empty($sublayer['subtitle']) ? 'Layer #'.($key+1).'' : htmlspecialchars(stripslashes($sublayer['subtitle'])); ?>
							<tr<?php echo $active ?>>
								<td>
									<div class="ls-sublayer-wrapper">
										<span class="ls-sublayer-number"><?php echo ($key + 1) ?></span>
										<span class="ls-highlight"><input type="checkbox" class="noreplace"></span>
										<span class="ls-icon-eye"></span>
										<span class="ls-icon-lock"></span>
										<input type="text" name="subtitle" class="ls-sublayer-title" value="<?php echo $title ?>">
										<div class="clear"></div>
										<div class="ls-sublayer-nav">
											<a href="#" class="active"><?php _e('Basic', 'LayerSlider') ?></a>
											<a href="#"><?php _e('Options', 'LayerSlider') ?></a>
											<a href="#"><?php _e('Link', 'LayerSlider') ?></a>
											<a href="#"><?php _e('Style', 'LayerSlider') ?></a>
											<a href="#"><?php _e('Attributes', 'LayerSlider') ?></a>
											<a href="#" title="Remove this layer" class="remove">x</a>
										</div>
										<div class="ls-sublayer-pages">
											<div class="ls-sublayer-page ls-sublayer-basic active">
												<select name="type">
													<option <?php echo ($sublayer['type'] == 'img') ? 'selected="selected"' : '' ?>>img</option>
													<option <?php echo ($sublayer['type'] == 'div') ? 'selected="selected"' : '' ?>>div</option>
													<option <?php echo ($sublayer['type'] == 'p') ? 'selected="selected"' : '' ?>>p</option>
													<option <?php echo ($sublayer['type'] == 'span') ? 'selected="selected"' : '' ?>>span</option>
													<option <?php echo ($sublayer['type'] == 'h1') ? 'selected="selected"' : '' ?>>h1</option>
													<option <?php echo ($sublayer['type'] == 'h2') ? 'selected="selected"' : '' ?>>h2</option>
													<option <?php echo ($sublayer['type'] == 'h3') ? 'selected="selected"' : '' ?>>h3</option>
													<option <?php echo ($sublayer['type'] == 'h4') ? 'selected="selected"' : '' ?>>h4</option>
													<option <?php echo ($sublayer['type'] == 'h5') ? 'selected="selected"' : '' ?>>h5</option>
													<option <?php echo ($sublayer['type'] == 'h6') ? 'selected="selected"' : '' ?>>h6</option>
												</select>

												<div class="ls-sublayer-types">
													<span class="ls-type">
														<span class="ls-icon-img"></span><br>
														<?php _e('Image', 'LayerSlider') ?>
													</span>

													<span class="ls-type">
														<span class="ls-icon-div"></span><br>
														<?php _e('Div / Video', 'LayerSlider') ?>
													</span>

													<span class="ls-type">
														<span class="ls-icon-p"></span><br>
														<?php _e('Paragraph', 'LayerSlider') ?>
													</span>

													<span class="ls-type">
														<span class="ls-icon-span"></span><br>
														<?php _e('Span', 'LayerSlider') ?>
													</span>

													<span class="ls-type">
														<span class="ls-icon-h1"></span><br>
														<?php _e('H1', 'LayerSlider') ?>
													</span>

													<span class="ls-type">
														<span class="ls-icon-h2"></span><br>
														<?php _e('H2', 'LayerSlider') ?>
													</span>

													<span class="ls-type">
														<span class="ls-icon-h3"></span><br>
														<?php _e('H3', 'LayerSlider') ?>
													</span>

													<span class="ls-type">
														<span class="ls-icon-h4"></span><br>
														<?php _e('H4', 'LayerSlider') ?>
													</span>

													<span class="ls-type">
														<span class="ls-icon-h5"></span><br>
														<?php _e('H5', 'LayerSlider') ?>
													</span>

													<span class="ls-type">
														<span class="ls-icon-h6"></span><br>
														<?php _e('H6', 'LayerSlider') ?>
													</span>
												</div>

												<div class="ls-image-uploader">
													<?php $imageSrc = !empty($sublayer['image']) ? $sublayer['image'] : $GLOBALS['lsPluginPath'] . '/img/transparent.png' ?>
													<img src="<?php echo $imageSrc ?>" alt="sublayer image">
													<input type="text" name="image" class="<?php echo $uploadClass ?>" value="<?php echo $sublayer['image'] ?>">
													<p>
														<?php _e('Click into this text field to open WordPress Media Library where you can upload new images or select previously used ones.', 'LayerSlider') ?>
													</p>
												</div>

												<div class="ls-html-code">
													<h5><?php _e('Custom HTML content', 'LayerSlider') ?></h5>
													<textarea name="html" cols="50" rows="5" data-help="<?php _e('Type here the contents of your layer. You can use any HTML codes in this field to insert other contents then text. This field is also shortcode-aware, so you can insert content from other plugins as well as video embed codes.', 'LayerSlider') ?>"><?php echo stripslashes($sublayer['html']) ?></textarea>
												</div>
											</div>
											<div class="ls-sublayer-page ls-sublayer-options">
												<table>
													<tbody>
														<tr>
															<td rowspan="2"><?php _e('Transition in', 'LayerSlider') ?></td>
															<td class="right"><?php _e('Type', 'LayerSlider') ?></td>
															<td>
																<select name="slidedirection" class="sublayerprop" data-help="<?php _e('The type of the transition.', 'LayerSlider') ?>">
																	<option value="fade" <?php echo ($sublayer['slidedirection'] == 'fade') ? 'selected="selected"' : '' ?>><?php _e('Fade', 'LayerSlider') ?></option>
																	<option value="auto" <?php echo ($sublayer['slidedirection'] == 'auto') ? 'selected="selected"' : '' ?>><?php _e('Auto (Slide from auto direction)', 'LayerSlider') ?></option>
																	<option value="top" <?php echo ($sublayer['slidedirection'] == 'top') ? 'selected="selected"' : '' ?>><?php _e('Top (Slide from top)', 'LayerSlider') ?></option>
																	<option value="right" <?php echo ($sublayer['slidedirection'] == 'right') ? 'selected="selected"' : '' ?>><?php _e('Right (Slide from right)', 'LayerSlider') ?></option>
																	<option value="bottom" <?php echo ($sublayer['slidedirection'] == 'bottom') ? 'selected="selected"' : '' ?>><?php _e('Bottom (Slide from bottom)', 'LayerSlider') ?></option>
																	<option value="left" <?php echo ($sublayer['slidedirection'] == 'left') ? 'selected="selected"' : '' ?>><?php _e('Left (Slide from left)', 'LayerSlider') ?></option>
																</select>
															</td>
															<td class="right"><?php _e('Duration', 'LayerSlider') ?></td>
															<td><input type="text" name="durationin" class="sublayerprop" value="<?php echo $sublayer['durationin'] ?>" data-help="<?php _e('The duration of the slide in animation. This value is in millisecs, so the value 1000 means 1 second. Lower values results faster animations.', 'LayerSlider') ?>"> (ms)</td>
															<td class="right"><a href="http://easings.net/" target="_blank"><?php _e('Easing', 'LayerSlider') ?></a></td>
															<td>
																<select name="easingin" class="sublayerprop" data-help="<?php _e('The timing function of the animation, with it you can manipualte the layer movement. Please click on the link next to this select field to open easings.net for more information and real-time examples.', 'LayerSlider') ?>">
																	<option <?php echo ($sublayer['easingin'] == 'linear') ? 'selected="selected"' : '' ?>>linear</option>
																	<option <?php echo ($sublayer['easingin'] == 'swing') ? 'selected="selected"' : '' ?>>swing</option>
																	<option <?php echo ($sublayer['easingin'] == 'easeInQuad') ? 'selected="selected"' : '' ?>>easeInQuad</option>
																	<option <?php echo ($sublayer['easingin'] == 'easeOutQuad') ? 'selected="selected"' : '' ?>>easeOutQuad</option>
																	<option <?php echo ($sublayer['easingin'] == 'easeInOutQuad') ? 'selected="selected"' : '' ?>>easeInOutQuad</option>
																	<option <?php echo ($sublayer['easingin'] == 'easeInCubic') ? 'selected="selected"' : '' ?>>easeInCubic</option>
																	<option <?php echo ($sublayer['easingin'] == 'easeOutCubic') ? 'selected="selected"' : '' ?>>easeOutCubic</option>
																	<option <?php echo ($sublayer['easingin'] == 'easeInOutCubic') ? 'selected="selected"' : '' ?>>easeInOutCubic</option>
																	<option <?php echo ($sublayer['easingin'] == 'easeInQuart') ? 'selected="selected"' : '' ?>>easeInQuart</option>
																	<option <?php echo ($sublayer['easingin'] == 'easeOutQuart') ? 'selected="selected"' : '' ?>>easeOutQuart</option>
																	<option <?php echo ($sublayer['easingin'] == 'easeInOutQuart') ? 'selected="selected"' : '' ?>>easeInOutQuart</option>
																	<option <?php echo ($sublayer['easingin'] == 'easeInQuint') ? 'selected="selected"' : '' ?>>easeInQuint</option>
																	<option <?php echo ($sublayer['easingin'] == 'easeOutQuint') ? 'selected="selected"' : '' ?>>easeOutQuint</option>
																	<option <?php echo ($sublayer['easingin'] == 'easeInOutQuint') ? 'selected="selected"' : '' ?>>easeInOutQuint</option>
																	<option <?php echo ($sublayer['easingin'] == 'easeInSine') ? 'selected="selected"' : '' ?>>easeInSine</option>
																	<option <?php echo ($sublayer['easingin'] == 'easeOutSine') ? 'selected="selected"' : '' ?>>easeOutSine</option>
																	<option <?php echo ($sublayer['easingin'] == 'easeInOutSine') ? 'selected="selected"' : '' ?>>easeInOutSine</option>
																	<option <?php echo ($sublayer['easingin'] == 'easeInExpo') ? 'selected="selected"' : '' ?>>easeInExpo</option>
																	<option <?php echo ($sublayer['easingin'] == 'easeOutExpo') ? 'selected="selected"' : '' ?>>easeOutExpo</option>
																	<option <?php echo ($sublayer['easingin'] == 'easeInOutExpo') ? 'selected="selected"' : '' ?>>easeInOutExpo</option>
																	<option <?php echo ($sublayer['easingin'] == 'easeInCirc') ? 'selected="selected"' : '' ?>>easeInCirc</option>
																	<option <?php echo ($sublayer['easingin'] == 'easeOutCirc') ? 'selected="selected"' : '' ?>>easeOutCirc</option>
																	<option <?php echo ($sublayer['easingin'] == 'easeInOutCirc') ? 'selected="selected"' : '' ?>>easeInOutCirc</option>
																	<option <?php echo ($sublayer['easingin'] == 'easeInElastic') ? 'selected="selected"' : '' ?>>easeInElastic</option>
																	<option <?php echo ($sublayer['easingin'] == 'easeOutElastic') ? 'selected="selected"' : '' ?>>easeOutElastic</option>
																	<option <?php echo ($sublayer['easingin'] == 'easeInOutElastic') ? 'selected="selected"' : '' ?>>easeInOutElastic</option>
																	<option <?php echo ($sublayer['easingin'] == 'easeInBack') ? 'selected="selected"' : '' ?>>easeInBack</option>
																	<option <?php echo ($sublayer['easingin'] == 'easeOutBack') ? 'selected="selected"' : '' ?>>easeOutBack</option>
																	<option <?php echo ($sublayer['easingin'] == 'easeInOutBack') ? 'selected="selected"' : '' ?>>easeInOutBack</option>
																	<option <?php echo ($sublayer['easingin'] == 'easeInBounce') ? 'selected="selected"' : '' ?>>easeInBounce</option>
																	<option <?php echo ($sublayer['easingin'] == 'easeOutBounce') ? 'selected="selected"' : '' ?>>easeOutBounce</option>
																	<option <?php echo ($sublayer['easingin'] == 'easeInOutBounce') ? 'selected="selected"' : '' ?>>easeInOutBounce</option>
																</select>
															</td>
															<td class="right"><?php _e('Delay', 'LayerSlider') ?></td>
															<td><input type="text" name="delayin" class="sublayerprop" value="<?php echo $sublayer['delayin'] ?>" data-help="<?php _e('Delay before the animation start when the layer slides in. This value is in millisecs, so the value 1000 means 1 second.', 'LayerSlider') ?>"> (ms)</td>
														</tr>

														<tr>
															<td class="right notfirst"><?php _e('Rotation', 'LayerSlider') ?></td>
															<td><input type="text" name="rotatein" value="<?php echo !empty($sublayer['rotatein']) ? $sublayer['rotatein'] : '0' ?>" class="sublayerprop" data-help="You can set the initial rotation of this layer here which will animate to the default (0deg) value. You can use negative values."></td>
															<td class="right"><?php _e('Scale', 'LayerSlider') ?></td>
															<td><input type="text" name="scalein" value="<?php echo (isset($sublayer['scalein'])  && $sublayer['scalein'] != '') ? $sublayer['scalein'] : '1.0' ?>" class="sublayerprop" data-help="You can set the initial scale of this layer here which will be animated to the default (1.0) value."></td>
															<td class="right"></td>
															<td></td>
															<td class="right"></td>
															<td></td>
														</tr>

														<tr>
															<td rowspan="2"><?php _e('Transition out', 'LayerSlider') ?></td>
															<td class="right"><?php _e('Type', 'LayerSlider') ?></td>
															<td>
																<select name="slideoutdirection" class="sublayerprop" data-help="<?php _e('The type of the transition.', 'LayerSlider') ?>">
																	<option value="fade" <?php echo ($sublayer['slideoutdirection'] == 'fade') ? 'selected="selected"' : '' ?>><?php _e('Fade', 'LayerSlider') ?></option>
																	<option value="auto" <?php echo ($sublayer['slideoutdirection'] == 'auto') ? 'selected="selected"' : '' ?>><?php _e('Auto (Slide to auto direction)', 'LayerSlider') ?></option>
																	<option value="top" <?php echo ($sublayer['slideoutdirection'] == 'top') ? 'selected="selected"' : '' ?>><?php _e('Top (Slide to top)', 'LayerSlider') ?></option>
																	<option value="right" <?php echo ($sublayer['slideoutdirection'] == 'right') ? 'selected="selected"' : '' ?>><?php _e('Right (Slide to right)', 'LayerSlider') ?></option>
																	<option value="bottom" <?php echo ($sublayer['slideoutdirection'] == 'bottom') ? 'selected="selected"' : '' ?>><?php _e('Bottom (Slide to bottom)', 'LayerSlider') ?></option>
																	<option value="left" <?php echo ($sublayer['slideoutdirection'] == 'left') ? 'selected="selected"' : '' ?>><?php _e('Left (Slide to left)', 'LayerSlider') ?></option>
																</select>
															</td>
															<td class="right"><?php _e('Duration', 'LayerSlider') ?></td>
															<td><input type="text" name="durationout" class="sublayerprop" value="<?php echo $sublayer['durationout'] ?>" data-help="<?php _e('The duration of the slide out animation. This value is in millisecs, so the value 1000 means 1 second. Lower values results faster animations.', 'LayerSlider') ?>"> (ms)</td>
															<td class="right"><a href="http://easings.net/" target="_blank"><?php _e('Easing', 'LayerSlider') ?></a></td>
															<td>
																<select name="easingout" class="sublayerprop" data-help="<?php _e('The timing function of the animation, with it you can manipualte the layer movement. Please click on the link next to this select field to open easings.net for more information and real-time examples.', 'LayerSlider') ?>">
																	<option <?php echo ($sublayer['easingout'] == 'linear') ? 'selected="selected"' : '' ?>>linear</option>
																	<option <?php echo ($sublayer['easingout'] == 'swing') ? 'selected="selected"' : '' ?>>swing</option>
																	<option <?php echo ($sublayer['easingout'] == 'easeInQuad') ? 'selected="selected"' : '' ?>>easeInQuad</option>
																	<option <?php echo ($sublayer['easingout'] == 'easeOutQuad') ? 'selected="selected"' : '' ?>>easeOutQuad</option>
																	<option <?php echo ($sublayer['easingout'] == 'easeInOutQuad') ? 'selected="selected"' : '' ?>>easeInOutQuad</option>
																	<option <?php echo ($sublayer['easingout'] == 'easeInCubic') ? 'selected="selected"' : '' ?>>easeInCubic</option>
																	<option <?php echo ($sublayer['easingout'] == 'easeOutCubic') ? 'selected="selected"' : '' ?>>easeOutCubic</option>
																	<option <?php echo ($sublayer['easingout'] == 'easeInOutCubic') ? 'selected="selected"' : '' ?>>easeInOutCubic</option>
																	<option <?php echo ($sublayer['easingout'] == 'easeInQuart') ? 'selected="selected"' : '' ?>>easeInQuart</option>
																	<option <?php echo ($sublayer['easingout'] == 'easeOutQuart') ? 'selected="selected"' : '' ?>>easeOutQuart</option>
																	<option <?php echo ($sublayer['easingout'] == 'easeInOutQuart') ? 'selected="selected"' : '' ?>>easeInOutQuart</option>
																	<option <?php echo ($sublayer['easingout'] == 'easeInQuint') ? 'selected="selected"' : '' ?>>easeInQuint</option>
																	<option <?php echo ($sublayer['easingout'] == 'easeOutQuint') ? 'selected="selected"' : '' ?>>easeOutQuint</option>
																	<option <?php echo ($sublayer['easingout'] == 'easeInOutQuint') ? 'selected="selected"' : '' ?>>easeInOutQuint</option>
																	<option <?php echo ($sublayer['easingout'] == 'easeInSine') ? 'selected="selected"' : '' ?>>easeInSine</option>
																	<option <?php echo ($sublayer['easingout'] == 'easeOutSine') ? 'selected="selected"' : '' ?>>easeOutSine</option>
																	<option <?php echo ($sublayer['easingout'] == 'easeInOutSine') ? 'selected="selected"' : '' ?>>easeInOutSine</option>
																	<option <?php echo ($sublayer['easingout'] == 'easeInExpo') ? 'selected="selected"' : '' ?>>easeInExpo</option>
																	<option <?php echo ($sublayer['easingout'] == 'easeOutExpo') ? 'selected="selected"' : '' ?>>easeOutExpo</option>
																	<option <?php echo ($sublayer['easingout'] == 'easeInOutExpo') ? 'selected="selected"' : '' ?>>easeInOutExpo</option>
																	<option <?php echo ($sublayer['easingout'] == 'easeInCirc') ? 'selected="selected"' : '' ?>>easeInCirc</option>
																	<option <?php echo ($sublayer['easingout'] == 'easeOutCirc') ? 'selected="selected"' : '' ?>>easeOutCirc</option>
																	<option <?php echo ($sublayer['easingout'] == 'easeInOutCirc') ? 'selected="selected"' : '' ?>>easeInOutCirc</option>
																	<option <?php echo ($sublayer['easingout'] == 'easeInElastic') ? 'selected="selected"' : '' ?>>easeInElastic</option>
																	<option <?php echo ($sublayer['easingout'] == 'easeOutElastic') ? 'selected="selected"' : '' ?>>easeOutElastic</option>
																	<option <?php echo ($sublayer['easingout'] == 'easeInOutElastic') ? 'selected="selected"' : '' ?>>easeInOutElastic</option>
																	<option <?php echo ($sublayer['easingout'] == 'easeInBack') ? 'selected="selected"' : '' ?>>easeInBack</option>
																	<option <?php echo ($sublayer['easingout'] == 'easeOutBack') ? 'selected="selected"' : '' ?>>easeOutBack</option>
																	<option <?php echo ($sublayer['easingout'] == 'easeInOutBack') ? 'selected="selected"' : '' ?>>easeInOutBack</option>
																	<option <?php echo ($sublayer['easingout'] == 'easeInBounce') ? 'selected="selected"' : '' ?>>easeInBounce</option>
																	<option <?php echo ($sublayer['easingout'] == 'easeOutBounce') ? 'selected="selected"' : '' ?>>easeOutBounce</option>
																	<option <?php echo ($sublayer['easingout'] == 'easeInOutBounce') ? 'selected="selected"' : '' ?>>easeInOutBounce</option>
																</select>
															</td>
															<td class="right"><?php _e('Delay', 'LayerSlider') ?></td>
															<td><input type="text" name="delayout" class="sublayerprop" value="<?php echo $sublayer['delayout'] ?>" data-help="<?php _e('Delay before the animation start when the layer slides out. This value is in millisecs, so the value 1000 means 1 second.', 'LayerSlider') ?>"> (ms)</td>
														</tr>

														<tr>
															<td class="right notfirst"><?php _e('Rotation', 'LayerSlider') ?></td>
															<td><input type="text" name="rotateout" value="<?php echo !empty($sublayer['rotateout']) ? $sublayer['rotateout'] : '0' ?>" class="sublayerprop" data-help="You can set the ending rotation here, this sublayer will be animated from the default (0deg) value to yours. You can use negative values."></td>
															<td class="right"><?php _e('Scale', 'LayerSlider') ?></td>
															<td><input type="text" name="scaleout" value="<?php echo (isset($sublayer['scaleout']) && $sublayer['scaleout'] != '') ? $sublayer['scaleout'] : '1.0' ?>" class="sublayerprop" data-help="You can set the ending scale value here, this sublayer will be animated from the default (1.0) value to yours."></td>
															<td class="right"></td>
															<td></td>
															<td class="right"></td>
															<td></td>
														</tr>

														<tr>
															<td><?php _e('Other options', 'LayerSlider') ?></td>
															<td class="right"><?php _e('Distance', 'LayerSlider') ?></td>
															<td><input type="text" name="level" value="<?php echo $sublayer['level'] ?>" data-help="<?php _e('The default value is -1 which means that the layer will be positioned exactly outside of the slide container. You can use the default setting in most of the cases. If you need to set the start or end position of the layer from further of the edges of the slide container, you can use 2, 3 or higher values.', 'LayerSlider') ?>"></td>
															<td class="right"><?php _e('Show until', 'LayerSlider') ?></td>
															<td><input type="text" name="showuntil" class="sublayerprop" value="<?php echo !empty($sublayer['showuntil']) ? $sublayer['showuntil'] : '0'  ?>" data-help="<?php _e('The layer will be visible for the time you specify here, then it will slide out. You can use this setting for layers to leave the slide before the slide itself animates out, or for example before other layers will slide in. This value in millisecs, so the value 1000 means 1 second.', 'LayerSlider') ?>"> (ms)</td>
															<td class="right"><?php _e('Hidden', 'LayerSlider') ?></td>
															<td><input type="checkbox" name="skip" class="checkbox" data-help="<?php _e("If you don't want to use this layer, but you want to keep it, you can hide it with this switch.", "LayerSlider") ?>" <?php echo isset($sublayer['skip']) ? 'checked="checked"' : '' ?>></td>
															<td colspan="3"><button class="button duplicate" data-help="<?php _e('If you will use similar settings for other layers or you want to experiment on a copy, you can duplicate this layer.', 'LayerSlider') ?>"><?php _e('Duplicate this layer', 'LayerSlider') ?></button></td>
														</tr>
												</table>
											</div>
											<div class="ls-sublayer-page ls-sublayer-link">
												<table>
													<tbody>
														<tr>
															<td><?php _e('URL', 'LayerSlider') ?></td>
															<td class="url"><input type="text" name="url" value="<?php echo $sublayer['url'] ?>" data-help="<?php _e('If you want to link your layer, type here the URL. You can use a hash mark followed by a number to link this layer to another slide. Example: #3 - this will switch to the third slide.', 'LayerSlider') ?>"></td>
															<td>
																<select name="target" data-help="<?php _e('You can control here the link behaviour: _self means the linked page will open in the current tab/window, _blank will open it in a new tab/window.', 'LayerSlider') ?>">
																	<option <?php echo ($sublayer['target'] == '_self') ? 'selected="selected"' : '' ?>>_self</option>
																	<option <?php echo ($sublayer['target'] == '_blank') ? 'selected="selected"' : '' ?>>_blank</option>
																	<option <?php echo ($sublayer['target'] == '_parent') ? 'selected="selected"' : '' ?>>_parent</option>
																	<option <?php echo ($sublayer['target'] == '_top') ? 'selected="selected"' : '' ?>>_top</option>
																</select>
															</td>
														</tr>
													</tbody>
												</table>
											</div>
											<div class="ls-sublayer-page ls-sublayer-style">
												<?php $sublayer['styles'] = !empty($sublayer['styles']) ? json_decode(stripslashes($sublayer['styles']), true) : array(); ?>
												<input type="hidden" name="styles">
												<table>
													<tbody>
														<tr>
															<td><?php _e('Layout & Positions', 'LayerSlider') ?></td>
															<td class="right"><?php _e('Width', 'LayerSlider') ?></td>
															<td><input type="text" name="width" class="auto" value="<?php echo isset($sublayer['styles']['width']) ? $sublayer['styles']['width'] : '' ?>" data-help="<?php _e("You can set the width of your layer. You can use pixels, percents, or the default value 'auto'. Examples: 100px, 50% or auto", "LayerSlider") ?>"></td>
															<td class="right"><?php _e('Height', 'LayerSlider') ?></td>
															<td><input type="text" name="height" class="auto" value="<?php echo isset($sublayer['styles']['height']) ? $sublayer['styles']['height'] : '' ?>" data-help="<?php _e("You can set the height of your layer. You can use pixels, percents, or the default value 'auto'. Examples: 100px, 50% or auto", "LayerSlider") ?>"></td>
															<td class="right"><?php _e('Top', 'LayerSlider') ?></td>
															<td><input type="text" name="top" value="<?php echo $sublayer['top'] ?>" data-help="<?php _e("The layer position from the top of the slide. You can use pixels and percents. Examples: 100px or 50%. You can move your layers in the preview above with a drag n' drop, or set the exact values here.", "LayerSlider") ?>"></td>
															<td class="right"><?php _e('Left', 'LayerSlider') ?></td>
															<td><input type="text" name="left" value="<?php echo $sublayer['left'] ?>" data-help="<?php _e("The layer position from the left side of the slide. You can use pixels and percents. Examples: 100px or 50%. You can move your layers in the preview above with a drag n' drop, or set the exact values here.", "LayerSlider") ?>"></td>
														</tr>
														<tr>
															<td><?php _e('Padding', 'LayerSlider') ?></td>
															<td class="right"><?php _e('Top', 'LayerSlider') ?></td>
															<td><input type="text" name="padding-top" class="auto" value="<?php echo isset($sublayer['styles']['padding-top']) ? $sublayer['styles']['padding-top'] : '' ?>" data-help="<?php _e('Padding on the top of the layer. Example: 10px', 'LayerSlider') ?>"></td>
															<td class="right"><?php _e('Right', 'LayerSlider') ?></td>
															<td><input type="text" name="padding-right" class="auto" value="<?php echo isset($sublayer['styles']['padding-right']) ? $sublayer['styles']['padding-right'] : '' ?>" data-help="<?php _e('Padding on the right side of the layer. Example: 10px', 'LayerSlider') ?>"></td>
															<td class="right"><?php _e('Bottom', 'LayerSlider') ?></td>
															<td><input type="text" name="padding-bottom" class="auto" value="<?php echo isset($sublayer['styles']['padding-bottom']) ? $sublayer['styles']['padding-bottom'] : '' ?>" data-help="<?php _e('Padding on the bottom of the layer. Example: 10px', 'LayerSlider') ?>"></td>
															<td class="right"><?php _e('Left', 'LayerSlider') ?></td>
															<td><input type="text" name="padding-left" class="auto" value="<?php echo isset($sublayer['styles']['padding-left']) ? $sublayer['styles']['padding-left'] : '' ?>" data-help="<?php _e('Padding on the left side of the layer. Example: 10px', 'LayerSlider') ?>"></td>
														</tr>
														<tr>
															<td><?php _e('Border', 'LayerSlider') ?></td>
															<td class="right"><?php _e('Top', 'LayerSlider') ?></td>
															<td><input type="text" name="border-top" class="auto" value="<?php echo isset($sublayer['styles']['border-top']) ? $sublayer['styles']['border-top'] : '' ?>" data-help="<?php _e('Border on the top of the layer. Example: 5px solid #000', 'LayerSlider') ?>"></td>
															<td class="right"><?php _e('Right', 'LayerSlider') ?></td>
															<td><input type="text" name="border-right" class="auto" value="<?php echo isset($sublayer['styles']['border-right']) ? $sublayer['styles']['border-right'] : '' ?>" data-help="<?php _e('Border on the right side of the layer. Example: 5px solid #000', 'LayerSlider') ?>"></td>
															<td class="right"><?php _e('Bottom', 'LayerSlider') ?></td>
															<td><input type="text" name="border-bottom" class="auto" value="<?php echo isset($sublayer['styles']['border-bottom']) ? $sublayer['styles']['border-bottom'] : '' ?>" data-help="<?php _e('Border on the bottom of the layer. Example: 5px solid #000', 'LayerSlider') ?>"></td>
															<td class="right"><?php _e('Left', 'LayerSlider') ?></td>
															<td><input type="text" name="border-left" class="auto" value="<?php echo isset($sublayer['styles']['border-left']) ? $sublayer['styles']['border-left'] : '' ?>" data-help="<?php _e('Border on the left side of the layer. Example: 5px solid #000', 'LayerSlider') ?>"></td>
														</tr>
														<tr>
															<td><?php _e('Font', 'LayerSlider') ?></td>
															<td class="right"><?php _e('Family', 'LayerSlider') ?></td>
															<td><input type="text" name="font-family" class="auto" value="<?php echo isset($sublayer['styles']['font-family']) ? htmlspecialchars(stripslashes($sublayer['styles']['font-family'])) : '' ?>" data-help="<?php _e('List of your chosen fonts separated with a comma. Please use apostrophes if your font names contains white spaces. Example: Helvetica, Arial, sans-serif', 'LayerSlider') ?>"></td>
															<td class="right"><?php _e('Size', 'LayerSlider') ?></td>
															<td><input type="text" name="font-size" class="auto" value="<?php echo isset($sublayer['styles']['font-size']) ? $sublayer['styles']['font-size'] : '' ?>" data-help="<?php _e('The font size in pixels. Example: 16px.', 'LayerSlider') ?>"></td>
															<td class="right"><?php _e('Line-height', 'LayerSlider') ?></td>
															<td><input type="text" name="line-height" class="auto" value="<?php echo isset($sublayer['styles']['line-height']) ? $sublayer['styles']['line-height'] : '' ?>" data-help="<?php _e("The line height of your text. The default setting is 'normal'. Example: 22px", "LayerSlider") ?>"></td>
															<td class="right"><?php _e('Color', 'LayerSlider') ?></td>
															<td><input type="text" name="color" class="auto ls-colorpicker" value="<?php echo isset($sublayer['styles']['color']) ? $sublayer['styles']['color'] : '' ?>" data-help="<?php _e('The color of your text. You can use color names, hexadecimal, RGB or RGBA values. Example: #333', 'LayerSlider') ?>"></td>
														</tr>
														<tr>
															<td><?php _e('Misc', 'LayerSlider') ?></td>
															<td class="right"><?php _e('Background', 'LayerSlider') ?></td>
															<td><input type="text" name="background" class="auto ls-colorpicker" value="<?php echo isset($sublayer['styles']['background']) ? $sublayer['styles']['background'] : '' ?>" data-help="<?php _e("The background color of your layer. You can use color names, hexadecimal, RGB or RGBA values as well as the 'transparent' keyword. Example: #FFF", "LayerSlider") ?>"></td>
															<td class="right"><?php _e('Rounded corners', 'LayerSlider') ?></td>
															<td><input type="text" name="border-radius" class="auto" value="<?php echo isset($sublayer['styles']['border-radius']) ? $sublayer['styles']['border-radius'] : '' ?>" data-help="<?php _e('If you want rounded corners, you can set here its radius. Example: 5px', 'LayerSlider') ?>"></td>
															<td class="right"><?php _e('Word-wrap', 'LayerSlider') ?></td>
															<td colspan="3"><input type="checkbox" name="wordwrap" data-help="<?php _e('If you use custom sized layers, you have to enable this setting to wrap your text.', 'LayerSlider') ?>" class="checkbox"<?php echo isset($sublayer['wordwrap']) ? ' checked="checked"' : '' ?>></td>
														</tr>
														<tr>
															<td><?php _e('Custom style settings', 'LayerSlider') ?></td>
															<td class="right"><?php _e('Custom styles', 'LayerSlider') ?></td>
															<td colspan="7"><textarea rows="5" cols="50" name="style" class="style" data-help="<?php _e('If you want to set style settings other then above, you can use here any CSS codes. Please make sure to write valid markup.', 'LayerSlider') ?>"><?php echo stripslashes($sublayer['style']) ?></textarea></td>
														</tr>
													</tbody>
												</table>
											</div>
											<div class="ls-sublayer-page ls-sublayer-attributes">
												<table>
													<tbody>
														<tr>
															<td><?php _e('Attributes', 'LayerSlider') ?></td>
															<td class="right"><?php _e('ID', 'LayerSlider') ?></td>
															<td><input type="text" name="id" value="<?php echo $sublayer['id'] ?>" data-help="<?php _e('You can apply an ID attribute on the HTML element of this layer to work with it in your custom CSS or Javascript code.', 'LayerSlider') ?>"></td>
															<td class="right"><?php _e('Classes', 'LayerSlider') ?></td>
															<td><input type="text" name="class" value="<?php echo $sublayer['class'] ?>" data-help="<?php _e('You can apply classes on the HTML element of this layer to work with it in your custom CSS or Javascript code.', 'LayerSlider') ?>"></td>
															<td class="right"><?php _e('Title', 'LayerSlider') ?></td>
															<td><input type="text" name="title" value="<?php echo $sublayer['title'] ?>" data-help="<?php _e('You can add a title to this layer which will display as a tooltip if someone holds his mouse cursor over the layer.', 'LayerSlider') ?>"></td>
															<td class="right"><?php _e('Alt', 'LayerSlider') ?></td>
															<td><input type="text" name="alt" value="<?php echo $sublayer['alt'] ?>" data-help="<?php _e('You can add an alternative text to your layer which is indexed by search engine robots and it helps people with certain disabilities.', 'LayerSlider') ?>"></td>
															<td class="right"><?php _e('Rel', 'LayerSlider') ?></td>
															<td><input type="text" name="rel" value="<?php echo !empty($sublayer['rel']) ? $sublayer['rel'] : '' ?>" data-help="<?php _e('Some plugin may use the rel attribute of a linked content, here you can specify it to make interaction with these plugins.', 'LayerSlider') ?>"></td>
														</tr>
													</tbody>
												</table>
											</div>
										</div>
									</div>
								</td>
							</tr>
							<?php endforeach; ?>
							<?php endif; ?>
						</tbody>
					</table>
					<a href="#" class="ls-add-sublayer"><?php _e('Add new layer', 'LayerSlider') ?></a>
				</div>
				<?php endforeach; ?>
			<?php endif; ?>
			</div>
		</div>

		<!-- Event Callbacks -->
		<div class="ls-page ls-callback-page">
			<div class="ls-box ls-callback-box">
				<h3 class="header">cbInit</h3>
				<div class="inner">
					<textarea name="cbinit" cols="20" rows="5"><?php echo !empty($slider['properties']['cbinit']) ? stripslashes($slider['properties']['cbinit']) : '' ?></textarea>
				</div>
			</div>

			<div class="ls-box ls-callback-box">
				<h3 class="header">cbStart</h3>
				<div class="inner">
					<textarea name="cbstart" cols="20" rows="5"><?php echo !empty($slider['properties']['cbstart']) ? stripslashes($slider['properties']['cbstart']) : '' ?></textarea>
				</div>
			</div>

			<div class="ls-box ls-callback-box side">
				<h3 class="header">cbStop</h3>
				<div class="inner">
					<textarea name="cbstop" cols="20" rows="5"><?php echo !empty($slider['properties']['cbstop']) ? stripslashes($slider['properties']['cbstop']) : '' ?></textarea>
				</div>
			</div>

			<div class="ls-box ls-callback-box">
				<h3 class="header">cbPause</h3>
				<div class="inner">
					<textarea name="cbpause" cols="20" rows="5"><?php echo !empty($slider['properties']['cbpause']) ? stripslashes($slider['properties']['cbpause']) : '' ?></textarea>
				</div>
			</div>

			<div class="ls-box ls-callback-box">
				<h3 class="header">cbAnimStart</h3>
				<div class="inner">
					<textarea name="cbanimstart" cols="20" rows="5"><?php echo !empty($slider['properties']['cbanimstart']) ? stripslashes($slider['properties']['cbanimstart']) : '' ?></textarea>
				</div>
			</div>

			<div class="ls-box ls-callback-box side">
				<h3 class="header">cbAnimStop</h3>
				<div class="inner">
					<textarea name="cbanimstop" cols="20" rows="5"><?php echo !empty($slider['properties']['cbanimstop']) ? stripslashes($slider['properties']['cbanimstop']) : '' ?></textarea>
				</div>
			</div>

			<div class="ls-box ls-callback-box">
				<h3 class="header">cbPrev</h3>
				<div class="inner">
					<textarea name="cbprev" cols="20" rows="5"><?php echo !empty($slider['properties']['cbprev']) ? stripslashes($slider['properties']['cbprev']) : '' ?></textarea>
				</div>
			</div>

			<div class="ls-box ls-callback-box">
				<h3 class="header">cbNext</h3>
				<div class="inner">
					<textarea name="cbnext" cols="20" rows="5"><?php echo !empty($slider['properties']['cbnext']) ? stripslashes($slider['properties']['cbnext']) : '' ?></textarea>
				</div>
			</div>
			<div class="clear"></div>
		</div>
	</div>

	<div class="ls-box ls-publish">
		<h3 class="header"><?php _e('Publish', 'LayerSlider') ?></h3>
		<div class="inner">
			<button class="button-primary"><?php _e('Save changes', 'LayerSlider') ?></button>
			<p class="ls-saving-warning"></p>
			<div class="clear"></div>
		</div>
	</div>
</form>


<script type="text/javascript">

	// Plugin path
	var pluginPath = '<?php echo $GLOBALS['lsPluginPath'] ?>';

	// Transition images
	var lsTrImgPath = '<?php echo $GLOBALS['lsPluginPath'] ?>img/';

	// New Media Library
	<?php if(function_exists( 'wp_enqueue_media' )) { ?>
	var newMediaUploader = true;
	<?php } else { ?>
	var newMediaUploader = false;
	<?php } ?>

	// Screen options
	var lsScreenOptions = <?php echo json_encode($lsScreenOptions) ?>;
</script>
