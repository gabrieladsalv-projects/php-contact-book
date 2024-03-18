<?php
    include_once("templates/header.php");
?>
    <div class="container">
    <?php include_once("templates/backbtn.html");?>
        <h1 id="main-title">Adicionar Contato</h1>
        <form class="add-contato-form" action="<?= $BASE_URL ?>config/process.php" method="POST">
            <div class="form-group">
                <input type="hidden" name="type" value="create">
                <label for="nome">Nome do Contato</label>
                <input type="text" class="form-control" id="nome" name="nome" placeholder="Digite o Nome" required>
                <label for="phone">Telefone do Contato</label>
                <input type="text" class="form-control" id="phone" name="phone" placeholder="Digite o Telefone" required>
                <label for="observations">Observações sobre o Contato</label>
                <textarea class="form-control" id="observations" name="observations" placeholder="Insira as Observações"></textarea>
                <button type="submit" class="btn btn-primary">Adicionar Contato</button>
                
    </div>
<?php
    include_once("templates/footer.php");
?>