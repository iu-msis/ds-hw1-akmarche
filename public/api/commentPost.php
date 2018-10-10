<?php
$commentItem = new Comment($_POST);
$commentItem->create();
echo json_encode($commentItem);
