<?php
require_once("../../../private/initialize.php");
require_login();
$page_title = "Hello";

$id = $_GET["id"] ?? "1";

$page = find_page_by_id($id);
$subject = find_subject_by_id($page['subject_id']);
?>



<?php include(SHARED_PATH . "/staff/header.php"); ?>

<main id="content">
    <a class="back-link" href="<?php echo url_for('/staff/subjects/show.php?id='.h(u($subject["id"]))); ?>">&laquo; Back to subject</a>
    <aside id="main-menu"></aside>
    <h1>page: <?php echo h($page['menu_name']); ?></h1>

    <div class="actions">
        <a href="<?php echo url_for("/index.php?id=" . h(u($page["id"])) . "&preview=true");?>" class="action" target="_blank">Preview</a>
    </div>

    <div class="attributes">
        <dl>
            <dt>Subject</dt>
            <dd><?php echo h($subject['menu_name']); ?></dd>
        </dl>
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
        <dl>
            <dt>Content</dt>
            <dd><?php echo h($page['content']); ?></dd>
        </dl>
    </div>

</main>

<?php include(SHARED_PATH . "/staff/footer.php"); ?>