<!DOCTYPE html>
<html>
<head>
    <title>Exemplo de Leitura de CSV com Pesquisa</title>
</head>
<body>

<h1>Pesquisar</h1>
<form method="get">
    <input type="text" name="search" placeholder="Pesquisar por nome do ator ou do filme">
    <input type="submit" value="Pesquisar">
</form>

<table border="1">

    <?php
    $csvFile = 'the_oscar_award.csv'; 
 
    $search = isset($_GET['search']) ? $_GET['search'] : '';

    if (($handle = fopen($csvFile, 'r')) !== FALSE) {
        while (($data = fgetcsv($handle, 1000, ',')) !== FALSE) 
        {
            $actorName = $data[4];
            $movieName = $data[5];

            if (empty($search) || stripos($actorName, $search) !== false || stripos($movieName, $search) !== false) 
            {
                echo '<tr>';
                foreach ($data as $cell) 
                {
                    echo '<td>' . htmlspecialchars($cell) . '</td>';
                }
                echo '</tr>';
            }
        }
        fclose($handle);
    }
    ?>
</table>

</body>
</html>

/*file_put_contents*/