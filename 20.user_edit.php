<?php
    // 關閉錯誤訊息顯示（正式環境建議，開發中可使用 error_reporting(E_ALL)）
    error_reporting(0);

    // 啟動 session 功能
    session_start();

    // 檢查是否登入（session 中有沒有 id）
    if (!$_SESSION["id"]) {
        // 如果未登入，提示訊息並跳回登入頁面
        echo "請登入帳號";
        echo "<meta http-equiv=REFRESH content='3, url=2.login.html'>";
    }
    else {   
        // 已登入的情況下執行修改使用者密碼的操作

        // 建立與資料庫的連線
        $conn = mysqli_connect("db4free.net", "immust", "immustimmust", "immust");

        // 執行 SQL 指令：根據使用者輸入的 id 與 pwd 修改密碼
        $sql = "UPDATE user SET pwd='{$_POST['pwd']}' WHERE id='{$_POST['id']}'";

        // 執行查詢，並依執行結果顯示提示訊息
        if (!mysqli_query($conn, $sql)) {
            // 若修改失敗，顯示錯誤訊息並跳轉回使用者管理頁
            echo "修改錯誤";
            echo "<meta http-equiv=REFRESH content='3, url=18.user.php'>";
        } else {
            // 若修改成功，顯示成功訊息並跳轉
            echo "修改成功，三秒鐘後回到網頁";
            echo "<meta http-equiv=REFRESH content='3, url=18.user.php'>";
        }
    }
?>
