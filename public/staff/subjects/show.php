
<?php
    require_once("../../../private/initialize.php");
    $page_title = "Hello";

    $id = $_GET["id"] ?? "1";
?>  


<?php include(SHARED_PATH . "/staff/header.php"); ?>

<main id="content">
    <aside id="main-menu"></aside>
    <?php  echo h($id);     ?>

    <a href="show.php?name=<?php echo u("John Doe"); ?>">Name</a>
    <a href="show.php?company=<?php echo u("Widgets&More"); ?>">Company</a>
    <a href="show.php?query=<?php echo u("!#*?"); ?>">Query</a>
</main>

<?php include(SHARED_PATH . "/staff/footer.php"); ?>