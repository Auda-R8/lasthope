<?php
require_once __DIR__."/db.php";

$random_place = range(1,12);
shuffle($random_place);

$con = db_connect();

for($i = 0; $i < 3; $i++){
    $random_discount = rand(5,15);

    $query = "SELECT * FROM `places` WHERE ID = $random_place[$i]";
    $result = mysqli_query($con, $query);
    $output = mysqli_fetch_assoc($result);
    
    $array[$i] = array(
        'place' => $output['Место'],
        'discount' => $random_discount
    );
    
}

$params = array(
    '1' => $array[0],
    '2' => $array[1],
    '3' => $array[2]
);

echo json_encode($params);

return json_encode($params);

mysqli_close($con);
?>