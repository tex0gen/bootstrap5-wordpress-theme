<?php
/**
 * Footer Template
 *
 * The footer template.
 *
 * @package Themestrap
 * @since 1.0.0
 */
?>

		<?php get_template_part( 'template-parts/base/footers/content', 'footer-columns' ); ?>
		
		<?php wp_footer(); ?>

		<?php if (strpos($url, 'localhost')) { ?>
			<script id="__bs_script__">
			//<![CDATA[
				document.write("<script async src='http://HOST:3000/browser-sync/browser-sync-client.js?v=2.26.13'><\/script>".replace("HOST", location.hostname));
			//]]>
			</script>
		<?php } ?>
	</body>
</html>
