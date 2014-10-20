<?php
// define variables and set to empty values
$titleErr = "";


if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (empty($_POST["title"])) {
        $titleErr = "Title is required";
        echo $titleErr;
    } else {

        $file_result = "";
        if ($_FILES["file"]["error"] > 0  ) {
            $file_result .= "No File Uploaded or Invalid File ";
            $file_result .= "Error Code: " . $_FILES["file"]["error"] . "<br>";
        } else {

            $file_result .=
                "Upload: " . $_FILES["file"]["name"] . "<br>" .
                "Type: " . $_FILES["file"]["type"] . "<br>" .
                "Size: " . $_FILES["file"]["size"] . "<br>" .
                "Temp File: " . $_FILES["file"]["tmp_name"] . "<br>";

            move_uploaded_file($_FILES["file"]["tmp_name"], "media/{$_FILES["file"]["name"]}");
            $file_result .= "File Upload Successful";


        }


        $title = test_input($_POST["title"]);
        $file = test_input($_POST["file"]);
        $tags = test_input($_POST["tags"]);
        $content = test_input($_POST["content"]);
        $date = test_input($_POST["date"]);
        $location = test_input($_POST["location"]);
        $latitude = test_input($_POST["latitude"]);
        $longitude = test_input($_POST["longitude"]);


        // check if name only contains letters and whitespace
        if (!preg_match("/^[a-zA-Z ]*$/", $title)) {
            $titleErr = "Only letters and white space allowed";
        }
    }


}

function test_input($data)
{
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}

echo "<h2>Your Input:</h2>";
echo $title;
echo '<br>';
echo $file_result;
echo '<br>';
echo $tags;
echo '<br>';
echo $content;
echo '<br>';
echo $date;
echo '<br>';
echo $location;
echo '<br>';
echo $latitude;
echo '<br>';
echo $longitude;
echo '<br>';
phpinfo();
"print_r($_FILES);"



?>


