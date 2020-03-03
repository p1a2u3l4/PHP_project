<?$con = mysqli_connect("localhost", "root", "password", "testPHP");
    $errors = array();
    setcookie("TestCookie", $errors[0]);
        if ($_GET['login'] != "" && $_GET['password'] != "") //если поля заполнены    

        {       
            $login = $_GET['login']; 
            $password = $_GET['password'];

            $search_query = mysqli_query($con, "SELECT * FROM users WHERE login='".$login."'");
            
                if (mysqli_num_rows($search_query) == 1){
                    $result = mysqli_fetch_assoc($search_query);
                        if ($password == $result["password"]) {
                            session_start(); 
                            $_SESSION["id"]= $result["id"]; 
                            header ('Location: index.php');                           
                        }

                            else { 
                                $errors[] = "неверный пароль!";
                                setcookie("TestCookie", $errors[0]);
                                header ('Location: auth.php');
                            }
                }

                    else {
                        $errors[] = "Неверный логин и пароль!";           
                        setcookie("TestCookie", $errors[0]);
                        header ('Location: auth.php');
                    }

        }
            else    
            {       
                $errors[] = "Поля не должны быть пустыми!";              
                setcookie("TestCookie", $errors[0]);
                header ('Location: auth.php');
            } ?>