<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Instalação</title>
    <link rel="stylesheet" href="/css/install/root">
</head>
<body>
    <div class="wrapper">
        <div id="card-1" class="card-style jc-evenly">
            <img src="/assets/illustrations/database" alt="ilustração de banco de dados">
            <h4 class="f-400">Banco de dados</h4>
            <p class="f-400">Estabeleça a configuração da conexão com o seu banco de dados</p>
            <button id="view-db" class="f-400">Inicicar</button>
            <div class="view-db jc-evenly">
                <div class="grup j-evenly">
                    <img src="/assets/icons/database-user" alt="icone de banco de dados">
                    <input id="DB-User" type="text" placeholder="Usuário do banco">
                </div>
                <div class="grup j-evenly">
                    <img src="/assets/icons/database-pass" alt="icone de banco de dados">
                    <input id="DB-Pass" type="text" placeholder="Senha do banco">
                </div>
                <div class="grup j-evenly">
                    <img src="/assets/icons/database-system" alt="icone de banco de dados">
                    <input id="DB-Name" type="text" placeholder="Nome do banco">
                </div>
                <div class="grup j-evenly">
                    <img src="/assets/icons/database-cloud" alt="icone de banco de dados">
                    <input id="DB-Host" type="text" placeholder="Host do banco">
                </div>
                <button id="Create-DB" class="f-400">Salvar</button>
            </div>
        </div>
        <div id="card-2" class="card-style">
            <img src="/assets/illustrations/config-page" alt="ilustração de controle de página">
            <h4 class="f-400">Edição simples</h4>
            <p class="f-400">Configure a versão inicial da página de vendas.</p>
            <button id="Config-view" class="f-400">Inicicar</button>
            <div class="block-view j-center">
                <img src="/assets/icons/padlock" alt="icone de cadeado">
            </div>
            <div class="config-page jc-evenly">
                <div class="grup j-evenly">
                    <img src="/assets/icons/user" alt="icone de usuário">
                    <input id="User" type="text" placeholder="Usuário do Admin">
                </div>
                <div class="grup j-evenly">
                    <img src="/assets/icons/protect" alt="icone de cadeado">
                    <input id="Pass" type="text" placeholder="Senha do Admin">
                </div>
                <div class="grup j-evenly">
                    <img src="/assets/icons/logo" alt="icone de logo">
                    <input id="title" type="text" placeholder="Texto da logo">
                </div>
                <button id="Config-page" class="f-400">Salvar</button>
            </div>
        </div>
    </div>
</body>
<script src="/js/install/main"></script>
</html>