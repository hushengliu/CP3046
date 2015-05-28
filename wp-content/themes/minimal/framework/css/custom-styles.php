<?php
/* ------------------------------------------------------------------------ */
/* Custom Theme Options Settings CSS										*/
/* ------------------------------------------------------------------------ */
?>
::selection {
 background: <?php echo $sd_data['main_theme_color']; ?>;/* Safari */
}
::-moz-selection {
 background: <?php echo $sd_data['main_theme_color']; ?>; /* Firefox */
}

#header {
	height: <?php echo $sd_data['header_height']; ?>px;
}
.main-menu {
	margin-top: <?php echo $sd_data['header_height']/2-16; ?>px;
}
.site-title {
	margin-top: <?php echo $sd_data['logo_top_margin']; ?>px;
}
.sf-menu li li:first-child,
.sf-menu li li.sfHover li:first-child,
.search-input {
	border-color: <?php echo $sd_data['main_theme_color']; ?>;
}
.sf-menu li ul:before {
	border-bottom: 4px solid <?php echo $sd_data['main_theme_color']; ?>;
}
.sf-menu li li a:hover,
.sf-menu li li.sfHover a,
.sf-menu li li.sfHover li a:hover {
	background-color: <?php echo $sd_data['main_theme_color']; ?>;
}
a:hover,
.sd-colored-txt,
.tweet a,
#footer a:hover,
.copyright a:hover,
.footer-menu .current-menu-item a,
.entry-title a,
.entry-title a:hover,
.sidebar-widget a:hover,
.entry-meta ul li.meta-date span,
.entry-meta ul li a,
.entry-meta ul li a:hover,
.entry-meta ul li.meta-author span,
.sd-portfolio-item h4 a:hover,
.client-details span,
.client-details a:hover,
.accordion h4 span:before,
.toggle-title span:before,
.comment-text cite a:hover,
.site-title a,
.site-title a:hover { 
	color: <?php echo $sd_data['main_theme_color']; ?>;
}
.tp-bullets.simplebullets .bullet:hover,
.tp-bullets.simplebullets .bullet.selected {
	background-color: <?php echo $sd_data['main_theme_color']; ?> !important;
}
.sd-portfolio-fitlers li a:hover,
.sd-portfolio-fitlers .sd-active,
.portfolio-filters li a:hover,
.portfolio-filters .sd-active,
.more-link,
.previous-article a,
.next-article a,
.sd-pagination .current,
.sd-pagination .inactive:hover,
.sd-pagination .pagi-first:hover,
.sd-pagination .pagi-last:hover,
.sd-pagination .pagi-previous:hover,
.sd-pagination .pagi-next:hover,
.tagcloud a:hover,
.search-sumbit,
.sd-button-container a,
input#submit,
input#submit:active,
input#submit:focus,
.wpcf7-form input[type="submit"],
.wpcf7-form input[type="submit"]:active,
.wpcf7-form input[type="reset"]:active,
.wpcf7-form input[type="button"]:active,
.nav-next a,
.nav-previous a {
	background-color: <?php echo $sd_data['main_theme_color']; ?>;
}
.search-input:focus,
.respond-inputs input:focus,
.respond-textarea textarea:focus,
.wpcf7-form input[type="text"]:focus,
.wpcf7-form input[type="email"]:focus,
.wpcf7-form textarea:focus {
	box-shadow: 0 1px 1px <?php echo $sd_data['main_theme_color']; ?> inset, 0 0 4px <?php echo $sd_data['main_theme_color']; ?>;
}
.sd-tabs ul .ui-tabs-selected a,
.sd-tabs ul .ui-tabs-active a {
	border-top: 3px solid <?php echo $sd_data['main_theme_color']; ?> !important;
}
.respond-inputs input:focus,
.respond-textarea textarea:focus,
.wpcf7-form input[type="text"]:focus,
.wpcf7-form input[type="email"]:focus,
.wpcf7-form textarea:focus {
	border-color: <?php echo $sd_data['main_theme_color']; ?>;
}