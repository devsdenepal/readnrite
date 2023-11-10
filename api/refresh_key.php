<?php
require_once("./conf/connect.php");
$author_name = $short_name = $date_created = $pages_authored = $user_key = $page_list = "";
$author_name_error = $short_name_error = $date_created_error = $pages_authored_error = $user_key_error = $page_list_error = "";
if ($_SERVER['REQUEST_METHOD'] == "GET" &&  !empty($_GET['user_key'])) {
    // Prepare a select statement
    $old_user_key = $_GET['user_key'];
    $new_user_key = rand(1000, 10000);
    $sql = "UPDATE `authors` SET `user_key`='$new_user_key' WHERE `user_key` = '$old_user_key' ";
    $execution = mysqli_query($link, $sql);
    if ($execution) {
        $sql = "SELECT * FROM `authors` WHERE `user_key`='$user_key'";
        $result = mysqli_query($link, $sql);
        if ($result->num_rows > 0) {

            // output data of each row
            while ($row = $result->fetch_assoc()) {
                $short_name = $row["short_name"];
                $user_key = $row['user_key'];
                $author_name = $row["author_name"];
            }
            $output_json =
                '
                    {
                        "result": {
                          "short_name": "' . $short_name . '",
                          "author_name": "' . $author_name . ',
                          "user_key":"' . $user_key . '"
                        }
                    }
          
           ';
            echo $output_json;
        }
    }
}
?>