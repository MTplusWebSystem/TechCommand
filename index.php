<?php
require "./controllers/router/endpoints.php";

$uri = parse_url($_SERVER["REQUEST_URI"])["path"];
$requestMethod = $_SERVER["REQUEST_METHOD"];

interface routerInterface{
    public function router($uri);
}

class AssetsFile
{
    private function Error404(){
        http_response_code(404);
        require_once("./public/pages/404.php");
        return;
    }
    public function router($uri){
        global $path;
        if (substr($uri, 0, 5) == "/css/") {
            header("Content-Type: text/css");
            $file = $path[1].substr($uri,5).".css";
            echo file_get_contents($file);

        }  elseif (substr($uri, 0, 4) == "/js/") {
            header("Content-Type: application/javascript");
            $file = $path[2].substr($uri,5).".js";
            echo file_get_contents($file);
        } elseif (substr($uri, 0, 8) == "/assets/") {
            $file = $path[3].substr($uri,8).".svg";
            if(file_exists($file)){
                header("Content-Type: image/svg+xml");
                echo file_get_contents($file);
            }else{
                $file = $path[3].substr($uri,8).".jpg";
                if(file_exists($file)){
                    header("Content-Type: image/jpg");
                    echo file_get_contents($file);
                }else{
                    $file = $path[3].substr($uri,8).".png";
                    if(file_exists($file)){
                        header("Content-Type: image/png");
                        echo file_get_contents($file);
                    }else{
                        $this->Error404();
                    }
                }
            }
        }else{
            $this->Error404();
        }
    }
}

class StaticFile implements routerInterface
{
    public function router($uri){
        global $routers;
        if(substr($uri, 0, 4) == "/js/" ||substr($uri, 0, 5) == "/css/" ||substr($uri, 0, 8) == "/assets/"  ){

            $assets = new AssetsFile;
            $assets -> router($uri);
        }else{
            $file = $routers[$uri];
            require_once($file);
            return;
        }
    }
}

class EndPoints{
    public function router(routerInterface $routerInterface,$uri,$Method){
        global $requestMethod;
        if($Method == $requestMethod){
            $routerInterface -> router($uri);
        }else{
            echo "error";
        }
    }
}

$EndPoints = new EndPoints;
$EndPoints -> router(new StaticFile, $uri , "GET" )

/*
class Requests{

    public function RequestEntry($uri, $path, $page){
        if($page){
            $file = $path[0].".php";
            if(file_exists($file)){
                
                require_once($file);
            } else {
                http_response_code(404);
                echo $file;
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
    $imgs =  "./public/assets/imgs/";

    if (substr($uri, 0, 5) == "/css/") {
        $request->RequestEntry($uri, [$css, 5,"css", "text/css"], false);  
    } elseif (substr($uri, 0, 4) == "/js/") {
        $request->RequestEntry($uri, [$js, 4,"js", "application/javascript"], false);  
    } elseif (substr($uri, 0, 13) == "/assets/imgs/" ) {
        if(file_exists($imgs.substr($uri,13).".jpg")){
            $request->RequestEntry($uri, [$imgs, 13, "jpg","image/jpg"], false);
            echo "dentro";
        }else{
            $request->RequestEntry($uri, [$imgs, 13, "png","image/png"], false);
        }
    }elseif (substr($uri, 0, 8) == "/assets/" ) {
        $request->RequestEntry($uri, [$assets, 8, "svg","image/svg"], false);
    }else {
        if(!file_exists("./database/ConnectionDB.conf")){
            require_once("./public/pages/install.php");
            return;
        }
        $request->RequestEntry($uri, [$routers[$uri], "php"], true); 
    }
}
*/

?>
