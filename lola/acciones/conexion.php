<?php 
/** The name of the database */
define('DB_NAME', 'al315571_ei1036_42');

/** MySQL database username */
define('DB_USER', 'al315571');

/** MySQL database password */
define('DB_PASSWORD', '73393348A');

/** MySQL hostname */
define('DB_HOST', 'db-aules.uji.es' );

/** Database Charset to use in creating database tables. */
define('DB_CHARSET', 'utf8');

/** The Database Collate type. Don't change this if in doubt. */
define('DB_COLLATE', '');

global $pdo;
$pdo = new PDO("pgsql:host=".DB_HOST.";dbname=".DB_NAME,DB_USER,DB_PASSWORD);

function crearTablas() {
    global $pdo;
	$productos="CREATE TABLE IF NOT EXISTS  productos (product_id SERIAL PRIMARY KEY, nombre VARCHAR(50) NOT NULL, imagen VARCHAR(50) NOT NULL);";
	$carrito="CREATE TABLE IF NOT EXISTS  carrito (item_id SERIAL PRIMARY KEY, client_id int NOT NULL, product_id int NOT NULL, fecha date);";
	try{
        $consulta_prod = $pdo->prepare($productos);
        $consulta_carr = $pdo->prepare($carrito);
        $consulta_prod->execute();
        $consulta_carr->execute();
    }
    catch (PDOException $e) {
        echo "Failed to get DB handle: " . $e->getMessage() . "\n";
        exit;
    }
}

function ejecutarConsultas($pdo,$query,$valor) {

        try{

            $consulta = $pdo->prepare($query);
            $result=$consulta->execute($valor);

        }
        catch (PDOException $e) {
            echo "Failed to get DB handle: " . $e->getMessage() . "\n";
            exit;
        }
        return ($consulta->fetchAll(PDO::FETCH_ASSOC));


}

crearTablas();

?>