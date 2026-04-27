<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php
        $nome = "Maria";
        $idade = 8;
        echo "nome: $nome - idade: $idade";
        echo "<br>";
        if($idade>=18){
            echo "De maior";
        } else{
            echo "De menor";
        }


        //print_r($notas);
        $notas = [5, 7, 10, 9];
        echo "<br>"; //quebrar linha
        for($i = 0; $i < count (value: $notas); $i++){
            echo $notas[$i] . "<br>";
        }
        echo "<br>"; 
        foreach($notas as $item){ //for dinamico, ele identifica sozinho
            echo $item . "<br>";
        }


        $nomes = ["Jackson Five", "Maria Brancaleone", "Aitui"];
        echo "<br>";
        for($i = 0; $i < count (value: $nomes); $i++){
            echo $nomes[$i] . "<br>";
        }
        echo "<br>"; 
        foreach($nomes as $item){ //for dinamico, ele identifica sozinho
            echo $item . "<br>";
        }


        echo "<br>";
        $carro = ['modelo' => "Mustang", 'cor' => "Branco", 'ano' => 2026];
        echo $carro['modelo'] . "-" . $carro['cor'];
    ?>

    <p> Meu site <?=$carro['modelo'] . " - Ano: " . $carro['ano'] ?> </p> 
    
    <?php
    include "./aula02.php";
    ?>

</body>
</html>