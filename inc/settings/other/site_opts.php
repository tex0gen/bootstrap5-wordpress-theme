<?php
// Allows robot indexing after dev database has been pushed
$live_url = ''; // Must match WordPress live URL

if ($live_url != '') {
	if ( get_bloginfo('siteurl') === $live_url ) {
		if ( get_option('blog_public') === 0 ) {
			update_option('blog_public', 1);
		}
	} else {
		if ( get_option('blog_public') === 1 ) {
			update_option('blog_public', 0);
		}
	}
} else {
	if ( get_option('blog_public') === 1 ) {
		update_option('blog_public', 0);
	}
	add_action( 'admin_notices', 'sample_admin_notice__error' );
}


function sample_admin_notice__error() {
	echo '<div class="notice notice-error"><p>Please insert the <strong>LIVE</strong> url into the <strong>$live_url</strong> variable into: <strong>inc/settings/other/site_opts.php</strong></p></div>'; 
}

// Disable XML-RPC - Comment this line out if you want this functionality
add_filter('xmlrpc_enabled', '__return_false');
