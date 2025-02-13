<?php

function produit(){
    $argsNum = func_num_args();
    $num = 1;
    for($i=0; $i<$argsNum; $i++){
        $num *= func_get_arg($i);
    }
    return $num;
};

echo produit(2,4,5);
