<?php
include_once '..' . DIRECTORY_SEPARATOR . 'addComment.php';
$addComment = new addComment();
$addComment->comValidator();
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
        <?php
        if ($_SERVER['REQUEST_METHOD'] === 'GET'):
            $id = parse_url($_SERVER["HTTP_REFERER"]);
            $update_id = preg_replace('~[^0-9]+~', '', $id['query']);
            ?>
            <div id="main" class="w3-card-4">
                <div class="w3-container w3-teal">
                    <h2>Создать комментарий</h2>
                </div>
                <form method="POST" w3-container>
                    <p>
                        <label class="w3-text-teal"><b>Имя автора</b></label>
                        <input class="w3-input w3-border w3-light-grey" type="text" name="author" maxlength="150" placeholder="автор" required/>
                    </p>
                    <p>
                        <label class="w3-text-teal"><b>Текст</b></label>
                        <textarea name="coment" placeholder="text" required class="w3-input w3-border w3-light-grey"></textarea>
                    </p>
                    <input class="w3-input w3-border w3-light-grey" type="hidden" value="<?php echo $update_id; ?>"name="news_id" required/>
                    <p>
                        <input class="w3-btn w3-blue-grey" type="submit" value="Загрузить" name="upload"/>
                    </p>
                    <p id="msg"><?php
                        $addComment->comValidator();
                        echo $addComment->error_message
                        ?></p>
                </form>

            </div>


<?php endif; ?>
    </body>
</html>


