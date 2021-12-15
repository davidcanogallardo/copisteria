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
            text-align: center;
        }
    </style>

</head>

<body>
    <div class="container">
        <div class="row">
            <h3>Hojas: {{$session["pageCount"]}}</h3>
            <p>Introduce la impresora y el texto a imprimir</p>
            <form action="/queue" method="get" class="form-inline" role="form">
                Impresora: 
                <select class="form-control" name="n_impresora">
                    @foreach ($session["printers"] as $printer)
                        <option value="{{ $loop->index }}">{{$printer["name"]}}</option>
                    @endforeach
                </select>
                <textarea class="form-control" rows="4" name="texto" required></textarea>
                <input type="submit" value="Enviar a impresora">
            </form>
        </div>
        <div class="row">
            @foreach ($session["printers"] as $printer)
                <div class="col-sm-4">
                    <div class="row">
                        <a href="/print?impresora={{ $loop->index }}">
                            <img src="images/{{$printer["image"]}}" alt="Procesa cola">
                        </a>
                    </div>
                    <div class="row">
                        <div class="toner">
                            <div class="tinta" style="background-color:black; color: white">{{$printer["ink"]["black"]}}</div>
                            <div class="tinta" style="background-color:yellow">{{$printer["ink"]["yellow"]}}</div>
                            <div class="tinta" style="background-color:cyan">{{$printer["ink"]["blue"]}}</div>
                            <div class="tinta" style="background-color:magenta">{{$printer["ink"]["magenta"]}}</div>
                        </div>
                    </div>

                    <div class="row">
                        <ul class="list-group">
                            @foreach ($printer["queue"] as $text)
                                <li class="list-group-item">{{$text}}</li>
                            @endforeach
                        </ul>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</body>

</html>