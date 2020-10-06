<?PHP

function handleCapture($base64)
{
    $base64substr = explode(',', $base64);
    $imagePath = 'captures/' . md5('img') . time() . '.png';
    $imageFile = fopen($imagePath, 'w');

    fwrite($imageFile, base64_decode($base64substr[1]));

    fclose($imageFile);

    return $imagePath;
}
