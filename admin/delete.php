<?php

require('../config.inc.php');
require('../functions.php');

// get the id of the record to delete
$id = $_GET['id'];

// delete the record from the child table first
$query = "DELETE FROM posts WHERE id = $id";
query($query);

// delete the record from the parent table
$query = "DELETE FROM comments WHERE comment_id = $id";
query($query);

// redirect to the page where the item was deleted
header("Location: dashboard.php");
exit();
?>