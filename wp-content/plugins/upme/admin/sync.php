<h3><?php _e('自动同步到 WooCommerce','upme'); ?></h3>

<?php if ( in_array( 'woocommerce/woocommerce.php', apply_filters( 'active_plugins', get_option( 'active_plugins' ) ) ) ) { ?>

<p><?php _e('同步WooCommerce WooCommerce客户个人资料栏位自动添加到您的UPME。一个快速的方法，WooCommerce有一个帐户页面与UPME集成。只需点击下面的按钮，让UPME为你做的工作。','upme'); ?></p>

<p><a href="<?php echo add_query_arg( array('sync' => 'woocommerce') ); ?>" class="button button-secondary"><?php _e('同步，并保持现有的字段','upme'); ?></a> 
<a href="<?php echo add_query_arg( array('sync' => 'woocommerce_clean') ); ?>" class="button button-secondary"><?php _e('同步和删除现有领域','upme'); ?></a></p>

<?php } else { ?>

<p><?php _e('首次请安装WooCommerce插件。','upme'); ?></p>

<?php } ?>