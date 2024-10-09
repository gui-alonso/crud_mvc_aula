<?php
class Core {

    // Método principal que executa o fluxo da aplicação
    public function run() {

        // Inicializa a URL base
        $url = '/';

        // Verifica se a URL foi passada como parâmetro na requisição
        if(isset($_GET['url'])) {
            $url .= $_GET['url'];
        }

        // Inicializa um array para armazenar parâmetros da URL
        $params = array();

        // Verifica se a URL não está vazia e não é apenas a barra '/'
        if(!empty($url) && $url != '/') {
            // Separa a URL em partes usando '/' como delimitador
            $url = explode('/', $url);
            array_shift($url); // Remove o primeiro elemento (vazio)

            // Define o controlador atual baseado na primeira parte da URL
            $currentController = $url[0].'Controller';
            array_shift($url); // Remove o nome do controlador da URL

            // Verifica se existe uma ação na URL
            if(isset($url[0]) && !empty($url[0])) {
                $currentAction = $url[0]; // Define a ação atual
                array_shift($url); // Remove a ação da URL
            } else {
                // Se não houver ação, define como 'index'
                $currentAction = 'index';
            }

            // Armazena os parâmetros restantes na URL
            if(count($url) > 0) {
                $params = $url;
            }

        } else {
            // Se a URL estiver vazia, define controlador e ação padrão
            $currentController = 'homeController';
            $currentAction = 'index';
        }

        // Verifica se o arquivo do controlador existe e se o método da ação é válido
        if(!file_exists('controllers/'.$currentController.'.php') || !method_exists($currentController, $currentAction)) {
            // Se não existir, redireciona para o controlador de 'notfound'
            $currentController = 'notfoundController';
            $currentAction = 'index';
        }

        // Cria uma instância do controlador atual
        $c = new $currentController();

        // Chama a ação do controlador com os parâmetros
        call_user_func_array(array($c, $currentAction), $params);

    }

}
