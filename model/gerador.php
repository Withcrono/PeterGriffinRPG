<!DOCTYPE html>
<!--
Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
Click nbfs://nbhost/SystemFileSystem/Templates/Project/PHP/PHPProject.php to edit this template
-->
<html>
    <head>
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Gerador de Masmorras</title>
        <link rel="stylesheet" href="..\view\style.css">
        <link rel="shortcut icon" href="..\view\Iconsmind-Outline-Dice-2.ico" type="image/x-icon">
    </head>
    <body id="bodygerador">
<main>
    <div class="seção" id="seçãogerador">
        <div class="caixah2">
            <h2 class="titulo">Gerador de Masmorras</h2>
            <form action="gerador.php" method="post" class='botaoseta'><input type="submit"></form>
            <!-- recarregar a pagina -->
        </div>
        <?php
            //variáveis------------
            $especial1 = false;
            $dadosala = rand(1,18); //dado para sala

            //era para ir até 20, mas decidimos não incluir salas especiais.
            $dadocamara = rand(1,17); //dado para câmara
            $tiposala = rand(1,6); //dado para ver se é sala ou câmara

            $area = 0;  //Área da sala/câmara
            $quantidadeportas = 0; //quantidade de portas
            $quantidadeportas2 = rand(1,4);
            $dadodirecao = rand(1,20); //direção das portas

            $dadoconteudo = rand(1,20);

            //variáveis------------

            echo "Você se encontra em ";

            //rola um número aleatório pra escolher se vai ser sala ou câmara.
            if ($tiposala <= 4){
                //se for 4 ou menos é uma sala

                //sala
                echo 'uma sala de ';
                switch (true){
                    case ($dadosala == 1):
                    echo '3m x 3m'; //diz para o jogador o tamanho
                    $area = 9; //guarda a área para as portas
                    break;
                    case ($dadosala == 2 || $dadosala == 3 || $dadosala == 4):
                    echo '6m x 6m';
                    $area = 36;
                    break;
                    case ($dadosala == 5 || $dadosala == 6 || $dadosala == 7):
                    echo '9m x 9m';
                    $area = 81;
                    break;
                    case ($dadosala == 8 || $dadosala == 9 || $dadosala == 10):
                    echo '12m x 12m';
                    $area = 144;
                    break;
                    case ($dadosala == 11):
                    echo '3m x 6m';
                    $area = 18;
                    break;
                    case ($dadosala == 12 || $dadosala == 13):
                    echo '6m x 9m';
                    $area = 54;
                    break;
                    case ($dadosala == 14 || $dadosala == 15):
                    echo '6m x 12m';
                    $area = 6*12;
                    break;
                    case ($dadosala == 16 || $dadosala == 17 || $dadosala == 18):
                    echo '9m x 12m';
                    $area = 9*12;
                    break;
                }
            } else {
                //se for 5 ou 6, é uma câmara.

                //câmara
                echo 'uma câmara de ';
                switch (true){
                    case ($dadocamara == 1):
                        echo '3m x 3m';
                        $area = 9; 
                        break;
                    case ($dadocamara == 2 || $dadocamara == 3 || $dadocamara == 4):
                    echo '6m x 6m';
                        $area = 36;
                    break;
                    case ($dadocamara == 5 || $dadocamara == 6):
                    echo '9m x 9m';
                        $area = 81;
                    break;
                    case ($dadocamara == 7 || $dadocamara == 8):
                    echo '12m x 12m';
                        $area = 144;
                    break;
                    case ($dadocamara == 9 || $dadocamara == 10):
                    echo '6m x 9m';
                        $area = 54;
                    break;
                    case ($dadocamara == 11 || $dadocamara == 12 || $dadocamara == 13):
                    echo '6m x 12m';
                        $area = 6*12;
                    break;
                    case ($dadocamara == 14 || $dadocamara == 15):
                    echo '12m x 15m';
                        $area = 12*15;
                    break;
                    case ($dadocamara == 16 || $dadocamara == 17):
                    echo '12m x 18m';
                        $area = 12*18;
                    break;
                }

            }

            //gera uma quantidade de portas.
            if ($area <= 150) {
                switch (true){
                    case ($dadodirecao == 1 || $dadodirecao == 2): //passa direto pro 4.
                    //fiz de dois em dois pois fica mais fácil de ler que uma linha
                    //muito longa.
                    case ($dadodirecao == 3 || $dadodirecao == 4):
                        echo ', com uma ';
                        if ($tiposala <= 4) {echo 'porta';} else {echo 'passagem';}
                        $quantidadeportas = 1;
                        break;
                    case ($dadodirecao == 5 || $dadodirecao == 6 || $dadodirecao == 7):
                        echo ', com duas ';
                        if ($tiposala <= 4) {echo 'portas';} else {echo 'passagens';}
                        $quantidadeportas = 2;
                        break;
                    case ($dadodirecao == 8 || $dadodirecao == 9):
                        echo ', com três portas';
                        if ($tiposala <= 4) {echo 'portas';} else {echo 'passagens';}
                        $quantidadeportas = 3;
                        break;
                    case ($dadodirecao == 10 || $dadodirecao == 11 || $dadodirecao == 12):
                        echo ', um beco sem saída';
                        $quantidadeportas = 0;
                        break;
                    case ($dadodirecao == 13 || $dadodirecao == 14 || $dadodirecao == 15):
                        echo ', um beco sem saída';
                        $quantidadeportas = 0;
                        break;
                    case ($dadodirecao == 16 || $dadodirecao == 17):    
                    case ($dadodirecao == 18 || $dadodirecao == 19):
                        switch ($quantidadeportas2){
                            case 1:
                                echo ', com uma ';
                                if ($tiposala <= 4) {echo 'porta';} else {echo 'passagem';}
                                $quantidadeportas = 1;
                                break;
                            case 2:
                                echo ', com duas ';
                                if ($tiposala <= 4) {echo 'portas';} else {echo 'passagens';}
                                $quantidadeportas = 2;
                                break;
                            case 3:
                                echo ', com três ';
                                if ($tiposala <= 4) {echo 'portas';} else {echo 'passagens';}
                                $quantidadeportas = 3;
                                break;
                            case 4:
                                echo ', com quatro ';
                                if ($tiposala <= 4) {echo 'portas';} else {echo 'passagens';}
                                $quantidadeportas = 4;
                                break;
                        }
                    case ($dadodirecao == 20):
                        echo ', com uma ';
                        if ($tiposala > 4) {echo 'porta';} else {echo 'passagem';}
                        $quantidadeportas = 1;
                        break;
                }
            } else {
                switch (true){
                    case ($dadodirecao == 1 || $dadodirecao == 2):
                    case ($dadodirecao == 3 || $dadodirecao == 4):
                        echo ', com duas ';
                        if ($tiposala <= 4) {echo 'portas';} else {echo 'passagens';}
                        $quantidadeportas = 2;
                        break;
                    case ($dadodirecao == 5 || $dadodirecao == 6 || $dadodirecao == 7):
                        echo ', com três ';
                        if ($tiposala <= 4) {echo 'portas';} else {echo 'passagens';}
                        $quantidadeportas = 3;
                        break;
                    case ($dadodirecao == 8 || $dadodirecao == 9):
                        echo ', com quatro ';
                        if ($tiposala <= 4) {echo 'portas';} else {echo 'passagens';}
                        $quantidadeportas = 4;
                        break;
                    case ($dadodirecao == 10 || $dadodirecao == 11 || $dadodirecao == 12):
                        echo ', com uma ';
                        if ($tiposala <= 4) {echo 'porta';} else {echo 'passagem';}
                        $quantidadeportas = 1;
                        break;
                    case ($dadodirecao == 13 || $dadodirecao == 14 || $dadodirecao == 15):
                        echo ', com uma ';
                        if ($tiposala <= 4) {echo 'porta';} else {echo 'passagem';}
                        $quantidadeportas = 1;
                        break;
                    case ($dadodirecao == 16 || $dadodirecao == 17):    
                    case ($dadodirecao == 18 || $dadodirecao == 19):
                        switch ($quantidadeportas2){
                            case 1:
                                echo ', com uma ';
                                if ($tiposala <= 4) {echo 'porta';} else {echo 'passagem';}
                                $quantidadeportas = 1;
                                break;
                            case 2:
                                echo ', com duas ';
                                if ($tiposala <= 4) {echo 'portas';} else {echo 'passagens';}
                                $quantidadeportas = 2;
                                break;
                            case 3:
                                echo ', com três ';
                                if ($tiposala <= 4) {echo 'portas';} else {echo 'passagens';}
                                $quantidadeportas = 3;
                                break;
                            case 4:
                                echo ', com quatro ';
                                if ($tiposala <= 4) {echo 'portas';} else {echo 'passagens';}
                                $quantidadeportas = 4;
                                break;
                        }
                    case ($dadodirecao == 20):
                        echo ', com uma ';
                        if ($tiposala > 4) {echo 'porta';} else {echo 'passagem';}
                        $quantidadeportas = 1;
                        break;
                }
            }

            // Checa se há mais de uma porta, para começar a listar.
            // Se não houver, apenas diz a primeira.
            if ($quantidadeportas > 1) {
                echo ', '; //portas/passagens
            }

            //localização de cada porta/passagem
            for ($i = 1;$i <= $quantidadeportas; $i++){
                $dadodirecao = rand(1,20);
                switch (true){
                        case ($dadodirecao == 1 || $dadodirecao == 2): //passa direto pro 4.
                        //fiz de dois em dois pois fica mais fácil de ler que uma linha
                        //muito longa.
                        case ($dadodirecao == 3 || $dadodirecao == 4): 
                            if ($i == $quantidadeportas && $i != 1) {echo 'e ';}
                            // se for a ultima porta, coloca um 'e' antes do 'uma'.
                            if ($quantidadeportas > 1) {echo 'uma';}
                            // se tiver mais de uma porta, coloca 'uma' antes
                            echo ' na parede à esquerda da entrada';
                            if ($i == $quantidadeportas) {echo '.';} else {echo ', ';}
                            // se tiver mais portas, usar virgula, se não, colocar um ponto.
                            break;
                        case ($dadodirecao == 5 || $dadodirecao == 6 || $dadodirecao == 7): //passa direto pro 12.
                        case ($dadodirecao == 8 || $dadodirecao == 9 || $dadodirecao == 10):
                        case ($dadodirecao == 11 || $dadodirecao == 12):
                            if ($i == $quantidadeportas && $i != 1) {echo 'e ';}
                            if ($quantidadeportas > 1) {echo 'uma';}
                            echo ' na parede oposta à entrada';
                            if ($i == $quantidadeportas) {echo '.';} else {echo ', ';}
                            break;
                        case ($dadodirecao == 13 || $dadodirecao == 14): //passa direto pro 16.
                        case ($dadodirecao == 15 || $dadodirecao == 16):
                            if ($i == $quantidadeportas && $i != 1) {echo 'e ';}
                            if ($quantidadeportas > 1) {echo 'uma';}
                            echo ' na parede à direita da entrada';
                            if ($i == $quantidadeportas) {echo '.';} else {echo ', ';}
                            break;    
                        case ($dadodirecao == 17 || $dadodirecao == 18): //passa direto pro 20.
                        case ($dadodirecao == 19 || $dadodirecao == 20):
                            if ($i == $quantidadeportas && $i != 1) {echo 'e ';}
                            if ($quantidadeportas > 1) {echo 'uma';}
                            echo ' na mesma parede que a entrada';
                            if ($i == $quantidadeportas) {echo '.';} else {echo ', ';}
                            break;
                }
            }

            echo '<br>';
            //gera o que há dentro da sala.
            switch (true){
                case ($dadoconteudo == 1 || $dadoconteudo == 2):
                case ($dadoconteudo == 3 || $dadoconteudo == 4): 
                case ($dadoconteudo == 5 || $dadoconteudo == 6):
                case ($dadoconteudo == 7):
                    echo 'Aparentemente não há nada.';
                    break;
                case ($dadoconteudo == 8 || $dadoconteudo == 9):
                case ($dadoconteudo == 10 || $dadoconteudo == 11):
                    echo 'Cuidado! Há monstros na sala.';
                    break;
                case ($dadoconteudo == 12 || $dadoconteudo == 13): //passa direto pro 16.
                case ($dadoconteudo == 14 || $dadoconteudo == 15):
                case ($dadoconteudo == 17 || $dadoconteudo == 16);
                    echo 'Cuidado! Há monstros na sala. Eles carregam tesouro.';
                    break;
                case ($dadoconteudo == 18);
                    echo 'Há uma escadaria na sala.';
                    break;
                case ($dadoconteudo == 19):
                    echo 'Cuidado! Há uma armadilha na sala.';
                    break;
                case ($dadoconteudo == 20);
                    echo 'Há tesouro na sala.';
                    break;
            }
        ?>
    </div>
</main>

<footer> 
    <a href="..\index.html" id="voltar"> &lt;- Voltar</a>
    <div id="nomesecao"> Gerador de Masmorras.</div>
</footer>


    </body>
</html>
