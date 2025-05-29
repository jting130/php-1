<?php
    // 關閉錯誤訊息顯示（開發階段建議使用 error_reporting(E_ALL)）
    error_reporting(0);

    // 啟動 session 功能
    session_start();

    // 判斷是否已登入（檢查 session 中是否有 "id"）
    if (!$_SESSION["id"]) {
        // 如果尚未登入，顯示提示訊息並在 3 秒後導向登入頁面
        echo "please login first";
        echo "<meta http-equiv=REFRESH content='3, url=2.login.html'>";
    }
    else {
        // 如果已登入，顯示新增佈告的 HTML 表單
        echo "
        <html>
            <head><title>新增佈告</title></head>
            <body>
                <!-- 表單使用 POST 方法送出至 23.bulletin_add.php -->
                <form method=post action=23.bulletin_add.php>

                    <!-- 輸入佈告標題 -->
                    標    題：<input type=text name=title><br>

                    <!-- 輸入佈告內容（多行） -->
                    內    容：<br>
                    <textarea name=content rows=20 cols=20></textarea><br>

                    <!-- 佈告類型選擇（單選） -->
                    佈告類型：
                    <input type=radio name=type value=1>系上公告 
                    <input type=radio name=type value=2>獲獎資訊
                    <input type=radio name=type value=3>徵才資訊<br>

                    <!-- 發布時間輸入欄位（日期格式） -->
                    發布時間：<input type=date name=time><p></p>

                    <!-- 提交與清除按鈕 -->
                    <input type=submit value=新增佈告> 
                    <input type=reset value=清除>
                </form>
            </body>
        </html>
        ";
    }
?>
