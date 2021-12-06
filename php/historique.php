<?php 

function read_history() {
    $file="../assets/historique.csv";
    $fp = fopen($file, "r");

    for($i=0;$i<10;$i++){
        $ligne = fgetcsv($fp,1024,";");
        if($ligne != null){
            echo "<tr>";
            foreach ($ligne as $cell)
                echo "<td>$cell</td>";
            echo "</tr>";
        }
    }
    
    fclose($fp);
}

function put_history($data) {
    $file = file_get_contents("../assets/historique.csv");
    file_put_contents("../assets/historique.csv", $data.$file);
}