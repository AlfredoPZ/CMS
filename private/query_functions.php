<?php 

    function find_all_subjects() {
        global $db;
        $sql = "SELECT * FROM subjects ORDER BY position ASC";
        $result = mysqli_query($db, $sql);
        confirm_result_set($result);
        return $result;
    }

    function find_all_pages() {
        global $db;
        $sql = "SELECT * FROM pages ORDER BY  position ASC";
        $result = mysqli_query($db, $sql);
        confirm_result_set($result);
        return $result;
    }
?>
