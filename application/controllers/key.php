<?
	if(!defined('BASEPATH')) exit('No direct script access allowed');

	class Key extends CI_Controller{

		public function __construct(){
			parent::__construct();
			$this->load->model('key_model', 'key');
		}

		public function index(){
			$scripts = null;
			$css = null;

			$data['highlights'] = $this->highlights->get_highlights();
			$data['res'] = $this->key->get_key();

			$this->template->set('scripts', $scripts);
			$this->template->set('css', $css);
			$this->template->load('template/home', 'key/home', $data);
		}
	}
?>