<?php 
class Journal_model extends CI_Model{

	const TABLE = 'journal';
	const TITLE = 'Title';
	const ATITLE = 'AlternateTitle';
	const CLASSIFIED = 'Classified';
	const ISSN = 'Issn';
	const PUBLISHER = 'Publisher';
	const SUBJECT = 'Subject';
	const COUNTRY = 'Country';
	const COUNTRYEX = 'CountryEx';
	const LANGUAGE = 'Language';
	const LANGUAGEEX = 'LanguageEx';
	const REPRESENTATION = 'Representation';

	function __construct() {
		parent::__construct();
	}


	function get_by_id($id)
	{
		$res = $this->db->where('TitleID',$id)->get(self::TABLE);
		if($res->num_rows() >= 1) { 	
			return $res->row();
		} else {
			return FALSE;
		}
	}

	function search_full($search, $limit = 10, $offset = 0)
	{
		$arr = array(self::TITLE => $search, self::ATITLE => $search, self::CLASSIFIED => $search,
			self::ISSN => $search, self::PUBLISHER => $search, self::SUBJECT => $search, 
			self::COUNTRY => $search, self::COUNTRYEX => $search, self::LANGUAGE => $search,
			self::LANGUAGEEX => $search, self::REPRESENTATION => $search);
		$res = $this->db->or_like($arr)->get(self::TABLE, $limit, $offset);
		// echo $this->db->last_query();
		if($res->num_rows() >= 1) { 	
			return $res->result();
		} else {
			return FALSE;
		}
	}

	function search_full_count($search)
	{
		$arr = array(self::TITLE => $search, self::ATITLE => $search, self::CLASSIFIED => $search,
			self::ISSN => $search, self::PUBLISHER => $search, self::SUBJECT => $search, 
			self::COUNTRY => $search, self::COUNTRYEX => $search, self::LANGUAGE => $search,
			self::LANGUAGEEX => $search, self::REPRESENTATION => $search);
		$res = $this->db->or_like($arr)->get(self::TABLE);
		// echo $this->db->last_query();
		return $res->num_rows();
	}

}

?>