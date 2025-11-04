<style>
	$css_file = DATA_DIR . '/custom_css/user_' . $this->userSession->getId() . '.css';
	$css = file_exists($css_file) ? file_get_contents($css_file) : '';

</style>
