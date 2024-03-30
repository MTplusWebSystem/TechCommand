<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>TechCommand GER</title>
    <link rel="stylesheet" href="./pages/css/styles/index.css">
</head>
<body>
    <main class='container'>
        <section id="form">
            <form action="./core-php/validate.php" method="post" onsubmit="return showPopup()">
                <div class="card">
                    <img src="./pages/css/imgs/icons/user.svg" alt="key">
                    <input type="text" name="username">
                </div>
                <div class="card">
                    <img src="./pages/css/imgs/icons/key.svg" alt="key">
                    <input type="password" name="password">
                </div>
                <div class="Access">
                    <img src="./pages/css/imgs/icons/line-style.svg" alt="linhas estilizadas">
                    <button id="Access" type="submit">
                        Acessar
                    </button>
                </div>
                <a href="#">
                    <img src="./pages/css/imgs/icons/user-system.svg" alt="personagem Personalizado">
                    esqueceu a senha</a>
            </form>
        </section>
        <section id="logo">
            <img src="./pages/css/imgs/logo.png" alt="logo">
        </section>
    </main>
</body>
</html>
?>