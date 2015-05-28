<?
	if(!defined('BASEPATH')) exit('No direct script access allowed');

	class Json extends CI_Controller{

		public function __construct(){
			parent::__construct();
		}

		public function highlights(){
			$data['res'] = $this->site->get_nhighlights();
			$this->load->view('json/highlights', $data);
		}
	}
?>