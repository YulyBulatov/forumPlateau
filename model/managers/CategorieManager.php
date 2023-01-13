<?php

    namespace Model\Managers;
    
    use App\Manager;
    use App\DAO;

    class CategorieManager extends Manager{

        protected $className = "Model\Entities\Categorie";
        protected $tableName = "categorie";


        public function __construct(){
            parent::connect();
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