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


        //print_r($notas); (imprime os dados do vetor notas, é meio q um echo para vetores)
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

        //matriz
        $carros = [
            ['modelo' => "Mustang", 'cor' => "Branco", 'ano' => 2026], //vetor(unidimenssional) //quando chama o indice modelo, ele retorna mustang
            ['modelo' => "fusca", 'cor' => "azul", 'ano' => 1973],     // matriz (tem coluna e linha pra refernciar)
            ['modelo' => "brasilia", 'cor' => "amarela", 'ano' => 1969],
        ];

        echo $carros[0]['modelo'] . "-" . $carros[0]['cor'];
        echo "<br>";

        // para matriz
        foreach($carros as $indice => $carro) {
                echo $indice + 1;
                echo "modelo: " . $carro['modelo'] . "<br>" . "ano" . $carro['ano'];
                echo "<br>";
            }
    ?>

    <p> Meu site <?=$carro['modelo'] . " - Ano: " . $carro['ano'] ?> </p> 
    
    <?php
    include "./aula02.php";
    ?>

</body>
</html>