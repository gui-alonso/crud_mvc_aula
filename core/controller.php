<?php
class controller {

    // Carrega uma view específica, extraindo dados para uso na view
    public function loadView($viewName, $viewData = array()) {
        extract($viewData); // Extrai variáveis do array $viewData para o escopo atual
        require 'views/'.$viewName.'.php'; // Inclui o arquivo da view
    }

    // Carrega o template principal da aplicação
    public function loadTemplate($viewName, $viewData = array()) {
        require 'views/template.php'; // Inclui o arquivo do template
    }

    // Carrega uma view dentro do template, extraindo dados para uso na view
    public function loadViewInTemplate($viewName, $viewData = array()) {
        extract($viewData); // Extrai variáveis do array $viewData para o escopo atual
        require 'views/'.$viewName.'.php'; // Inclui o arquivo da view
    }

}