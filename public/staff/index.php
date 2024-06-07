<?php
    require_once("../../private/initialize.php");
    $page_title = "Staff Menu";
?>  

<?php include(SHARED_PATH . "/staff/header.php"); ?>

<main id="content">
    <aside id="main-menu"></aside>
    <h2>Main menu</h2>
    <ul>
        <li><a href="<?php echo url_for("/staff/subjects");?>">Subjects</a></li>
        <li><a href="<?php echo url_for("/staff/pages");?>">Pages</a></li>
    </ul>
</main>

<?php include(SHARED_PATH . "/staff/footer.php"); ?>

