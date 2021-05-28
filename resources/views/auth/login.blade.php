<!DOCTYPE html>
<html lang="en" dir="ltr">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Autenticação - MyGarden</title>
        <link href="{{asset("/css/app.min.css")}}" rel="stylesheet">
        <link href="{{asset("/css/auth.css")}}" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@300;400;600;700;800&display=swap" rel="stylesheet">
    </head>
    <body class="bg-white">
        <div class="row h-100">
            <div class="col-lg-5 col-12">
                <div id="auth-form">
                    <h1 id="h1-auth">Log in.</h1>
                    <p id="p-auth">O seu lugar online para tratar do seu jardim.</p>
                    <form class="mt-4 needs-validation" action="{{route('authenticate')}}" method="post" novalidate>
                        @csrf
                        <div class="form-group mb-3">
                            <input id="username" class="form-control" type="text" name="username" placeholder="Nome do utilizador..." required>
                            <div class="invalid-feedback">
                                Insira um <i>username</i>, por favor.
                            </div>
                        </div>
                        <div class="form-group mb-3">
                            <input id="password" class="form-control" type="password" name="password" placeholder="Password..." required>
                            <div class="invalid-feedback">
                                Insira uma <i>password</i>, por favor.
                            </div>
                        </div>
                        <button type="submit" class="btn mt-3">Iniciar Sessão</button>
                    </form>
                </div>
            </div>
            <div class="col-lg-7 d-none d-lg-block">
                <div class="bg-image"></div>
            </div>
        </div>
    </body>
    <script src="{{ asset('vendor/jquery/jquery.min.js') }}"></script>
    <script src="{{ asset('vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
    <script type="text/javascript">
        $(document).ready(function() {
            $(".needs-validation").submit(function(event) {
                if (this.checkValidity() === false) {
                    event.preventDefault();
                    event.stopPropagation();
                }
                $(".needs-validation").addClass("was-validated");
            });

            $("input").change(function() {
                $("#auth-p-failed").remove();
            });
        });
    </script>
</html>
