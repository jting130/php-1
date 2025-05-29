<?php
    // 關閉錯誤訊息顯示（正式環境使用，開發時建議改為 error_reporting(E_ALL)）
    error_reporting(0);

    // 啟動 session 功能，讓程式可以存取登入者的 session 資料
    session_start();

    // 檢查使用者是否已登入（session 中有沒有 "id" 這個變數）
    if (!$_SESSION["id"]) {
        // 如果沒有登入，顯示提示訊息，並在 3 秒後導回登入頁面
        echo "請登入帳號";
        echo "<meta http-equiv=REFRESH content='3, url=2.login.html'>";
    }
    else {
        // 如果已登入，進行刪除使用者的操作

        // 建立與資料庫的連線（host, user, password, database）
        $conn = mysqli_connect("db4free.net", "immust", "immustimmust", "immust");

        // 建立 SQL 指令：從 GET 參數取得要刪除的使用者 id，並組成 DELETE 語句
        $sql = "delete from user where id='{$_GET["id"]}'";

        // 測試用：輸出 SQL 語句檢查用（已註解）
        // echo $sql;

        // 執行 SQL 指令，若執行失敗則顯示錯誤訊息
        if (!mysqli_query($conn, $sql)) {
            echo "使用者刪除錯誤";
        } else {
            // 刪除成功，顯示提示訊息
            echo "使用者刪除成功";
        }

        // 3 秒後跳轉回使用者管理頁面
        echo "<meta http-equiv=REFRESH content='3, url=18.user.php'>";
    }
?>
