<?php $this->layout("/Base/base",["title"=> "UP"])?>
<?php $this->start("head")?>
        <meta charset="utf-8">
        <meta name="viewport" content="width = device-width, initial-scale=1.0">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous"><link rel="stylesheet" href="./css/base.css">
        <link rel="stylesheet" href="./css/usu.css">
        <link rel="stylesheet" href="./css/base.css">
        <script src="./js/usuario.js"></script>
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
          <a class="nav-link active" aria-current="page" href="#descricao"><?php echo $_SESSION["usuario"]->getnome()?></a>
        </li>
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="" id="sair">Sair</a>
        </li>
      </ul>
      
    </div>
  </div>
</nav>
<?php $this->stop()?>
<?php $this->start("conteudo")?>

  <div class="row">
      <div class="col-12" id="resposta">

      </div>
      <div class="col-12">
    
          <button type="button" class="btn btn-primary button" data-bs-toggle="modal" data-bs-target="#modal-criar-pasta">Criar Pasta</button>

          <div class="modal fade" id="modal-criar-pasta" tabindex="-1" aria-labelledby="modal-criar-pastas" aria-hidden="true">
            <div class="modal-dialog">
              <div class="modal-content">
                <div class="modal-header">
                  <h5 class="modal-title" id="modal-criar-pastas">Criar Pasta</h5>
                  <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form id="cria-pasta">
                <div class="modal-body">
                  <label for="nome">Nome</label><input type="text" name="nome" id="nome" class="form-control" required>
                </div>
                <div class="modal-footer">
                  <button type="submit" class="btn btn-primary" id="criar">Criar</button>
                </div>
                </form>
              </div>
            </div>
          </div>
          <button type="button" class="btn btn-primary button" data-bs-toggle="modal" data-bs-target="#modal-upload" id="btn-up">Upload</button>

          <div class="modal fade" id="modal-upload" tabindex="-1" aria-labelledby="modal-uploads" aria-hidden="true">
            <div class="modal-dialog">
              <div class="modal-content">
                <div class="modal-header">
                  <h5 class="modal-title" id="modal-uploads">Realizar upload</h5>
                  <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form id="upload" enctype="multipart/form-data">
                <div class="modal-body">
                  <label for="arquivos">Arquivos</label><input type="file" name="arquivos" id="arquivos" class="form-control" required>
                  <label>Pasta</label>
                  <select name="id-pasta" class="form-select" id="select"required>


                  </select>
                </div>
                <div class="modal-footer">
                  <button type="submit" class="btn btn-primary" id="criar">Enviar</button>
                </div>
                </form>
                
              </div>
            </div>
          </div>
<button type="button" class="btn btn-primary button" data-bs-toggle="modal" data-bs-target="#modal-excluir-pasta" id="btn-excluir">Excluir Pasta</button>
<div class="modal fade" id="modal-excluir-pasta" tabindex="-1" aria-labelledby="modal-excluir" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="modal-excluir">Excluir Pasta</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <form id="excluir-pasta">
      <div class="modal-body">
        <label>Pasta</label>
        <select name="id-pasta" class="form-select" id="select-excluir" required>


        </select>
      </div>
      <div class="modal-footer">
        <button type="submit" class="btn btn-primary" id="excluir">Excluir</button>
      </div>
      </form>
      
    </div>
  </div>
</div>
      </div>
      <div class="col-12" id="conteudo">
          

      </div>
      
  </div>
  

<?php $this->stop() ?>
<?php $this->start("footer");?>
  <p>&copy;Todos os direitos reservados</p>
  <div class="row">
    <div class="col-12 col-sm-12 col-md-6 col-lg-6 col-xl-6" >
      <form id="contato">
        <h1>Contato</h1>
        <label for="nome">Nome</label><input type="text" name="nome" id="nome" class="form-control" required>
        <label for="email">E-mail</label><input type="email" name="email" id="email" class="form-control" required>
        <label for="mensagem">Mensagem</label><textarea name="mensagem" id="mensagem" class="form-control"></textarea>
        <input type="submit" value="Enviar" class="btn btn-success"><input type="reset" value="Limpar" class="btn btn-primary">
      </form>
    </div>
  </div>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
        
<?php $this->stop();?>
