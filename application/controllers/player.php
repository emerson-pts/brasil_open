<?
	if(!defined('BASEPATH')) exit('No direct script access allowed');

	class Player extends CI_Controller{

		public function __construct(){
			parent::__construct();
		}

		public function index(){
			$scripts = array('section/dashboard');
			$css = null;

			$data['highlights'] = $this->highlights->get_highlights();

			$this->template->set('scripts', $scripts);
			$this->template->set('css', $css);
			$this->template->load('template/home', 'player/home', $data);
		}
	}
?>