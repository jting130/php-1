<html>
    <head>
        <title>明新科技大學資訊管理系</title>
        <meta charset="utf-8">
        <!-- 引入Flexslider的CSS檔 -->
        <link href="https://cdn.bootcss.com/flexslider/2.6.3/flexslider.min.css" rel="stylesheet">
        <!-- 引入jQuery -->
        <script src="https://cdn.bootcss.com/jquery/2.2.2/jquery.min.js"></script>
        <!-- 引入Flexslider的JavaScript檔 -->
        <script src="https://cdn.bootcss.com/flexslider/2.6.3/jquery.flexslider-min.js"></script>        
        
        <script>
            // 頁面載入完成後啟動Flexslider輪播
            $(window).load(function() {
                $('.flexslider').flexslider({
                    animation: "slide",  // 動畫方式為滑動
                    rtl: true            // 右到左顯示輪播(從右往左)
                });
            });
        </script>

        <style>
            /* 全局樣式 */
            *{
                margin:0;
                color:gray;
                text-align:center;
            }
            /* 頂部區塊 */
            .top{
                background-color: white;
            }
            .top .container{
                display: flex;
                align-items: center;
                justify-content: space-between;
                padding:10px;
            }
            .top .logo{
                font-size: 35px;
                font-weight: bold;
            }
            .top .logo img{
                width: 100px;
                vertical-align: middle;
            }
            .top .top-nav{
                font-size: 25px;
                font-weight: bold;       
            }
            .top .top-nav a{
                text-decoration: none;
            }
            /* 導航列 */
            .nav {
                background-color:#333;
                display: flex;
                justify-content: center;
            }
            .nav ul {
                list-style-type: none;  
                margin: 0; 
                padding: 0; 
                overflow: hidden; 
                background-color: #333; 
            }
            .nav li {
                float: left; 
            }
            .nav li a {    
                display: block;  
                color: white;  
                text-align: center;  
                padding: 14px 16px;  
                text-decoration: none;  
            }
            .nav li a:hover {
                background-color: #111; 
            }
            /* 下拉選單 */
            .dropdown:hover .dropdown-content {
                display: block;   /* 滑鼠移到下拉項目時顯示內容 */
            }
            li.dropdown:hover{
                background-color: #333;  /* 背景色保持深色 */
            }
            .dropdown-content {  /* 下拉選單的內容 */
                display: none;
                position: absolute;
                background-color: #333;
                min-width: 160px;
                z-index: 1;
            }
            .dropdown-content a { /* 下拉選單中連結的樣式 */
                color: black;
                padding: 12px 16px;
                text-decoration: none;
                display: block;
                text-align: left;
            }
            /* 輪播區塊背景 */
            .slider{
                background-color: black;
            }
            /* Banner區塊樣式 */
            .banner{
                background-image: linear-gradient(#ABDCFF,#0396FF);
                padding:30px;
            }
            .banner h1{
                padding: 20px;
            }        
            /* 師資介紹區塊 */
            .faculty {
                display: block;
                justify-content: center;
                background-color:white;
                padding:40px;
            }
            .faculty h2 {
                font-size: 25px;
                color: rgb(50,51,52);
                padding-bottom:40px;
            }
            .faculty .container {
                display: flex;
                justify-content: space-around;
                align-items: center;
            }
            .faculty .teacher{
                display:block;
                text-decoration: none;
            }
            .faculty .teacher img{
                height: 200px;
                width: 200px;
            }
            .faculty .teacher h3{
                color: White;
                background-color: rgba(39,40,34,.500);
                text-align: center;           
            }
            /* 聯絡資訊區塊 */
            .contact {
                display: block;
                justify-content: center;
                margin-top: 30px;
                margin-bottom: 30px;                
            }
            .contact h2{
                color: rgb(54, 82, 110);
                font-size: 25px;
            }
            .contact .infos{
                display:flex;
                margin-top: 30px; 
                justify-content: center;
            }
            .contact .infos .left{
                display:block;
                text-align: left;
                margin-right: 30px;
            }
            .contact .infos .left b{
                display:block;
                text-align: left;
                margin-top: 10px;
                text-decoration: bold;
                color: Gray;
                font-size: 18px;
                line-height: 18px;
            }
            .contact .infos .left span{
                display:block;
                text-align: left;
                margin-top: 10px;
                color: rgba(39,40,34,0.5);
                font-size: 16px;
                padding-left: 27px;
            }
            .contact .infos .right{
                height: 200px;               
            }
            .contact .infos .right iframe{
                width: 100%;
                height: 100%;
                border: 1px solid rgba(39,40,34,0.50);
            }
            /* 頁尾 */
            .footer{
                display: flex;
                j
