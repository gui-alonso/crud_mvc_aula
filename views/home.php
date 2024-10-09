<a href="<?php echo BASE_URL; ?>contatos/add">[ ADICIONAR ]</a>
<table border="1" width="100%">
	<tr>
		<th>ID</th>
		<th>NOME</th>
		<th>E-MAIL</th>
		<th>AÇÕES</th>
	</tr>
	<?php foreach($lista as $item): ?>
		<tr>
			<th><?php echo $item['id'];?></th>
			<th><?php echo $item['nome'];?></th>
			<th><?php echo $item['email'];?></th>
			<th>
                <a href="<?= BASE_URL; ?>contatos/edit/<?php echo $item['id'];?>">[ EDITAR ]</a>
                <a href="<?= BASE_URL; ?>contatos/del/<?php echo $item['id'];?>">[ EXCLUIR ]</a>
			</th>
		</tr>

	<?php endforeach; ?>
</table>