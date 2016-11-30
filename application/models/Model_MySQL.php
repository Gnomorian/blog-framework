<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Model_MySQL extends CI_Model {
  private $conn;

  public function __construct() {
    // Call the CI_Model constructor
    parent::__construct();
  }
    // add a blog post
  public function post_add($title, $body, $date) {
    $data = array(
      'title' => $title,
      'body' => $body,
      'date' => $date
    );
    $this->db->insert('posts', $data);
  }
    // delete a blog post
  public function post_delete($id) {
    $this->db->delete('posts', array('id' => $id));
  }
    // $reforms is array('title', 'body', 'date'),
    // if thoes fields exist in the
    // array, they will replace the existing field/
  public function post_edit($id, $reforms) {}
  // get a post to view
  public function post_view($id) {
    $query = $this->db->get_where('posts', array('id' => $id), 1);
    $result = $query->result();
    if(!empty($result)) {
      return $result[0];
    }
    return;
  }
  // get all comments for this post
  public function get_comments($postid) {
    $query = $this->db->get_where('comments', array('post_id' => $postid));
    $result = $query->result();
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
    $this->db->insert('comments', $data)
  }
    // remove a comment
  public function comment_delete($id) {
    $this->db->delete('comments', array('id' => $id));
  }
}
