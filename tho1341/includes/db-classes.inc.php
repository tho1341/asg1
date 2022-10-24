<?php 
class DBHelper { 
    /* Returns a connection object to a database */
    public static function createConnection( $values=array() ) { 
        $connString = $values[0]; 
        $user = $values[1]; 
        $password = $values[2]; 
        $pdo = new PDO($connString,$user,$password); 
        $pdo->setAttribute(PDO::ATTR_ERRMODE, 
        PDO::ERRMODE_EXCEPTION); 
        $pdo->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, 
        PDO::FETCH_ASSOC); 
        return $pdo; 
    }

    /*
    Runs the specified SQL query using the passed connection and 
    the passed array of parameters (null if none)
    */
    public static function runQuery($connection, $sql, $parameters) { 
        $statement = null; 
        // if there are parameters then do a prepared statement
        if (isset($parameters)) { 
            // Ensure parameters are in an array
            if (!is_array($parameters)) { 
                $parameters = array($parameters); 
            } 
            // Use a prepared statement if parameters 
            $statement = $connection->prepare($sql); 
            $executedOk = $statement->execute($parameters); 
        if (! $executedOk) throw new PDOException; 
        } else { 
        // Execute a normal query 
        $statement = $connection->query($sql); 
        if (!$statement) throw new PDOException; 
        } 
        return $statement; 
    } 
} 
    
class MusicDB { 
    //base sql where every use is based off
    private static $baseSQL = "SELECT title, duration, year, genres.genre_name, artists.artist_name, types.type_name, bpm, energy, danceability, liveness, valence, acousticness, speechiness, popularity
            FROM songs 
            LEFT JOIN genres ON genres.genre_id = songs.genre_id
            LEFT JOIN artists ON artists.artist_id = songs.artist_id
            LEFT JOIN types ON artists.artist_type_id = types.type_id ";
    
    //constructor
    public function __construct($connection) { 
        $this->pdo = $connection; 
    } 
    
    //gets all using base sql
    public function getAll() { 
        $sql = self::$baseSQL; 
        $statement = 
        DBHelper::runQuery($this->pdo, $sql, null); 
        return $statement->fetchAll(); 
    } 

    //gets all for the single page
    public function getAllForSingle($song) { 
        $sql = self::$baseSQL . " WHERE song_id=?"; 
        $statement = DBHelper::runQuery($this->pdo, $sql, Array($song)); 
        return $statement->fetchAll(); 
    } 

    public function getAllArtist() { 
        $sql = self::$baseSQL . " GROUP BY artists.artist_name"; 
        $statement = DBHelper::runQuery($this->pdo, $sql, null); 
        return $statement->fetchAll(); 
    } 

    public function getAllGenre() { 
        $sql = self::$baseSQL . " GROUP BY genres.genre_name"; 
        $statement = DBHelper::runQuery($this->pdo, $sql, null); 
        return $statement->fetchAll(); 
    } 
    //dunno if use = or LIKE, both work
    public function getSongArtist($artist) { 
        $sql = self::$baseSQL . " WHERE artists.artist_name=?"; 
        $statement = DBHelper::runQuery($this->pdo, $sql, Array($artist)); 
        return $statement->fetchAll(); 
    } 
    public function getSongGenre($genre) { 
        $sql = self::$baseSQL . " WHERE genres.genre_name LIKE ?"; 
        $statement = DBHelper::runQuery($this->pdo, $sql, Array($genre)); 
        return $statement->fetchAll(); 
    } 

    public function getSongTitle($title) { 
        $sql = self::$baseSQL . " WHERE title LIKE :search"; 
        $statement = $this->pdo->prepare($sql);
        $statement->bindValue(":search", '%' . $_POST['title'] . '%');
        $statement->execute();
        return $statement->fetchAll(); 
    } 
} 

