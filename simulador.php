<?php

session_start();

require 'conexao.php';

$quantidadeGerada = 0;

$trens = $conexao->query('SELECT id, prefixo_trem, modelo_trem FROM trens ORDER BY prefixo_trem');

?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Simulador de sensores</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <header>
        <span class="marca">Frota Ferroviária</span>
    </header>

<main>
    <h1>Simulador de sensores IoT</h1>

    <form method="post" class="formulario">
        <div class="linha">
            <div class="campo">
                <label for="trem">Trem</label>
                <select name="trem" id="trem">
                    <option value="">Selecione</option>

                    <?php
                        while ($trem = $trens->fetch_assoc()):
                    ?>
                        <option value="<?=  (int) $trem['id_trem'] ?>"><?= htmlspecialchars($trem['prefixo_trem']) ?> - <?= htmlspecialchars($trem['modelo_trem']) ?></option>
                        <?php
                            endwhile;
                        ?>
                </select>
            </div>

            <div class="campo">
                <label for="quantidade">Quantidade</label>
                <input type="number" id="quantidade" name="quantidade" min="1" max="200" value="50">
            </div>
        </div>

        <div class="acoes">
            <button type="submit" class="botao botao-primario">Gerar leituras</button>
        </div>
    </form>
</main>
    
</body>
</html>