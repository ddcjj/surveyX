<!DOCTYPE HTML>
<html>
<head>
    
    <title>CoronaBad</title>
    <meta charset='utf-8'/>
<meta name='viewport' content='width=device-width, initial-scale=1, user-scalable=no'/>
<link rel='stylesheet' href='../assets/css/main.css' />
    
</head>
<body class='landing is-preload'>
<div id="page-wrapper" style="background: url('images/');background-position:center;background-attachment: ;">
    <section id='banner'>
        <img src='images/corona-5133661_1280.jpg' width='100%'>
        <ul class='actions special'>
            <li><a href='#main' class='button primary'>START</a></li>
        </ul>
    </section>
    <section id="main" class="container">

        <form action='output_CoronaBad.php' method='POST'>
<section class="box special" id="question_1">
        <header class="major">
            <h2 class="css_h2">姓名(1/5)
                <br>
                <span class="css_cover_fillin">填空</span></h2>
                <section class="box">
                <div class="col-6 col-12-narrower"><div class="col-12">
                    <input type="text" id="question1" name="question1" required></div>
</div>
                </section>
                <ul class="actions special">
                    <li><a href="#question_2" class="button primary">下一題</a></li>
                </ul>
        </header>
    </section>
<section class="box special" id="question_2">
        <header class="major">
            <h2 class="css_h2">性別(2/5)
                <br>
                <span class="css_cover_single">單選</span></h2>
                <section class="box">
                <div class="col-6 col-12-narrower">
<input type="radio" id="question2_1" name="question2" value="1" required>
                    <label for="question2_1">男</label>
<input type="radio" id="question2_2" name="question2" value="2">
                    <label for="question2_2">女</label>
<input type="radio" id="question2_3" name="question2" value="3">
                    <label for="question2_3">其他</label>
</div>
                </section>
                <ul class="actions special">
                    <li><a href="#question_3" class="button primary">下一題</a></li>
                </ul>
        </header>
    </section>
<section class="box special" id="question_3">
        <header class="major">
            <h2 class="css_h2">聯絡電話(3/5)
                <br>
                <span class="css_cover_fillin">填空</span></h2>
                <section class="box">
                <div class="col-6 col-12-narrower"><div class="col-12">
                    <input type="tel" id="question3" name="question3" required></div>
</div>
                </section>
                <ul class="actions special">
                    <li><a href="#question_4" class="button primary">下一題</a></li>
                </ul>
        </header>
    </section>
<section class="box special" id="question_4">
        <header class="major">
            <h2 class="css_h2">過去 14 天是否有發燒、咳嗽或呼吸急促症狀？（已服藥者亦須勾選「是」）(4/5)
                <br>
                <span class="css_cover_single">單選</span></h2>
                <section class="box">
                <div class="col-6 col-12-narrower">
<input type="radio" id="question4_1" name="question4" value="1" required>
                    <label for="question4_1">Ｙ</label>
<input type="radio" id="question4_2" name="question4" value="2">
                    <label for="question4_2">Ｎ</label>
</div>
                </section>
                <ul class="actions special">
                    <li><a href="#question_5" class="button primary">下一題</a></li>
                </ul>
        </header>
    </section>
<section class="box special" id="question_5">
        <header class="major">
            <h2 class="css_h2">過去 14 天是否曾出國至其他境外地區(5/5)
                <br>
                <span class="css_cover_single">單選</span></h2>
                <section class="box">
                <div class="col-6 col-12-narrower">
<input type="radio" id="question5_1" name="question5" value="1" required>
                    <label for="question5_1">Ｙ</label>
<input type="radio" id="question5_2" name="question5" value="2">
                    <label for="question5_2">Ｎ</label>
</div>
                </section>
                <ul class="actions special">
                    <li><a href="#question_6" class="button primary">下一題</a></li>
                </ul>
        </header>
    </section>
<section class='box special' id='question_6'>
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