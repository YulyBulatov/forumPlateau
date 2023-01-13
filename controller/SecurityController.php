<?php

    namespace Controller;

    use App\Session;
    use App\AbstractController;
    use App\ControllerInterface;
    use Model\Managers\UtilisateurManager;
    use Model\Managers\SujetManager;
    use Model\Managers\MessageManager;
    
    class SecurityController extends AbstractController implements ControllerInterface{

        public function index(){
            
           
            return [
                "view" => VIEW_DIR."security/login.php"
            ];
        }

        public function register(){

            return [
                "view" => VIEW_DIR."security/register.php"
            ];
        }

        public function registerNewUser(){

            if(isset($_POST['submit'])){

                if($_POST['password'] === $_POST['password_verify']){

                    $email = filter_input(INPUT_POST, "email", FILTER_SANITIZE_EMAIL);
                    $pseudonyme = filter_input(INPUT_POST, "pseudonyme", FILTER_SANITIZE_FULL_SPECIAL_CHARS);
                    $password = filter_input(INPUT_POST, "password", FILTER_SANITIZE_FULL_SPECIAL_CHARS);
                    $password = password_hash($password, PASSWORD_DEFAULT);

                    if($email && $pseudonyme && $password){

                        $utilisateurManager = new UtilisateurManager;

                        if(!$utilisateurManager->findOneByEmail($email)){

                            if(!$utilisateurManager->findOneByPseudonyme($pseudonyme)){

                                $data = ["email" => $email, "pseudonyme" => $pseudonyme, "password" => $password];

                                return [

                                    "view" => VIEW_DIR."/security/login.php",

                                    "data" => $utilisateurManager->add($data)
                                ];
                            }
                        }
                    }
               }
            }
        }

        public function login(){

            return [
                "view" => VIEW_DIR."security/login.php"
            ];
        }

        public function loginUser(){

            if(isset($_POST['submit'])){

                $email = filter_input(INPUT_POST, "email", FILTER_SANITIZE_EMAIL);
                $password = filter_input(INPUT_POST, "password", FILTER_SANITIZE_FULL_SPECIAL_CHARS);

                if($email && $password){

                    $utilisateurManager = new UtilisateurManager;

                    $user = $utilisateurManager->findOneByEmail($email);

                    if($user){

                        $hash = $user->getPassword();

                        if(password_verify($password, $hash)){

                            if($user->getBanni() != 1){

                            $session = new Session;
                         
                            $session->setUser($user);

                            return [
                                "view" => VIEW_DIR."home.php"
                            ];
                            }
                        }
                    }
                }
            }
        }

        public function logout(){

            unset($_SESSION["user"]);

            return [
                "view" => VIEW_DIR."home.php"
            ];
        }


    }