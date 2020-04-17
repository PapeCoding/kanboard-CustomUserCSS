<?php

namespace Kanboard\Plugin\CustomUserCSS\Controller;

use Kanboard\Controller\BaseController;

class CustomCSSController extends BaseController
{

    public function showSettings()
    {
        $user = $this->getUser();
		$css = $this->userMetadataModel->get($user['id'], 'custom_user_css');
		
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
		
		$this->userMetadataModel->save($user['id'], ['custom_user_css' => $values['user_css']]);
		
		$this->flash->success('CSS saved successfully');
		return $this->response->redirect($this->helper->url->to('CustomCSSController', 'showSettings', ['plugin' => 'CustomUserCSS']), true);
	}
}
