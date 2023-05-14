<?php $this->layout("/Base/base",["title" => "UP"])?>
<?php $this->start("head")?>
        <meta charset="utf-8">
        <meta name="viewport" content="width = device-width, initial-scale=1.0">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
        <link rel="stylesheet" href="./css/base.css">
        <script src="./js/base.js"></script>
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100;0,300;0,700;1,100&display=swap" rel="stylesheet">
<?php $this->stop()?>
<?php $this->start("header")?>
<nav class="navbar navbar-expand-lg navbar-light">
  <div class="container-fluid">
    <a class="navbar-brand" id="logo" href="#"><p id="logo-p">UP</p></a>
    <button class="navbar-toggler" type="button" id="btn-mob"data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse bg-primary" id="navbarSupportedContent">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="#descricao">Descrição</a>
        </li>
        <li class="nav-item">
          <a class="nav-link active" href="#contato">Contato</a>
        </li>
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
            Dropdown
          </a>
          <ul class="dropdown-menu bg-primary" aria-labelledby="navbarDropdown">
            <li><a class="dropdown-item" href="#">Action</a></li>
            <li><a class="dropdown-item" href="#">Another action</a></li>
            <li><hr class="dropdown-divider"></li>
            <li><a class="dropdown-item" href="#">Something else here</a></li>
          </ul>
        </li>
        <li class="nav-item">
          <a class="nav-link disabled" href="#" tabindex="-1" aria-disabled="true">Disabled</a>
        </li>
      </ul>
      
    </div>
  </div>
</nav>
<?php $this->stop()?>
<?php $this->start("conteudo")?>
  <div id="resposta-cad">

  </div>
  <div class="row" id="forms">
    <div class="col-12 col-sm-12 col-md-6 col-lg-6 col-xl-6">
        <form id="form-cad">
            <h1 class="titulo">Cadastre-se</h1>
            <label for="nome">Nome</label><input type="text" name="nome" id="nome" placeholder="Nome" class="form-control" required>
            <label for="sobrenome">Sobrenome</label><input type="text" name="sobrenome" id="sobrenome" placeholder="Sobrenome" class="form-control" required>
            <label for="email">E-mail</label><input type="email" name="email" id="email" placeholder="E-mail" class="form-control" required>
            <label for="telefone">Telefone</label><input type="phone" name="telefone" id="telefone" placeholder="Telefone" class="form-control" required>
            <label for="senha">Senha</label><input type="password" name="senha" id="senha" placeholder="Senha" class="form-control" required>             
            <input type="submit" value="Cadastrar" class="btn btn-success"><input type="reset" value="Limpar" class="btn btn-primary">
        </form>
    </div>
    <div class="col-12 col-sm-12 col-md-6 col-lg-6 col-xl-6">
        <form id="form-entrar">
            <h1 class="titulo">Entrar</h1>
            <label for="username">E-mail</label><input type="email" name="username" id="username" placeholder="E-mail" class="form-control" required>
            <label for="senha2">Senha</label><input type="password" name="senha2" id="senha2" placeholder="Senha" class="form-control" required>             
            <input type="submit" value="Entrar" class="btn btn-success"><input type="reset" value="Limpar" class="btn btn-primary">
        </form>
    </div>
  </div>
  <div class="row" >
      <div class="col-12" id="img">
        <article >
                          
        </article>
          <article class="descricao" id="descricao">
              <header>
                  <h1>Armazenamento em nuvem</h1>
              </header>
              <section>
                  <p><h3>Lorem ipsum dolor sit amet consectetur adipisicing elit. Perspiciatis, rem nostrum, iusto earum repudiandae nam maxime molestiae quasi inventore repellat error ab numquam fugiat quibusdam fuga consequatur, sed voluptatibus omnis.</h3></p>
              </section>
          </article>
      </div>

  </div>
<?php $this->stop() ?>
<?php $this->start("footer");?>
  <p>&copy;Todos os direitos reservados</p>
  <div class="row">
    <div class="col-12 col-sm-12 col-md-6 col-lg-6 col-xl-6" >
      <form id="contato">
        <h1>Contato</h1>
        <label for="nome3">Nome</label><input type="text" name="nome3" id="nome3" class="form-control" required>
        <label for="email2">E-mail</label><input type="email" name="email2" id="email2" class="form-control" required>
        <label for="mensagem">Mensagem</label><textarea name="mensagem" id="mensagem" class="form-control"></textarea>
        <input type="submit" value="Enviar" class="btn btn-success"><input type="reset" value="Limpar" class="btn btn-primary">
      </form>
    </div>
    <div class="col-12 col-sm-12 col-md-6 col-lg-6 col-xl-6" >
      <article id="contato-email">
        <header>
          <h1>Jean Lopes Oliveira</h1>
        </header>
        <section>
          <p>Contato:jean.lopes.oliv@gmail.com</p>
        </section>
        <section>
          <i class="bi bi-filetype-html"></i><i class="bi bi-filetype-css"></i><i class="bi bi-filetype-js"></i><i class="bi bi-filetype-php"></i><i class="bi bi-bootstrap"></i>
        </section>
      </article>
    </div>
  </div>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
<?php $this->stop();?>
