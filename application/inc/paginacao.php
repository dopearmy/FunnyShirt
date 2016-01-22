<?php
/**
 * Paginação
 *
 * Cria uma paginação simples.
 *
 * @param int $total_artigos Número total de artigos da sua consulta
 * @param int $artigos_por_pagina Número de artigos a serem exibidos nas páginas
 * @param int $offset Número de páginas a serem exibidas para o usuário
 *
 * @return string A paginação montada
 */
function paginacao( 
    $total_artigos = 0, 
    $artigos_por_pagina = 10, 
    $offset = 5
) {

    /*** Precisamos dos parâmetros aqui dentro da função ***/
    // Obtém os parâmetros
    global $parametros;
    
    /*** Vamos precisar de uma variável contendo a URL da home do site ***/
    // A URL da nossa home
    $url_site = 'http://127.0.0.1/cursos/php/paginacao';
    
    // Obtém o número total de página
    $numero_de_paginas = floor( $total_artigos / $artigos_por_pagina );
    
    // Obtém a página atual
    $pagina_atual = 1;
    
    /*** GET alterado ***/
    // Atualiza a página atual se tiver o parâmetro pagina/valor
    if ( 
        ( ! empty( $parametros[0] ) && $parametros[0] == 'pagina' ) &&
        ( ! empty( $parametros[1] ) )
    ) {
        $pagina_atual = (int)$parametros[1];
    }
    
    // Vamos preencher essa variável com a paginação
    $paginas = null;
    
    /*** URL alterada ***/
    // Primeira página
    $paginas .= " <a href='$url_site/pagina/0'>Home</a> ";
    
    // Faz o loop da paginação
    // $pagina_atual - 1 da a possibilidade do usuário voltar
    for ( $i = ( $pagina_atual - 1 ); $i < ( $pagina_atual - 1 ) + $offset; $i++ ) {
        
        // Eliminamos a primeira página (que seria a home do site)
        if ( $i < $numero_de_paginas && $i > 0 ) {
            // A página atual
            $página = $i;
            
            // O estilo da página atual
            $estilo = null;
            
            // Verifica qual dos números é a página atual
            // E cria um estilo extremamente simples para diferenciar
            if ( $i == @$parametros[1] ) {
                $estilo = ' style="color:red;" ';
            }
            
            /*** URL alterada ***/
            // Inclui os links na variável $paginas
            $paginas .= " <a $estilo href='$url_site/pagina/$página'>$página</a> ";
        }
        
    } // for
    
    /*** URL alterada ***/
    $paginas .= " <a href='$url_site/pagina/$numero_de_paginas'>Última</a> ";
    
    // Retorna o que foi criado
    return $paginas;
    
}
