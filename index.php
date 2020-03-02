<?php
if (isset($_POST['name'])) {
    $db = new PDO("mysql:dbname=devres23_amigo;host=localhost","devres23_amigo","amigo");
    $sql = $db->prepare("INSERT INTO users 
    (name, email, pass, gift1, gift2, gift3) VALUES
    (:name, :email, :pass, :gift1, :gift2, :gift3) 
    ");
    $sql->bindValue(":name", $_POST['name']);
    $sql->bindValue(":email", $_POST['email']);
    $sql->bindValue(":pass", $_POST['pass']);
    $sql->bindValue(":gift1", $_POST['gift1']);
    if (isset($_POST['gift2'])) {
        $sql->bindValue(":gift2", $_POST['gift2']);
    } else {
        $sql->bindValue(":gift2", "Nenhum");
    }
    if (isset($_POST['gift3'])) {
        $sql->bindValue(":gift3", $_POST['gift3']);
    } else {
        $sql->bindValue(":gift3", "Nenhum");
    }
    $sql->execute(); ?>
    <script>alert("Cadastrado com sucesso!");</script>
<?php
}

?><!DOCTYPE html>
<html lang="pt-br">
	<head>
		<meta charset="utf-8">
		<title>PSOQF - Amigo Oculto 2020</title>
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">	
        <link href="https://fonts.googleapis.com/css?family=Open+Sans:300&display=swap" rel="stylesheet">
        <!-- Chrome, Firefox OS and Opera -->
        <meta name="theme-color" content="#458d25">
        <!-- Windows Phone -->
        <meta name="msapplication-navbutton-color" content="#458d25">
        <!-- iOS Safari -->
        <meta name="apple-mobile-web-app-status-bar-style" content="#458d25">
        <style>
            *{
                padding: 0;
                margin: 0;
                font-family: 'Open Sans', sans-serif;
            }

            html{
                height: 100%;
            }

            body{
                background-image: url('back.png');
                background-size: 150px;
                background-repeat: repeat;
                height: auto;
                display: flex;
                justify-content: center;
                align-items: center;
                flex-direction: column;
            }

            body img{
                width: 170px;
                border-radius: 100px;
                margin-bottom: 50px;
                margin-top: 50px;
                border: 1px solid #d14242;
            }

            h1{
                color: #fff;
                margin-bottom: 40px;
                font-size: 25px;
                font-weight: 400;
            }

            form{
                background-color: rgba(235,10,30,0.8);
                width: 300px;
                display: flex;
                justify-content: center;
                align-items: center;
                flex-direction: column;
                padding: 20px;
                color: #fff;
                font-size: 16px;
                border: 1px solid #d14242;
                margin-bottom: 50px;
            }

            label{
                margin-bottom: 5px;
            }

            input, textarea{
                height: 35px;
                color: #111;
                border: 1px solid #d14242;
                outline: none;
                font-size: 16px;
                padding: 5px;
                margin-bottom: 30px;
                width: 90%;
            }

            textarea{
                height: 100px;
                min-height: 100px;
            }

            button{
                background-color: #f6e93d;
                height: 40px;
                width: 50%;
                color: #111;
                font-weight: 800;
                border: 1px solid #f6e93d;
                outline: none;
                font-size: 16px;
                margin-bottom: 30px;
                cursor: pointer;
            }
        
        </style>
	</head>


	<body> 
        <img src="PSOQF.png">

        <form action="" method="POST">
            <label for="name">Nome: </label>
            <input type="text" name="name" required placeholder="Informe seu nome" maxlength="50">
            
            <label for="email">E-mail: </label>
            <input type="email" name="email" required placeholder="Informe seu e-mail" maxlength="50">
            
            <label for="pass">Senha: </label>
            <input type="text" name="pass" placeholder="Informe uma senha" required>

            <label for="gift1">Opção 1:</label>
            <textarea name="gift1" placeholder="Opção de presente 01" required></textarea>

            <label for="gift2">Opção 2:</label>
            <textarea name="gift2" placeholder="Opção de presente 02"></textarea>

            <label for="gift3">Opção 3:</label>
            <textarea name="gift3" placeholder="Opção de presente 03"></textarea>
            
            <button type="submit">Cadastrar-se</button>
        </form>

	</body>
</html>