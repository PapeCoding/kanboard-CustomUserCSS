<style>
	<?php
	$css_file = DATA_DIR . '/custom_css/user_' . $this->user->getid() . '.css';
	print(file_exists($css_file) ? file_get_contents($css_file) : '');
	?>
</style>
