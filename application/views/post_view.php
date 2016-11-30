<?php
defined('BASEPATH') OR exit('No direct script access allowed');

echo '<h2>'.$postinfo['title'].'</h2>';
echo '<em>Posted '.date('F j<\s\up>S</\s\up>, Y', $postinfo['date']).'</em><br/>';
echo nl2br($postinfo['body']).'<br/>';
echo '<a href="post_edit.php?id='.$_GET['id'].'">Edit</a> | <a href="post_delete.php?id='.$_GET['id'].'">Delete</a> | <a href="index.php">View All</a>';

echo '<hr/>';
$result = mysql_safe_query('SELECT * FROM comments WHERE post_id=%s ORDER BY date ASC', $_GET['id']);
echo '<ol id="comments">';
while($postinfo = mysql_fetch_assoc($result)) {
    echo '<li id="post-'.$postinfo['id'].'">';
    echo (empty($postinfo['website'])?'<strong>'.$postinfo['name'].'</strong>':'<a href="'.$postinfo['website'].'" target="_blank">'.$postinfo['name'].'</a>');
    echo ' (<a href="comment_delete.php?id='.$postinfo['id'].'&post='.$_GET['id'].'">Delete</a>)<br/>';
    echo '<small>'.date('j-M-Y g:ia', $postinfo['date']).'</small><br/>';
    echo nl2br($postinfo['content']);
    echo '</li>';
}
echo '</ol>';
