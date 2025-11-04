<?php

namespace Kanboard\Plugin\CustomUserCSS\Controller;

use Kanboard\Controller\BaseController;

class CustomCSSController extends BaseController
{

    public function showSettings()
    {
        $user = $this->getUser();
		$css_file = DATA_DIR . '/custom_css/user_' . $user['id'] . '.css';
		$css = file_exists($css_file) ? file_get_contents($css_file) : '';
		
        $this->response->html($this->helper->layout->user('CustomUserCSS:user/settings', [
            'saved_css' => $css,
			'title'     => t('Custom CSS'),
            'user'      => $user
        ]));
    }

	public function save()
	{
		$user = $this->getUser();
		$values = $this->request->getValues();
		
		$css = trim($values['user_css']);
		$user_dir = DATA_DIR . '/custom_css';
		if (!is_dir($user_dir)) {
    		mkdir($user_dir, 0775, true);
		}

		$css_file = $user_dir . '/user_' . $user['id'] . '.css';
		file_put_contents($css_file, $css);
		$this->flash->success('CSS saved successfully');
		return $this->response->redirect($this->helper->url->to('CustomCSSController', 'showSettings', ['plugin' => 'CustomUserCSS']), true);
	}
}
