<!doctype html>
<html lang="ru">
<head>
    <!-- Обязательные метатеги -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css"
          rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3"
          crossorigin="anonymous">
    <link href="app.css" rel="stylesheet">
    <title>{{$title ?? "Langame"}}</title>
    <style>
        .card-body img{
            width: 90%;
            text-align: center;
        }
    </style>
</head>
<body>
<nav>
    @include("include.nav")
</nav>
<main>
    <div class="container-fluid">
        <div class="row">
            <div class="col-3">
                @include('include.category')
            </div>
            <div class="col-9 p-4">
                @yield('content')
            </div>
    </div>
</main>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous">
</script>
@yield('script')
</body>
</html>

