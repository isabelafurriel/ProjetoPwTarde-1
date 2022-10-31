<?php
$titulo = "Novo Usuário";
include "./cabecalho.php";

include "./conexao.php";
$query = "Select id, nome, login, ativo from usuarios";
$resultado = mysqli_query($conexao, $query);

?>
<div class="card mt-4 mb-4">
    <div class="card-header bg-primary text-white">Usuários</div>
    <div class="card-body">
        <div class="row">
            <div class="col-2">
                <a href="./usuariosCreate.php" class="btn btn-success" type="button">Novo usuario</a>
            </div>
            <div class="col-2">
                <select name="opcao" class="form-control">
                    <option selected="selected" value="0">Todos</option>
                    <option value="1">Por Nome</option>
                    <option value="2">Por Código</option>
                </select>
            </div>
            <div class="col-4">
                <input type="text" class="form-control" name="textoPesquisado" />
            </div>
            <div class="col-2">
                <button class="btn btn-primary">Pesquisar</button>
            </div>
        </div>
    </div>
</div>
<?php

if (isset($_GET["sucesso"]) && !empty($_GET["sucesso"])) {
?>
    <div class="alert alert-success">
        <?php echo $_GET["sucesso"] ?>
    </div>
<?php




}

?>
<?php

if (isset($_GET["erro"]) && !empty($_GET["erro"])) {
?>
    <div class="alert alert-danger">
        <?php echo $_GET["erro"] ?>
    </div>
<?php




}

?>



<table class="table">
    <thead>
        <tr>
            <td>Id</td>
            <td>Nome</td>
            <td>Login</td>
            <td>Ativo</td>
            <td>Editar</td>
            <td>Excluir</td>
        </tr>
    </thead>
    <tbody>
        <?php
        while ($linha = mysqli_fetch_array($resultado)) {
        ?>
            <tr>
                <td><?php echo $linha["id"]; ?></td>
                <td><?php echo $linha["nome"]; ?></td>
                <td><?php echo $linha["login"]; ?></td>
                <td>
                    <?php
                    if ($linha["ativo"] == 1) {
                    ?>
                        <input type="checkbox" checked readonly />
                    <?php
                    } else {
                    ?>
                        <input type="checkbox" disabled />
                    <?php
                    }
                    ?>
                </td>

                <td>
                    <a href="./usuarioEditar.php?id=<?php echo $linha["id"]; ?>" class="btn btn-warning">
                        Editar
                    </a>
                    
                    </a>
                </td>
                
                <td>
                <a href="./usuariosDelete.php?id=<?php echo $linha["id"]; ?>" class="btn btn-danger">
                        Excluir
                </td>
            <?php

        }
            ?>
    </tbody>


</table>