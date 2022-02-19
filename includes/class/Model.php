<?php

class Model
{

    private $servername = 'localhost';
    private $dbname = 'stock_multimedia';
    private $username = 'root';
    private $password = 'root';
    private $conn;

    public function __construct()
    {
        try { // On essaie de se connecter a la base de donnees
            $this->conn = new PDO("mysql:host={$this->servername};dbname={$this->dbname}", $this->username, $this->password);
            $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            /*
             * On définit le mode d'erreur grace a setAttribute qui permet de définir les fonctions les une après les autres
             * ATTR_ERRMODE affiche les erreur, ERRMODE_EXCEPTION renvoi les exception
             */
            session_start();
        } catch (PDOException $e) {
            echo 'Erreur : ' . $e->getMessage();
        }
    }

    public function inscription($username, $motDePasse, $motDePasse2)
    {
        $sql = "SELECT * FROM users WHERE username = '{$username}'";
        $res = $this->conn->query($sql);
        $count = $res->fetchColumn();

        if (!$count) {
            if ($motDePasse === $motDePasse2) {
                try {
                    $motDePasse = password_hash($motDePasse, PASSWORD_DEFAULT);
                    $sth = $this->conn->prepare('INSERT INTO users (username,password) VALUES (:username, :password)');
                    $sth->bindValue('username', $username);
                    $sth->bindValue('password', $motDePasse);
                    $sth->execute();
                    echo '<div class="notification__success">L\'utilisateur a bien été enregistré !</div>';
                } catch (PDOException $e) {
                    echo 'Error' . $e->getMessage();
                }
            } else {
                echo '<div class="notification__failed">Les mots de passe ne concordent pas !</div>';
            }
        } elseif ($count > 0) {
            echo '<div class="notification__failed">Ce nom d\'utilisateur existe déjà !</div>';
        }
    }

    public function affichageProduits()
    {

        $sth = $this->conn->prepare('SELECT p.*,c.categories_name,u.username 
        FROM products AS p 
        LEFT JOIN categories AS c ON p.category_id = c.categories_id 
        LEFT JOIN users AS u ON p.user_id = u.id 
        ORDER BY category_id, products_name');
        $sth->execute();
        while ($products = $sth->fetchAll(PDO::FETCH_ASSOC)){
            $data[] = $products;
        };
        return $data;

    }

}