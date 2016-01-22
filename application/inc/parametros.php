<?php
/**
 * Obtém parâmetros de $_GET['p']
 *
 * Obtém os parâmetros de $_GET['p'] e retorna um array.
 * A URL deverá ter o seguinte formato:
 * http://www.example.com/parametro1/valor/parametro2/valor/etc...
 *
 * @return array Os parâmetros
 */
function obter_parametros () {
    
    $p = array();
    
    // Verifica se o parâmetro path foi enviado
    if ( isset( $_GET['p'] ) ) {

        // Captura o valor de $_GET['p']
        $p = $_GET['p'];
        
        // Limpa os dados
        $p = rtrim($p, '/');
        $p = filter_var($p, FILTER_SANITIZE_URL);
        
        // Cria um array de parâmetros
        $p = explode('/', $p);
    }
    
    return $p;
}


