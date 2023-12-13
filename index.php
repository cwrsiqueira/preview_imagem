<?php
$imagem = $_FILES;

if ($imagem) {
    echo '<h2>Recebe o arquivo no backend</h2>';
    echo '<pre>';
    var_dump($imagem);
    echo '</pre>';
    echo '<p>Faz os tratamentos de segurança e salva o arquivo.</p>';
    exit;
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mostrar Preview da Imagem</title>

    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: Arial, Helvetica, sans-serif;
        }

        body {
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            margin-top: 200px;
        }

        form {
            border: 1px solid #eee;
            border-radius: 8px;
            padding: 20px;
            margin-top: 100px;
        }

        input[type=file] {
            display: none;
        }

        input[type=submit] {
            padding: 10px;
            border: 1px solid #4682b4;
            border-radius: 6px;
            background-color: #4682b4;
            color: #fff;
            cursor: pointer;
        }

        input[type=submit]:hover {
            background-color: #4696b4;
        }

        .photo-area {
            border-radius: 6px;
        }

        .photo-info {
            position: absolute;
            width: 150px;
            height: 150px;
            background-color: rgba(0, 0, 0, 0.5);
            color: #fff;
            display: none;
            justify-content: center;
            align-items: center;
            cursor: pointer;
            border-radius: 6px;
        }

        .photo-area:hover .photo-info {
            display: flex;
        }
    </style>
</head>

<body>
    <h1>Mostrar Preview da Imagem</h1>

    <form action="" method="post" enctype="multipart/form-data">
        <div class="photo-area">
            <div class="photo-info" onclick="document.querySelector('input[type=file]').click()">
                Selecionar Imagem
            </div>
            <img src="default.png" alt="Imagem Padrão" width="150" height="150" class="default-img">
            <input type="file" name="imagem" id="imagem" onchange="previewImage()"> <br><br>
        </div>
        <input type="submit" value="Salvar">
    </form>

    <script>
        function previewImage() {
            const imagem = document.querySelector('input[name=imagem]').files[0];
            const preview = document.querySelector('img');
            const reader = new FileReader();

            reader.onloadend = function() {
                preview.src = reader.result;
            }

            if (imagem) {
                reader.readAsDataURL(imagem);
            } else {
                preview.src = "default.png";
            }
        }
    </script>
</body>

</html>