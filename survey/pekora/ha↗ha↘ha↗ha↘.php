<?php 
    $pdo = new PDO('mysql:host=localhost;dbname=surveyx_creator;charset=utf8','root','');
    foreach($pdo->query('select c_rank from member_profile where account="pekora";') as $row) {
        $rank = $row['c_rank'];
    }
    if($rank == 2) {
    
    }
    else if($rank == 1 && isset($_SESSION['account'])) {
        echo '<script>alert("畫面預覽");</script>';
    }
    else {
        echo '<script>alert("未開通");</script>';
        echo '<meta http-equiv=REFRESH CONTENT=0;url=../../index.html>';
    }
?>
<!DOCTYPE HTML>
<html>
<head>
    
    <title>holo</title>
    <meta charset='utf-8'/>
<meta name='viewport' content='width=device-width, initial-scale=1, user-scalable=no'/>
<link rel='stylesheet' href='../assets/css/main.css' />
    
</head>
<body class='landing is-preload'>
<div id="page-wrapper" style="background: url('images/banner.jpg');background-position:center;background-attachment: fixed;">
    <section id='banner'>
        <img src='images/c-arrows.png' width='100%'>
        <ul class='actions special'>
            <li><a href='#main' class='button primary'>START</a></li>
        </ul>
    </section>
    <section id="main" class="container">

        <form action='output_ha↗ha↘ha↗ha↘.php' method='POST'>
<section class="box special" id="question_1">
        <header class="major"><h2 class="css_h2">ha↗ha↘ha↗ha↘ha↗ha↘ha↗ha↘(1/)
                <br>
                <span class="css_cover_single">單選</span></h2>
                <section class="box">
                <div class="col-6 col-12-narrower">
<input type="radio" id="question1_1" name="question1" value="1">
                    <label for="question1_1">option1</label>
<input type="radio" id="question1_2" name="question1" value="2">
                    <label for="question1_2">option2</label>
<input type="radio" id="question1_3" name="question1" value="3">
                    <label for="question1_3">option3</label>
<input type="radio" id="question1_4" name="question1" value="4">
                    <label for="question1_4">option4</label>
</div>
                </section>
                <ul class="actions special">
                    <li><a href="#question_2" class="button primary">下一題</a></li>
                </ul>
        </header>
    </section>
<section class="box special" id="question_2">
        <header class="major"><h2 class="css_h2">AAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAA(2/)
                <br>
                <span class="css_cover_multiple">多選</span></h2>
                <section class="box">
                <div class="col-6 col-12-narrower"><input type="checkbox" id="question2_1" name="question2_1">
                    <label for="question2_1">option1-1</label><input type="checkbox" id="question2_2" name="question2_2">
                    <label for="question2_2">option2-1</label><input type="checkbox" id="question2_3" name="question2_3">
                    <label for="question2_3">option3-1</label><input type="checkbox" id="question2_4" name="question2_4">
                    <label for="question2_4">option4-1</label>
</div>
                </section>
                <ul class="actions special">
                    <li><a href="#question_3" class="button primary">下一題</a></li>
                </ul>
        </header>
    </section>
<section class="box special" id="question_3">
        <header class="major"><h2 class="css_h2">這到底是什麼閃現喔齁齁齁齁齁齁齁(3/)
                <br>
                <span class="css_cover_" style="display:none">填空</span></h2>
                <section class="box">
                <div class="col-6 col-12-narrower"><div class="col-12">
                    <input type="text" id="question3" name="question3"></div>
</div>
                </section>
                <ul class="actions special">
                    <li><a href="#question_4" class="button primary">下一題</a></li>
                </ul>
        </header>
    </section>
<section class="box special" id="question_4">
        <header class="major"><section><div>
<h3>不想贏就不要贏
            </h3>
</div>
                </section>
                <ul class="actions special">
                    <li><a href="#question_5" class="button primary">下一題</a></li>
                </ul>
        </header>
    </section>
<section class='box special' id='question_5'>
                            <header class='major'>
                                <ul class='actions special'>
                                    <input type='submit' name='submit' class='button submit'>
                                </ul>
                            </header>
                        </section>
</form>
</section>
</div>
                        
<script src='../assets/js/jquery.min.js'></script>
                        <script src='../assets/js/jquery.dropotron.min.js'></script>
                        <script src='../assets/js/jquery.scrollex.min.js'></script>
                        <script src='../assets/js/browser.min.js'></script>
                        <script src='../assets/js/breakpoints.min.js'></script>
                        <script src='../assets/js/util.js'></script>
                        <script src='../assets/js/main.js'></script>
                        
</body>
</html>