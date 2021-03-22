<?php

class ImgBB {
    const IMGBB_API_BASE_URL = "https://api.imgbb.com/1/upload";
    private string $apiKey;

    public function __construct(string $apiKey) {
        $this->apiKey = $apiKey;
    }

    public function upload(string $imgUri, ?string $name = null): ?string {
        $imgBase64 = $this->getImgBase64($imgUri);
        $validImgName = $this->getValidImgName($name);

        if (empty($imgBase64)) {
           return null;
        }

        $fields = array (
            "key" => $this->apiKey,
            "image" => $imgBase64,
            "name" => $validImgName
        );

        $curl = curl_init();

        $this->setCurlOpts($curl, $fields);

        $result = json_decode(curl_exec($curl));

        if (!isset($result->data)) {
            return null;
        }

        return $result->data->url;
    }

    private function setCurlOpts(object $curl, array $fields) {
        curl_setopt($curl, CURLOPT_URL, self::IMGBB_API_BASE_URL);
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($curl, CURLOPT_POST, true);
        curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);
        curl_setopt($curl, CURLOPT_POSTFIELDS, $fields);
    }

    public function getImgBase64(string $imgUri): ?string {
        $imgContents = file_get_contents($imgUri);
        $imgBase64 = base64_encode($imgContents);

        return $imgBase64;
    }

    public function getValidImgName(?string $name): ?string {
        if (empty($name)) {
            return null;
        }

        $validImgName = explode(".", $name)[0];

        return $validImgName;
    }
}
