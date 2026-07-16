<?php
class ControllerExtensionModuleAdvantagesRandomBlocks extends Controller {
	public function index($setting) {
		$this->load->model('tool/image');

		if (isset($setting['module_description'][$this->config->get('config_language_id')]['blocks'])) {

			$this->document->addStyle('catalog/view/theme/default/stylesheet/advantagesrandom.css');

			$data['heading_title'] = html_entity_decode($setting['module_description'][$this->config->get('config_language_id')]['title'], ENT_QUOTES, 'UTF-8');
			$data['blocks'] = array();
			
			$results = $setting['module_description'][$this->config->get('config_language_id')]['blocks'];
			foreach ($results as $result) {
				$image='';

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
					'description'  => $result['description'],
					'popup' => $popup,
					'image' => $image
				);			
			}

			return $this->load->view('extension/module/advantagesrandom_blocks', $data);
		}
	}
}