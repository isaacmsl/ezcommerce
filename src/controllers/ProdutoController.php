<?php 
require_once dirname(__FILE__).'/../../vendor/autoload.php';

if (!isset($_ENV["IMGBB_API_KEY"])) {
    $dotenv = Dotenv\Dotenv::createImmutable(dirname(__FILE__).'/../../');
    $dotenv->load();
    $dotenv->required("IMGBB_API_KEY")->notEmpty();
} 

class ProdutoController{
    private $produtoDAO;
    private $usuarioDAO;

    public function __construct() {
        $this->produtoDAO = new ProdutoDAO();
        $this->usuarioDAO = new UsuarioDAO();
    }

    public function criar($params) {
        $p = new Produto();
        
        $p->setNome($params['nomeProduto']);
        $p->setValor($params['preco']);
        $p->setEstoque($params['estoque']);
        $p->setEmailUsuario($params['emailUsuario']);
        $p->setQntCurtidas(0);
    
        $imgBB = new ImgBB($_ENV["IMGBB_API_KEY"]);
        $imgUri = $params['imgProduto']['tmp_name'];
        $imgName = $params['imgProduto']['name'];

        $resultUrl = $imgBB->upload($imgUri, $imgName);

        //print_r("\n$resultUrl\n");

        $p->setUrlImg($resultUrl);
        
        header("Location: ../../index.php");
        return $this->produtoDAO->cadastrar($p);
    }
    public function remover($params) {
        $id = $params["id"];
        header("Location: ../../index.php");
        return $this->produtoDAO->remover($id);
    }
    public function alterar($params) {
        $id = $params['id'];
        $p = $this->listarPorId($params);

        $p->setNome($params['nomeProduto']);
        $p->setValor($params['preco']);
        $p->setEstoque($params['estoque']);
        
        if ($params["imgProduto"]["size"] > 0) {
            $imgBB = new ImgBB($_ENV["IMGBB_API_KEY"]);
            $imgUri = $params['imgProduto']['tmp_name'];
            $imgName = $params['imgProduto']['name'];

            $resultUrl = $imgBB->upload($imgUri, $imgName);
            $p->setUrlImg($resultUrl);
        }

        header("Location: ../../index.php");
        return $this->produtoDAO->alterar($p);
    }
    
    public function listarTodos() {
        $produtos = $this->produtoDAO->listarTodos();

        foreach($produtos as $produto) {
            $usuario = $this->usuarioDAO->listarPorEmail($produto->getEmailUsuario());
            $produto->setNomeUsuario($usuario['nome']);
        }

        return $produtos;
    }

    public function listarPorEmailUsuario($params) {
        $produtos = $this->produtoDAO->listarPorEmailUsuario($params['emailUsuario']);

        foreach($produtos as $produto) {
            $usuario = $this->usuarioDAO->listarPorEmail($produto->getEmailUsuario());
            $produto->setNomeUsuario($usuario['nome']);
        }

        return $produtos;
    }

    public function listarPorId($params) {
        $id = $params['id'];
        return $this->produtoDAO->listarPorId($id);
    }
}

