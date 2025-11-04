<?php

namespace Kanboard\Plugin\CustomUserCSS;

use Kanboard\Core\Plugin\Base;

class Plugin extends Base
{
    public function initialize()
    {
        $this->template->hook->attach('template:layout:head', 'CustomUserCSS:layout/head');
		$this->template->hook->attach('template:user:sidebar:information', 'CustomUserCSS:user/sidebar');
    }
    public function getPluginName()
    {
        return 'CustomUserCSS';
    }
    public function getPluginDescription()
    {
        return t('Store and load custom css per user');
    }
    public function getPluginAuthor()
    {
        return 'Sebastian Pape';
    }
    public function getPluginVersion()
    {
        return '1.1.0';
    }
    public function getPluginHomepage()
    {
        return 'https://github.com/PapeCoding/kanboard-CustomUserCSS';
    }
}
