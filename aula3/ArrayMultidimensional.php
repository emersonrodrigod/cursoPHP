<?php
$produtos = array(
    0 => array(
        'nome' => 'CocaCola',
        'preco' => 4.50
    ),
    1 => array(
        'nome' => 'Guarana',
        'preco' => 3.95
    ),
    2 => array(
        'nome' => 'Soda Limonada',
        'preco' => 2.50
    )
);
?>

<table border="1">
    <thead>
        <tr>
            <th>Codigo</th>
            <th>Nome</th>
            <th>Preco</th>
        </tr>
    </thead>
    <tbody>

        <?php
        for ($i = 0; $i < count($produtos); $i ++) {
            echo "<tr>";
            echo "<td>" . $i . "</td>";
            echo "<td>" . $produtos[$i]['nome'] . "</td>";
            echo "<td>" . $produtos[$i]['preco'] . "</td>";
            echo "</tr>";
        }
        ?>

    </tbody>
</table>


