<?
	class News_model extends CI_Model{

		public function __construct(){
			parent::__construct();
		}

		/* MODEL GET */
		public function get_news(){
			$this->db->select('title, call, date, file_name, slug');
			$this->db->where('visible', 1);
			$this->db->order_by('news_id', 'desc');
			$this->db->limit(3);
			$query = $this->db->get('news')->result();

			return $query;
		}

		public function record_count(){
			$this->db->where('visible', 1);
			$query = $this->db->count_all_results('news');
			return $query;
		}

		public function get_news_by_id($slug){
			$this->db->select('title, subtitle, date, description, file_name, slug');
			$this->db->where('slug', $slug);
			$query = $this->db->get('news')->row();

			return $query;
		}

		public function get_all_news($limit,$start){
			$this->db->select('title, call, date, file_name, slug');
			$this->db->where('visible', 1);
			$this->db->order_by('news_id', 'desc');
			$this->db->limit($limit,$start);
			$query = $this->db->get('news')->result();

			return $query;
		}
	}
?>