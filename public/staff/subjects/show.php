<?php
require_once("../../../private/initialize.php");
require_login();
$page_title = "Hello";

$id = $_GET["id"] ?? "1";

$subject = find_subject_by_id($id);
$pages_set = find_pages_by_subject_id($subject["id"]);

?>


<?php include(SHARED_PATH . "/staff/header.php"); ?>

<main id="content">
    <a class="back-link" href="<?php echo url_for('/staff/subjects/index.php'); ?>">&laquo; Back to List</a>
    <aside id="main-menu"></aside>
    <h1>Subject: <?php echo h($subject['menu_name']); ?></h1>

    <div class="attributes">
        <dl>
            <dt>Menu Name</dt>
            <dd><?php echo h($subject['menu_name']); ?></dd>
        </dl>
        <dl>
            <dt>Position</dt>
            <dd><?php echo h($subject['position']); ?></dd>
        </dl>
        <dl>
            <dt>Visible</dt>
            <dd><?php echo $subject['visible'] == '1' ? 'true' : 'false'; ?></dd>
        </dl>
    </div>

    <hr>

    <div class="pages listing">

        <h2>Pages</h2>
    
        <div id="actions"><a href="<?php echo url_for("/staff/pages/new.php");?>">Create new page</a></div>
    
        <table class="list">
            <tr>
                <th>ID</th>
                <th>Position</th>
                <th>Name</th>
                <th>Visible</th>
                <th>&nbsp;</th>
                <th>&nbsp;</th>
                <th>&nbsp;</th>
            </tr>
    
            <?php while($page = mysqli_fetch_assoc($pages_set)) { 
                $subject = find_subject_by_id(h($page["subject_id"]));
            ?>
                <tr>
                    <td><?php echo h($page["id"]); ?></td>
                    <td><?php echo h($page["position"]); ?></td>
                    <td><?php echo h($page["menu_name"]); ?></td>
                    <td><?php echo $page["visible"] == 1 ? "true" : "false"; ?></td>
                    <td><a class="action" href="<?php echo url_for("/staff/pages/show.php?id=" . h(u($page["id"])));?>">View</a></td>
                    <td><a class="action" href="<?php echo url_for("/staff/pages/edit.php?id=" . h(u($page["id"])));?>">Edit</a></td>
                    <td><a class="action" href="<?php echo url_for("/staff/pages/delete.php?id=" . h(u($page["id"])));?>">Delete</a></td>
                </tr>
            <?php } ?>
        </table>
        <?php mysqli_free_result($pages_set) ?>
    </div>

</main>

<?php include(SHARED_PATH . "/staff/footer.php"); ?>