<?php
include('../inc/database.php');

if (isset($_POST['submit'])) {
    /* receive data from form */
    $p=$_POST;
    $title = $p['title'] . " " . $p['class'];
    $point=$p['points'];
    $pw=$p['pw'];
    $id=$p['lecturer'];
    $active=$p['toggle'];
    if ($active == '1') {
        /* sql statement */
        $quiz_query = "INSERT INTO quiz_list (title, points, u_id, is_active, quiz_pw)
        VALUES('$title','$point','$id', '$active', '$pw')";

        $quiz_query_run = mysqli_query($conn, $quiz_query);

        if ($quiz_query_run) {
            echo '<script> alert("Data Saved"); </script>';
            header("Location:quiz_list.php");
        } else {
            die("SQL error report ".$conn->error);
        }
    } elseif ($active != '1') {
        $active = '0';

        /* sql statement */
        $quiz_query = "INSERT INTO quiz_list (title, points, u_id, is_active)
        VALUES('$title','$point','$id', '$active')";

        $quiz_query_run = mysqli_query($conn, $quiz_query);

        if ($quiz_query_run) {
            echo '<script> alert("Data Saved"); </script>';
            header("Location:quiz_list.php");
        } else {
            die("SQL error report ".$conn->error);
        }
    }
    

}
?>