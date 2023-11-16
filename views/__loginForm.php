<!DOCTYPE html>
<html lang="pt-br">

<?php require_once("__head.php"); ?>

<body>

    <?php require_once("__header.php"); ?>

    <main class="container">

        <form class="container__formulario" method="POST" action="/login">
            <h2 class="formulario__titulo">Efetue login</h2>
                <div class="formulario__campo">
                    <label class="campo__etiqueta" for="usuario">E-mail</label>
                    <input name="email" class="campo__escrita" required
                        placeholder="Digite seu e-mail" id='email' />
                </div>


                <div class="formulario__campo">
                    <label class="campo__etiqueta" for="senha">Senha</label>
                    <input type="password" name="senha" class="campo__escrita" required placeholder="Digite sua senha"
                        id='senha' />
                </div>

                <input class="formulario__botao" type="submit" value="Entrar" />
        </form>

    </main>

</body>

</html>