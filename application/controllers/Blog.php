<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Blog extends CI_Controller {

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
	public function index() {
		$this->load->view('post_view');
	}

	// add a new post using given $_PUT
	public function post_add() {
		$this->load->view('post_add');
	}

	// delete the given post number and its comments
	public function post_delete($num) {

	}
	// edit the given post number
	public function post_edit($num) {

	}

	// view the given post number and its comments
	public function post_view($num) {
		echo $num;
	}

	// delete the given comment number
	public function comment_delete($num) {

	}

	// add a new comment using given $_PUT
	public function comment_add() {

	}

}
