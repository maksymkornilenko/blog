<?php
include_once '..' . DIRECTORY_SEPARATOR . 'newNews.php';
$newNews = new newNews();
$newNews->fileValidator();
?>
<!DOCTYPE html>
<html>
    <head>
        <title>Add news</title>
        <meta charset="UTF-8">
        <link href="../css/newNews.css" rel="stylesheet" type="text/css"/>
	<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
        <link href="../css/Footer.css" rel="stylesheet" type="text/css"/>
    </head>
    <body>
        <?php if ($_SERVER['REQUEST_METHOD'] === 'GET'): ?>
            
        <div id="main" class="w3-card-4">
            <div class="w3-container w3-teal">
                <h2>Создать статью</h2>
            </div>
                <form method="POST" w3-container>
                    <p>
                    <label class="w3-text-teal"><b>Имя автора</b></label>
                    <input class="w3-input w3-border w3-light-grey" type="text" name="title" maxlength="150" placeholder="автор" required/>
                    </p>
                    <p>
                    <label class="w3-text-teal"><b>Текст</b></label>
                    <textarea name="content" placeholder="text" required class="w3-input w3-border w3-light-grey"></textarea>
                    </p>
                    <p>
                    <input class="w3-btn w3-blue-grey" type="submit" value="Загрузить" name="upload"/>
                    </p>
		                      <p id="msg"><?php
            $newNews->fileValidator();
            echo $newNews->error_message
            ?></p>
                </form>

                </div>

            
        <?php endif; ?>
    </body>
</html>


