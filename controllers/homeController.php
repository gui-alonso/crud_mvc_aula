<?php
class homeController extends controller {

	public function index() {
		// Inicializa um array vazio para armazenar os dados que serão passados para a view
		$dados = array();
	
		// Cria uma instância da classe "Contatos"
		$contatos = new Contatos();
	
		// Obtém todos os contatos usando o método getAll() e armazena no array 'dados' com a chave 'lista'
		$dados['lista'] = $contatos->getAll();
	
		// Carrega o template 'home' passando o array 'dados' como parâmetro
		$this->loadTemplate('home', $dados);
	}	

}