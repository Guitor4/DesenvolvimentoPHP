<?php

ob_start();


function navbar(){

    $nav = "
    <nav class=\"navbar navbar-expand-lg navbar-light bg-light\">
        <div class=\"container-fluid\">
            <a class=\"navbar-brand\" href=\"#\">Navbar</a>
            <button class=\"navbar-toggler\" type=\"button\" data-bs-toggle=\"collapse\" data-bs-target=\"#navbarNavDropdown\" aria-controls=\"navbarNavDropdown\" aria-expanded=\"false\" aria-label=\"Toggle navigation\">
                <span class=\"navbar-toggler-icon\"></span>
            </button>
            <div class=\"collapse navbar-collapse\" id=\"navbarNavDropdown\">
                <ul class=\"navbar-nav\">
                    <li class=\"nav-item\">
                        <a class=\"nav-link active\" aria-current=\"page\" href=\"#\">Home</a>
                    </li>
                    ";
                    if ($_SESSION['perfilp'] == "Funcionário"){
                    $nav = "<li class=\"nav-item\">
                        <a class=\"nav-link\" href=\"cadastroEndereco.php\">Cadastrar Endereco</a>
                    </li>
                    <li class=\"nav-item\">
                        <a class=\"nav-link\" href=\"cadastroProduto.php\">Cadastrar Produto</a>
                    </li>
                    <li class=\"nav-item\">
                    <a class=\"nav-link\" href=\"cadastroPessoa.php\">Cadastrar Pessoa</a>
                </li>
                    <li class=\"nav-item\">
                    <a class=\"nav-link\" href=\"cadastroFornecedor.php\">Cadastrar Fornecedor</a>
                </li>";
                    }
                    $nav .="<li class=\"nav-item dropdown\">
                        <a class=\"nav-link dropdown-toggle\" href=\"#\" id=\"navbarDropdownMenuLink\" role=\"button\" data-bs-toggle=\"dropdown\" aria-expanded=\"false\">
                            Dropdown link
                        </a>
                        <ul class=\"dropdown-menu\" aria-labelledby=\"navbarDropdownMenuLink\">
                            <li><a class=\"dropdown-item\" href=\"#\">Action</a></li>
                            <li><a class=\"dropdown-item\" href=\"#\">Another action</a></li>
                            <li><a class=\"dropdown-item\" href=\"#\">Something else here</a></li>
                            <li class=\"nav-item\">
                            <a class=\"nav-link\" href=\"sessionDestroy.php\">Sair</a>
                        </li>\"
                        </ul>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
    
    ";

    return $nav;
}





ob_end_flush();