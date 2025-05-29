<?php
    // 關閉錯誤訊息顯示（正式環境可使用，開發階段建議使用 error_reporting(E_ALL)）
    error_reporting(0);

    // 啟用 session 功能
    session_start();

    // 檢查是否登入（確認 session 裡有 "id"）
    if (!$_SESSION["id"]) {
        // 若尚未登入，提示訊息並跳轉回登入頁面
        echo "please login first";
        echo "<meta http-equiv=REFRESH content='3, url=2.login.html'>";
    }
    else {
        // 已登入，開始新增佈告流程

        // 建立與資料庫的連線
        $conn = mysqli_connect("db4free.net", "immust", "immustimmust", "immust");

        // 組合 SQL 新增語句，插入 POST 表單送來的佈告資料
        $sql = "INSERT INTO bulletin(title, content, type, time) 
                VALUES('{$_POST['title']}', '{$_POST['content']}', {$_POST['type']}, '{$_POST['time']}')";

        // 執行 SQL 查詢，如果失敗則顯示錯誤訊息
        if (!mysqli_query($conn, $sql)) {
            echo "新增命令錯誤";
        }
        else {
            // 新增成功，提示訊息並於 3 秒後返回佈告欄頁面
            echo "新增佈告成功，三秒鐘後回到網頁";
            echo "<meta http-equiv=REFRESH content='3, url=11.bulletin.php
