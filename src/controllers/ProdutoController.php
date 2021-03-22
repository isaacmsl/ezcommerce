<?php 
require_once dirname(__FILE__).'/../../vendor/autoload.php';

if (!isset($_ENV["IMGBB_API_KEY"])) {
    $dotenv = Dotenv\Dotenv::createImmutable(dirname(__FILE__).'/../../');
    $dotenv->load();
    $dotenv->required("IMGBB_API_KEY")->notEmpty();
} 

class ProdutoController{
    private $dao;

    public function __construct() {
        $this->dao = new ProdutoDAO();
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
        
        return $this->dao->cadastrar($p);
    }
    public function remover($params) {
        $id = $params["id"];
        return $this->dao->remover($id);
    }
    public function alterar($params) {
        $p = new Produto();
        $p->setId(5);
        $p->setNome($params['nomeProduto']);
        $p->setValor($params['preco']);
        $p->setEstoque($params['estoque']);

        $imgBB = new ImgBB($_ENV["IMGBB_API_KEY"]);
        $imgUri = $params['imgProduto']['tmp_name'];
        $imgName = $params['imgProduto']['name'];

        $resultUrl = $imgBB->upload($imgUri, $imgName);

        //print_r("\n$resultUrl\n");

        $p->setUrlImg($resultUrl);

        return $this->dao->alterar($p);
    }
    
    public function listarTodos($params) {
        return $this->dao->listarTodos();
    }

    public function listarPorId($params) {
        $id = $params['id'];
        return $this->dao->listarPorId($id);
    }
}

