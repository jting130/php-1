<?php
    // 關閉錯誤訊息顯示（正式環境使用，開發時建議開啟以便除錯）
    error_reporting(0);

    // 啟用 session，用來驗證使用者登入狀態
    session_start();

    // 檢查是否已登入（session 中是否有 id）
    if (!$_SESSION["id"]) {
        // 如果沒有登入，顯示提示訊息並3秒後跳轉回登入頁面
        echo "請登入帳號";
        echo "<meta http-equiv=REFRESH content='3, url=2.login.html'>";
    }
    else {   
        // 已登入，開始執行刪除佈告的流程

        // 建立資料庫連線
        $conn = mysqli_connect("db4free.net", "immust", "immustimmust", "immust");

        // 從 GET 參數取得佈告編號 bid，建立刪除語句
        $sql = "DELETE FROM bulletin WHERE bid='{$_GET["bid"]}'";

        // 執行刪除命令
        // 若執行失敗，顯示錯誤訊息
        if (!mysqli_query($conn, $sql)) {
            echo "佈告刪除錯誤";
        }
        else {
            // 刪除成功，顯示成功訊息
            echo "佈告刪除成功";
        }

        // 無論成功或失敗，3秒後跳轉回佈告欄列表頁面
        echo "<meta http-equiv=REFRESH content='3, url=11.bulletin.php'>";
    }
?>
