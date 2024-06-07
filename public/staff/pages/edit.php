<?php 

require_once("../../../private/initialize.php");

if(!isset($_GET["id"])) {
    redirect_to(url_for("/staff/pages/index.php"));
}

$id = $_GET["id"];
// $data = $subjects[$id - 1];

$page_name = "";
$position = "";
$visible = "";

if(is_post_request()) {
    $page_name = $_POST["page_name"] ?? "";
    $position = $_POST["position"] ?? "";
    $visible = $_POST["visible"] ?? "";
        
    echo "Form param <br/>";
    echo "Page name: {$page_name} <br/>";
    echo "position: {$position} <br/>";
    echo "visible: {$visible} <br/>";
}     
?>

<?php $page_title = 'Edit page'; ?>
<?php include(SHARED_PATH . '/staff/header.php'); ?>

<div id="content">

  <a class="back-link" href="<?php echo url_for('/staff/pages/index.php'); ?>">&laquo; Back to List</a>

  <div class="subject edit">
    <h1>Edit Subject</h1>

    <form action="<?php echo url_for("/staff/pages/edit.php?id=" . h(u($id)));?>" method="POST">
      <dl>
        <dt>Menu Name</dt>
        <dd><input type="text" name="page_name" value="<?php echo $page_name ?>" /></dd>
      </dl>
      <dl>
        <dt>Position</dt>
        <dd>
          <select name="position">
            <option value="1">1</option>
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
      <div id="operations">
        <input type="submit" value="Edit page" />
      </div>
    </form>

  </div>

</div>

<?php include(SHARED_PATH . '/staff/footer.php'); ?>
