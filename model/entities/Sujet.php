<?php
    namespace Model\Entities;

    use App\Entity;

    final class Sujet extends Entity{

        private $id;
        private $titre;
        private $utilisateur;
        private $creation;
        private $ouvert;
        private $categorie;

        public function __construct($data){         
            $this->hydrate($data);        
        }
 
        /**
         * Get the value of id
         */ 
        public function getId()
        {
                return $this->id;
        }

        /**
         * Set the value of id
         *
         * @return  self
         */ 
        public function setId($id)
        {
                $this->id = $id;

                return $this;
        }

        /**
         * Get the value of titre
         */ 
        public function getTitre()
        {
                return $this->titre;
        }

        /**
         * Set the value of titre
         *
         * @return  self
         */ 
        public function setTitre($titre)
        {
                $this->titre = $titre;

                return $this;
        }

        /**
         * Get the value of utilisateur
         */ 
        public function getUtilisateur()
        {
                return $this->utilisateur;
        }

        /**
         * Set the value of utilisateur
         *
         * @return  self
         */ 
        public function setUtilisateur($utilisateur)
        {
                $this->utilisateur = $utilisateur;

                return $this;
        }

        /**
         * Get the value of creation
         */ 
        public function getCreation()
        {
                $formattedDate = $this->creation->format("d/m/Y, H:i:s");
            return $formattedDate;
        }

        /**
         * Set the value of creation
         *
         * @return  self
         */ 
        public function setCreation($creation)
        {
                
                $this->creation = new \DateTime($creation);

                return $this;
        }

        /**
         * Get the value of ouvert
         */ 
        public function getOuvert()
        {
                return $this->ouvert;
        }

        /**
         * Set the value of ouvert
         *
         * @return  self
         */ 
        public function setOuvert($ouvert)
        {
                $this->ouvert = $ouvert;

                return $this;
        }

        /**
         * Get the value of categorie
         */ 
        public function getCategorie()
        {
                return $this->categorie;
        }

        /**
         * Set the value of categorie
         *
         * @return  self
         */ 
        public function setCategorie($categorie)
        {
                $this->categorie = $categorie;

                return $this;
        }
    }
