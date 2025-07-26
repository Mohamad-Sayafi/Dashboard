<?php
require_once 'function.php';



function creat_tables()
{
  $sql = "CREATE TABLE IF NOT EXISTS `products` (
  `user_id` int NOT NULL,
  `procuct_id` int NOT NULL AUTO_INCREMENT PRIMARY KEY,
  `product_title` varchar(250),
  `product_caption` varchar(250) ,
  `product_price` text ,
  `product_category` varchar(100) ,
  `photo_name` text
) ";
  $connection = db_connection();
  mysqli_query($connection, $sql);
}

creat_tables();
function creat_tables2()
{
  $sql2 = "CREATE TABLE IF NOT EXISTS `user` (
  `user_id` int NOT NULL AUTO_INCREMENT PRIMARY KEY,
  `user_name` varchar(100),
  `user_email` varchar(255),
  `user_password` text
) ";
  $connection = db_connection();
  mysqli_query($connection, $sql2);
}

creat_tables2();
