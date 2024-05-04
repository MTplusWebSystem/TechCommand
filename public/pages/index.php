<?php

class RenderInformation
{
    public function GetInfo(){
        $JSONinfos = file_get_contents("./database/infos.json");
        $data = json_decode($JSONinfos,true);
        if ($data === null && json_last_error() !== JSON_ERROR_NONE) {
            echo "Erro ao decodificar JSON: " . json_last_error_msg();
        } 
        return $data;
    }
}

$infos = new RenderInformation;

$data = $infos -> GetInfo();

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $data["logo"]; ?></title>
    <link rel="stylesheet" href="/css/index/root">
</head>
<body id="body">
    <nav id="nav-bar" class="nav-barStyle">
        <div id="mobile"  class="mobileStyle">
        <h2 id="logo" class="logo"><?php echo $data["logo"]; ?></h2>
            <div id="list-view">
                <ul class="family-anton">
                    <li><a href="#">Início</a></li>
                    <li><a href="#">Teste SSH</a></li>
                    <li><a href="#">SSH Premium</a></li>
                    <li><a href="#">Serviços</a></li>
                </ul>
                <a id="client-login" class="client-loginStyle family-anton"><?php echo $data["button"]; ?></a>
            </div>
        </div>
        <div id="desktop" class="desktopStyle">
            <h2 id="logo" class="logo"><?php echo $data["logo"]; ?></h2>
            <div id="list-view">
                <ul class="family-anton">
                    <li><a href="#">Início</a></li>
                    <li><a href="#">Teste SSH</a></li>
                    <li><a href="#">SSH Premium</a></li>
                    <li><a href="#">Serviços</a></li>
                </ul>
                <a id="client-login" class="client-loginStyle family-anton"><?php echo $data["button"]; ?></a>
            </div>
        </div>
    </nav>
    <main id="main" class="mainStyle">
        <section id="grid1" class="standard">
            <div class="presentation-card">
                    <div class="presentation-title">
                        <h2 class="title-1 family-anton">
                            <?php echo $data["title"][0]; ?>
                        </h2>
                        <h2 class="title-2 family-anton">
                            <?php echo $data["title"][1]; ?>
                        </h2>
                    </div>
                    <div class="presentation-text">
                        <img src="./assets/illustrations/professionel-developer" alt="Ilustração 1">
                        <p class="family-slab">Selecione abaixo o tipo de conta que deseja criar, clique em ssh premium, caso queira suporte e até 31 dias de acesso </p>
                        <div class="presentation-button">
                            <a class="premium family-anton">Premium</a> 
                            <a class="free family-anton">Grátis</a>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <section id="grid2" class="standard">card2</section>

    </main>
    <footer id="footer" class="footerStyle"></footer>
</body>
</html>