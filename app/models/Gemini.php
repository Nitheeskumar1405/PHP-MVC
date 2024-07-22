<?php

class Gemini
{
    private $apiKey;
    private $baseUrl;

    public function __construct()
    {
        $this->apiKey = GEMINI_API_KEY; // Use the constant from config
        $this->baseUrl = "https://generativelanguage.googleapis.com/v1/models/gemini-pro:generateContent?key=" . $this->apiKey;
    }

    public function generateContent($prompt)
    {
        $data = array(
            "contents" => array(
                array(
                    "role" => "user",
                    "parts" => array(
                        array(
                            "text" => $prompt
                        )
                    )
                )
            )
        );

        $json_data = json_encode($data);
        $ch = curl_init($this->baseUrl);
        curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type: application/json'));
        curl_setopt($ch, CURLOPT_POSTFIELDS, $json_data);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
        $response = curl_exec($ch);
        $error = curl_errno($ch) ? 'Curl error: ' . curl_error($ch) : null;
        curl_close($ch);

        if ($error) {
            return ['error' => $error];
        } else {
            return json_decode($response, true);
        }
    }
}
