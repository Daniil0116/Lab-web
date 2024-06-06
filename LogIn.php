<?php

const HOST = 'localhost';
const USERNAME = 'DaniilAdmin';
const PASSWORD = 'Dan13586';
const DATABASE = 'blog';

function createDBConnection(): mysqli
{
    $conn = new mysqli(HOST, USERNAME, PASSWORD, DATABASE);
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }
    return $conn;
}

function closeDBConnection(mysqli $conn): void
{
    $conn->close();
}

function findUserInDB(mysqli $conn): void
{
    $dataAsArray = []; // Инициализация переменной

    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $dataAsJson = file_get_contents("php://input");
        $dataAsArray = json_decode($dataAsJson, true);

        // Отладочная информация
        error_log("Received data: " . print_r($dataAsArray, true));
    }

    if (!empty($dataAsArray) && isset($dataAsArray['password']) && isset($dataAsArray['login'])) {
        $salt = 'MyPass';
        $pass = md5((string)$dataAsArray['password']);
        $email = $dataAsArray['login'];
        $query = "SELECT user_id FROM user WHERE email = ? AND password = ?";
        $statement = $conn->prepare($query);
        $statement->bind_param("ss", $email, $pass);
        $statement->execute();
        $result = $statement->get_result();

        if ($result->num_rows > 0) {
            $row = $result->fetch_assoc();
            $userId = $row['user_id'];
            session_name('auth');
            session_start();
            $_SESSION['user_id'] = $userId;
            header('HTTP/1.1 200 OK');
        } else {
            header('HTTP/1.1 401 Unauthorized');
            echo $dataAsArray;
        }
    } else {
        header('HTTP/1.1 400 Bad Request'); // Возвращаем ошибку 400, если данные не были переданы
    }

    closeDBConnection($conn);
}

$conn = createDBConnection();
findUserInDB($conn);
