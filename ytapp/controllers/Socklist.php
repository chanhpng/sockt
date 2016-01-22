<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Socklist extends CI_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see https://codeigniter.com/user_guide/general/urls.html
	 */
	public function index()
	{
		$this->load->view('welcome_message');
	}
	public function getsock()
	{
		$this->load->model('Socklist_model');
		$type = ''.$this->input->get('type', TRUE);
		$type = preg_replace("/[^0-9]/", '', $type);
		$limit = ''.$this->input->get('limit', TRUE);
		$limit = preg_replace("/[^0-9]/", '', $limit);
		$offset = ''.$this->input->get('offset', TRUE);
		$offset = preg_replace("/[^0-9]/", '', $offset);
		echo json_encode($this->Socklist_model->getSockList($type,$limit,$offset));
	}
	public function setsock()
	{
		if(isset($_POST['socktype']))
		{
			$type = ''.$this->input->post('socktype', TRUE);
			$type = preg_replace("/[^0-9]/", '', $type);
			$list = trim(''.$this->input->post('socklist', TRUE));
			$arrSock = explode("\n", $list);
			$arrSock = array_filter($arrSock, 'trim');
			if($type!='' && count($arrSock)>0)
			{
				$this->load->model('Socklist_model');
				$data['rcode'] = 'success';
				$data['response'] = $this->Socklist_model->saveSockList($type,$arrSock);
				$this->load->view('insert_sock',$data);
			}
			else
			{
				$data['rcode'] = 'error';
				$this->load->view('insert_sock',$data);
			}
		}
		else
		{
			$data['rcode'] = '';
			$this->load->view('insert_sock',$data);
		}
	}
	public function savesock()
	{
		$type = ''.$this->input->post('socktype', TRUE);
		$type = preg_replace("/[^0-9]/", '', $type);
		$list = trim(''.$this->input->post('socklist', TRUE));
		$arrSock = explode("\n", $list);
		$arrSock = array_filter($arrSock, 'trim');
		$this->load->model('Socklist_model');
		echo $this->Socklist_model->saveSockList($type,$arrSock);
	}
}
