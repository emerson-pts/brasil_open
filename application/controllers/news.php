<?
	if(!defined('BASEPATH')) exit('No direct script access allowed');

	class News extends CI_Controller{

		public function __construct(){
			parent::__construct();
			$this->load->library('pagination');
			$this->load->model('news_model', 'news');
		}

		public function index(){
			$scripts = null;
			$css = null;

			$config['base_url'] = site_url() . 'noticias';
			$config['total_rows'] = $this->news->record_count();
			$config['per_page'] = 6;
			$config['uri_segment'] = 2;
			$choice = $config['total_rows'] / $config['per_page'];
			$config["num_links"] = round($choice);

			$config['full_tag_open'] = '<ul class="pagination pagination-sm">';
			$config['full_tag_close'] = '</ul>';

			$config['first_link'] = 'Primeira';
			$config['first_tag_open'] = '<li class="prev page">';
			$config['first_tag_close'] = '</li>';

			$config['last_link'] = 'Última';
			$config['last_tag_open'] = '<li class="next page">';
			$config['last_tag_close'] = '</li>';

			$config['next_link'] = 'Próxima';
			$config['next_tag_open'] = '<li class="next page">';
			$config['next_tag_close'] = '</li>';

			$config['prev_link'] = 'Anterior';
			$config['prev_tag_open'] = '<li class="prev page">';
			$config['prev_tag_close'] = '</li>';

			$config['cur_tag_open'] = '<li class="active"><a href="">';
			$config['cur_tag_close'] = '</a></li>';

			$config['num_tag_open'] = '<li class="page">';
			$config['num_tag_close'] = '</li>';

			$this->pagination->initialize($config); 

			$page = ($this->uri->segment(2)) ? $this->uri->segment(2) : 0;
			$data['res'] = $this->news->get_all_news($config['per_page'], $page);
			$data['highlights'] = $this->highlights->get_highlights();

			$this->template->set('scripts', $scripts);
			$this->template->set('css', $css);
			$this->template->load('template/home', 'news/home', $data);
		}

		public function internal(){
			$scripts = null;
			$css = null;

			$slug = $this->uri->segment(2);
			$data['res'] = $this->news->get_news_by_id($slug);
			$data['highlights'] = $this->highlights->get_highlights();

			$this->template->set('scripts', $scripts);
			$this->template->set('css', $css);
			$this->template->load('template/home', 'news/internal', $data);
		}
	}
?>