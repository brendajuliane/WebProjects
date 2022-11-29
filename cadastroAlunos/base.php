<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Alunos</title>
    <link rel="stylesheet" href="style.css">
    <style>
        #baseDiv {
            width: 100%;
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
        }
        .alunoBox {
            display: flex;
            flex-direction: row;
            gap: 25px;
            width: 85%;
            height: 60px;
            min-height: 60px;
            align-items: center;
            border-bottom: solid 1px rgba(0, 0, 0, 0.3);
            border-top: solid 1px rgba(0, 0, 0, 0.3);
            padding: 0px 10px 0px 10px;
            background-color: white;
            font-size: 10pt;
        }

        #baseDiv {
            overflow-y: auto;
        }

        .informationSection {
            width: 70%;
        }
        .titleAlunoBox {
            font-weight: bold;
            gap: 70px;
        }
    </style>
</head>
<body>
    <header>
        <button onclick="activeMenu()" id="menuIcon"><img style="height: 20px;" src="img/menu.png" alt="icone para acesso ao menu"></button>
        <img style="width: 50px; align-self: center;" src="img/logoUnicamp.png" alt="logo da unicamp">
    </header>
    <nav id="menu">
        <menu>
            <li><a class="menuItem" href="index.html">Cadastre-se</a></li>
            <li><a class="menuItem" href="base.php">Alunos cadastrados</a></li>
        </menu>
    </nav>
    <main>
        <div class="darkScreen">
            <section class="informationSection">
                <h1 class="title">Alunos</h1>
                <div id="baseDiv">
                    <?php
                        $cadastros = null;
                        $arquivo = fopen ('cadastros.txt', 'a+');

                        if(isset($_POST['RA'])) {
                            fwrite($arquivo, serialize($_POST));
                            fwrite($arquivo, "\n");
                        }
                            $cadastros = explode("\n",file_get_contents("cadastros.txt", filesize("cadastros.txt")));
                            fclose($arquivo);

                        
                        if($cadastros != null && count($cadastros) > 1) {
                            echo "<div class='titleAlunoBox alunoBox'>
                                    <p >RA</p>
                                    <p >Nome</p>
                                    <p >Idade</p>
                                    <p >Sexo</p>
                                    <p >Telelefone</p>
                                    <p >E-mail</p>
                                    <p >Endereço</p>
                                </div>";
                            foreach($cadastros as $chave => $v) {
                                $cadastros[$chave] = unserialize($v);
                            }
                            sort($cadastros);
                            foreach($cadastros as $chave => $v) {
                                if($chave != 0) {
                                    $ra = $cadastros[$chave]["RA"];
                                    $nome = $cadastros[$chave]["nome"];
                                    $sexo = $cadastros[$chave]["sexo"];
                                    $tel = $cadastros[$chave]["tel"];
                                    $end = $cadastros[$chave]["endereco"];
                                    $email = $cadastros[$chave]["email"];
                                    $idade = $cadastros[$chave]["idade"];
                                    echo "<div class='alunoBox' id='$ra'>
                                                <p id='raAlunoBox'>$ra</p>
                                                <p id='nomeAlunoBox'>$nome</p>
                                                <p id='idadeAlunoBox'>$idade</p>
                                                <p id='sexoAlunoBox'>$sexo</p>
                                                <p id='telAlunoBox'>$tel</p>
                                                <p id='emailAlunoBox'>$email</p>
                                                <p id='enderecoAlunoBox'>$end</p>
                                        </div>";
                                }
                            }
                        } else {
                            echo "Nenhum aluno cadastrado";
                        }

                    ?> 
                </div>
            </section>
        </div>
    </main>
    <footer>
        <h2 class="byMe">by Brenda Juliane</h2>
    </footer>
    <script src="script.js"></script>
</body>
</html>