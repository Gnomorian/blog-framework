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
		$this->load->model('Model_MySQL', 'mysql');
		// get list of latest posts
		$posts = $this->mysql->get_latest_posts();
		if(!isset($posts)) {
			die("No Posts!");
		}

		// get list of projects
		$projects = $this->mysql->get_projects();
		if(!isset($projects)) {
			die("No Projects!");
		}

		// get a random quote
		$quote = $this->mysql->get_random_quote();
		if(!isset($quote)) {
			die("No Quote!");
		}
		$this->load->view('homepage', array('projects' => $projects, 'posts' => $posts, 'quote' => $quote));
	}

	// add a new post
	public function post_add() {

		$this->load->model('Model_MySQL', 'mysql');

		if(!empty($_POST)) {
			//if there is an image
			if($this->upload_file() == 1) {
				$this->mysql->post_add($_POST['title'], $_POST['body'], time(), $_POST['subtitle'], 'image/post/' . basename($_FILES["icon"]["name"]));
			}
			else {
				$this->mysql->post_add($_POST['title'], $_POST['body'], time(), $_POST['subtitle']);
			}
		}
		// get list of projects
		$projects = $this->mysql->get_projects();
		// show add post form
		$this->load->view('post_add', array('projects' => $projects));
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
		if(!empty($_GET)) {
			$this->load->model("Model_MySQL", "mysql");
			$this->mysql->comment_add($_POST['postid'], $_POST['name'], $_POST['email'], $_POST['website'], $_POST['content'], time());

			header("Location: /me-profile/index.php/post/{$_POST['postid']}");
			exit();
		}
		$this->load->view('comment_add');
	}

	public function upload_file() {
		$target_dir = "image/post/";
		$target_file = $target_dir . basename($_FILES["icon"]["name"]);
		$uploadOk = 1;
		$imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);
		// Check if image file is a actual image or fake image
		if(isset($_POST["submit"])) {
		    $check = getimagesize($_FILES["icon"]["tmp_name"]);
		    if($check !== false) {
		        $uploadOk = 1;
		    } else {
		        echo "File is not an image.";
		        $uploadOk = 0;
		    }
		}
		// Check if file already exists
		if (file_exists($target_file)) {
		    echo "Sorry, file already exists.";
		    $uploadOk = 0;
		}
		// Check file size
		if ($_FILES["icon"]["size"] > 500000) {
		    echo "Sorry, your file is too large.";
		    $uploadOk = 0;
		}
		// Allow certain file formats
		if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
		&& $imageFileType != "gif" ) {
		    echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
		    $uploadOk = 0;
		}
		// Check if $uploadOk is set to 0 by an error
		if ($uploadOk == 0) {
		    echo "Sorry, your file was not uploaded.";
		// if everything is ok, try to upload file
		} else {
		    if (move_uploaded_file($_FILES["icon"]["tmp_name"], $target_file)) {
		        return $uploadOk;
		    } else {
		        return $uploadOk;
		    }
		}
	}

}
