<html>
    <head>
        <title>使用者管理</title> <!-- 設定網頁標題 -->
    </head>
    <body>
<?php
    // 關閉錯誤訊息顯示（正式環境建議使用；開發時可使用 error_reporting(E_ALL)）
    error_reporting(0);

    // 啟用 session 機制，用於判斷使用者是否登入
    session_start();

    // 檢查是否有登入（session 中是否存在 "id"）
    if (!$_SESSION["id"]) {
        // 沒有登入的話提示使用者，3 秒後跳轉回登入頁面
        echo "請登入帳號";
        echo "<meta http-equiv=REFRESH content='3, url=2.login.html'>";
    }
    else {
        // 如果已登入，顯示使用者管理頁面內容

        // 標題與導覽選單
        echo "
            <h1>使用者管理</h1>
            [<a href=14.user_add_form.php>新增使用者</a>] 
            [<a href=11.bulletin.php>回佈告欄列表</a>]<br>
            
            <!-- 建立表格框架 -->
            <table border=1>
                <tr>
                    <td></td> <!-- 功能欄：修改 / 刪除 -->
                    <td>帳號</td>
                    <td>密碼</td>
                </tr>";

        // 建立與資料庫的連線
        $conn = mysqli_connect("db4free.net", "immust", "immustimmust", "immust");

        // 從資料庫中查詢所有使用者資料
        $result = mysqli_query($conn, "SELECT * FROM user");

        // 使用 while 迴圈逐筆顯示使用者資料
        while ($row = mysqli_fetch_array($result)) {
            echo "
                <tr>
                    <td>
                        <!-- 修改與刪除連結，並將使用者 id 透過 GET 傳遞 -->
                        <a href=19.user_edit_form.php?id={$row['id']}>修改</a> ||
                        <a href=17.user_delete.php?id={$row['id']}>刪除</a>
                    </td>
                    <td>{$row['id']}</td> <!-- 顯示使用者帳號 -->
                    <td>{$row['pwd']}</td> <!-- 顯示使用者密碼 -->
                </tr>";
        }

        // 結束表格標籤
        echo "</table>";
    }
?>
    </body>
</html>
