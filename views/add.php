<h3>ADICIONAR</h3>

<?php if ($error == 'exist'): ?>
    <div style="background-color: #FF0000; color: #FFFFFF" class="aviso">Esse e-mail já existe. Favor, colocar outro email.</div>
<?php endif; ?>

<form method="post" action="<?php echo BASE_URL; ?>contatos/add_save">
    Nome<br/>
    <input type="text" name="nome" /><br/><br/>
    E-mail<br/>
    <input type="email" name="email" /><br/><br/>

    <input type="submit" value="Adicionar" />

</form>