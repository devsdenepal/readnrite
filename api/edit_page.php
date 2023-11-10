<?php
require_once("./conf/connect.php");
        $title = $_GET['title'];
        $content = $_GET['content'];
        $description = $content;
        $user_key = $_GET['user_key'];
        $page_id = $_GET['$page_id'];
        // Prepare a select statement
        $user_key = $_GET['user_key'];
        $sql = "UPDATE `pages` SET `title` = '$title', `content`='$content' WHERE `page_id` = '$page_key' and user_key= '$user_key' ";
        $execution = mysqli_query($link, $sql);
        if ($execution) {
            $sql = "SELECT * FROM `pages` WHERE `user_key`='$user_key'";
            $result = mysqli_query($link, $sql);
            if ($result->num_rows > 0) {

                // output data of each row
                while ($row = $result->fetch_assoc()) {
                    $author_name = $row["author_name"];
                    $date_created = $row["date_created"];
                    $title = $row['title'];
                    $content = $row['content'];
                    $description = $row['description'];
                    $page_id = $row['page_id'];
                    $page_url = $row['page_url'];
                }
                $output_json =
                    '
                    {
                        "result": {
                          "title":"'.$title.'",
                          "description":"'.$description.'",
                          "content":"'.$content.'",
                          "author_name": "'.$author_name.'",
                          "date_created": "'.$date_created.'",
                          "page_id":'.$page_id.',
                          "page_url":"'.$page_url.'"
                          
                        }
                    }
           ';
           echo $output_json;
            }
        }
?>