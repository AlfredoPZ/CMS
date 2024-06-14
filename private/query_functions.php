<?php 

    function validate_subject($subject){

        $errors = [];

        // menu_name
        if (is_blank($subject['menu_name'])) {
            $errors[] = "Name cannot be blank.";
        } else if (!has_length($subject['menu_name'], ['min' => 2, 'max' => 255])) {
            $errors[] = "Name must be between 2 and 255 characters.";
        }

        // position
        // Make sure we are working with an integer
        $postion_int = (int) $subject['position'];
        if ($postion_int <= 0) {
            $errors[] = "Position must be greater than zero.";
        }
        if ($postion_int > 999) {
            $errors[] = "Position must be less than 999.";
        }

        // visible
        // Make sure we are working with a string
        $visible_str = (string) $subject['visible'];
        if (!has_inclusion_of($visible_str, ["0", "1"])) {
            $errors[] = "Visible must be true or false.";
        }

        return $errors;
    }
    
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

        $errors = validate_subject($subject);

        if(!empty($errors)) {
            return $errors;
        }

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

        $errors = validate_subject($subject);

        if(!empty($errors)) {
            return $errors;
        }

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

    function delete_subject($id) {
        global $db;
        $sql = "DELETE FROM subjects WHERE id='" . $id . "' LIMIT 1";
        $result = mysqli_query($db, $sql);
        if($result) {
            return true;
            
        } else {
            echo mysqli_error($db);
            db_disconnect($db);
            exit;
        }
    }

// pages

    function validate_page($page) {
        $errors = [];

        // subject_id
        if (is_blank($page['subject_id'])) {
            $errors[] = "Subject cannot be blank.";
        }

        // menu_name
        if (is_blank($page['menu_name'])) {
            $errors[] = "Name cannot be blank.";
        } elseif (!has_length($page['menu_name'], ['min' => 2, 'max' => 255])) {
            $errors[] = "Name must be between 2 and 255 characters.";
        }

        // position
        // Make sure we are working with an integer
        $postion_int = (int) $page['position'];
        if ($postion_int <= 0) {
            $errors[] = "Position must be greater than zero.";
        }
        if ($postion_int > 999) {
            $errors[] = "Position must be less than 999.";
        }

        // visible
        // Make sure we are working with a string
        $visible_str = (string) $page['visible'];
        if (!has_inclusion_of($visible_str, ["0", "1"])) {
            $errors[] = "Visible must be true or false.";
        }

        // content
        if (is_blank($page['content'])) {
            $errors[] = "Content cannot be blank.";
        }

        return $errors;
    }

    function find_all_pages() {
        global $db;
        $sql = "SELECT * FROM pages ORDER BY  subject_id, position ASC";
        $result = mysqli_query($db, $sql);
        confirm_result_set($result);
        return $result;
    }

    function find_page_by_id($id) {
        global $db;
        $sql = "SELECT * FROM pages WHERE id = '" . $id ."'";
        $result = mysqli_query($db, $sql);
        confirm_result_set($result);
        $subject = mysqli_fetch_assoc($result);
        mysqli_free_result($result);
        return $subject;
    }

    function insert_page($page) {
        global $db;

        $errors = validate_page($page);
        if(!empty($errors)) {
            return $errors;
        }

        $sql = "INSERT INTO pages (subject_id, menu_name, position, visible, content) VALUES (";
        $sql .= "'" . $page["subject_id"] . "',";
        $sql .= "'" . $page["menu_name"] . "',";
        $sql .= "'" . $page["position"] . "',";
        $sql .= "'" . $page["visible"] . "',";
        $sql .= "'" . $page["content"] . "'";
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

    function update_page($page) {
        global $db;
        $errors = validate_page($page);
        if(!empty($errors)) {
            return $errors;
        }
        $sql = "UPDATE pages SET ";
        $sql .= "subject_id='" . $page["subject_id"] . "',";
        $sql .= "menu_name='" . $page["menu_name"] . "',";
        $sql .= "position='" . $page["position"] . "',";
        $sql .= "visible='" . $page["visible"] . "',";
        $sql .= "content='" . $page["content"] . "' ";
        $sql .= "WHERE id='".$page["id"]."' ";
        $sql .= "LIMIT 1";
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

    function delete_page($id) {
        global $db;

        $sql = "DELETE FROM pages WHERE id='" . $id . "' LIMIT 1";
        $result = mysqli_query($db, $sql);

        if($result) {
            return true;
            
        } else {
            echo mysqli_error($db);
            db_disconnect($db);
            exit;
        }
    }

    function find_pages_by_subject_id($id) {
        global $db;
        $sql = "SELECT * FROM pages WHERE subject_id = '" . db_escape($db, $id) ."' ORDER BY position ASC";
        $result = mysqli_query($db, $sql);
        confirm_result_set($result);
        return $result;
    }

?>
