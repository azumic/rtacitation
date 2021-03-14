<?php

$obj = new user();

$data = $obj->get_current_password();

var_dump($data);
?>