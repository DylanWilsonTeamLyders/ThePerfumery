<?php

class Database
{
    // Variable declaration
    protected $servername;
    protected $username;
    protected $password;
    protected $conn;

    // Constructs variables to be accessed via functions
    public function __construct($servername, $username, $password)
    {
        $this->servername = $servername;
        $this->username = $username;
        $this->password = $password;
        $this->conn = new PDO("mysql:host=$this->servername;dbname=ThePerfumery", $this->username, $this->password);
    }

    //Connection to be used by other functions
    public function connect()
    {
        try {
            // set the PDO error mode to exception
            $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch (PDOException $e) {
            echo "Connection failed: " . $e->getMessage();
        }
    }

    //Returns specfic column declaration from a row.
    public function selectFrom($columns, $table, $whereQualifier, $userNameEmail)
    {
        $this->connect();
        $query = $this->conn->prepare("SELECT $columns FROM $table WHERE $whereQualifier = :userNameEmail;");
        $query->execute(['userNameEmail' => $userNameEmail]);
        $row = $query->fetch(PDO::FETCH_ASSOC);
        return $row["$columns"] ?? null;
    }

    //Inserts data into users database
    public function insertInto($U, $E, $B, $P, $F, $L)
    {
        $this->connect();
        $query = $this->conn->prepare("INSERT INTO users (Username, Email, Birthday, Password, FirstName, LastName) VALUES (?, ?, ?, ?, ?, ?)");
        $query->execute([$U, $E, $B, $P, $F, $L]);
    }

    //Inserts data into drag database
    public function insertIntoDrag($U)
    {
        $this->connect();
        $query = $this->conn->prepare("INSERT INTO drag (Username, Wishlist, Owned) VALUES (?, default, default)");
        $query->execute([$U]);
    }

    //Updates table
    public function update($table, $parameter, $changedParameter, $username)
    {
        $this->connect();
        $query = $this->conn->prepare("UPDATE $table SET $parameter = ? WHERE Username = ?");
        //Execute update statement.
        $query->execute([$changedParameter, $username]);
    }

    //Deletes single row from table
    public function delete($table, $username)
    {
        $this->connect();
        //Execute update statement.
        $query = $this->conn->prepare("DELETE FROM $table WHERE Username = ?");
        $query->execute([$username]);
    }
}
