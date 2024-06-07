<?php 

require_once("../../../private/initialize.php");
$page_title = 'Create page';

// if(!isset($_GET["id"])) {
//     redirect_to(url_for("/staff/pages/index.php"));
// }

// $id = $_GET["id"];
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

<?php include(SHARED_PATH . '/staff/header.php'); ?>

<div id="content">

  <a class="back-link" href="<?php echo url_for('/staff/pages/index.php'); ?>">&laquo; Back to List</a>

  <div class="subject new">
    <h1>Create Subject</h1>

    <form action="<?php echo url_for("/staff/pages/new.php"); ?>" method="post">
      <dl>
        <dt>Menu Name</dt>
        <dd><input type="text" name="page_name" value="<?php echo h($page_name) ?>" /></dd>
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
          <input type="checkbox" name="visible" value="1" <?php if($visible == 1) {echo " checked";}  ?> />
        </dd>
      </dl>
      <div id="operations">
        <input type="submit" value="Create page" />
      </div>
    </form>

  </div>

</div>

<?php include(SHARED_PATH . '/staff/footer.php'); ?>
