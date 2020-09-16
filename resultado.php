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
    
    <?php
        
        require_once 'dbconfig.php';
        $dsn = "pgsql:host=$host;port=5432;dbname=$db;user=$username;password=$password";

        if (isset($_POST['cidade'])) {
            
            try{
                // create a PostgreSQL database connection
                $conn = new PDO($dsn);
                
                // display a message if connected to the PostgreSQL successfully
                if($conn){
                    //echo "Connected to the <strong>$db</strong> database successfully!";
                    $stmt = $conn->prepare('SELECT casos, obitos, recuperados FROM casos WHERE cidade = :cidade');
                    $cidade = filter_input(INPUT_POST, 'cidade', FILTER_SANITIZE_STRING); // <-- filter your data first (see [Data Filtering](#data_filtering)), especially important for INSERT, UPDATE, etc.
                    $stmt->bindParam(':cidade', $cidade, PDO::PARAM_STR); // <-- Automatically sanitized for SQL by PDO
                    $stmt->execute();
                    $result = $stmt->fetch(PDO::FETCH_ASSOC);
                    
                    $casos = $result['casos'];
                    $obitos = $result['obitos'];
                    $recuperados = $result['recuperados'];
                    $taxaMortalidade = ($obitos / $casos) * 100;
                    $taxaRecuperados = ($recuperados/ $casos) * 100;
                    echo '<div class="resultadoPesquisaContainer">';
                    echo '<h1>Cidade:'  . $_POST['cidade'] . '</h1>';
                    echo '<h2>Casos confirmados: ' . $casos . '</h2>';
                    echo '<h2>Óbitos: ' . $obitos . '</h2>';
                    echo '<h2>Recuperados: ' . $recuperados . '</h2>';
                    echo '<h2>Taxa de mortalidade: ' . $taxaMortalidade . '%</h2>';
                    echo '<h2>Taxa de recuperados: ' . $taxaRecuperados . '%</h2>';
                    echo '</div>';

                }
               }catch (PDOException $e){
                // report error message
                echo $e->getMessage();
            }
          
        }
    ?>
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