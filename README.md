
<p align="center">
  <img alt="Logo do Ezcommerce" title="Ezcommerce" src="public/logo-ez-gray.svg" />
  <h1 align="center">Ezcommerce</h1>
</p>

<p align="center">
  <a href="#-tecnologias">Tecnologias</a>&nbsp;&nbsp;&nbsp;|&nbsp;&nbsp;&nbsp;
  <a href="#-projeto">Projeto</a>&nbsp;&nbsp;&nbsp;|&nbsp;&nbsp;&nbsp;
  <a href="#-layout">Layout</a>&nbsp;&nbsp;&nbsp;|&nbsp;&nbsp;&nbsp;
  <a href="#-como-executar">Como executar</a>&nbsp;&nbsp;&nbsp;|&nbsp;&nbsp;&nbsp;
  <a href="#-licença">Licença</a>
</p>

<p align="center">
  <img src="https://github.com/isaacmsl/ezcommerce/actions/workflows/tdd.yml/badge.svg" alt="Sinônimo de qualidade é TDD" title="Github Action />
</p>

<br>

<p align="center">
  <img alt="Tela inicial da aplicação" src="https://i.ibb.co/hV6sjKz/tela-inicia-ez.png" width="100%">
  Figura 1: Tela inicial do sistema com usuário logado
</p>

## 💻 Projeto

Ezcommerce é um site de vendas online para o trabalho final das disciplinas de Programação Para Internet (PPI) e Projeto de Desenvolvimento de Software (PDS), utilizando os conhecimentos adquiridos no curso de Técnico de Informática do IFRN - campus Santa Cruz.  

## ✨ Tecnologias

Esse projeto foi desenvolvido com as seguintes tecnologias.

Tenha certeza de possuir baixado em sua máquina:
- [PHP](https://www.php.net/) para controlar as três camadas da aplicação: visualização, domínio e persistência
- [Composer](https://getcomposer.org/doc/) para o gerenciamentos de dependências
- Git para o versionamento do projeto
    - [Windows](https://git-scm.com/download/win)
    - Linux: `$ sudo apt update && sudo apt install git`

Sem necessidade de baixar previamente:
- [PHPUnit](https://phpunit.de/) para realizar Test Driven and Development (TDD)
- [SQLite](https://www.sqlite.org/index.html) para a persistência de dados

Não precisam de instalação:
- [JavaScript](https://devdocs.io/javascript/) para scripts que são executados no lado do cliente
- [CSS](https://devdocs.io/css/) para estilização do site
- [HTML](https://devdocs.io/html/) para a estrutura do site
- [ImgBB API](https://imgbb.com/) para o upload de imagens

## 🔖 Layout

Você pode visualizar os layouts do site através [desse link](https://www.figma.com/file/a2JeKIwg4SzujP7Gz46gyh/Ezcommerce---Prot%C3%B3tipos?node-id=0%3A1). 

## 🚀 Como executar

- Clone o repositório `$ git clone https://github.com/isaacmsl/ezcommerce.git`
- Instale as dependências `$ composer install`
- Crie seu arquivo de variáveis de ambiente `.env` na raiz do projeto com o seguinte conteúdo, tendo certeza de estar [cadastrado no ImgBB](https://imgbb.com/signup) e possuir uma [API KEY](https://api.imgbb.com/)

![image](https://user-images.githubusercontent.com/31693006/112687026-a0702300-8e55-11eb-8d43-c50b333feb76.png)

Conteúdo de `.env`:
```
IMGBB_API_KEY=”SUA API KEY”
```
- Atualize o projeto com `$ composer update`
- Inicie o servidor:
   - Windows: `$ composer run server --timeout=0`
   - Linux: `$composer run start`

Agora você pode acessar [`localhost:8080`](http://localhost:8080) do seu navegador.

## 📄 Licença

Esse projeto está sob a licença MIT. Veja o arquivo [LICENSE](LICENSE.md) para mais detalhes.

---

Feito com ♥ by Grupo Default 👋🏻

| [<img src="https://avatars3.githubusercontent.com/u/31693006?s=460&v=4" width=115><br><sub>@isaacmsl</sub>](https://github.com/isaacmsl) | [<img src="https://avatars3.githubusercontent.com/u/31678236?s=400&v=4" width=115><br><sub>@PauloVLB</sub>](https://github.com/PauloVLB) | [<img src="https://avatars3.githubusercontent.com/u/40503734?s=400&v=4" width=115><br><sub>@doug3321</sub>](https://github.com/doug3321) | [<img src="https://avatars3.githubusercontent.com/u/32546360?s=400&v=4" width=115><br><sub>@HenriqueEduardo1</sub>](https://github.com/HenriqueEduardo1) |
| :---: | :---: | :---: | :---: |
