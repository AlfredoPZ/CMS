<?php 

    function find_all_subjects() {
        global $db;
        $sql = "SELECT * FROM subjects ORDER BY position ASC";
        $result = mysqli_query($db, $sql);
        confirm_result_set($result);
        return $result;
    }
    
    function find_subject_by_id($id) {
        global $db;
        $sql = "SELECT * FROM subjects WHERE id = '" . $id ."'";
        $result = mysqli_query($db, $sql);
        confirm_result_set($result);
        return $result;
    }

    function insert_subject($menu_name, $position, $visible) {
        global $db;
        $sql = "INSERT INTO subjects (menu_name, position, visible) VALUES (";
        $sql .= "'" . $menu_name . "',";
        $sql .= "'" . $position . "',";
        $sql .= "'" . $visible . "'";
        $sql .= ")";
        $result = mysqli_query($db, $sql);
        // for inser statements, $result is true/false

        if($result) {
            return true;
        }else {
            echo mysqli_error($db);
            db_disconnect($db);
            exit;
        }
    }

    function find_all_pages() {
        global $db;
        $sql = "SELECT * FROM pages ORDER BY  subject_id, position ASC";
        $result = mysqli_query($db, $sql);
        confirm_result_set($result);
        return $result;
    }

?>
