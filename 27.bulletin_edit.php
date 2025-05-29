<?php
    // 關閉錯誤訊息顯示（正式環境使用；開發時建議改為 error_reporting(E_ALL)）
    error_reporting(0);

    // 啟用 session，用來驗證使用者登入狀態
    session_start();

    // 檢查是否已登入（session 裡是否有 id）
    if (!$_SESSION["id"]) {
        // 未登入：顯示提示並跳回登入頁
        echo "請登入帳號";
        echo "<meta http-equiv=REFRESH content='3, url=2.login.html'>";
    }
    else {   
        // 已登入，執行佈告修改流程

        // 建立資料庫連線
        $conn = mysqli_connect("db4free.net", "immust", "immustimmust", "immust");

        // 執行 SQL 更新語句，從表單取得使用者修改後的資料
        $sql = "UPDATE bulletin 
                SET title='{$_POST['title']}', 
                    content='{$_POST['content']}', 
                    time='{$_POST['time']}', 
                    type={$_POST['type']} 
                WHERE bid='{$_POST['bid']}'";

        // 執行查詢，顯示成功或錯誤訊息
        if (!mysqli_query($conn, $sql)) {
            echo "修改錯誤";
            echo "<meta http-equiv=REFRESH content='3, url=11.bulletin.php'>";
        } else {
            echo "修改成功，三秒鐘後回到佈告欄列表";
            echo "<meta http-equiv=REFRESH content='3, url=11.bulletin.php'>";
        }
    }
?>
