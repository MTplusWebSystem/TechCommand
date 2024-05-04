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
    private function Error404(){
        http_response_code(404);
        require_once("./public/pages/404.php");
        return;
    }
    public function router($uri){
        global $routers;
        global $style_route;
        $uriParts = explode("/", $uri);
        $path = isset($uriParts[1]) ? '/' . $uriParts[1] . '/' : ''; 
    
        if(in_array($path , $style_route)){
            $assets = new AssetsFile;
            $assets -> router($uri);
        } else {
            $file = $routers[$uri];
            if(file_exists($file)){
                require_once($file);
                return;
            } else {
                $this->Error404();
            }
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

?>
