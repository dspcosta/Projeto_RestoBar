
<?php include 'header.php'; ?>

<?php $prato = $_GET['prato'];

    $server = 'localhost';
    $user = 'root';
    $password = '';
    $db_name = 'restaurante';
    $port = '3306';

    $db_connect = new mysqli($server,$user,$password,$db_name,$port);
    mysqli_set_charset($db_connect, "utf8");

    if ($db_connect->connect_error) {
        echo 'Erro ao conectar ao Banco de Dados. ' .  $db_connect->connect_error;
    } else{

        $query = "SELECT * FROM `pratos` WHERE codigo = '$prato'";
        $result = $db_connect->query($query);
        

        while($row =  $result->fetch_assoc()){  ?>
            


           
        <div class="product-page small-11 large-12 columns no-padding small-centered">
            
            <div class="global-page-container">

                <div class="product-section">
                    <div class="product-info small-12 large-5 columns no-padding">
                        <h3><?php echo $row['nome']; ?></h3>
                        <h4><?php echo $row['categoria']; ?></h4>
                        <p><?php echo $row['descricao']; ?>   
                        </p>

                        <h5><b>Preço: </b>R$ <?php echo $row['preco']; ?></h5>
                        <h5><b>Calorias: </b><?php echo $row['calorias']; ?></h5> 
                    </div>

                    <div class="product-picture small-12 large-7 columns no-padding">
                        <img src="img/cardapio/camarao-alho.jpg" alt="camarao">
                    </div>

                </div>

                <div class="go-back small-12 columns no-padding">
                    <a href="cardapio.php"><< Voltar ao Cardápio</a>
                </div>

            </div>
        </div>
            
       <?php }

    }


        
    ?>
    
    <?php if ($row['nome'] == NULL) {
        echo '<h3 style="text-align:center">O PRATO SELECIONADO NAO FOI ENCONTRADO, VERIFIQUE!</h3>';
        ?>
         
        <div class="go-back small-12 columns no-padding">
                    <a href="cardapio.php"><< Voltar ao Cardápio</a>
                </div>

        <?php
    } ?>

<?php include 'footer.php'; ?>