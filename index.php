<?php
    include_once 'conexao.php';
    session_start();

    if(isset($_POST['btn-login'])):
        $erros = array();
        $login = mysqli_escape_string($connect, $_POST['login']);
        $senha = mysqli_escape_string($connect, $_POST['senha']);
        
        if(empty($login) || empty($senha)):
            $erros[] = "O campo login/senha precisa ser preenchido";
        else:
     
            $sql = "SELECT email FROM usuarios WHERE email = '$login'";
            $resultado = mysqli_query($connect, $sql);

            if(mysqli_num_rows($resultado) > 0):      
                
                $sql = "SELECT * FROM usuarios WHERE email = '$login' AND senha = '$senha'";
                $resultado = mysqli_query($connect, $sql);
                
            
                if(mysqli_num_rows($resultado) == 1):
                    $dados = mysqli_fetch_array($resultado);
                    mysqli_close($connect);

                    if($dados['id'] == 1):
                    $_SESSION['logado'] = true;
                    $_SESSION ['admin'] = true;
                        header('Location: admin.php');
                    else:
                    
                    $_SESSION['logado'] = true;
                    $_SESSION ['comum'] = true;
                    header('Location: cliente.php');
                    endif;
                else:
                    $erros[] = "Usuario e senha nao conferem";

                endif;
            else:
                $erros[] = "usuario inexistente";

            endif;
        endif;
    endif;

?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="css/style.css">
    <title>Home</title>
</head>
<body>
    <?php
        if(!empty($erros)):
            foreach($erros as $erro):
                echo '<script>alert("'.$erro.'");</script>';
            endforeach;
        endif;
    ?>
    <header>
        <h1 style="font: arial;">Sistema básico de cadastro</h1>
    </header>
    <section>
        <main class="margem">
            <div class="card">
                <img src="img/originaluser.png">
                <form action="index.php" method="POST">
                    <input type="email" name="login" placeholder="ex@exemplo.com"><br><br>
                    <input type="password" name="senha" placeholder="senha"><br><br>
                    <button type="submit" name="btn-login">Login</button><br><br>
                    <a href="cadastrar.php">Não é cadastrado?<strong>Cadastre-se</strong></a>
                </form>
            </div>
        </main>
    </section>

    <footer>
          
    </footer>
</body>
</html>