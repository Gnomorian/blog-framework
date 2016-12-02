<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Model_MySQL extends CI_Model {
  private $conn;

  public function __construct() {
    // Call the CI_Model constructor
    parent::__construct();
  }
    // add a blog post
  public function post_add($title, $body, $date, $subtitle, $project, $icon="/image/post/default.jpg") {
    $data = array(
      'title' => $title,
      'body' => $body,
      'date' => $date,
      'subtitle' => $subtitle,
      'icon' => $icon,
      'project_id' => $this->get_project_id($project)
    );
    $this->db->insert('posts', $data);
  }
  // get the id of the project from its display name
  public function get_project_id($project) {
    $this->db->where('title', $project);
    $this->db->limit(1);
    $query = $this->db->get('projects');
    $result = $query->result();
    return (int)$result[0]->id;
  }
    // delete a blog post
  public function post_delete($id) {
    $this->db->delete('posts', array('id' => $id));
  }
    // $reforms is array('title', 'body', 'date'),
    // if thoes fields exist in the
    // array, they will replace the existing field/
  public function post_edit($id, $reforms) {
    $this->db->where('id', $id);
    $this->db->update('posts', $reforms);
  }
  // get a post to view
  public function post_view($id) {
    $query = $this->db->get_where('posts', array('id' => $id), 1);
    $result = $query->result();
    if(!empty($result)) {
      return $result[0];
    }
    return;
  }

  public function get_latest_posts($page=1) {

    $this->db->order_by('date', 'DESC');
    $query = $this->db->get('posts', 3, (($page-1) * 3 + 1));
    $result = $query->result();
    if(!empty($result)) {
      return $result;
    }
  }
  // gets the amount of pages needed to view all posts
  public function get_max_pages() {
    return (ceil($this->db->count_all_results('posts') / 3));
  }
  
  // get all comments for this post
  public function get_comments($postid) {
    /*$query = $this->db->get_where('comments', array('post_id' => $postid));
    $query->order_by("date", "DESC");*/
    //$result = $query->result();
    if(!empty($result)) {
      return $result;
    }
    return;
  }
    // add a comment
  public function comment_add($postid, $name, $email, $website, $content, $date) {
    $data = array(
      'post_id' => $postid,
      'name' => $name,
      'email' => $email,
      'website' => $website,
      'content' => $content,
      'date' => $postid,
    );
    $this->db->insert('comments', $data);
  }
    // remove a comment
  public function comment_delete($id) {
    $this->db->delete('comments', array('id' => $id));
  }
    // get a list of all projects and info about them.
  public function get_projects() {
    $query = $this->db->get('projects');
    return $query->result();
  }

  public function project_posts($id) {
    $query = $this->db->get_where('posts', array('project_id' => $id));
    $result = $query->result();
    if(!empty($result)) {
      return $result;
    }
    return;
  }

  // QUOTES
  public function get_random_quote() {
    $query = $this->db->query("SELECT * FROM quotes ORDER BY RAND() LIMIT 1");
    $result = $query->result();
    if(!empty($result)) {
      return $result;
    }
    return;
  }

  // AUTHENTICATION
  public function user_login($username, $password) {
    $this->db->where('name', $username);
    $this->db->where('password', md5($password));
    $this->db->select(array('id', 'name', 'email'));
    $query = $this->db->get('users', 1);
    $result = $query->result();
    if(isset($result)) {
      return $result;
    }
  }
}
