<?php
require_once("./conf/connect.php");
$author_name = $short_name = $date_created = $pages_authored = $user_key = $page_list = "";
$author_name_error = $short_name_error = $date_created_error = $pages_authored_error = $user_key_error = $page_list_error = "";

        // Prepare a select statement
if($_SERVER['REQUEST_METHOD']== 'GET' && trim($_GET['user'])){
    $user_id = $_GET['user'];
    $sql = "SELECT * FROM `pages` WHERE `user_id`='$user_id'";
    $result = mysqli_query($link, $sql);
    // $i=0;
    echo '
    {
        "result": [';
	    if ($result->num_rows > 0) {
            $total_rows= $result->num_rows;
            $current_row=1;
            // output data of each row
            while ($row = $result->fetch_assoc()) {
                echo '
                {
              "title":"'.$row["title"].'",
              "description":"'.$row["description"].'",
              "content":"'.$row["content"].'",
              "date_created": "'.$row["date_created"].'",
              "page_id":'.$row["page_id"].',
              "page_url":"'.$row["page_url"].'"
            }';
                if($current_row !== $total_rows){
                    echo ",";
                    $current_row++;
                }
	}
    echo '            ]';
//    echo $output_json;
    }
}
?>