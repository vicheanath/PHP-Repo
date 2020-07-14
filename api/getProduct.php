<?php
$db = new mysqli('localhost', 'root','','shop_project');

$sql = "SELECT * FROM tbl_product";
$post_data = $db->query($sql);


?>