<?
	class Gallery_model extends CI_Model{

		public function __construct(){
			parent::__construct();
		}

		/* MODEL GET */
		public function get_gallery(){
			$this->db->select('album_id, title, date, slug');
			$this->db->where('visible', 1);
			$this->db->order_by('album_id', 'desc');
			$this->db->limit(6);
			$album = $this->db->get('album')->result();

			if(count($album) > 0){
				foreach ($album as $album) {
					$this->db->select('file_name');
					$this->db->where('album_id', $album->album_id);
					$this->db->where('visible', 1);
					$gallery = $this->db->get('gallery')->result();

					$query[] = array(
						'title' => $album->title,
						'date' => $album->date,
						'slug' => $album->slug,
						'file_name' => $gallery[0]->file_name
					);
				}
				return $query;
			}
		}

		public function get_gallery_by_slug($slug){
			$this->db->select('a.title, a.slug, g.gallery_id, g.file_name');
			$this->db->from('album a');
			$this->db->join('gallery g', 'g.album_id = a.album_id');
			$this->db->where('a.slug', $slug);
			$this->db->where('g.visible', 1);
			$this->db->order_by('a.album_id', 'asc');
			$query = $this->db->get()->result();

			return $query;
		}
	}
?>