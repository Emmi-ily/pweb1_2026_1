<?php
include '../header.php';
include '../database/db.class.php';

$db = new db('Usuario');

if (!empty($_GET['id'])){
    $db->destroy($_GET['id']);
}

 if (!empty($_POST)) {
   //var_dump($_GET);
   //exit;
   //$db->store($_POST);
    $dados = $db->search($_POST);
   } else {
    $dados = $db->all();
   }
 ?>

    <div class="row">
        <form action="UsuarioList.php" method="post">
            <div class="row">
                <h3>Listagem de Usuário</h3>
                <div class="col-2">
                    <label for="nome">TIPO</label>
                    <select name="tipo" class="form-select">
                        <option value="nome">Nome</option>
                        <option value="telefone">Telefone</option>
                        <option value="email">Email</option>
                        
                    </select>
                    <input type="text" name="nome" class="form-control" value="<?php echo getFormValue('nome'); ?>">
                </div>

                <div class="col-5">
                    <label for="valor">Valor</label>
                    <input type="text" name="valor" class="form-control" placeholder="Pesquisar...">
                </div>
                <div class="col-5">
                    <button type="submit" class="btn btn-primary">Buscar</button>
                    <a href="./UsuarioForm.php" class="btn btn-success"> Novo </a>
                </div>
            </div>
        </form>

        
    </div>

 <div class="row mt-4">
    <table class="table table-striped table-hover">
        <thead>
            <tr>
            <th scope="col">#</th>
            <th scope="col">Nome</th>
            <th scope="col">Telefone</th>
            <th scope="col">E-mail</th>
            <th scope="col">Ação</th>

            </tr>
        </thead>
        <tbody>
            <?php
                foreach($dados as $item){
                    echo "
                    <th scope='row'>$item->id</th>
                    <td>$item->nome</td>
                    <td>$item->telefone</td>
                    <td>$item->email</td>

                    <td>
                    <a class='btn btn-warning' title='Editar'
                        href='./UsuarioForm.php?id=$item->id'>Editar</a></td>

                    <td>
                    <a class='btn btn-danger' title='Excluir'
                        onclick='return confirm(\"Deseja Excluir?\")' 
                        href='./UsuarioList.php?id=$item->id'>Deletar</a></td>

                    </tr>";
                }
            ?>
        </tbody>
    </table>
 </div>



<?php
include '../footer.php';
?>