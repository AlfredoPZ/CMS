<?php
    require_once("../../../private/initialize.php");
    $id = $_GET["id"] ?? "1";
    $page_title = "Show Page: " . $id; 
?>


<?php include( SHARED_PATH . "/staff/header.php"); ?>

<main id="content">
    <a href="<?php echo WWW_ROOT . "/staff/pages" ?>">&laquo;Back to list</a>
    <p><? echo $id; ?></p>
</main>

<?php include( SHARED_PATH . "/staff/footer.php"); ?>