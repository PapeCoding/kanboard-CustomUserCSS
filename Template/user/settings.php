<div class="page-header">
    <h2>Custom User CSS</h2>
</div>
<form name="customcssform" method="post" action="<?= $this->url->href('CustomCSSController', 'save', array('plugin' => 'CustomUserCSS')) ?>" autocomplete="off">
	<?= $this->form->csrf() ?>
	<textarea name="user_css" placeholder="Custom CSS here..."><?= $saved_css ?></textarea>
	<br/>
	<button class="btn btn-blue" style="margin-top: 10px;" type="submit"><?= t('Save') ?></button>
</form>
