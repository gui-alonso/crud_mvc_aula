<h3>EDITAR</h3>

<form method="post" >
    Nome<br/>
    <input type="text" name="nome" value="<?= $info['nome']; ?>" /><br/><br/>
    E-mail<br/>
    <?php echo $info['email']; ?><br/><br/>

    <input type="submit" value="Salvar" />

</form>