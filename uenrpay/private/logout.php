<?php
session_start();

unset($_SESSION['id']);
unset($_SESSION['student_id']);


session_destroy();

header("Location: /uenrpay/public/");