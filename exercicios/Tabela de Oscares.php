<!DOCTYPE html>
<html>
<head>
    <title>Exemplo de Leitura de CSV</title>
</head>
<body>

<table border="1">


    <?php
        $csvFile = 'the_oscar_award.csv';

        if (($handle = fopen($csvFile, 'r')) !== FALSE) {
            while (($data = fgetcsv($handle, 1000, ',')) !== FALSE) {
                echo '<tr>';
                foreach ($data as $cell) {
                    echo '<td>' . htmlspecialchars($cell) . '</td>';
                }
                echo '</tr>';
            }
            fclose($handle);
        }
    ?>
</table>

</body>
</html>
