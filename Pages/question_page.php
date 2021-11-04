<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ask a Question</title>
    <link rel="stylesheet" href="../Styles/question_page.css">
    <script src="../Scripts/question_page.js"></script>
</head>
<body>
    <?php
    //cookie and the checking part goes her
    ?>
    <div class="main">
        <div class="line"></div>
        <div class="rightbox">
            <input type="button" value="Tips to ask good Question" onclick="tips()" id="tipper">
        </div>
        <div class="content">
            <div class="maincontent">
                <div class="title">
                    <h4>Title</h4>
                    <p>Be specific and imagine that you are asking question to another person</p>
                    <input type="text" name="title">
                </div>
                <div class="description">
                    <h4>Description</h4>
                    <p>Includes everythig that is required to answer</p>
                    <!-- <input type="text" name="desc" id="desc"> -->
                    <textarea name="desc" id="desc" cols="30" rows="10"></textarea>
                </div>
                <div class="buttons">
                    <input type="button" value="Reset">
                    <input type="button" value="Post">
                </div>
            </div>
        </div>
        <div class="mainpopup" id="mainpopup">
            <div class="pop">
                <div class="cancel">
                    <p>X</p>
                </div>
                <h2>Asking a good question</h2>
                <p>You’re ready to ask your first question and your campus community is here to help you! To get you the best answers, we’ve provided some guidance</p>
                <p>Before you ask make sure your question hasb not been answered</p>
            </div>
        </div>
    </div>
</body>
</html>