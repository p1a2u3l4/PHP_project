<?$con = mysqli_connect("localhost", "root", "password", "testPHP");
    $errors = array();
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
                            //session_start(); 
                            header ('Location: index.php');
                            
                        }

                            else { 
                                $errors[] = "неверный пароль!";
                                //return $errors;
                                echo $errors[0];
                            }
                }

                    else {
                        $errors[] = "Неверный логин и пароль!";           
                        //return $errors;
                        echo $errors[0];
                    }

        }
            else    
            {       
                $errors[] = "Поля не должны быть пустыми!";              
                //return $errors;  
                echo $errors[0];
            } ?>