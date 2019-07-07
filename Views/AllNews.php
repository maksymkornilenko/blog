<?php
include_once 'config.php';
?>
<!doctype>
<html>
    <head>
        <title></title>
        <link href="css/main.css" rel="stylesheet" type="text/css"/>                
        <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
        <link href="../css/accordion.css" rel="stylesheet" type="text/css"/>
        <script src="../js/main.js" type="text/javascript"></script>
        <link href="../css/table.css" rel="stylesheet" type="text/css"/>
    </head>
    <body>
        <button class="accordion">popular news</button>
        <div class="panel">
            <form method="POST" class="w3-container">
                <div class="accordion" id="title">
                    <table class="allnews">
                        <tr>
                            <th>Name author</th>
                            <th>Text</th>
                            <th>Date of create</th>
                            <th>Delete</th>
                        </tr>
                        <?php
                        $db = new DataBase();
                        $popular_array = $db->getPopularNews();
                        foreach ($popular_array as $array):
                            $link = $URL_SITE . '/SingleNews.php?newsId=' . $array['id'];
                            ?>
                            <tr>
                            <a href='<?= $link . $array->newsId; ?>'>
                                <td class="maininf1">
                                    <?= $array['name'] ?>
                                </td>
                                <td>
                                    <p><?= $array['text']; ?></p>
                                </td>
                                <td class="maininf3">
                                    <?= $array['dateOfCreate']; ?>
                                </td>
                            </a>
                            <td class="maininf5">
                                <input class="w3-button w3-teal" type="submit"  value='Delete' id="delete"/>
                            </td>
                            </tr>

                            <input type="hidden" name="deleteNewsId" value="<?= $array['id'] ?>"/>
                        <?php endforeach; ?>
                    </table>
                </div>
        </div>
    <div id="cabinet_allNews">
        <form method="POST" class="w3-container">
            <br/>
            <a href="Views/newNews.php">
                <input class="accordion" type="button" name="cabinet_newNews" value="Create new" id="addNews" />
            </a>
            <div class="accordion" id="title">
                <table class="allnews">
                    <tr>
                        <th>Name author</th>
                        <th>Text</th>
                        <th>Date of create</th>
                        <th>Count of comments</th>
                        <th>Delete</th>
                    </tr>
                    <?php
                    $news_array = array_reverse($db->getNews());
                    foreach ($news_array as $news):
                        $link = $URL_SITE . '/SingleNews.php?newsId=' . $news['id'];
                        ?>

                        <tr>
                            <td class="maininf1">
                                <a href='<?= $link . $news->newsId; ?>'><?= $news['name'] ?></a>
                            </td>
                            <td>
                                <a href='<?= $link . $news->newsId; ?>'><p><?= $news['text']; ?></p></a>
                            </td>
                            <td class="maininf3">
                                <a href='<?= $link . $news->newsId; ?>'><?= $news['dateOfCreate']; ?></a>
                            </td>
                            <td class="maininf3">
                                <a href='<?= $link . $news->newsId; ?>'><?= $news['COUNT(comments.news_id)']; ?></a>
                            </td>
                            <td class="maininf5">
                                <input class="w3-button w3-teal" type="submit"  value='Delete' id="delete"/>
                            </td>
                        <input type="hidden" name="deleteNewsId" value="<?= $news['id'] ?>"/>
                        </tr>


                    <?php endforeach; ?>
                </table>
            </div>
    </div>
    <a href="Views/NewNews.php">
        <input class="accordion" type="button" name="cabinet_newNews" value="Create new" id="addNews" />
    </a> 
</form>
</div>
<script src="../js/accordion.js" type="text/javascript"></script>
</body>
</html>