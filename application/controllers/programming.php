<?
	if(!defined('BASEPATH')) exit('No direct script access allowed');

	class Programming extends CI_Controller{

		public function __construct(){
			parent::__construct();
			$this->load->model('programming_model', 'programming');
		}

		public function index(){
			$scripts = null;
			$css = null;

			$data['highlights'] = $this->highlights->get_highlights();
			$data['res'] = $this->programming->get_programming();

			$this->template->set('scripts', $scripts);
			$this->template->set('css', $css);
			$this->template->load('template/home', 'programming/home', $data);
		}
	}
?>