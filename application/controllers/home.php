<?
	if(!defined('BASEPATH')) exit('No direct script access allowed');

	class Home extends CI_Controller{

		public function __construct(){
			parent::__construct();
			$this->load->model('home_model', 'home');
		}

		public function index(){
			$scripts = null;
			$css = null;

			$data['news'] = $this->home->get_news();
			$data['highlights'] = $this->highlights->get_highlights();

			$this->template->set('scripts', $scripts);
			$this->template->set('css', $css);
			$this->template->load('template/home', 'home/home', $data);
		}
	}
?>