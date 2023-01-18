<?php

    namespace Model\Managers;
    
    use App\Manager;
    use App\DAO;

    class SujetManager extends Manager{

        protected $className = "Model\Entities\Sujet";
        protected $tableName = "sujet";


        public function __construct(){
            parent::connect();
        }

        public function sujetsDeCategorie($id){

            $sql = "SELECT *
                    FROM ".$this->tableName." 
                    WHERE categorie_id = :id
                    ORDER BY creation DESC";

            return $this->getMultipleResults(
                DAO::select($sql, ['id' => $id]),
                $this->className
            );
        }

        public function findOneByTitre($titre){

            $sql = "SELECT *
                    FROM ".$this->tableName." a
                    WHERE a.titre = :titre
                    ";

            return $this->getOneOrNullResult(
                DAO::select($sql, ['titre' => $titre], false), 
                $this->className
            );
        }

    }