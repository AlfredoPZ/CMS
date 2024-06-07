<?php
    require_once("../../../private/initialize.php");
    $page_title = "Staff Subjects";
  
?>

<?php include(SHARED_PATH . "/staff/header.php"); ?>

<main id="content">
<div class="subjects listing">
    <h1>Subjects</h1>

    <div class="actions">
      <a class="action" href="">Create New Subject</a>
    </div>

  	<table class="list">
  	  <tr>
        <th>ID</th>
        <th>Position</th>
        <th>Visible</th>
  	    <th>Name</th>
  	    <th>&nbsp;</th>
  	    <th>&nbsp;</th>
        <th>&nbsp;</th>
  	  </tr>

      <?php foreach($subjects as $subject) { ?>
        <tr>
          <td><?php echo $subject['id']; ?></td>
          <td><?php echo $subject['position']; ?></td>
          <td><?php echo $subject['visible'] == 1 ? 'true' : 'false'; ?></td>
    	    <td><?php echo $subject['menu_name']; ?></td>
          <td><a class="action" href="<?php echo url_for("/staff/subjects/show.php?id=" . h(u($subject["id"])));?>">View</a></td>
          <td><a class="action" href="">Edit</a></td>
          <td><a class="action" href="">Delete</a></td>
    	  </tr>
      <?php } ?>
  	</table>

  </div>
</main>

<?php include(SHARED_PATH . "/staff/footer.php"); ?>