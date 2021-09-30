<?php
// 判断是否已经登陆
session_start();
if (isset($_SESSION["admin"]) && $_SESSION["admin"] === true) {

} else {
    //  验证失败，将 $_SESSION["admin"] 置为 false
    $_SESSION["admin"] = false;
    // 挑战到登陆界面
    header("Location: ../login.php");
}