<?php
require "./controllers/router/endpoints.php";

$uri = parse_url($_SERVER["REQUEST_URI"])["path"];
$requestMethod = $_SERVER["REQUEST_METHOD"];

class Requests{

    public function RequestEntry($uri, $path, $page){
        if($page){
            $file = $path[0].".php";
            if(file_exists($file)){
                require_once($file);
            } else {
                http_response_code(404);
                require_once("./public/pages/404.php");
                return;
            }
        } else {
            $file = $path[0] . substr($uri, $path[1]) . ".{$path[2]}" ;
            
            if(file_exists($file)){
                if ($path[2] === 'svg') {
                    header("Content-Type: image/svg+xml");
                    echo file_get_contents($file);
                } else {
                    header("Content-Type: {$path[3]}");
                    echo file_get_contents($file);
                }
                return;
            } else {
                http_response_code(404);
                require_once("./public/pages/404.php");
                return;
            }
        }
    }
}

if($requestMethod =="GET"){

    $request = new Requests();
    $css =  "./public/styles/";
    $js =  "./public/js/";
    $assets =  "./public/assets/";

    if (substr($uri, 0, 5) == "/css/") {
        $request->RequestEntry($uri, [$css, 5,"css", "text/css"], false);  
    } elseif (substr($uri, 0, 4) == "/js/") {
        $request->RequestEntry($uri, [$js, 4,"js", "application/javascript"], false);  
    } elseif (substr($uri, 0, 8) == "/assets/" ) {
        $request->RequestEntry($uri, [$assets, 8, "svg","image/svg"], false);  
    } else {
        if(!file_exists("./database/ConnectionDB.conf")){
            require_once("./public/pages/install.php");
            return;
        }
        $request->RequestEntry($uri, [$routers[$uri], "php"], true); 
    }
}


?>
