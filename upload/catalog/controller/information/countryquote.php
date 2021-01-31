<?php
class ControllerInformationCountryquote extends Controller {
	public function index() {
		$this->load->language('information/countryquote');
		
		$data['text_type'] = $this->language->get('text_type');
		$data['text_countries'] = $this->language->get('text_countries');
		$data['text_fee'] = $this->language->get('text_fee');
		
		$data['column_left'] = $this->load->controller('common/column_left');
		$data['column_right'] = $this->load->controller('common/column_right');
		$data['content_top'] = $this->load->controller('common/content_top');
		$data['content_bottom'] = $this->load->controller('common/content_bottom');
		$data['footer'] = $this->load->controller('common/footer');
		$data['header'] = $this->load->controller('common/header');
		
		$template = 'information/countryquote';
		$this->response->setOutput($this->load->view($template, $data));
	}

	public function autocomplete() {
		$json = array();

		if (isset($this->request->get['filter_name'])) {
			$this->load->model('information/countryquote');

			$results = $this->model_information_countryquote->getCountries($this->request->get['filter_name'], 5);

			foreach ($results as $result) {
				$json[] = array(
					'country_id' => $result['country_id'],
					'name'        => strip_tags(html_entity_decode($result['name'], ENT_QUOTES, 'UTF-8'))
				);
			}
		}
		$this->response->addHeader('Content-Type: application/json');
		$this->response->setOutput(json_encode($json));
	}
	
	public function quote() {
	}
}
