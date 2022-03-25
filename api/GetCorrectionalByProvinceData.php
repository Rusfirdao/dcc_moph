<?php
$date = $_POST['date'];
if ($date == null) {
    $date = "";
}
$curl = curl_init();
curl_setopt_array($curl, array(
    CURLOPT_URL => "http://110.164.203.27/ddc_moph/api/v1/GetCorrectionalByProvince?startDate={$date}",
    CURLOPT_RETURNTRANSFER => true,
    CURLOPT_ENCODING  => "",
    CURLOPT_MAXREDIRS => 10,
    CURLOPT_TIMEOUT => 30,
    CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
    CURLOPT_CUSTOMREQUEST => "GET",
    CURLOPT_POSTFIELDS => "",
    CURLOPT_HTTPHEADER => array(
        "X-Api-Key:93802a3627b0df31078922aad9069734",
        "Cache-Control: no-cache",
        "Content-Type: application/json"
    ),
));

$response = curl_exec($curl);
$err = curl_error($curl);

curl_close($curl);
$body_array = '';

if ($err) {
    echo "cURL Error #:" . $err;
} else {
    $body_array = json_decode($response, true);
}
// var_dump($body_array);


header('Content-Type: application/json');


$data = array();
foreach ($body_array as $row) {
    $data[] = $row;
}


usort($data, function ($province, $count) {
    return $province['count'] <= $count['count'];
});


echo json_encode($data);
