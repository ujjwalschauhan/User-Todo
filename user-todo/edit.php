<?php include_once('db.php');
      $id = $_POST["taskId"]; 
      $errors = [];

if (isset($_POST['edit'])) {
  $sql = "select * from tasks where id=" . $id;
  $fetchTasks = mysqli_query($conn, $sql);
  $taskArray = mysqli_fetch_array($fetchTasks);
}

if (isset($_POST['update'])) {
  if (empty($_POST['task'])) {
    $errors['task'] = "Title can't be empty!";
  }

  if (empty($_POST['description'])) {
    $errors['description'] = "Description can't be empty!";
  }

  if (empty($_POST['date'])) {
    $errors['date'] = "Due Date can't be empty!";
  }

  if (!empty($_POST['priority'])) {
    $priority = $_POST['priority'];
  }
  if (empty($errors)) {
    $task = $_POST['task'];
    $description = $_POST['description'];
    $date = $_POST['date'];
    $priority = $_POST['priority'];
    $sql = "UPDATE tasks set task = '$task', description = '$description', due_date = '$date', priority = '$priority' where id =".$id;
    mysqli_query($conn, $sql);
    header('location: index.php?updated=true');
  }
}

include_once('header.php'); ?>

<body>
  <div class="container container-sm border edit-container"><br/>
    <form method="post" action="">
      <input type="hidden" name="taskId" value=<?php echo ('"' . $id . '"') ?>>
      <?php $id = $_POST["taskId"]; ?>
      <div class="form-group text-center">
        <h3>Edit Task</h3>
      </div>
      <div class="form-group">
        <label for="task">Enter Title</label>
        <input type="text" class="form-control" name="task" id="task" value="<?php echo isset($_POST['task']) ?  $_POST['task'] : $taskArray['task']; ?>">
        <span><?php echo isset($errors['task']) ? $errors['task'] : '' ?></span>
      </div>
      <div class="form-group">
        <label for="description">Enter Description</label>
        <input type="text" class="form-control" id="description" name="description" value="<?php echo isset($_POST['description']) ?  $_POST['description'] : $taskArray['description']; ?>">
        <span><?php echo isset($errors['description']) ? $errors['description'] : '' ?></span>
      </div>
      <div class="form-group">
        <label for="date">Enter Due Date</label>
        <input type="date" class="form-control" id="date" name="date" min="<?php echo date("Y-m-d"); ?>" value="<?php echo  isset($_POST['date']) ?  $_POST['date'] : $taskArray['due_date']; ?>">
        <span><?php echo isset($errors['date']) ? $errors['date'] : '' ?></span>
      </div>
      <?php $priorities = array('High' => "High", 'Moderate' => "Moderate", 'Low' => "Low"); ?>
      <div class="form-group">
        <label for="priority">Enter Priority:</label>
        <select class="form-control" name="priority" id="priority">
          <?php foreach ($priorities as $index => $value) { ?>
            <option value="<?php echo $index ?>" <?php echo ($index === $taskArray['priority']) ? 'selected' : '' ?>><?php echo $value ?></option>
          <?php } ?>
        </select>
      </div>
      <div class="text-center">
        <button type="submit" name="update" id="update" class="btn btn-success btn-lg">Update Task</button>
      </div>
    </form>
  </div>
</body>
<?php include_once('footer.php'); ?>
