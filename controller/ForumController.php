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

            if($sujetManager->sujetsDeCategorie($id)){

                return [
                    "view" => VIEW_DIR."forum/listTopics.php",
                    "data" => [
                        "sujets" => $sujetManager->sujetsDeCategorie($id)
                    ]
                    ];
            }
            else{

                $categorieManager = new CategorieManager();

                return [
                    "view" => VIEW_DIR."forum/listTopics.php",
                    "data" => [
                        "categorie" => $categorieManager->findOneById($id)
                    ]
                    ];
            }        
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

        public function sendNewMessage(){

            if(isset($_POST['submit'])){

                $texte = filter_input(INPUT_POST, "texte", FILTER_SANITIZE_FULL_SPECIAL_CHARS);
                $sujet_id = filter_input(INPUT_POST, "sujet_id", FILTER_SANITIZE_NUMBER_INT);
                $utilisateur_id = filter_input(INPUT_POST, "utilisateur_id", FILTER_SANITIZE_NUMBER_INT);

                if($texte && $sujet_id && $utilisateur_id){

                    $messageManager = new MessageManager;

                    $data = ["texte" => $texte,
                            "sujet_id" => $sujet_id,
                            "utilisateur_id" => $utilisateur_id];
                    
                    $messageManager->add($data);
                    
                    return self::messagesDuSujet($sujet_id);
                }
            }
        }

        public function creerNouvelleCategorie(){

            if(isset($_POST['submit'])){

                $titre = filter_input(INPUT_POST, "titre", FILTER_SANITIZE_FULL_SPECIAL_CHARS);

                if($titre){

                    $categorieManager = new CategorieManager;

                    if(!$categorieManager->findOneByTitre($titre)){

                        $data = ["titre" => $titre];

                        $categorieManager->add($data);

                        return self::listCategories();
                    }
                }
            }
        }

        public function addNouveauSujet(){

            if(isset($_POST['submit'])){

                $titre = filter_input(INPUT_POST, "titre", FILTER_SANITIZE_FULL_SPECIAL_CHARS);
                $texte = filter_input(INPUT_POST, "texte", FILTER_SANITIZE_FULL_SPECIAL_CHARS);
                $utilisateur_id = filter_input(INPUT_POST, "utilisateur_id", FILTER_SANITIZE_NUMBER_INT);
                $categorie_id = filter_input(INPUT_POST, "categorie_id", FILTER_SANITIZE_NUMBER_INT);

                if($titre && $texte && $utilisateur_id && $categorie_id){

                    $sujetManager = new SujetManager;

                    if(!$sujetManager->findOneByTitre($titre)){

                        $data = ["titre" => $titre,
                                "categorie_id" => $categorie_id,
                                "utilisateur_id" => $utilisateur_id];

                        $sujet_id = $sujetManager->add($data);

                        if($sujet_id){

                            $messageManager = new MessageManager;

                    $data = ["texte" => $texte,
                            "sujet_id" => $sujet_id,
                            "utilisateur_id" => $utilisateur_id];
                    
                    $messageManager->add($data);
                    
                    return self::messagesDuSujet($sujet_id);
                        }
                    }
                }
            }
        }

        public function supprimerMessage($id){
            $this->restrictTo("ROLE_ADMIN");

            $manager = new MessageManager();
            $message = $manager->findOneById($id);
            $id_sujet = $message->getSujet()->getId();
            $manager->delete($id);

            return self::messagesDuSujet($id_sujet);


        }

        public function cloturerSujet($id){

            $manager = new SujetManager();
            $sujet = $manager->findOneById($id);
            $id_categorie = $sujet->getCategorie()->getId();
            $manager->update("ouvert", 0, $id);

            return self::sujetsDeCategorie($id_categorie);

        }

        public function supprimerSujet($id){

            $this->restrictTo("ROLE_ADMIN");

            $manager = new SujetManager();
            $sujet = $manager->findOneById($id);
            $id_categorie = $sujet->getCategorie()->getId();
            $manager->delete($id);

            return self::sujetsDeCategorie($id_categorie);

        }

    }
