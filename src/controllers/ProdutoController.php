<?php 
require_once dirname(__FILE__).'/../../vendor/autoload.php';

if (!isset($_ENV["IMGBB_API_KEY"])) {
    $dotenv = Dotenv\Dotenv::createImmutable(dirname(__FILE__).'/../../');
    $dotenv->load();
    $dotenv->required("IMGBB_API_KEY")->notEmpty();
} 

class ProdutoController{
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
        
        return $p->cadastrar();
    }
    public function remover($params) {
        $p = new Produto();
        $p->setId($params['id']);
        return $p->remover();
    }
    public function alterar($params) {
        $p = new Produto();
        $p->setId(5);
        $p->setNome($params['nomeProduto']);
        $p->setValor($params['preco']);
        $p->setEstoque($params['estoque']);
        //$p->setQntCurtidas(0);

        $imgBB = new ImgBB($_ENV["IMGBB_API_KEY"]);
        $imgUri = $params['imgProduto']['tmp_name'];
        $imgName = $params['imgProduto']['name'];

        $resultUrl = $imgBB->upload($imgUri, $imgName);

        //print_r("\n$resultUrl\n");

        $p->setUrlImg($resultUrl);

        return $p->alterar();
    }
    
    public function listarTodos($params) {
        $p = new Produto();
        return $p->listarTodos();
    }

    public function listarPorId($params) {
        $p = new Produto();
        $p->setId($params['id']);
        return $p->listarPorId();
    }
}

