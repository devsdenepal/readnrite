<?php
require_once("./conf/connect.php");
$author_name = $short_name = $date_created = $pages_authored = $user_key = $page_list = "";
$author_name_error = $short_name_error = $date_created_error = $pages_authored_error = $user_key_error = $page_list_error = "";
if ($_SERVER['REQUEST_METHOD'] == "GET") {
    if ( empty(trim($_GET["title"])) || empty(trim($_GET["content"]))) {
        $username_err = "Please enter a username.";
    } elseif (!preg_match('/^[a-zA-Z0-9_]+$/', trim($_GET["author_name"]))) {
        $username_err = "Username can only contain letters, numbers, and underscores.";
    } else {
        $author_name = $_GET['author_name'];
        $title = $_GET['title'];
        $content = $_GET['content'];
        $description = $content;
        $user_key = $_GET['user_key'];
        $user_id = $_GET['user_id'];
        $page_id = rand(2323,32323);
        $page_url = "/view?page=".str_replace(" ","-",$title)."-".$page_id;
        $sql0="UPDATE `authors` SET `pages_authored`+=1 WHERE `user_key`='$user_key'";
        $update_user=mysqli_query($link,$sql0);
        $sql = "INSERT INTO `pages` (`page_id`,`page_url`,`title`, `description`, `content`, `author_name`, `user_id`,`user_key`) 
                            VALUES ('$page_id','$page_url','$title','$description','$content', '$author_name', '$user_id','$user_key')  ";
        $execution = mysqli_query($link, $sql);
        if ($execution && $update_user) {
            $sql = "SELECT * FROM `pages` WHERE `page_id`='$page_id'";
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
    }
}