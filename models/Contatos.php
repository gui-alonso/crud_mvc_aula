<?php
class Contatos extends model {

	// pegar todos os contatos do BD
	public function getAll(){
		// Inicializa um array vazio para armazenar os resultados
		$array = array();

		// Define a consulta SQL para selecionar todos os registros da tabela "contatos"
		$sql = "SELECT * FROM contatos";
		
		// Executa a consulta no banco de dados
		$sql = $this->db->query($sql);

		// Verifica se a consulta retornou algum resultado
		if($sql->rowCount() > 0){
			// Se houver resultados, armazena-os no array
			$array = $sql->fetchAll();
		}

		// Retorna o array com os resultados ou um array vazio caso não haja registros
		return $array;
	}

    public function get($id)
    {
        $array = array();

        $sql = "SELECT * FROM contatos WHERE id = :id";
        $sql = $this->db->prepare($sql);
        $sql->bindValue(":id", $id);
        $sql->execute();

        if($sql->rowCount() > 0){
            $array = $sql->fetch();
        }

        return $array;
    }

    public function add($nome, $email)
    {
        if ($this->emailExists($email) == false) {
            $sql = "INSERT INTO contatos (nome, email) VALUES (:nome, :email)";
            $sql = $this->db->prepare($sql);
            $sql->bindValue(':nome', $nome);
            $sql->bindValue(':email', $email);
            $sql->execute();

            return true;
        } else {
            return false;
        }
    }

    public function edit($nome, $id)
    {
        $sql = "UPDATE contatos SET nome = :nome WHERE id = :id";
        $sql = $this->db->prepare($sql);
        $sql->bindValue(":nome", $nome);
        $sql->bindValue(":id", $id);
        $sql->execute();
    }

    public function delete($id)
    {
        $sql = "DELETE FROM contatos WHERE id = :id";
        $sql = $this->db->prepare($sql);
        $sql->bindValue(':id', $id);
        $sql->execute();
    }

    private function emailExists($email)
    {
        $sql = "SELECT * FROM contatos WHERE email = :email";
        $sql = $this->db->prepare($sql);
        $sql->bindValue(":email", $email);
        $sql->execute();

        if($sql->rowCount() > 0){
            return true;
        } else{
            return false;
        }
    }

}