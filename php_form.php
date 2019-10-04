<?php
    # CRIAÇÃO DE UM NOVO ARQUIVO, CONFERE SE NÃO EXISTE PARA CRIAR.
    if(isset($_POST['nome']) && !empty($_POST['nome'])){
        $codigo = $_POST["codigo"];
        $nome = $_POST["nome"];
        $texto = $_POST["texto"];
    }
    # SE EXISTIR SOBRESCREVERÁ SOBRE O QUE EXISTIR.
    if(file_exists($codigo)){
        $arq= fopen("c:/xampp/htdocs/trabparcial/arquivos/$codigo/$nome.txt",'w');# ABRE E ESCREVE DENTRO DO ARQUIVO .TXT
        echo "Sobrescrito";
        fwrite($arq,$texto);
        fclose($arq);
    }
    # SE NÃO EXISTIR, CRIARÁ UM NOVO ARQUIVO.
    else{
        mkdir("c:/xampp/htdocs/trabparcial/arquivos/$codigo", 0700, true ); # CRIA UM DIRETORIO NOVO

        $arq= fopen("c:/xampp/htdocs/trabparcial/arquivos/$codigo/$nome.txt",'w'); # ABRE E ESCREVE DENTRO DO NOVO ARQUIVO .TXT
        echo "Criado";
        fwrite($arq, $texto);
        fclose($arq);
    }
?>

