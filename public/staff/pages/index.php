
<?php
    require_once("../../../private/initialize.php");
    $page_title = "Pages";
?>  


<?php include(SHARED_PATH . "/staff/header.php"); ?>

<main id="content">
    <h1>Pages</h1>

    <div id="actions"><a href="">Create new page</a></div>

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

        <?php foreach($pages as $page) : ?>
            <tr>
                <td><?php echo h($page["id"]); ?></td>
                <td><?php echo h($page["position"]); ?></td>
                <td><?php echo $page["visible"] == 1 ? "true" : "false"; ?></td>
                <td><?php echo h($page["page_name"]); ?></td>
                <td><a class="action" href="<?php echo url_for("/staff/pages/show.php?id=" . h(u($page["id"])));?>">View</a></td>
                <td><a class="action" href="">Edit</a></td>
                <td><a class="action" href="">Delete</a></td>
            </tr>
        <?php endforeach;  ?>
    </table>

</main>

<?php include(SHARED_PATH . "/staff/footer.php"); ?>