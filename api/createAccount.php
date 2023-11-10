<?php
require_once("./conf/connect.php");
$author_name = $short_name = $date_created = $pages_authored = $user_key = $page_list = "";
$author_name_error = $short_name_error = $date_created_error = $pages_authored_error = $user_key_error = $page_list_error = "";
if ($_SERVER['REQUEST_METHOD'] == "GET") {
    if (empty(trim($_GET["short_name"])) || empty(trim($_GET["author_name"]))) {
        $username_err = "Please enter a username.";
    } elseif (!preg_match('/^[a-zA-Z0-9_]+$/', trim($_GET["short_name"])) || !preg_match('/^[a-zA-Z0-9_]+$/', trim($_GET["author_name"]))) {
        $username_err = "Username can only contain letters, numbers, and underscores.";
    } else {
        $short_name = $_GET['short_name'];
        $author_name = $_GET['author_name'];
        // Prepare a select statement
        $user_key = rand(1000, 10000);
        $sql = "INSERT INTO `authors` (`short_name`, `author_name`, `user_key`) VALUES ('$short_name', '$author_name','$user_key') ";
        $execution = mysqli_query($link, $sql);
        if ($execution) {
            $sql = "SELECT * FROM `authors` WHERE `user_key`='$user_key'";
            $result = mysqli_query($link, $sql);
            if ($result->num_rows > 0) {

                // output data of each row
                while ($row = $result->fetch_assoc()) {
                    $short_name = $row["short_name"];

                    $author_name = $row["author_name"];
                    $date_created = $row["date_created"];
                    $pages_authored = $row["pages_authored"];
                    $user_id = $row["user_id"];
                    $user_key = $row["user_key"];
                }
                $output_json =
                    '
                    {
                        "result": {
                          "short_name": "'.$short_name.'",
                          "author_name": "'.$author_name.'",
                          "date_created": "'.$date_created.'",
                          "user_id": '.$user_id.',
                          "user_key": '.$user_key.'
                        }
                    }
          
           ';
           echo $output_json;
            }
        }
    }
}
?>