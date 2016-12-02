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
		$page = 1;
		$pages = array();
		$maxpages = $this->mysql->get_max_pages();
		
		if(isset($_GET['page'])) {
			$page = $_GET['page'];
		}
		// contains data to change the next, previous buttons on the homepage
		if($page != $maxpages) {
			$pages['next'] = "?page=" . ($page + 1);
		}
		if($page != 1) {
			$pages['previous'] = "?page=" . ($page - 1);
		}
		// get list of latest posts
		$posts = $this->mysql->get_latest_posts($page);

		$this->generate_homepage($posts, $pages);

	}

	// add a new post
	public function post_add() {
		session_start();
		if(!isset($_SESSION['username'])) {
			die("You are not a registered user");
			
		}

		$this->load->model('Model_MySQL', 'mysql');

		if(!empty($_POST)) {
			//if there is an image
			if($this->upload_file() == 1) {
				$this->mysql->post_add($_POST['title'], $_POST['body'], time(), $_POST['subtitle'], $_POST['projectid'], '/image/post/' . basename($_FILES["icon"]["name"]));
			}
			else {
				$this->mysql->post_add($_POST['title'], $_POST['body'], time(), $_POST['subtitle'], $_POST['projectid']);
			}
		}
		// get list of projects
		$projects = $this->mysql->get_projects();
		// show add post form
		$this->load->view('post_add', array('projects' => $projects));
	}

	// delete the given post number and its comments
	public function post_delete($num) {
		session_start();
		if(!isset($_SESSION['username'])) {
			die("You are not a registered user");
			
		}
		else {
			$this->load->model("Model_MySQL", "mysql");
			$this->mysql->post_delete($num);
			header('Location: /');
			exit();
		}
	}
	// edit the given post number
	public function post_edit($num) {
		// CHECK IF USER IS LOGGED IN
		session_start();
		if(!isset($_SESSION['username'])) {
			die("You are not a registered user");
			
		}
		$this->load->model('Model_MySQL', 'mysql');
		// UPDATE POST
		if(!empty($_POST)) {
			$reforms = array(
				'title'=> $_POST['title'],
				'body'=> $_POST['body'],
				'subtitle'=> $_POST['subtitle'],
				'project_id'=> $this->mysql->get_project_id($_POST['projectid']),
				);
			//if there is an image
			if($this->upload_file() == 1) {
				$reforms['icon'] = '/image/post/' . basename($_FILES["icon"]["name"]);
			}
			$this->mysql->post_edit($num, $reforms);
			header("Location: /post/$num");
			exit();
		}
		
		// GENERATE PAGE
		
		// get list of projects
		$projects = $this->mysql->get_projects();
		
		$post = $this->mysql->post_view($num);
		// show add post form
		$this->load->view('post_edit', array('projects' => $projects, 'fields' => $post));
	}
	// homepage view with all posts for the given project $id=project id
	public function get_project_posts($id) {
		$this->load->model('Model_MySQL', 'mysql');
		
		$page = 1;
		$pages = array();
		$maxpages = $this->mysql->get_max_pages();
		
		if(isset($_GET['page'])) {
			$page = $_GET['page'];
		}
		// contains data to change the next, previous buttons on the homepage
		if($page != $maxpages) {
			$pages['next'] = "/project/$id?page=" . ($page + 1);
		}
		if($page != 1) {
			$pages['previous'] = "/project/$id?page=" . ($page - 1);
		}
		
		// get the post user wants to view
		$posts = $this->mysql->project_posts($id);

		$this->generate_homepage($posts, $pages);
	}

	// view the given post number and its comments
	public function post_view($num) {
		$this->load->model('Model_MySQL', 'mysql');
		// get the post user wants to view
		$post = $this->mysql->post_view($num);

		$this->generate_homepage(array($post));


	}

	// AUTHENTICATE
	public function authenticate_login() {
		if(isset($_POST['username']) && isset($_POST['password'])) {
			$this->load->model('Model_MySQL', 'mysql');
			$result = $this->mysql->user_login($_POST['username'], $_POST['password']);
			if(empty($result))  {
				$this->load->view('user_login', array('result' => "Username or Password is Incorrect"));
				return;
			}
			else {
				session_start();
				$_SESSION['username'] = $_POST['username'];
				header('Location: /');
				exit();
			}
		}
		$this->load->view('user_login');
	}
	
	public function authenticate_logout() {
		session_start();
		session_destroy();
		
		header("Location: /");
		exit();
	}
	
	public function dashboard() {
		$this->load->view('dashboard');
	}

	public function upload_file() {
		$target_dir = "/image/post/";
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
		if ($_FILES["icon"]["size"] > 2000000) {
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

	public function generate_homepage($posts, $pages=array('next' => '2')) {
		$user = "";
		session_start();
		if(isset($_SESSION['username'])) {
			$user = $_SESSION['username'];
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
		$this->load->view('homepage', array('projects' => $projects, 'posts' => $posts, 'quote' => $quote, 'user' => $user, 'pages' => $pages));
	}

}
