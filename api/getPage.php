<?php
require_once("./conf/connect.php");
$author_name = $short_name = $date_created = $pages_authored = $page_key = $page_list = "";
$author_name_error = $short_name_error = $date_created_error = $pages_authored_error = $page_key_error = $page_list_error = "";

        // Prepare a select statement
if($_SERVER['REQUEST_METHOD']== 'GET' && trim($_GET['page'])){
    $page_id = $_GET['page'];
    $user_key = $_GET['user_key'];
    mysqli_query($link,"UPDATE `pages` SET views=views+1 WHERE `page_id` = $page_id");
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
            $views = $row['views'];
            if($row['user_key'] == $user_key){
                $editable = "true";
            }
            else{
                $editable = "false";
            }
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
                  "page_url":"'.$page_url.'",
                  "views":'.$views.',
                  "editable":"'. $editable.'"
                  
                }
            }
   ';
   echo $output_json;
    }
}
?>