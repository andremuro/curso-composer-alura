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
        

        use Alura\BuscadorDeCurso\Buscador;
        use GuzzleHttp\Client;
        use Symfony\Component\DomCrawler\Crawler;

        TestClassMap::metodo(); 
        
        
        /**Por se tratar de uma funcão statica ela pode ser escrita dessa forma, que tem o mesmo efeito das duas linha comentadas abaixo.
        *$testClassMap = new TestClassMap();        
        *$testFuncao = $testClassMap->metodo();
        *É IMPORTANTE DESTACAR QUE A CADA ALTERAÇÃO NO CAMINHO DO AUTOLOADO É NECESSARIO RODAR O COMANDO COMPOSER DUMP-AUTOLOAD OU COMPOSER DUMPAUTOLOAD PARA ELE ATUALIZAR.
        */

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