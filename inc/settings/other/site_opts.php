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
	echo '<pre>Please add the live site URL to /inc/other/site_opts.php (Line 3)</pre>';
}
