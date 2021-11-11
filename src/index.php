<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Alura Composer</title>
</head>
<body>
    <?php

        require_once '../vendor/autoload.php';

        /*
        Teste::metodo();
        Teste2::metodo();
        exit();
        */

        use Alura\BuscadorDeCurso\Buscador;
        use GuzzleHttp\Client;
        use Symfony\Component\DomCrawler\Crawler;

        $cliente = new Client(['base_uri' => 'https://www.alura.com.br/']); // da para utilizar qualquer site
        $crawler = new Crawler();

        $buscador = new Buscador($cliente, $crawler);
        $cursos = $buscador->buscar('/cursos-online-programacao/php');

        foreach ($cursos as $curso) {
            echo exibeMensagem($curso);
        }

    ?>

</body>
</html>