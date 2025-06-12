<?php 
namespace App\Database;
//table contenant de connexion a la base de donnée

class Database {
    
    private $conn;                   // Instance PDO
    private $table =[
        'host'     => 'localhost' , // Nom de l'hôte
        'dbname'   => "sust_agr" , // Nom de la base de données
        'username' => 'root', // Nom d'utilisateur
        'password' => ''  // Mot de passe
    ];

    public function __construct(){
        
        try {
            $this->conn = new \PDO("mysql:host=". $this->table['host'].";dbname=". $this->table['dbname'] .";charset=utf8",
                $this->table['username'],$this->table['password']);
            // Configuration pour afficher les erreurs PDO (recommandé en développement)
            $this->conn->setAttribute(\PDO::ATTR_ERRMODE, \PDO::ERRMODE_EXCEPTION);
            // Définir le mode de récupération par défaut sur les tableaux associatifs
            $this->conn->setAttribute(\PDO::ATTR_DEFAULT_FETCH_MODE, \PDO::FETCH_ASSOC);

        } catch (\PDOException $e) {
            // Gérer l'erreur de connexion (log, afficher un message, etc.)
            error_log("Erreur de connexion à la base de données : " . $e->getMessage());
            die("Erreur de connexion à la base de données. Veuillez contacter l'administrateur.");
        }
    }

    // Méthode de déconnexion (facultative, PHP gère généralement bien la déconnexion implicite)
    public function disconnect() {
        $this->conn = null; // Déconnecter explicitement
    }

    // Méthode pour exécuter une requête SELECT et récupérer les résultats : array|false
    public function query(string $sql, ?array $params = [],?bool $bool= false)
    {
        try {
            $stmt = $this->conn->prepare($sql); // Préparer la requête

            if (!$stmt) {
                throw new \Exception("Erreur lors de la préparation de la requête SQL : " . $sql);
            }

            $stmt->execute($params); // Exécuter la requête avec les paramètres
            if($bool == false){
                return $stmt->fetch(); // Récupérer un  résultat resultat
            }elseif($bool == true){
                return $stmt->fetchAll(); // Récupérer tous les résultats sous forme de tableau associatif
            }
            
        } catch (\Exception $e) {
            error_log("Erreur lors de l'exécution de la requête : " . $e->getMessage() . " SQL: " . $sql);
            return false; // Retourner false en cas d'erreur
        }
    }
    // Méthode pour compter le resultat du  SELECT 
    public function queryCount(string $sql, ?array $params = [])
    {
        try {
            $stmt = $this->conn->prepare($sql); // Préparer la requête

            if (!$stmt) {
                throw new \Exception("Erreur lors de la préparation de la requête SQL : " . $sql);
            }

            $stmt->execute($params); // Exécuter la requête avec les paramètres
            if ($stmt){
                return $stmt->rowCount();// Compte  le résultat
            }else{
                return 0;
            }
             
        } catch (\Exception $e) {
            error_log("Erreur lors de l'exécution de la requête : " . $e->getMessage() . " SQL: " . $sql);
            return false; // Retourner false en cas d'erreur
        }
    }

    // Méthode pour exécuter une requête INSERT, UPDATE ou DELETE : bool
    public function execute(string $sql, ?array $params = [])
    {
        try {
            $stmt = $this->conn->prepare($sql);  // Préparer la requête

             if (!$stmt) {
                throw new \Exception("Erreur lors de la préparation de la requête SQL : " . $sql);
            }

            return $stmt->execute($params); // Exécuter la requête avec les paramètres

        } catch (\Exception $e) {error_log("Erreur lors de l'exécution de la requête : " . $e->getMessage() . " SQL: " . $sql);
            return false; // Retourner false en cas d'erreur
        }
    }

    

}

?>  