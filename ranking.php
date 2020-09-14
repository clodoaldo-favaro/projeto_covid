<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="bootstrap-4.5.2-dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="styles.css">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,400;0,500;0,700;1,400;1,500;1,700&display=swap" rel="stylesheet">
    <title>COVID-19</title>
</head>
<body>
    <h1>10 cidades com maior número de casos</h1>
    <div class="resultadoPesquisaContainer">
        <table class="table">
            <thead>
                <tr>
                    <th>Posição</th>
                    <th>Cidade</th>
                    <th>Qtde. casos</th>
                </tr>
            </thead>
            <tbody>
            
    
            <?php
                //phpinfo();
                require_once 'dbconfig.php';
                $dsn = "pgsql:host=$host;port=5432;dbname=$db;user=$username;password=$password";

                try{
                    // create a PostgreSQL database connection
                    $conn = new PDO($dsn);
                    
                    // display a message if connected to the PostgreSQL successfully
                    if($conn){
                        //echo "Connected to the <strong>$db</strong> database successfully!";
                        $stmt = $conn->prepare('SELECT c.cidade, c.casos FROM casos c ORDER BY c.casos DESC LIMIT 10');
                        $stmt->execute();
                        $result = $stmt->fetchAll();
                        //print_r($result);
                        $counter = 1;
                        foreach ($result as $row) {
                            echo '<tr>';
                            echo '<td>' . $counter . '</td>';
                            echo '<td>' . $row['cidade'] . '</td>';
                            echo '<td>' . $row['casos'] . '</td>';
                            echo '</tr>';
                            $counter++;
                        }

                        
                    }
                }catch (PDOException $e){
                    // report error message
                    echo $e->getMessage();
                }  
                ?>
            </tbody>
        </table>
    </div>
    <footer class="footer">
        <div class="container">
            O CSS é a prova que Deus nos odeia e quer que sejamos miseráveis.
        </div>
    </footer>

    <script src="scripts/jquery-3.5.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script src="bootstrap-4.5.2-dist/js/bootstrap.min.js"></script>
</body>
</html>