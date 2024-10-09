<?php
class contatosController extends controller {

    // Método que carrega a página inicial (index) do controller
    public function index() {}

    // Método que carrega a página de adição de novos contatos
    public function add()
    {
        $dados = array(
            'error' => '' // Inicializa uma variável para armazenar mensagens de erro
        );

        // Verifica se há mensagens de erro na URL e as armazena
        if (!empty($_GET['error'])) {
            $dados['error'] = $_GET['error'];
        }

        // Carrega o template 'add', passando o array 'dados' como parâmetro
        $this->loadTemplate('add', $dados);
    }

    // Método que salva um novo contato
    public function add_save()
    {
        // Verifica se o campo de email não está vazio
        if (!empty($_POST['email'])) {
            $nome = $_POST['nome']; // Armazena o nome enviado pelo formulário
            $email = $_POST['email']; // Armazena o email enviado pelo formulário

            $contatos = new Contatos(); // Cria uma nova instância da classe Contatos
            // Tenta adicionar o contato e redireciona conforme o resultado
            if($contatos->add($nome, $email)){
                header("Location: ".BASE_URL); // Redireciona para a página inicial em caso de sucesso
            }else {
                header("Location: ".BASE_URL."contatos/add?error=exist"); // Redireciona com erro se o contato já existir
            }
        } else {
            header("Location: ".BASE_URL."contatos/add"); // Redireciona se o email estiver vazio
        }
        //print_r($_POST); // Código comentado para depuração
    }

    // Método que carrega o formulário de edição de um contato
    public function edit($id)
    {
        /*
         * 1° PASSO: pegar as informações do contato pelo ID
         * 2° PASSO: carregar o formulário preenchido
         * 3° PASSO: receber os dados do form e editar
         */

        $dados = array(); // Inicializa um array para armazenar os dados do contato

        // Verifica se o ID do contato não está vazio
        if (!empty($id)){
            $contatos = new Contatos(); // Cria uma nova instância da classe Contatos
            // Verifica se o nome foi enviado pelo formulário
            if (!empty($_POST['nome'])) {
                $nome = $_POST['nome']; // Armazena o nome enviado

                $contatos->edit($nome, $id); // Chama o método de edição do contato
            } else {
                $dados['info'] = $contatos->get($id); // Obtém as informações do contato

                // Verifica se o contato foi encontrado
                if (isset($dados['info']['id'])) {
                    $this->loadTemplate('edit', $dados); // Carrega o template de edição com os dados do contato
                    exit(); // Interrompe a execução para evitar redirecionamento
                }
            }
        }
        header("Location: ".BASE_URL); // Redireciona para a página inicial se não houver ID ou não encontrar contato
    }

    // Método que deleta um contato pelo ID
    public function del($id)
    {
        /*
         * 1° PASSO: deletar o contato pelo ID
         * 2° PASSO: voltar para a home
         */
        if (!empty($id)) {
            $contatos = new Contatos(); // Cria uma nova instância da classe Contatos
            $contatos->delete($id); // Chama o método para deletar o contato
        }
        header("Location: ".BASE_URL); // Redireciona para a página inicial após a exclusão
    }

}
