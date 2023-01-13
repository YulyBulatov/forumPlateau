<?php

    namespace Model\Managers;
    
    use App\Manager;
    use App\DAO;

    class UtilisateurManager extends Manager{

        protected $className = "Model\Entities\Utilisateur";
        protected $tableName = "utilisateur";


        public function __construct(){
            parent::connect();
        }

        public function findOneByEmail($email){

            $sql = "SELECT *
                    FROM ".$this->tableName." a
                    WHERE a.email = :email
                    ";

            return $this->getOneOrNullResult(
                DAO::select($sql, ['email' => $email], false), 
                $this->className
            );
        }

        public function findOneByPseudonyme($pseudonyme){

            $sql = "SELECT *
                    FROM ".$this->tableName." a
                    WHERE a.pseudonyme = :pseudonyme
                    ";

            return $this->getOneOrNullResult(
                DAO::select($sql, ['pseudonyme' => $pseudonyme], false), 
                $this->className
            );
        }

    }