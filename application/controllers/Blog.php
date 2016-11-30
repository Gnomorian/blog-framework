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
		$this->load->view('post_view', array('title' => "new post", 'date' => "2984728947249847", 'body' => "blah blah blah gypseys, ahh gypseys, imagine being a gypsey", 'id' => "1", 'comments' => array()));
	}

	// add a new post using given $_PUT
	public function post_add() {
		if(!empty($_POST)) {
			$this->load->model('Model_MySQL', 'mysql');
			$this->mysql->post_add($_POST['title'], $_POST['body'], time());
		}

		// show add post form
		$this->load->view('post_add');
	}

	// delete the given post number and its comments
	public function post_delete($num) {
		$this->load->model("Model_MySQL", "mysql");
		$this->mysql->post_delete($num);
		header('Location: /me-profile/index.php');
		exit();
	}
	// edit the given post number
	public function post_edit($num) {

	}

	// view the given post number and its comments
	public function post_view($num) {
		$this->load->model('Model_MySQL', 'mysql');
		// get the post user wants to view
		$post = $this->mysql->post_view($num);
		if(!isset($post)) {
			echo("No Post with ID: $num");
		}
		// get the comments for the post
		$comments = $this->mysql->get_comments($num);
		if(!isset($comments)) {
			echo("No Comments for PostID: $num");
			return;
		}

		$this->load->view('post_view', array(
			'id' => $num,
			'title' => $post->title,
			'body' => $post->body,
			'date' => $post->date
			));


	}

	// delete the given comment number
	public function comment_delete($num) {
		$this->load->model("Model_MySQL", "mysql");
		$this->mysql->comment_delete($num);
		header('Location: /me-profile/index.php');
		exit();
	}

	// add a new comment using given $_PUT
	public function comment_add() {
		if(!empty($_POST)) {
			$this->load->model("Model_MySQL", "mysql");
			$this->mysql->comment_add($_POST['postid'], $_POST['name'], $_POST['email'], $_POST['website'], $_POST['content'], time());

			header("Location: /me-profile/index.php/post/{$_POST['postid']}");
			exit();
		}
		$this->load->view('comment_add');
	}

}
