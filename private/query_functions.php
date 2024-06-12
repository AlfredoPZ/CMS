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
        $subject = mysqli_fetch_assoc($result);
        mysqli_free_result($result);
        return $subject;
    }

    function insert_subject($subject) {
        global $db;
        $sql = "INSERT INTO subjects (menu_name, position, visible) VALUES (";
        $sql .= "'" . $subject["menu_name"] . "',";
        $sql .= "'" . $subject["position"] . "',";
        $sql .= "'" . $subject["visible"] . "'";
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

    function update_subject($subject) {
        global $db;
        $sql = "UPDATE subjects SET ";
        $sql .= "menu_name='" . $subject["menu_name"] . "', ";
        $sql .= "position='" . $subject["position"] . "', ";
        $sql .= "visible='" . $subject["visible"] . "' ";
        $sql .= "WHERE id='".$subject["id"]."' ";
        $sql .= "LIMIT 1";
    
        $result = mysqli_query($db, $sql);
    
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
