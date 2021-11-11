<?php

namespace Alura\BuscadorDeCurso;

class Buscador
{

    private $httpCliente;
    private $crawler;

    public function __construct($httpCliente, $crawler)
    {
        $this->httpCliente = $httpCliente;
        $this->crawler = $crawler;
    }
    /**
     * @author André
     * @param string $url traz a url secundaria, EX: { siteexemplo.com.br/ } { $url }
     * @return array
     */
    public function buscar($url)
    {

        $resposta = $this->httpCliente->request('GET', $url);

        $html = $resposta->getBody();
        $this->crawler->addHtmlContent($html);

        $elementosCursos = $this->crawler->filter('span.card-curso__nome');
        $cursos = [];

        foreach ($elementosCursos as $elemento) {
            $cursos[] = $elemento->textContent;
        }
        return $cursos;
    }
}
