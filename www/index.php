<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, user-scalable=yes">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Card51</title>
    <link rel="stylesheet" href="css/style.css">
	<?php
	  require_once('data/user.php');
	?>
</head>
<body>
    <div class="content">
        <div class="head">
            <div class="macmenu">
                <div class="button">
                    <a href="#"><img src="img/person.png" alt="flaticon"></a>
                    <a href="#"><img src="img/settings.png" alt="flaticon"></a>
                    <a href="#"><img src="img/site.png" alt="flaticon"></a>
                    <a href="#"><img src="img/question.png" alt="flaticon"></a>
                    <a href="#"><img src="img/switch.png" alt="flaticon"></a>
                </div>
            </div>
        </div>
        <div class="body">
            
            <div id="range5">

                <div class="outer">
                    <div class="middle">
                        <div class="inner">
                    
                            <div class="login-wr">
                            <h2>Вход</h2>
                                <form class="form" method="post" action="index.php">
                                    <input name="email" type="text" placeholder="Пользователь">
                                    <input name="userPass" type="password" placeholder="Пароль">
                                    <button name="form_submit" type="submit"> Вход </button>
                                </form>
								<?php
								 // for test: email - ex@mail.ru password - 1
									if(isset($_POST["form_submit"])){
										$email = trim($_POST["email"]);
										$password = trim($_POST["userPass"]);
										if(!empty($email) and !empty($password)){
											if(User::uploadUserData($email,$password)){
												User::uploadCarts();
												//TODO: remove
												echo (User::$name."<br>");
												echo (User::$fam."<br>");
												echo (User::$email."<br>");
												echo (User::$phone."<br>");
												print_r(User::$carts);
											}
											else{
												echo "no such user";
											}
										}
										else{
											echo "Заполните поля";  
										}
									}
								   
								?>
                            </div>
                    
                        </div>
                    </div>
                </div>
                
            </div>
        </div>

        <div class="footer">Все права защищены &copy; 2020</div>
    </div>
</body>
</html>