<html>
    <head>
        <title>修改使用者</title> <!-- 設定頁面標題 -->
    </head>
    <body>
<?php
    // 關閉錯誤訊息顯示（正式環境使用，開發階段建議使用 error_reporting(E_ALL)）
    error_reporting(0);

    // 啟用 session 功能，用來取得登入使用者資訊
    session_start();

    // 判斷是否已登入（session 中有無 "id"）
    if (!$_SESSION["id"]) {
        // 未登入：顯示提示訊息並在 3 秒後自動跳轉到登入頁面
        echo "請登入帳號";
        echo "<meta http-equiv=REFRESH content='3, url=2.login.html'>";
    }
    else {   
        // 已登入，進行資料庫操作

        // 建立資料庫連線
        $conn = mysqli_connect("db4free.net", "immust", "immustimmust", "immust");

        // 從資料庫查詢指定 id 的使用者資料（透過 GET 傳遞）
        $result = mysqli_query($conn, "SELECT * FROM user WHERE id='{$_GET['id']}'");

        // 取得查詢結果的第一筆資料（應該只有一筆）
        $row = mysqli_fetch_array($result);

        // 顯示修改表單（帳號為只讀顯示，密碼可修改）
        echo "
            <form method=post action=20.user_edit.php>
                <!-- 將帳號以 hidden 欄位傳遞，不讓使用者修改 -->
                <input type=hidden name=id value={$row['id']}>
                
                帳號：{$row['id']}<br> <!-- 顯示帳號，不可修改 -->
                
                密碼：<input type=text name=pwd value={$row['pwd']}><p></p> <!-- 可修改密碼欄位 -->
                
                <input type=submit value=修改> <!-- 提交表單按鈕 -->
            </form>
        ";
    }
?>
    </body>
</html>
