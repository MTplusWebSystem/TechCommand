<?php

$style_route = ["/js/","/css/","/assets/"];

$path = [
    "./public/pages/",
    "./public/styles/",
    "./public/js/",
    "./public/assets/"
];

$routers = [
    "/" => "{$path[0]}index.php",
    "/login/client" => "{$path[0]}client-login.php",
    "/ex" => "{$path[0]}ex.html",
];


