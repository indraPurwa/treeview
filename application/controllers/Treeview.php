<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Treeview extends CI_Controller {
	public function showTreeview()
	{
		$this->load->helper(array('url'));

        //load Treeview_m model
        $this->load->model('treeview_m', '', TRUE);
        
        //load view
		$this->load->view('showTreeview');
	}
}
