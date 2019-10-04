<html>
    <head>
        <title>Listagem Web 2</title>
    </head>
    <body>
        <h1>Listagem de Pastas Criadas</h1>
        <br>
        <?php
            # VARIAVEL PARA DIRECIONAR O DIRETORIO PARA ONDE ESTÁ OS ARQUIVOS A SEREM LISTADOS.
            $pasta = 'arquivos/';
            $abrir = ($_GET['dir'] != '' ? $_GET['dir'] : $pasta);
            $opendir = dir($abrir);
            #VARIAVEIS PARA VOLTAR DE PAGINA
            $voltar = strrpos(substr($abrir,0,-1),'/');
            $voltardir = substr($abrir,0,$voltar+1);

            # INICIA A LISTAGEM ATRAVÉS DE UMA ESTRUTURA DE REPETIÇÃO PARA LISTAR OS ARQUIVOS.
            while($arquivo = $opendir -> read()):
                if($arquivo != '.' && $arquivo != '..'){
                    if(is_dir($abrir.$arquivo)){
                        echo $arquivo.'=';
                        echo '<a href="listagem.php?dir='.$abrir.$arquivo.'/">Abrir</a></a><br><br>';
                    }else{
                        echo $arquivo.'=';
                        echo '<a href="'.$abrir.$arquivo.'">Ver txt</a></a><br><br>';
                    }
                }
                endwhile;
            # FUNÇÃO PARA VOLTAR DE PAGINA
            if($abrir != $pasta){
                echo '<a href="listagem.php?dir='.$voltardir.'">Voltar</a>';
            }
            # TERMINAR A BUSCA AOS ARQUIVOS.
            $opendir -> close();
        ?>
    </body>
</html>