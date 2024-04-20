<?php
$method = $_SERVER['REQUEST_METHOD'];
echo $method;

if ($method != "POST") {
  echo "Ожидается другой метод";
} else {
  $dataAsJson = file_get_contents("php://input");
  $dataAsArray = json_decode($dataAsJson, true);
  saveImage($dataAsArray['image']);
}

function saveImage(string $imageBase64)
{
  $imageBase64Array = explode(';base64,', $imageBase64);
  $imgExtention = str_replace('data:image/', '', $imageBase64Array[0]);
  $imageDecoded = base64_decode($imageBase64Array[1]);
  saveFile("images/my.image.{$imgExtention}", $imageDecoded);
}
function saveFile(string $file, string $data): void
{
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
  $content = $dataAsArray['content'] ?? 'content';
  $author = $dataAsArray['author'] ?? null;
  $author_url = "http://localhost:8001/static/images/William_Wong.svg";
  $publish_date = $dataAsArray['publish_date'] ?? null;
  $image_url = "http://localhost:8001/static/images/new_post.jpg";
  $featured = $dataAsArray['featured'] ?? null;
  $sql = <<<SQL
           INSERT INTO post
           (title, subtitle, content, author, author_url, publish_date, image_url, featured);
           VALUES ('$title', '$subtitle', '$content', '$author', '$author_url', '$publish_date', '$image_irl', '$featured');
  SQL;
  $conn->query($sql);
}
?>