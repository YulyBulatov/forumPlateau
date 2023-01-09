<?php

    namespace Controller;

    use App\Session;
    use App\AbstractController;
    use App\ControllerInterface;
    use Model\Entities\Categorie;
    use Model\Managers\CategorieManager;
    use Model\Managers\SujetManager;
    use Model\Managers\MessageManager;
    
    class ForumController extends AbstractController implements ControllerInterface{

        public function index(){
          

           $topicManager = new SujetManager();

            return [
                "view" => VIEW_DIR."forum/listTopics.php",
                "data" => [
                    "topics" => $topicManager->findAll(["creation", "DESC"])
                ]
            ];
        
        }

        public  function listCategories(){

            $categorieManager = new CategorieManager();

            return  [
                "view" => VIEW_DIR."forum/listCategories.php",
                "data" => [
                    "categories" => $categorieManager->findAll(["titre", "DESC"])
                ]
                ];
        }

        public function sujetsDeCategorie($id){

            $sujetManager = new SujetManager();

            return [
                "view" => VIEW_DIR."forum/listTopics.php",
                "data" => [
                    "sujets"=> $sujetManager->sujetsDeCategorie($id)
                ]
                ];
        }

        public function messagesDuSujet($id){

            $messageManager = new MessageManager();

            return [
                "view" => VIEW_DIR."forum/listMessages.php",
                "data" => [
                    "messages" => $messageManager->messagesDuSujet($id)
                ]
                ];

        }

    }
