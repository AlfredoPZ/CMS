<?php 
    if(!isset($page_title)) {
        $page_title = "Staff area";
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>GL - <?php echo $page_title ?></title>
    <link rel="stylesheet" href=<?php echo url_for("/styles/staff.css"); ?>>
</head>
<body>
    <header>
        <h1>GL Staff area</h1>
    </header>

    <nav>
        <ul>
            <li>User: <?php echo $_SESSION["username"] ?? "" ?></li>
            <li><a href="<?php echo WWW_ROOT . "/staff/" ?>">Menu</a></li>
            <li><a href="<?php echo url_for("staff/logout.php") ?>">Logout</a></li>
        </ul>
    </nav>
