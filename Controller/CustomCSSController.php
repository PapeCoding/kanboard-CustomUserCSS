<?php

namespace Kanboard\Plugin\CustomUserCSS\Controller;

use Kanboard\Controller\BaseController;

class CustomCSSController extends BaseController
{

    public function showSettings()
    {
        $user = $this->getUser();

		// Load values from corresponding file
		$css_file = DATA_DIR . '/custom_css/user_' . $user['id'] . '.css';
		$css = file_exists($css_file) ? file_get_contents($css_file) : '';

		// Fetch from userdata model if exists, but does not exist in file
		if($css == ""){
			$css = $this->userMetadataModel->get($user['id'], 'custom_user_css', '');
		}
		
		// Send response
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

		// Remove previously stored custom CSS from database
		if($this->userMetadataModel->exists($user['id'], 'custom_user_css')){
			$this->userMetadataModel->remove($user['id'], 'custom_user_css');
		}
		
		// Prepare directory for storage
		$css_dir = DATA_DIR . '/custom_css';
		if (!is_dir($css_dir)) {
			mkdir($css_dir, 0775, true);
		}
		
		// Store file
		$css = trim($values['user_css']);
		$css_file = $css_dir . '/user_' . $user['id'] . '.css';
		file_put_contents($css_file, $css);

		// Notify user
		$this->flash->success('CSS saved successfully');
		return $this->response->redirect($this->helper->url->to('CustomCSSController', 'showSettings', ['plugin' => 'CustomUserCSS']), true);
	}
}
