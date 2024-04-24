<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Instalação</title>
    <link rel="stylesheet" href="/css/install/root">
</head>
<body>
    <div class="card-1 jc-evenly">
        <div class="grup j-evenly">
            <img src="assets/icons/database-user" alt="icone de seta">
            <input id="UserDB" type="text" >
        </div>
        <div class="grup j-evenly">
            <img src="assets/icons/database-pass" alt="icone de seta">
            <input id="PassDB" type="text" >
        </div>
        <div class="grup j-evenly">
            <img src="assets/icons/database-system" alt="icone de seta">
            <input id="NameDB" type="text" >
        </div>
        <div class="grup j-evenly">
            <img src="assets/icons/database-cloud" alt="icone de seta">
            <input id="HostDB" type="text" >
        </div>
        <button id="ConnectonDB">Salver e Conectar</button>
    </div>
    <div class="card-2 jc-evenly">
        <div class="grup j-evenly">
            <img src="assets/icons/user" alt="icone de seta">
            <input id="User" type="text" >
        </div>
        <div class="grup j-evenly">
            <img src="assets/icons/protect" alt="icone de seta">
            <input id="Pass" type="text" >
        </div>
        <div class="grup j-evenly">
            <img src="assets/icons/logo" alt="icone de seta">
            <input id="Logo" type="text" >
        </div>
        <div class="grup j-evenly options">
            <div id="option-1" class="option-style">
                <img src="assets/illustrations/person-1" alt="icone de seta">
                <div class="select-view op1"></div>
            </div>
            <div id="option-2" class="option-2 option-style">
                <img src="assets/illustrations/person-2" alt="icone de seta">
                <div class="select-view op2"></div>
            </div>
            <div id="option-3" class="option-style">
                <img src="assets/illustrations/person-3" alt="icone de seta">
                <div class="select-view op3"></div>
            </div>
            <div id="option-4" class=" option-style">
                <img src="assets/illustrations/person-4" alt="icone de seta">
                <div class="select-view op4"></div>
            </div>
        </div>
        <button id="InfoPainel">Cria Informações</button>
    </div>
    <div class="card-3 j-evenly">
        <div class="id-plan j-center">1</div>
        <div class="next-plan j-center">
            <img src="/assets/icons/arrow-left" alt="seta indica para direita">
        </div>
        <div class="plans jc-evenly">
            <div class="title-card">1 LOGIN</div>
            <div class="title-sub-card">Individual</div>
            <div class="value-card">
                <span class="money">R$</span>
                <div class="card-numbers j-center">
                    00.00
                </div>
                <div class="duration">/31 dias</div>
            </div>
            <ul class="jc-evenly">
                <span>1</span>
                <span>2</span>
                <span>3</span>
                <span>4</span>
                <span>5</span>
                <span>6</span>
            </ul>
            <button>Adquirir</button>
        </div>
    </div>
</body>
<script src="/js/install/main"></script>
</html>