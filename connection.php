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

function getAndPrintPostsFromDB(mysqli $conn): void
{
    $sql = "SELECT * FROM post";
    $result = $conn->query($sql);
    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            echo "ID: {$row['post_id']} - Title: {$row['title']} - Subtitle: {$row['subtitle']} - Date: {$row['publish_date']} - Is Featured: {$row['featured']} <br>";
        }
    } else {
        echo "0 results";
    }
}
