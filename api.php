<?php

function authBySession()
{
    session_name('auth');
    session_start();
    if (is_null($_SESSION['auth'])) {
        header('HTTP/1.1 401 Unauthorized');
        die();
    }
}

authBySession();

require_once "connection.php";

$method = $_SERVER['REQUEST_METHOD'];
echo $method;

if ($method != "POST") {
    echo "Ожидался другой метод";
} else {
    $dataAsJson = file_get_contents("php://input");
    $dataAsArray = json_decode($dataAsJson, true);
    $conn = createDBConnection();
    addPost($dataAsArray, $conn);
    closeDBConnection($conn);  
}

function saveImage(string $imageBase64, string $imageName) {
    $imageBase64Array = explode(';base64,', $imageBase64);
    $imgExtention = str_replace('data:image/', '', $imageBase64Array[0]);
    $imageDecoded = base64_decode($imageBase64Array[1]);
    saveFile("images/{$imageName}.{$imgExtention}", $imageDecoded);
    return "images/{$imageName}.{$imgExtention}";
}

function saveFile(string $file, string $data): void {
    $myFile = fopen($file, 'w');
    if ($myFile) {
        $result = fwrite($myFile, $data);
    if ($result) {
        echo 'Данные успешно сохранены в файл';
    } else {
        echo 'Произошла ошибка при сохранении данных в файл';
    }
    fclose($myFile);
    } else {
        echo 'Произошла ошибка при открытии файла';
    }
}

function addPost(array $dataAsArray, $conn): void {
    $title = $dataAsArray['title'] ?? null;
    $subtitle = $dataAsArray['subtitle'] ?? null;
    $content = $dataAsArray['content'] ?? '';
    $author = $dataAsArray['author'] ?? null;
    $author_url = saveImage($dataAsArray['author_url'], $author);   
    $publish_date = $dataAsArray['publish_date'] ?? null;
    $image_url = saveImage($dataAsArray['image_url'], $title);  
    $featured = $dataAsArray['featured'] ?? null;
    
    $sql = <<<SQL
            INSERT INTO post
            (title, subtitle, content, author, author_url, publish_date, image_url, featured)
            VALUES ('$title', '$subtitle', '$content', '$author', '$author_url', '$publish_date', '$image_url', $featured)
    SQL;
    $conn->query($sql);
}
?>