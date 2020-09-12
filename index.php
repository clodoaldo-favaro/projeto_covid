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
        
        if (isset($_POST)) {
            
            $connection = pg_connect("host=localhost port=5432 dbname=covid user=postgres password=postgres connect_timeout=5");
            
            if ($connection)  {
                print_r($connection);
                echo "Conectou";
            }
            else {
                echo "Fudeu";
            }
            

        }
    ?>

    <form action="" method="post">
        <div class="md-form mt-0 barraPesquisa">
            <input class="form-control" type="text" 
            placeholder="Informe a cidade" 
            name="cidade" id="cidade"
            value="<?php echo htmlspecialchars($_POST['cidade'] ?? '', ENT_QUOTES); ?>"
            aria-label="Search" required>
        </div>
        
        <div class="form-group resultadoPesquisa">
            <label for="resultadoPesquisa">Resultado da pesquisa</label>
            <textarea class="form-control" id="resultadoPesquisa" name="resultadoPesquisa" rows="10" readonly></textarea>
        </div>
    </form>

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