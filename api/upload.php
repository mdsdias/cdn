<?php
    if (isset($_FILES['arquivo']['name']) && $_FILES['arquivo']['error'] == 0) {
        echo 'Você enviou o arquivo: <strong>' . $_FILES['arquivo']['name'] . '</strong><br />';
        echo 'Este arquivo é do tipo: <strong > ' . $_FILES['arquivo']['type'] . ' </strong ><br />';
        echo 'Temporáriamente foi salvo em: <strong>' . $_FILES['arquivo']['tmp_name'] . '</strong><br />';
        echo 'Seu tamanho é: <strong>' . $_FILES['arquivo']['size'] . '</strong> Bytes<br /><br />';

        $arquivo_tmp = $_FILES['arquivo']['tmp_name'];
        $nome = $_FILES['arquivo']['name'];

        $extensao = pathinfo($nome, PATHINFO_EXTENSION);

        $extensao = strtolower($extensao);

        if (strstr('.jpg;.jpeg;.gif;.png', $extensao)) {
            $novoNome = uniqid(time()) . '.' . $extensao;
            $destino = './imagens / ' . $novoNome;
        } elseif (strstr('.css;.scss', $extensao)) {
            $novoNome = uniqid(time()) . '.' . $extensao;
            $destino = './css / ' . $novoNome;
        } elseif (strstr('.js;.jsx;.ts;.tsx', $extensao)) {
            $novoNome = uniqid(time()) . '.' . $extensao;
            $destino = './jsts / ' . $novoNome;
        } elseif (strstr('.html;.html.j2;.htm', $extensao)) {
        $novoNome = uniqid(time()) . '.' . $extensao;
        $destino = './html / ' . $novoNome;
        }
        if (@move_uploaded_file($arquivo_tmp, $destino)) {
            echo 'Arquivo salvo com sucesso em : <strong>' . $destino . '</strong><br />';
            echo ' < img src = "' . $destino . '" />';
        } else
            echo 'Erro ao salvar o arquivo. Aparentemente você não tem permissão de escrita.<br />';
        if ($novoNome) {
            echo 'Arquvo <strong>'. $novoNome . '</strong> Criado!';
        }
    } else /* esse fecha o primeiro if */
    echo 'Não foi enviado nada';
