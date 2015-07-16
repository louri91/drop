<html>
    <head>
    <meta charset='utf-8'>
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" http-equiv="content-type" content="width=device-width, initial-scale=1.0"/>
   <meta content="text/html; charset=utf-8" />
   <link rel="stylesheet" href="css/bootstrap.css">
   <link rel="stylesheet" href="css/bootstrap-theme.css">
   <link rel="stylesheet" href="https://rawgit.com/enyo/dropzone/master/dist/dropzone.css">
   <script type="text/javascript" src="js/bootstrap.js"></script>
   <script type="text/javascript" src="js/nuestro.js"></script>
   <script src="http://code.jquery.com/jquery-2.1.4.js"></script>
   <script src="js/dropzone.js"></script>
    </head>
    <body>
    <div class="container">
      <div class="panel panel-default">
        <div class="panel-heading"><strong>Subir archivos</strong></div>
        <div class="panel-body">

          <!-- Standar Form -->
          <h4>Selecciona un fichero del ordenador</h4>
          <form action="scriptInsertar.php" method="post" enctype="multipart/form-data" id="js-upload-form">
            <div class="form-inline">
              <div class="form-group">
                <input type="file" name="archivo" id="archivo" class="js-upload-files" required>
              </div>
              <button type="submit" name="Enviar" class="btn btn-sm btn-primary" id="js-upload-submit">Subir Archivos</button>
            </div>
          </form>

          <!-- Drop Zone -->
          <h4>O arrastra hasta aquí</h4>
          <div class="upload-drop-zone" id="drop-zone">
            Arrastra hasta aquí tus archivos
          </div>

          <!-- Progress Bar -->
          <div class="progress">
            <div class="progress-bar" role="progressbar" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100" style="width: 60%;">
              <span class="sr-only">60% Completado</span>
            </div>
          </div>

          <!-- Upload Finished -->
          <div class="js-upload-finished">
            <h3>Fichero procesado</h3>
            <div class="list-group">
              <a href="#" class="list-group-item list-group-item-success"><span class="badge alert-success pull-right">Terminado</span>image-01.jpg</a>
              <a href="#" class="list-group-item list-group-item-success"><span class="badge alert-success pull-right">Terminado</span>image-02.jpg</a>
            </div>
          </div>
        </div>
      </div>
    </div> <!-- /container -->
    </body>
</html>