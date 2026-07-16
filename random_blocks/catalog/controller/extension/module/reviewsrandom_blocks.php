<?php
class ControllerExtensionModuleReviewsRandomBlocks extends Controller {
	public function index($setting) {
		$this->load->model('tool/image');

		if (isset($setting['module_description'][$this->config->get('config_language_id')]['blocks'])) {

			$this->document->addScript('catalog/view/javascript/slick/slick.min.js');
			$this->document->addStyle('catalog/view/javascript/slick/slick.min.css');

			$this->document->addStyle('catalog/view/theme/default/stylesheet/reviewsrandom.css');

			$data['heading_title'] = html_entity_decode($setting['module_description'][$this->config->get('config_language_id')]['title'], ENT_QUOTES, 'UTF-8');
			$data['blocks'] = array();
			
			$results = $setting['module_description'][$this->config->get('config_language_id')]['blocks'];
			foreach ($results as $result) {
				$image ='';

				if (is_file(DIR_IMAGE . $result['image'])) { 
        	                        $image = '/image/'.$result['image'];
        	                        $popup = '/image/'.$result['image']; 
				}

				if($image == '') {
					$image = '/image/placeholder.png'; 
					$popup = '/image/placeholder.png'; 
				}

				$data['blocks'][] = array(
					'title' => $result['title'],
					'date' => $result['date'],
					'rating' => $result['rating'],
					'description'  => $result['description'],
					'popup'  => $popup,
					'image' => $image
				);			
			}

			return $this->load->view('extension/module/reviewsrandom_blocks', $data);
		}
	}
}