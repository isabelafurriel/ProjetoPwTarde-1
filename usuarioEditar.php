<?php
$titulo = "Editar Usuário";
include "./cabecalho.php";
include "./conexao.php";
if (isset($_POST) && !empty($_POST)) {

    $id = $_POST["id"];
    $nome = $_POST["nome"];
    $login = $_POST["login"];
    if (isset($_POST["ativo"]) && $_POST["ativo"] = "on") {
        $ativo = 1;
    } else {
        $ativo = 0;
    }
    $query = "update usuarios set nome = '$nome', login = '$login', ativo = '$ativo' where id = '$id'";
    $resultado = mysqli_query($conexao,$query);

    if ($resultado) {
        header("Location:./usuarios.php?sucesso=Editado com sucesso");
        exit();
    } else {
?>
        <div class="alert alert-danger">Ocorreu um erro ao editar</div>
<?php
    }
}


if (isset($_GET["id"]) && !empty($_GET["id"])) {

    $query = "select id,nome, login,ativo from usuarios where id=" . $_GET["id"];
    $resultado = mysqli_query($conexao, $query);
    $dados = mysqli_fetch_array($resultado);

    // echo "<pre>";
    // print_r($dados);
    // echo "</pre>";
    $id = $dados["id"];
    $nome = $dados["nome"];
    $login = $dados["login"];
    $ativo = $dados["ativo"];
}
?>
<div class="row">
    <div class="offset-4 col-md-4">
        <h2>Editar Usuários</h2>
        <form action="usuarioEditar.php?id=<?php echo $id ?>" method="post">
            <div class="form-group">
                <label>ID</label>
                <input class="form-control" type="text" name="id" readonly value="<?php echo $id ?>">

            </div>

            <div class="form-group">
                <label>Nome</label>
                <input class="form-control" type="text" name="nome" value="<?php echo $nome ?>">

            </div>
            <div class="form-group">
                <label>Login</label>
                <input class="form-control" type="text" name="login" value="<?php echo $login ?>">

            </div>
            <div class="form-group">
                <label>Ativo</label>
                <?php
                if ($ativo == 1) {
                ?>
                    <input class="form-check" type="checkbox" name="ativo" checked>
                <?php
                } else {
                ?>
                    <input class="form-check" type="checkbox" name="ativo">
                <?php

                }
                ?>
            </div>
            <div class="form-group">
                <button type="submit" class="btn btn-success"> Salvar</button>
            </div>
        </form>

    </div>

</div>




<?php include "rodape.php"; ?>