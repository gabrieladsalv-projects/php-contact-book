<?php
    include_once("templates/header.php");
?>
    <div class="container">
    <?php include_once("templates/backbtn.html");?>
        <h1 id="main-title">Editar Contato</h1>
        <form class="add-contato-form" action="<?= $BASE_URL ?>config/process.php" method="POST">
            <div class="form-group">
                <input type="hidden" name="edit" value="create">
                <input type="hidden" name="id" value="<?= $contact['id']?>">
                <label for="nome">Nome do Contato</label>
                <input type="text" class="form-control" id="nome" name="nome" placeholder="Digite o Nome" value="<?= $contact['nome']?>" required>
                <label for="phone">Telefone do Contato</label>
                <input type="text" class="form-control" id="phone" name="phone" placeholder="Digite o Telefone" value="<?= $contact['phone']?>" required>
                <label for="observations">Observações sobre o Contato</label>
                <textarea class="form-control" id="observations" name="observations" value="<?= $contact['observations']?>" placeholder="Insira as Observações"></textarea>
                <button type="submit" class="btn btn-primary">Atualizar</button>
                
    </div>
<?php
    include_once("templates/footer.php");
?>