<?php

function simulation()
{
    if(isset($_POST['capital'], $_POST['rate'], $_POST['monthNumber']))
    {
        $capital = $_POST['capital'];
        $rate = $_POST['rate'];
        $monthNumber = $_POST['monthNumber'];
    }
    else
        return compute(10000, 1, 12);

    $montlyCost = compute($capital, $rate, $monthNumber);
    $data = date("d/m/Y").";".$capital." €;".$rate." %;".$monthNumber.";".$montlyCost." €/mois\n";
    put_history($data);
    return $montlyCost;
}

function compute($capital, $rate, $monthNumber)
{
    if ($rate == 0)
        return round(($capital / $monthNumber), 2);
    return round(($capital * ($rate / 100) / 12) / (1 - pow((1 + ($rate / 100) / 12), -$monthNumber)), 2);
}
?>