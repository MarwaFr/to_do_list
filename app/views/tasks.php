
<!DOCTYPE html>
<html lang="fr">
    <head>
        <meta charset="utf-8">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
        <title><?php echo $data['title'] ?></title> <!--on affiche le contenu de la variable title définit dans le controlleur correspondant-->
        <style type="text/css">
   body { background: #DCDCDC !important; } /* Adding !important forces the browser to overwrite the default style applied by Bootstrap */
</style>
        <script >
            //cette fonction nous permet de générer l'url de modification du nom d'une tache
            function update_tasks(url,id) {
              

                var task_name = window.prompt("Edit Task", id);
                if (task_name != "") {
                    window.location.href = url + "/" + task_name;
                }
                if (task_name === null) {
                    return;
    }
            }
             //cette fonction nous permet de générer l'url de modification du check d'une tache
            function check_function(id,check){
             
              if(check==0){
              window.location.href = "index.php?p=tasks/update_tasks2/"+id+"/1";
              }
              else{
                window.location.href = "index.php?p=tasks/update_tasks2/"+id+"/0";
              }
              
              
              
            }
        </script>

    </head>
    <body>
   

      
        
        

        <form action="index.php?p=tasks/add_tasks" method="post" class="form-inline" style="text-align: center;">
        <h2>Add Task</h2>
  <div class="form-group mx-sm-3 mb-2">
    <label for="input" class="sr-only"></label>
    <input class="form-control" type="text" name="task"
                     placeholder="To do ?" required>
  </div>
  <button type="submit" class="btn btn-outline-info" >Add Task</button>
</form>

        <div style="text-align: center;">
        <h2>Tasks</h2>
          </div>
        <br>
        
        <table class="table">
  <thead>
    <tr>
      <th scope="col">Status</th>
      <th scope="col">ID</th>
      <th scope="col">Task</th>     
      <th scope="col">Date</th>
      <th scope="col">Edit</th>
      <th scope="col">Delete</th>
      
    </tr>
  </thead>
  <tbody>
  <?php foreach ($data['tasks'] as  $task) { ?>
    <tr>
      <td><input type="checkbox" value="yes" <?php echo ($task[3]==1 ? 'checked' : '');?>
                               class="check-box" 
                               onchange="check_function(<?php echo $task[1].','.$task[3]?>)"
                               title="check"/></td>
      <th><?php echo $task[1] ?></th>   
      <th><?php echo $task[0] ?></th>
      <th><?php echo $task[2] ?></th>    
      <td><a href="<?php echo "javascript:update_tasks('index.php?p=tasks/update_tasks/".$task[1]."','$task[0]')"?>">
      <span style="color:green" title="Edit Task" class="glyphicon glyphicon-pencil"></span></a></td>
      <td><a href="<?php echo "index.php?p=tasks/delete_tasks/".$task[1] ?>">
      <span style="color:red" title="Delete Task" class="glyphicon glyphicon-trash"></span></a></td>
      
    </tr>
    <?php } ?>
  </tbody>
</table>

       
    </body>
</html>
