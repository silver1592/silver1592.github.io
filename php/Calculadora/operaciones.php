<?php
$pila = "";
function operacion($cad)
{
    $pila = $cad;
    echo realizaPosfija();
}

function realizaPosfija()
{
    var op;
    var num1;
    var num2;
    var res;

    if($pila.length>1)
    {
        $op = $pila.pop();
        if(esNumero($op))
            return "ERROR";

        $num1 = buscaNum();
        $num2 = buscaNum();

        if($num1=="ERROR" || $num2=="ERROR")
            return "ERROR";

        $num1 = parseInt($num1);
        $num2 = parseInt($num2);

        if($op=='+')
            $res = (num1+num2).toString();
        else if ($op == '-')
            $res = (num2-num1).toString();
        else if ($op == '*')
            $res = (num2*num1).toString();
        else
            $res = (num2/num1).toString();

        return res;
    }

    return pila[0];
}

function esNumero(caracter)
{
    if(caracter != '+' && caracter != '-' && caracter != '*' && caracter != '/' && caracter!= undefined)
        return true;
    else
        return false;
}

function buscaNum()
{
    var num1;

    num1 = pila.pop();
    if(!esNumero(num1))
    {
        pila.push(num1);
        num1 = realizaPosfija(pila);
    }
    
    if(num1 == "ERROR")
        return num1;

    return num1;
}

?>