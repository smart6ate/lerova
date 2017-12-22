<?php

try {
    $url = $image->image . 'detect_faces/';
    $client = new Client([
        'headers' => [
            'Accept' => 'application/json',
            'Content-Type' => 'application/json',
        ]
    ]);

    $response = $client->request('GET', $url);

    $data = json_decode($response->getBody());


    if (!empty($data)) {

        $image->uploadcare_uuid = $data->id;
        $image->format = $data->format;
        $image->width = $data->width;
        $image->height = $data->height;
        $image->orientation = $data->orientation;
        $image->faces =

        $data->faces = json_encode([

            'x' => reset($data->faces)[0],
            'y' => reset($data->faces)[1],
            'x_size' => reset($data->faces)[2],
            'y_size' => reset($data->faces)[3]
        ]);

        $image->geo_location = json_encode($data->geo_location);

        $image->save();

    }
} catch (\Exception $e) {

    $image->uploadcare_uuid = null;
    $image->format = null;
    $image->width = null;
    $image->height = null;
    $image->orientation = null;
    $image->faces = null;
    $image->geo_location = null;

    $image->save();

}