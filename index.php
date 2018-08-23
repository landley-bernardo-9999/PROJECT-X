<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Vester</title>

    <link rel="stylesheet" href="css/main.css">

</head>
<body>
    <div id="container">

        <div id="header">
                <div id="title">
                    <h1><a href="#index.html">Vester Corporation</a></h1>
                </div>
                
        </div>

        <div id="login">

            <form action="php/login.php" method="POST">
                <div id="div-username" class="div-form">
                    <div id="div-username-label">
                        <label for="username">Username:</label>
                    </div>
                    <div id="div-username-input">
                        <input type="text" name="username" required>
                    </div>
                </div>
            
                <div id="div-password" class="div-form">
                    <div id="div-password-label">
                        <label for="pasword">Password:</label>
                    </div>
                    
                    <div id="div-password-input">
                        <input type="password" name="password" required> 
                    </div>
                </div>

                <div id="div-login" >
                    <button type="submit" name="login">LOGIN</button>
                </div>

                <div id="div-forgot-password">
                    <a href="#">Forgot password?</a>
                </div>

            </form>

        </div>

        <div id="footer">
            <div id="faq">
                 <h1><a href="#">FAQ</a></h1>
            </div>

            <div id="copyright">
                <h1><a href="#">Copyright 2018</a></h1>
            </div>

        </div>
    </div>

</body>
</html>