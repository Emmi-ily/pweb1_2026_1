<?php
include '../header.php';
?>

<div class="col">
    <?php
        echo"<p>" . $_POST['nome'] . "</p>";
        echo"<p>" . $_POST['email'] . "</p>";
        echo"<p>" . $_POST['telefone'] . "</p>";
    ?>
</div>

<?php
include '../footer.php';
?>