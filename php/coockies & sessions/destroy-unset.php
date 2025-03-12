<?php

session_start();
session_unset();//clear all the sesions  var
session_destroy();

header('Location: destroy-log.php');