<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class User extends CI_Controller {

	const HEAD = "head";
	const NAVBAR = "navbar";
	const FOOT = "footer";

	public function index()
	{
		$this->show_index();
	}

	public function init_pagination($per_page, $total_page, $base_uri, $type, $search) {
		$this->load->library('pagination');
		$config['page_query_string'] = TRUE;
		$config['base_url'] = base_url().'/index.php?'.$base_uri.'&type='.$type.'&search='.$search;
		$config['total_rows'] = $total_page;
		$config['per_page'] = $per_page;
		$config['full_tag_open'] = '<ul>';
		$config['full_tag_close'] = '</ul>';
		$config['first_link'] = '第一页';
		$config['first_tag_open'] = '<li>';
		$config['first_tag_close'] = '</li>';
		$config['last_link'] = '最后一页';
		$config['last_tag_open'] = '<li>';
		$config['last_tag_close'] = '</li>';
		$config['next_link'] = '下一页';
		$config['next_tag_open'] = '<li>';
		$config['next_tag_close'] = '</li>';
		$config['prev_link'] = '上一页';
		$config['prev_tag_open'] = '<li>';
		$config['prev_tag_close'] = '</li>';
		$config['cur_tag_open'] = '<li class="active"><a href="#">';
		$config['cur_tag_close'] = '</li></a>';
		$config['num_tag_open'] = '<li>';
		$config['num_tag_close'] = '</li>';
		$this->pagination->initialize($config);
	} 

	public function show_index()
	{
		$this->load->view(self::HEAD);
		$this->load->view(self::NAVBAR);
		$this->load->view('index');
		$this->load->view(self::FOOT);
	}

	public function show_journal_list($articles = array(), $links = '')
	{
		$this->load->view(self::HEAD);
		$this->load->view(self::NAVBAR);
		$data = array();
		if(sizeof($articles) > 0)
			$data['articles'] = $articles;
		$data['links'] = $links;
		$this->load->view('journal_list', $data);
		$this->load->view(self::FOOT);
	}

	public function show_journal_detail()
	{
		$id = $this->input->get('id', 0);
		if($id == 0) {
			$this->show_index();
			return;
		}
		$this->load->model('journal_model','jour');
		$jn = $this->jour->get_by_id($id);
		$this->load->view(self::HEAD);
		$this->load->view(self::NAVBAR);
		$data = array();
		$data['jn'] = $jn;
		$this->load->view('journal_detail', $data);
		$this->load->view(self::FOOT);
	}

	public function journal_search()
	{
		$type  = $this->input->get('type');
		$search_text  = $this->input->get('search');
		$offset = $this->input->get('per_page',0);
		$this->load->model('journal_model','jour');
		$per_page = 5;
		$res = $this->jour->search_full($search_text, $per_page, $offset);
		$total_page = $this->jour->search_full_count($search_text);
		$base_uri = 'c=user&m=journal_search';
		$this->init_pagination($per_page, $total_page, $base_uri, $type, $search_text);
		$links = $this->pagination->create_links();
		$this->show_journal_list($res, $links);
	}

	function get_articleInfo_byKW($keyword)
    {
        $sparql_str = 'SELECT DISTINCT ?s,?title WHERE {
               ?s ?p ?o.
               ?s <http://www.example.com/shuidao_attribute#title> ?title.
               FILTER( regex(?o, " '.$keyword.' ", "i" ) )
            } LIMIT 2';

        $format = "application/sparql-results+json";
        $url = "http://28.42.228.230:8890/sparql/?default-graph-uri=".urlencode("http://localhost:8890/nongkeyuan")."&query=".urlencode($sparql_str)."&format=".urlencode($format)."&timeout=0&debug=on";
        
        if($json = file_get_contents($url))
        {
	    //echo $json;	
            $articles = array();
            $json_data = json_decode($json);  
            foreach($json_data->results->bindings AS $item)
            {
                $uris = split("#", $item->s->value);
                $a_id = "";
                if(count($uris)>1){
                    $a_id = $uris[1];
                }
                array_push($articles, array('title'=>$item->title->value,'a_id'=>$a_id));
            }
            return array('kw'=>$keyword,'article'=>$articles);
        }
        else
        {
            return None;
        }
    }

    function main_call_article4kw($kw_arr)
    {
        $results = array();
        foreach ($kw_arr as $kw) {
            array_push($results, $this->get_articleInfo_byKW($kw));
        }

        echo json_encode($results);
    }

    function get_relate_info()
    {
    	// $kw_arr = explode(",", $_GET['keywords']);
    	$kw = array('123');
    	$this->main_call_article4kw($kw);
    	// var_dump($kw);
    }
}

/* End of file user.php */
/* Location: ./application/controllers/user.php */