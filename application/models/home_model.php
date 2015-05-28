<?
	class Home_model extends CI_Model{

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
	}
?>