<?php

session_start();
unset($_SESSION["admin_username"]);  // where $_SESSION["nome"] is your own variable. if you do not have one use only this as follow **session_unset();**
unset($_SESSION["admin_id"]);
unset($_SESSION["admin_first_name"]);
unset($_SESSION["admin_last_name"]);
unset($_SESSION["admin_sex"]);
header('location: ./');
exit();
