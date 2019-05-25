<?php
    
?>
<!doctype html>
<html lang="en">
    <head>
        <!-- Required meta tags -->
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

        <!-- Bootstrap CSS -->
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
        <link rel="stylesheet" href="css/index.css">
        <link rel="stylesheet" href="css/cover.css">

        <title>Hypothesis-UMG</title>

        <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
        <script type="text/javascript" src="https://cdn.jsdelivr.net/npm/jstat@latest/dist/jstat.min.js"></script>
        <script type="text/javascript" src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
        <!-- <script type="text/javascript" src="js/index.js"></script> -->
        
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    </head>
    <body>

            <div class="cover-container d-flex w-100 h-100 p-3 mx-auto flex-column">
            <header class="masthead mb-auto">
                <div class="inner">
                <h3 class="masthead-brand">Hypothesis-UMG</h3>
                <nav class="nav nav-masthead justify-content-center">
                    <a class="nav-link active" href="index.php">Home</a>
                    <a class="nav-link" href="about.php">About</a>
                </nav>
                </div>
            </header>
            <input type="hidden" id="situation_id" name="situation" value="">

            <main role="main" class="inner cover main-1">
                <h1 class="cover-heading">Selecciona la Situación</h1>
                <a href="#" class="btn btn-lg btn-secondary btn-s btn-s1" value="1"><img class="img-s img-s1" src="img/s1.png"/></a>
                <a href="#" class="btn btn-lg btn-secondary btn-s btn-s2" value="2"><img class="img-s img-s2" src="img/s2.png"/></a>
                <a href="#" class="btn btn-lg btn-secondary btn-s btn-s3" value="3"><img class="img-s img-s3" src="img/s3.png"/></a>
            </main>

            <main role="main" class="inner cover main-2" style="display:none;">
                <h1 class="cover-heading">Llena el formulario</h1>
                <form class="main-form" id="#myForm" action="actions/actions.php">
                    <div class="form-group">
                        <label>Número de datos (n)</label>
                        <input type="text" class="form-control nd" placeholder="Numero de datos" name="n">
                    </div>
                    <div class="form-group">
                        <label>Media (Mu)</label>
                        <input type="text" class="form-control" placeholder="Media Poblacional" name="mu" value="500">
                    </div>
                    <div class="form-group">
                        <label>X barra</label>
                        <input type="text" class="form-control" placeholder="X barra" name="x" value="480">
                    </div>
                    <div class="form-group">
                        <label>Desviación Estándar</label>
                        <input type="text" class="form-control" placeholder="Desviación estandar" name="s" value="50">
                    </div>
                    <div class="form-group">
                        <input type="radio" class="gl" name="grados_libertad" value="0.95"> Significativa (95%)<br>
                        <input type="radio" class="gl" name="grados_libertad" value="0.99" checked> Altamente Significativa (99%)<br>
                    </div>
                    <button type="submit" class="btn btn-primary">Generar</button>
                </form>
            </main>
            
            <main role="main" class="inner cover main-3" style="display:none;">
                <h1 class="cover-heading">Resultado</h1>
                <div class="result col-md-12">
                    <div id="chart_div"></div>
                    <div class="col-md-12">
                        <h4 class="hypothesis"></h4>
                    </div>
                </div>
            </main>

            <footer class="mastfoot mt-auto">
                <div class="inner">
                <p>Proyecto Final, Estadística II</p>
                </div>
            </footer>
        </div>

    <script type="text/javascript" src="js/form.js"></script>
  </body>
</html>