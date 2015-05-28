<?
	if(!defined('BASEPATH')) exit('No direct script access allowed');

	class Gallery extends CI_Controller{

		public function __construct(){
			parent::__construct();
			$this->load->model('gallery_model', 'gallery');
		}

		public function index(){
			$scripts = null;
			$css = null;

			$data['res'] = $this->gallery->get_gallery();
			$data['highlights'] = $this->highlights->get_highlights();

			$this->template->set('scripts', $scripts);
			$this->template->set('css', $css);
			$this->template->load('template/home', 'gallery/home', $data);
		}

		public function internal(){
			$scripts = null;
			$css = null;

			$slug = $this->uri->segment(2);
			$data['res'] = $this->gallery->get_gallery_by_slug($slug);
			$data['modal'] = $this->gallery->get_gallery_by_slug($slug);
			$data['highlights'] = $this->highlights->get_highlights();

			$this->template->set('scripts', $scripts);
			$this->template->set('css', $css);
			$this->template->load('template/home', 'gallery/internal', $data);
		}
	}
?>