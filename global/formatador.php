<?php

function formatador($valor, $mascara){

    $valorFormatado = "";
    $k = 0;

    for($i = 0; $i <= strlen($mascara)-1; $i++){

        if ($mascara[$i] == "#"){

            if(isset($valor[$k])) $valorFormatado .= $valor[$k++];

        }else{

            if(isset($mascara[$i])) $valorFormatado .= $mascara[$i];
        
        }
        
    }

    return $valorFormatado;

}