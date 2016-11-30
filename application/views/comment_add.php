<form method="post">
    <table>
      <tr style="display:none;">
          <td><input name="postid" id="postid"><?php echo($postid);?></input></td>
      </tr>
        <tr>
            <td><label for="name">Name</label></td>
            <td><input name="name" id="name" /></td>
        </tr>
        <tr>
            <td><label for="email">Email</label></td>
            <td><input name="email" id="email"></td>
        </tr>
        <tr>
            <td><label for="website">Website</label></td>
            <td><input name="website" id="website" /></td>
        </tr>
        <tr>
            <td><label for="content">Comment</label></td>
            <td><textarea name="content" id="content" /></textarea></td>
        </tr>
        <tr>
            <td></td>
            <td><input type="submit" value="Post" /></td>
        </tr>
    </table>
</form>
