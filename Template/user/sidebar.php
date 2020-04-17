<li <?= $this->app->checkMenuSelection('CustomCSSController', 'showSettings') ?>>
    <?= $this->url->link(t('Custom User CSS'), 'CustomCSSController', 'showSettings', array('plugin' => 'CustomUserCSS')) ?>
</li>