<?
	class Highlights extends CI_Model{

		public function __construct(){
			parent::__construct();
		}

		/* MODEL GET */
		public function get_highlights(){
			$this->db->select('highlights_id, title, background, url, type, slug');
			$this->db->where('visible', 1);
			$this->db->order_by('highlights_id', 'desc');
			$query = $this->db->get('highlights')->result();

			return $query;
		}

	}
?>