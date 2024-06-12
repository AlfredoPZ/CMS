<?php
require_once("../../../private/initialize.php");

$page_set = find_all_pages();
$page_count = mysqli_num_rows($page_set) + 1;
mysqli_free_result($page_set);
$page = [];
$page["position"] = $page_count;

$subject_set = find_all_subjects();

if (is_post_request()) {
  $page = [];
  $page["subject_id"] = $_POST["subject_id"] ?? "";
  $page["menu_name"] = $_POST["menu_name"] ?? "";
  $page["position"] = $_POST["position"] ?? "";
  $page["visible"] = $_POST["visible"] ?? "";
  $page["content"] = $_POST["content"] ?? "";

  // var_dump($page);
  $result = insert_page($page);
  $new_id = mysqli_insert_id($db);
  redirect_to(url_for("staff/subjects/show.php?id=". $new_id));
}


?>

<?php $page_title = 'Create Page'; ?>
<?php include(SHARED_PATH . '/staff/header.php'); ?>

<div id="content">

  <a class="back-link" href="<?php echo url_for('/staff/pages/index.php'); ?>">&laquo; Back to List</a>

  <div class="page new">
    <h1>Create Page</h1>

    <form action="<?php echo url_for("/staff/pages/new.php"); ?>" method="post">
      <dl>
        <dt>Subject</dt>
        <dd>
          <select name="subject_id">
            <?php  while($subject = mysqli_fetch_assoc($subject_set)){ ?>
              <option value="<?php echo $subject["id"] ?> "> <?php echo $subject["menu_name"]; ?> </option>
            <?php } ?>
          
          </select>
        </dd>
      </dl>
      <dl>
        <dt>Menu Name</dt>
        <dd><input type="text" name="menu_name" value="" /></dd>
      </dl>
      <dl>
        <dt>Position</dt>
        <dd>
          <select name="position">
            <?php
            for ($i = 1; $i <= $page_count; $i++) {
              echo "<option value=\"{$i}\"";
              if ($page["position"] == $i) {
                echo " selected";
              }
              echo ">{$i}</option>";
            }
            ?>
          </select>
        </dd>
      </dl>
      <dl>
        <dt>Visible</dt>
        <dd>
          <input type="hidden" name="visible" value="0" />
          <input type="checkbox" name="visible" value="1" />
        </dd>
      </dl>
      <dl>
        <dt>Content</dt>
        <dd><textarea type="text" name="content" value=""></textarea></dd>
      </dl>
      <div id="operations">
        <input type="submit" value="Create Page" />
      </div>
    </form>

  </div>

</div>

<?php include(SHARED_PATH . '/staff/footer.php'); ?>