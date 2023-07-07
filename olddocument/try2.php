<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        * {
            margin: 0;
            padding: 0;
            outline: none;
            border: none;
            text-decoration: none;
            box-sizing: border-box;
            font-family: "Noto Sans JP", sans-serif;
        }

        body {
            background: #d9d9d9;
            min-height: 100vh;
        }

        header {
            background: #00122e;
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 50px;
            text-align: center;
            color: #fff;
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 0 10px;
            z-index: 999;
            margin-left: 280px;
        }

        nav {
            background: #0d47a1;
            overflow: hidden;
            height: 100vh;
            width: 280px;
            position: fixed;
            top: 50px;
            left: 0;
            padding-top: 30px;
            z-index: 999;
        }

        .right-div {
            margin-left: 280px;
            height: 100vh;
            width: 100%;
            margin-top: 50px;
            position: fixed;
            background-color: #ffe9e9;
            transition: 0.5s;
            padding: 10px;
            box-sizing: border-box;
            overflow-y: auto;
        }
    </style>
</head>
<body>
    <header>
        <label>USER: CHIRAN</label>
        <label>Email:</label>
    </header>
    <nav>
        <ul>
            <li>
                <a href="#" class="logo">
                    <img src="images/Picture2.png" alt="" />
                    <span class="ADMIN">ADMIN</span>
                </a>
            </li>
            <!-- Rest of the navigation items -->
        </ul>
    </nav>
    <div class="right-div">
        <h1>HEY</h1>
        <div class="Section">
            <!-- ******************************** -->
            <!-- Rest of the content -->
        </div>
        <!-- ************************************************************************************************************************************************************* -->
    </div>
</body>
</html>
