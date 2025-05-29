<?php
    // 關閉錯誤訊息顯示（正式環境使用；開發階段建議改為 error_reporting(E_ALL)）
    error_reporting(0);

    // 啟用 session 機制
    session_start();

    // 檢查使用者是否已登入（session 裡是否有 id）
    if (!$_SESSION["id"]) {
        // 若尚未登入，顯示提示訊息，3 秒後導向登入頁面
        echo "please login first";
        echo "<meta http-equiv=REFRESH content='3, url=2.login.html'>";
    }
    else {
        // 若已登入，進行編輯佈告流程

        // 連接到資料庫
        $conn = mysqli_connect("db4free.net", "immust", "immustimmust", "immust");

        // 取得指定編號的佈告資料（從 GET 參數取得 bid）
        $result = mysqli_query($conn, "SELECT * FROM bulletin WHERE bid={$_GET["bid"]}");
        $row = mysqli_fetch_array($result); // 將查詢結果取出為陣列

        // 初始化各類型的 checked 狀態（用來預選 radio button）
        $checked1 = "";
        $checked2 = "";
        $checked3 = "";

        // 根據資料庫中佈告的類型設定 radio button 的預設選項
        if ($row['type'] == 1)
            $checked1 = "checked";
        if ($row['type'] == 2)
            $checked2 = "checked";
        if ($row['type'] == 3)
            $checked3 = "checked";

        // 輸出 HTML 表單，顯示佈告的現有資料供使用者編輯
        echo "
        <html>
            <head><title>新增佈告</title></head>
            <body>
                <form method=post action=27.bulletin_edit.php>

                    <!-- 顯示佈告編號，並以 hidden 傳遞至下個處理頁面 -->
                    佈告編號：{$row['bid']}<input type=hidden name=bid value={$row['bid']}><br>

                    <!-- 顯示佈告標題，可編輯 -->
                    標    題：<input type=text name=title value={$row['title']}><br>

                    <!-- 顯示佈告內容，可編輯 -->
                    內    容：<br><textarea name=content rows=20 cols=20>{$row['content']}</textarea><br>

                    <!-- 類型選擇，根據資料庫中的值預設已勾選項目 -->
                    佈告類型：
                        <input type=radio name=type value=1 {$checked1}>系上公告 
                        <input type=radio name=type value=2 {$checked2}>獲獎資訊
                        <input type=radio name=type value=3 {$checked3}>徵才資訊<br>

                    <!-- 顯示佈告時間，可編輯 -->
                    發布時間：<input type=date name=time value={$row['time']}><p></p>

                    <!-- 表單按鈕：提交與清除 -->
                    <input type=submit value=修改佈告> 
                    <input type=reset value=清除>
                </form>
            </body>
        </html>
        ";
    }
?>
