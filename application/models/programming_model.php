<?
	class Programming_model extends CI_Model{

		public function __construct(){
			parent::__construct();
		}

		/* MODEL GET */
		public function get_programming(){
			$this->db->select('title, file_name, slug');
			$this->db->where('visible', 1);
			$this->db->order_by('programming_id', 'desc');
			$this->db->limit(3);
			$query = $this->db->get('programming')->result();

			return $query;
		}

		public function record_count(){
			$this->db->where('visible', 1);
			$query = $this->db->count_all_results('programming');
			return $query;
		}

		public function get_programming_by_id($slug){
			$this->db->select('title, type, file_name, slug');
			$this->db->where('slug', $slug);
			$query = $this->db->get('programming')->row();

			return $query;
		}

		public function get_all_programming($limit,$start){
			$this->db->select('title, type, file_name, slug');
			$this->db->where('visible', 1);
			$this->db->order_by('programming_id', 'desc');
			$this->db->limit($limit,$start);
			$query = $this->db->get('programming')->result();

			return $query;
		}
	}
?>