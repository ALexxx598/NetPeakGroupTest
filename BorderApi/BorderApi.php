<?php

require_once "BorderApiInterface.php";
require_once "GetActivityResponse.php";

class BorderApi implements BorderApiInterface
{
    /**
     * @inheritDoc
     */
    public function getActivity(int $participants, HolidayType $type): GetActivityResponse
    {
        $url = "https://www.boredapi.com/api/activity?participants=$participants&type=$type->value";

        $curl = curl_init($url);
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
        $response = curl_exec($curl);

        if ($response === false) {
            $message = "cURL Error: " . curl_error($curl);
            curl_close($curl);
            throw new Exception($message);
        }

        curl_close($curl);
        $response = json_decode($response, true);

        if (!empty($response['error'])) {
            throw new Exception('Data not found.');
        }

        return GetActivityResponse::make(
            activity: $response['activity'],
            type: HolidayType::from($response['type']),
            participants: $response['participants'],
            price: $response['price'],
            link: $response['link'],
            key: $response['key'],
            accessibility: $response['accessibility']
        );
    }
}