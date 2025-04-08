<?php
class ConnexionBD
{
    private static ?PDO $pdo = null;

    public static function connect(string $dbname, string $user, string $pass): void {
        $dsn = "mysql:host=localhost;dbname=$dbname;charset=utf8mb4";

        try {
            self::$pdo = new PDO($dsn, $user, $pass);
            self::$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch (PDOException $e) {
            die("Erreur de connexion : " . $e->getMessage());
        }
    }

    public static function getConnection(): PDO {
        if (self::$pdo === null) {
            throw new Exception("Appelle d'abord ConnexionBD::connect() avant d'utiliser la connexion.");
        }
        return self::$pdo;
    }
}