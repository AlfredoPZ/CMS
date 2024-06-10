
<?php
    require_once("../../../private/initialize.php");
    $page_title = "Pages";

    $pages_set = find_all_pages();
?>  


<?php include(SHARED_PATH . "/staff/header.php"); ?>

<main id="content">
    <h1>Pages</h1>

    <div id="actions"><a href="<?php echo url_for("/staff/pages/new.php");?>">Create new page</a></div>

    <table class="list">
        <tr>
            <th>ID</th>
            <th>Subject Id</th>
            <th>Position</th>
            <th>Visible</th>
            <th>Name</th>
            <th>&nbsp;</th>
            <th>&nbsp;</th>
            <th>&nbsp;</th>
        </tr>

        <?php while($page = mysqli_fetch_assoc($pages_set)) { ?>
            <tr>
                <td><?php echo h($page["id"]); ?></td>
                <td><?php echo h($page["subject_id"]); ?></td>
                <td><?php echo h($page["position"]); ?></td>
                <td><?php echo $page["visible"] == 1 ? "true" : "false"; ?></td>
                <td><?php echo h($page["menu_name"]); ?></td>
                <td><a class="action" href="<?php echo url_for("/staff/pages/show.php?id=" . h(u($page["id"])));?>">View</a></td>
                <td><a class="action" href="<?php echo url_for("/staff/pages/edit.php?id=" . h(u($page["id"])));?>">Edit</a></td>
                <td><a class="action" href="">Delete</a></td>
            </tr>
        <?php } ?>
    </table>
    <?php mysqli_free_result($pages_set) ?>
</main>

<?php include(SHARED_PATH . "/staff/footer.php"); ?>