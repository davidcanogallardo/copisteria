<!DOCTYPE html>
<html>
<head>
    <title>Copisteria Julian</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
    <style>
        .tinta {
            width: 50px;
            height: 50px;
            float: left;
            padding: 5px;
        }
    </style>

</head>

<body>

    <div class="container">
        <!--<div class="jumbotron">
                <h1>Copisteria Julian</h1>
                <p>Usa la impresora que mejor te vaya!</p> 
            </div>-->


        <div class="row">
            <h3>Hojas:0</h3>
            <p>Introduce la impresora y el texto a imprimir</p>
            <form action="index.php" method="get" class="form-inline" role="form">Impresora: <select class="form-control" name="n_impresora">
                    <option value="0">Impresora0</option>
                    <option value="1">Impresora1</option>
                    <option value="2">Impresora2</option>
                </select><textarea class="form-control" rows="4" name="texto"></textarea><input type="submit" value="Enviar a impresora"></form>
        </div>
        <div class="row">
            <div class="col-sm-4">
                <div class="row"><a href="index.php?impresora=0"><img src="/images/A2.jpg" alt="Procesa cola"></a></div>
                <div class="row">
                    <div class="toner">
                        <div class="tinta" style="background-color:black">100%</div>
                        <div class="tinta" style="background-color:yellow">100%</div>
                        <div class="tinta" style="background-color:cyan">100%</div>
                        <div class="tinta" style="background-color:magenta">100%</div>
                    </div>
                </div>
                <div class="row">
                    <ul class="list-group"></ul>
                </div>
            </div>
            <div class="col-sm-4">
                <div class="row"><a href="index.php?impresora=1"><img src="/images/A3.jpg" alt="Procesa cola"></a></div>
                <div class="row">
                    <div class="toner">
                        <div class="tinta" style="background-color:black">100%</div>
                        <div class="tinta" style="background-color:yellow">100%</div>
                        <div class="tinta" style="background-color:cyan">100%</div>
                        <div class="tinta" style="background-color:magenta">100%</div>
                    </div>
                </div>
                <div class="row">
                    <ul class="list-group"></ul>
                </div>
            </div>
            <div class="col-sm-4">
                <div class="row"><a href="index.php?impresora=2"><img src="/images/A4.jpg" alt="Procesa cola"></a></div>
                <div class="row">
                    <div class="toner">
                        <div class="tinta" style="background-color:black">100%</div>
                        <div class="tinta" style="background-color:yellow">100%</div>
                        <div class="tinta" style="background-color:cyan">100%</div>
                        <div class="tinta" style="background-color:magenta">100%</div>
                    </div>
                </div>
                <div class="row">
                    <ul class="list-group"></ul>
                </div>
            </div>
        </div>
    </div>
</body>

</html>