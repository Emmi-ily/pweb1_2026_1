<?php
include './header.php';
include './database/db.class.php';

$db = new db('usuario');
$success = ' ';
$actionError = ' ';
$errors = [];
$data = ' ';

if(!empty($_GET['id'])){
   $data = $db->find(id: $_GET['id']);
}

 if (!empty($_POST)) {
     $data = (object) $_POST;
   //var_dump($_GET);
   //exit;

   try{

      if(empty($_POST['email'])){
         $errors[] = "<li>O email é pbrgatório</li>";
      }
      if(empty($_POST['senha'])){
         $errors[] = "<li>A senha é pbrgatório</li>";

         if(strlen($_POST['senha']< 3)){
            $errors[]= "<li>A senha deve ter no minimo 3 caracteres</li>";
         }
      }


      if(empty($errors)){

      $dado = [
        'nome' => $_POST['nome'],
        'email' => $_POST['email'],
        'telefone' => $_POST['telefone'] ? $_POST['telefone']: "",
        'senha' => password_hash($_POST['senha'], PASSWORD_DEFAULT), //vai criptografar a senha no banco de dados
      ]
      
         if (empty($_POST['id'])){
            $db->store($_POST);
            $success = "usuario cadastrado com sucesso"; 
         }
         
         redirect('./login.php');  
      }
      
   }
   catch (Exception $e){
      $actionError = $e->getMessage();
   }
   catch (Exception $e){
      $actionError = $e->getMessage();
   }
   
 }
 ?>

   <div class="row">

   <?php actionMessage($success, $actionError) ?>
   <?php showValidationError($errors)?>
      
      <form action="UsuarioForm.php" method="post">
         <h3>Registrar usuario</h3>

         <div class="col-6">
            <label for="email">E-mail</label>
            <input type="text" name="email" class="form-control" value="<?php echo getFormValue($data, 'email'); ?>">
         </div>

         <div class="col-6">
            <label for="senha">Senha</label>
            <input type="password" name="senha" class="form-control" value="<?php echo getFormValue($data, 'senha'); ?>">
         </div>


         <div class="col mt-2">
               <button type="submit" class="btn btn-success">Logar</button>
               não tem uma conta? <a href="./registrar.php" class="btn btn-primary"> crie aqui </a>
         </div>


      </form>

   </div>


<?php
include './footer.php';
?>