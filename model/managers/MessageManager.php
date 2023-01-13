<?php

    namespace Model\Managers;
    
    use App\Manager;
    use App\DAO;

    class MessageManager extends Manager{

        protected $className = "Model\Entities\Message";
        protected $tableName = "message";


        public function __construct(){
            parent::connect();
        }

        public function messagesDuSujet($id){

            $sql = "SELECT id_message, texte, ecriture, message.utilisateur_id, sujet_id, pseudonyme
            FROM message
            INNER JOIN sujet ON message.sujet_id = sujet.id_sujet
            INNER JOIN utilisateur ON message.utilisateur_id = utilisateur.id_utilisateur 
            WHERE sujet_id = :id
            ORDER BY ecriture DESC";

            return $this->getMultipleResults(
                DAO::select($sql, ['id' => $id]),
                $this->className
            );


        }

    }