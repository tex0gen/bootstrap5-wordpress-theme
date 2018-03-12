<?php $position = get_field('cookie_policy_position', 'options'); ?>
<?php if(get_field('cookie_policy_title', 'options')) { ?>
<div class="cp cp-<?= $position ?>">
	<h4><?php the_field('cookie_policy_title', 'options'); ?></h4>
	<?php the_field('cookie_policy_text', 'options'); ?>
	<div class="cp-actions">
		<a href="#" class="cp-decline btn-secondary">I Decline</a>
		<a href="#" class="cp-accept btn-primary">I Accept</a>
	</div>
</div>
<?php } ?>
