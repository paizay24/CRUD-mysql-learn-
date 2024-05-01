<?php

$conn = mysqli_connect("localhost","pzo","pzo124","wad_shop");

if (!$conn) {
      die("Connection failed: " . mysqli_connect_error());
}
