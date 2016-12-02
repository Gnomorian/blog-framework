<form method="post" enctype="multipart/form-data">
    <table>
        <th colspan='2'>Edit Post <?php echo('#' . $fields->id . ' ' .  $fields->title); ?></th>
        <tr>
            <td><label for="title">Title</label></td>
            <td><input name="title" id="title" value = "<?php echo($fields->title); ?>" /></td>
        </tr>
        <tr>
            <td><label for="subtitle">Subtitle</label></td>
            <td><input name="subtitle" id="subtitle"  value = "<?php echo($fields->subtitle); ?>"/></td>
        </tr>
        <tr>
            <td><label for="body">Body</label></td>
            <td><textarea name="body" id="body"><?php echo($fields->body);?></textarea></td>
        </tr>
        <tr>
            <td><label for="icon">Icon</label></td>
            <td><input name="icon" id="icon" type="file" accpet="image/*"></input></td>
        </tr>
        <tr>
            <td><label for="projectid">Project</label></td>
            <td><select name="projectid" id="projectid">
              <?php
              if(isset($projects)) {
                foreach($projects as $project) {
                    if($project->id == $fields->project_id) {
                        echo("<option selected>$project->title</option>");
                    }
                    else {
                        echo("<option>$project->title</option>");
                    }
                }
              }
              ?>
            </select></td>
        </tr>
        <tr>
            <td></td>
            <td><input type="submit" value="Edit" /></td>
        </tr>
    </table>
</form>
