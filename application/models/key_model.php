<?
	class Key_model extends CI_Model{

		public function __construct(){
			parent::__construct();
		}

		/* MODEL GET */
		public function get_key(){
			$this->db->select('title, type, file_name, slug');
			$this->db->where('visible', 1);
			$this->db->order_by('key_id', 'desc');
			$this->db->limit(3);
			$query = $this->db->get('key')->result();

			return $query;
		}

		public function record_count(){
			$this->db->where('visible', 1);
			$query = $this->db->count_all_results('key');
			return $query;
		}

		public function get_key_by_id($slug){
			$this->db->select('title, type, file_name, slug');
			$this->db->where('slug', $slug);
			$query = $this->db->get('key')->row();

			return $query;
		}

		public function get_all_key($limit,$start){
			$this->db->select('title, type, file_name, slug');
			$this->db->where('visible', 1);
			$this->db->order_by('key_id', 'desc');
			$this->db->limit($limit,$start);
			$query = $this->db->get('key')->result();

			return $query;
		}
	}
?>