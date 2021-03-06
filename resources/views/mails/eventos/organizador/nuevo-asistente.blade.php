<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <style>

        body {
            display: flex;
            justify-content: center;
        }

        .mail-card {
            background-color: #F5F5F9;
            width: 40rem;
            height: 20rem;
        }

        .mail-head {
            background-color: #003459;
            color: #fff;
            text-align: center;
            padding: 0 0.3rem;
            display: flex;
            flex-direction: row;
        }

        .mail-body {
            padding: 0 0.3rem;
        }

        .grilla {
            display: grid;
            grid-auto-flow: row dense;
        }

        .bold {
            font-weight: 700;
        }

    </style>
</head>
<body>
  
    <div class="mail-card">
        <div class="mail-head">
            <h3>Estimado/a </h3>
            <h4>{{ $organizador->nombre }} {{ $organizador->apellidos }}</h4>
        </div>
        
        <div class="mail-body">
            <p>
                Queremos informarte que <strong>{{ $artista->ART_Nombre }}</strong> se ha inscrito
                al evento <strong>{{ $evento->EVE_Nombre }}</strong> el cual estas organizando.
            </p>
         
        </div>
    </div>

</body>
</html>