@extends('layouts.app')


@section('content')
    <div class="container">


        <div class="row justify-content-md-center">

            <div class="col-md-4" id="login">
                <form>
                    <p class="subtitulo">Login</p>

                    <div class="form-group">
                        <label for="loginInputEmail1">Email</label>
                        <input type="email" class="form-control" id="loginInputEmail1" aria-describedby="emailHelp">
                    </div>

                    <div class="form-group">
                        <label for="loginInputPassword">Senha</label>
                        <input type="password" class="form-control" id="loginInputPassword">
                    </div>

                    <button type="submit" class="btn btn-primary">Acessar</button>
                </form>
            </div>

            <div class="col-md-4" id="register">

                <p class="subtitulo">Cadastrar</p>

                <form class="needs-validation" novalidate id="formRegister">
                    <div class="form-group">
                        <label for="inputName">Nome</label>
                        <input type="text" name="name" class="form-control" id="inputName">
                    </div>

                    <div class="form-group">
                        <label for="inputEmail1">Email</label>
                        <input type="email" name="email" class="form-control" id="inputEmail1" aria-describedby="emailHelp">
                    </div>

                    <div class="form-group">
                        <label for="inputPassword">Senha</label>
                        <input type="password" name="password" class="form-control" id="inputPassword">
                    </div>

                    <div class="form-group">
                        <label for="inputpassword_confirmation">Confirmar senha</label>
                        <input name="password_confirmation" type="password" class="form-control" id="inputpassword_confirmation">
                    </div>

                    <button type="submit" id="submitRegister" class="btn btn-primary">Cadastrar</button>
                </form>
            </div>
        </div>
    </div>
@endsection

@section('js')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.1/jquery.validate.js"></script>
    <script>

        $("#formRegister").validate({
            rules:{
                name: "required",
                email: {
                    required: true,
                    email: true
                },
                password: {
                    required: true,
                    minlength: 5
                },
                password_confirmation: {
                    required: true,
                    minlength: 5,
                    equalTo: "#inputPassword"
                },

            },

            messages:{
                name: {
                    required: 'Nome é obrigatório'
                },
                email: {
                    required: 'E-mail é obrigatório',
                    email: 'E-mail inválido'
                },
                password: {
                    required: "Senha é obrigatória",
                    minlength: "Sua senha deve conter no mínimo 5 caracteres"
                },
                password_confirmation: {
                    required: "Confirme sua senha",
                    minlength: "Sua senha deve conter no mínimo 5 caracteres",
                    equalTo: "Senhas digitadas não são identidas"
                },
            }
        });

        $('#formRegister').submit(function(){

            var form = $('#formRegister')[0];
            var data = new FormData(form);

            $.ajax({
                type: 'POST',
                url: '{{route('users.store')}}',
                data: data,
                contentType: false,
                processData: false
            })

            return false;
        })

    </script>
@endsection
