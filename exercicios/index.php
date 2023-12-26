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

<h1>Adicionar Novo Filme</h1>
<form method="post">
    <label for="actor">Nome do Ator:</label>
    <input type="text" name="actor" required><br>
    <label for="movie">Nome do Filme:</label>
    <input type="text" name="movie" required><br>
    <label for="movie">Ano do Filme:</label>
    <input type="text" name="year_film" required><br>
    <label for="movie">Ano da Cerimonia:</label>
    <input type="text" name="year_ceremony" required><br>
    <label for="movie">categoria:</label>
    <input type="text" name="movie" required><br>
    <label for="movie">Vencedor:</label>
    <input type="text" name="movie" required><br>
    <input type="submit" value="Adicionar Filme"><br>
</form>

<table border="1">
    <?php
    $csvFile = 'the_oscar_award.csv'; 

    $search = isset($_GET['search']) ? $_GET['search'] : '';

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $actor = $_POST['actor'];
        $movie = $_POST['movie'];
        $year_film = $_POST['year_movie'];
        $year_ceremony = $_POST['year_ceremony'];
        $category = $_POST['category'];
        $winner = $_POST['winner'];
        // Crie uma string com os dados do novo filme
        $newFilm = "$year_film,$year_ceremony,$category,$movie,$actor,$winner\n";
        // Adicione o novo filme ao arquivo CSV
        file_put_contents($csvFile, $newFilm, FILE_APPEND);
    }

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
