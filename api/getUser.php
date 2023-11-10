<?php
require_once("./conf/connect.php");
$author_name = $short_name = $date_created = $pages_authored = $user_key = $page_list = "";
$author_name_error = $short_name_error = $date_created_error = $pages_authored_error = $user_key_error = $page_list_error = "";

        // Prepare a select statement
if($_SERVER['REQUEST_METHOD']== 'GET' && trim($_GET['user'])){
    $user_id = $_GET['user'];
    $sql = "SELECT * FROM `authors` WHERE `user_id`='$user_id'";
    $result = mysqli_query($link, $sql);
    if ($result->num_rows > 0) {
        // output data of each row
        while ($row = $result->fetch_assoc()) {
            $short_name = $row["short_name"];
            $author_name = $row["author_name"];
            $date_created = $row["date_created"];
            $pages_authored = $row["pages_authored"];
        }
        $output_json =
            '
            {
                "result": {
                  "short_name": "'.$short_name.'",
                  "author_name": "'.$author_name.'",
                  "date_created": "'.$date_created.'",
                  "pages_authored": '.$pages_authored.'
                }
            }
  
   ';
   echo $output_json;
    }
}
?>