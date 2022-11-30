<!DOCTYPE html>
<html>
<head>
<script src="https://ajaxzip3.github.io/ajaxzip3.js" charset="UTF-8"></script>
<link rel="stylesheet" href="jyusho.css">
<title>住所入力</title>
</head>
<meta content="text/html; charset=utf-8" http-equiv="Content-Type">
<script src="https://code.jquery.com/jquery-3.3.1.js"></script>
        <script>
            $(function(){
                var today = new Date();
                var end_year = today.getFullYear();
                var year = end_year - 100;
                while (year <= end_year) {
                    var year_str = String(year);
                    var s = (year == (end_year - 50)) ? " selected " : "";
                    $('#year_selector').append("<option value=\""+year_str+"\""+s+">"+year_str+"</option>");
                    year = year + 1;
                }
                for (var month=1; month <= 12; month++) {
                    var month_str = ("0" + String(month)).slice(-2);
                    $('#month_selector').append("<option value=\""+month_str+"\">"+month_str+"</option>");
                }
                $('#year_selector').change(function(){
                    $('#month_selector').change();
                });
                $('#month_selector').change(function(){
                    if ($('#year_selector').val() == "") return;
                    if ($('#month_selector').val() == "") return;
                    
                    var year = Number($('#year_selector').val());
                    var month = Number($('#month_selector').val());

                    var leap_year_flag = false;
                    if ((year % 400) == 0) {
                        leap_year_flag = true;
                    } else if ((year % 100) == 0) {
                        leap_year_flag = false;
                    } else if ((year % 4) == 0) {
                        leap_year_flag = true;
                    }
                    
                    var end_day = 31;
                    switch (month) {
                        case 2:
                            end_day = leap_year_flag ? 29 : 28;
                            break;
                        case 4:
                        case 6:
                        case 9:
                        case 11:
                            end_day = 30;
                            break;
                    }
                    $('#day_selector').children().remove();
                    for (var day=1; day <= end_day; day++) {
                        var day_str = ("0" + String(day)).slice(-2);
                        $('#day_selector').append("<option value=\""+day_str+"\">"+day_str+"</option>");
                    }
                });
                $('#month_selector').change();
            });
        </script>
<body>
    <div class="pan">
    <a href="../toppage/afterlogin.html">TOP</a>>住所入力</a>
    </div>
    <div class="inner">
    <div class="main"> 
    <div class="main2">
    <h2>---お客様情報入力------</h2>
    <form action="../nyuryoku/Nkakunin.php" method="POST">
        <p>名前</p>
        <div calss="example">
            <input type="text" name="name">
        </div>
        <p>フリガナ</p>
        <input type="text" name="hurigana">
        <p>生年月日</p>
        <select id="year_selector">
        </select>
        <select id="month_selector">
        </select>
        <select id="day_selector">
        </select>
        <p>電話番号</p>
        <input type="tel" name="tel" maxlength="17">
        <p>メールアドレス</p>
        <input type="email" id="input4" maxlength="25">

        <h2>---現在のお住まい-----</h2>
        <p>郵便番号</p>
        <input type="text" name="zip1" size="10" maxlength="8" onKeyUp="AjaxZip3.zip2addr(this,'','adress','adress');">
        <p>住所入力</p>
        <input type="text" name="jyusho1" size="60">    
        <p>番地・マンション名</p>
        <input type="text" name="banthi1"> 
        <p>建築タイプ</p>
        <select name="type1" >
            <option value="">-選択してください-</option>
            <option value="manshon">マンション</option>
            <option value="apart">アパート</option>
            <option value="kodate">戸建て</option>
            <option value="sonota">その他</option>
        </select>  
        <p>階層（アパート、マンションの方）</p>
        <input type="text" name="kaisou1">

        <h2>---引越し先住所-----</h2>
        <p>郵便番号</p>
        <input type="text" name="zip2" size="10" maxlength="8" onKeyUp="AjaxZip3.zip2addr(this,'','adress','adress');">
        <p>住所入力</p>
        <input type="text" name="jyusho2" size="60">    
        <p>番地・マンション名</p>
        <input type="text" name="banthi2"> 
        <p>建築タイプ</p>
        <select name="type2">
            <option value="">-選択してください-</option>
            <option value="manshon">マンション</option>
            <option value="apart">アパート</option>
            <option value="kodate">戸建て</option>
            <option value="sonota">その他</option>
        </select>  
        <p>階層（アパート、マンションの方）</p>
        <input type="text" name="kaisou2"><br>
        </form>    
        <button onclick="location.href='../toppage/afterlogin.html'">戻る</button>
        <button onclick="location.href='hiniti.html'">次へ</button>
    </div>
    </div>
    </div>
    </form>
</body>
</html>