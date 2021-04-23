<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edição de Usuario</title>
    <style>
        *{margin: 0;padding: 0;box-sizing: border-box;}html,body{background-color: #1a212c;height: 100%;}body{font-family: 'Nunito', sans-serif;}.form-container-login{transform: translate(-50%, -50%);position: absolute;left: 50%;top: 50%; max-width: 1100px;}.form-container-login{display: flex;}.form-login{background-color: white;width: 400px;padding: 30px;max-width: 500px;border-radius: 5px;}.form-login input[type=text],.form-login input[type=email],.form-login input[type=password]{width: 100%;height: 40px;padding-left: 10px;box-shadow: 0px 3px 1px #D3D3E067;border: 1px solid #EBEBEB;margin: 10px 0;border-radius: 5px;}.form-login input[type=submit]{width: 100%;height: 40px;color: white;font-size: 18px;cursor: pointer;background:#0fb7bd 0% 0% no-repeat padding-box;box-shadow: 0px 3px 1px #0fb7bd;border: none;border-radius: 5px;}.form-login a{margin-top: 20px;border: 2px solid ;border-radius: 5px;display: block;width: 100%;padding: 4px 10px;text-align: center;text-decoration: none;}
    </style>
</head>
<body>
    <div class="form-container-login">
        <div class="form-login">
            <form action="{{route('users.edicao', ['user' => $user->id])}}" method="post">
                @csrf
                @method('put')
                <label for="">Nome do usuario:</label>
                <input type="text" name="name" value="{{ $user->name}}">

                <label for="">E-mail do usuario:</label>
                <input type="email" name="email" value="{{ $user->email}}">

                <label for="">Senha do usuario:</label>
                <input type="password" name="password">
                
                <input type="submit" value="Editar usuario">
            </form>
        </div>
     </div>   
</body>
</html>