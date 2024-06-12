<?php
require_once("../../../private/initialize.php");
$page_title = "Hello";

$id = $_GET["id"] ?? "1";

$page = find_page_by_id($id);

?>


<?php include(SHARED_PATH . "/staff/header.php"); ?>

<main id="content">
    <a class="back-link" href="<?php echo url_for('/staff/pages/index.php'); ?>">&laquo; Back to List</a>
    <aside id="main-menu"></aside>
    <h1>page: <?php echo h($page['menu_name']); ?></h1>

    <div class="attributes">
        <dl>
            <dt>Menu Name</dt>
            <dd><?php echo h($page['menu_name']); ?></dd>
        </dl>
        <dl>
            <dt>Position</dt>
            <dd><?php echo h($page['position']); ?></dd>
        </dl>
        <dl>
            <dt>Visible</dt>
            <dd><?php echo $page['visible'] == '1' ? 'true' : 'false'; ?></dd>
        </dl>
    </div>

</main>

<?php include(SHARED_PATH . "/staff/footer.php"); ?>