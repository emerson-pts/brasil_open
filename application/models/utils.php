<?
	if(!defined('BASEPATH')) exit('No direct script access allowd');

	class Utils extends CI_Model{

		public function __construct(){
			parent::__construct();
		}

		// CRIA SLUG
		public function slug($name){
			return strtolower(url_title(convert_accented_characters($name)));
		}

		// CRIA PREFIXO PARA SLUG
		public function prefix(){
			return random_string('numeric', 6);
		}

		// RETORNA PREFIXO PARA SLUG
		public function return_prefix($prefix){
			$id = explode('-', $prefix);
            return $id[0];
		}

		// ADICIONA O SULFIXO '_THUMBNAIL' AO NOME DA PHOTO
		public function thumbnail($photo){
            $thumbnail = explode('.', $photo);
            $extension = (count($thumbnail)) - 1;
            $extension = '.'.$thumbnail[$extension];
            $thumbnail = $thumbnail[0].'_thumbnail'.$extension;

            return $thumbnail;
		}

		// ADICIONA O SULFIXO '_FULL' AO NOME DA PHOTO
		public function full($photo){
            $thumbnail = explode('.', $photo);
            $extension = (count($thumbnail)) - 1;
            $extension = '.'.$thumbnail[$extension];
            $thumbnail = $thumbnail[0].'_full'.$extension;

            return $thumbnail;
		}

		// CONVERTE A DATA PARA O PADRÃO BRASILEIRO
		public function date($date){
			return date('d/m/Y',strtotime($date));
		}

		// CONVERTE A DATA PARA O PADRÃO BRASILEIRO COM MÊS ESCRITO
		public function full_date($date){
			setlocale(LC_TIME, 'pt_BR.utf-8');
      		$full =  strftime('%d de %B de %G', strtotime($date));

			return $full;
		}

		// REMOVE O HORÁRIO DO TIMESTAMP
		public function time($time){
			return date('H:i',strtotime($time));
		}

		// RECUPERA O ANO A PARTIR DA DATA
		public function get_year($date){
			return date('Y', strtotime($date));
		}

		// CRIA UMA SESSION COM OS VALORES DA BUSCA E NOME DO CAMPO
		public function search($name, $column){
			if($column){
				$this->session->set_userdata($name, $column);
				return $column;

			} elseif($this->session->userdata($name)){
				$column = $this->session->userdata($name);
				return $column;
				
			} else {
				$column = '';
				return $column;
			}
		}

		// REMOVE A SESSION COM OS VALORES DA BUSCA
		public function remove_search($name){
			$this->session->unset_userdata($name);
		}
	}
?>