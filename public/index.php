<?php require_once('../private/initialize.php'); ?>

<?php 
    if(isset($_GET["id"])) {
        $page_id = $_GET["id"];
        $page = find_page_by_id($page_id);

        if(!$page) {
            redirect_to(url_for("/index.php"));
        } else {

        }
    } else {

    }
?>

<?php include(SHARED_PATH . '/public/header.php'); ?>

<main id="main">

    <?php include(SHARED_PATH . "/public/navigation.php"); ?>
    
    <div id="page">
        <?php 
        if(isset($page)) {
            echo $page["content"];
        }else {
            include(SHARED_PATH . "/static/homepage.php"); 
        }
        
        ?>
    </div>

</main>

<?php include(SHARED_PATH . '/public/footer.php'); ?>
