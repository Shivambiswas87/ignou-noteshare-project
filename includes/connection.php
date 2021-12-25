<?php
global $conn;

$conn = mysqli_connect(DB_HOST,DB_USERNAME,DB_PASSWORD,DB_DATABASE )
or die ("error" . mysqli_error($conn));
