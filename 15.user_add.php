<?php

// 關閉錯誤訊息顯示（建議開發時使用 error_reporting(E_ALL)）
error_reporting(0);

// 啟用 session 機制，以便取用登入使用者資料
session_start();

// 檢查使用者是否已登入（檢查 session 中是否有 "id"）
if (!$_SESSION["id"]) {
    // 如果沒有登入，提示使用者並自動跳轉到登入頁面
    echo "請登入帳號";
    echo "<meta http-equiv=REFRESH content='3, url=2.login.html'>";
}
else {    
    // 使用者已登入，繼續執行新增資料流程

    // 建立與資料庫的連線：伺服器位址、帳號、密碼、資料庫名稱
    $conn = mysqli_connect("db4free.net", "immust", "immustimmust", "immust");

    // 建立 SQL 新增語句，從 POST 表單中取得 id 與 pwd 的值
    $sql = "insert into user(id, pwd) values('{$_POST['id']}', '{$_POST['pwd']}')";

    // 如果執行 SQL 指令失敗，顯示錯誤訊息
    if (!mysqli_query($conn, $sql)) {
        echo "新增命令錯誤";
    }
    else {
        // 如果新增成功，顯示成功訊息，並在 3 秒後跳轉到 18.user.php 頁面
        echo "新增使用者成功，三秒鐘後回到網頁";
        echo "<meta http-equiv=REFRESH content='3, url=18.user.php'>";
    }
}
?>
