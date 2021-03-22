<?php

if (!isset($_ENV["IMGBB_API_KEY"])) {
    $dotenv = Dotenv\Dotenv::createImmutable(__DIR__);
    $dotenv->load();
    $dotenv->required("IMGBB_API_KEY")->notEmpty();
} 

use PHPUnit\Framework\TestCase as PHPUnit;

final class ImgBBTest extends PHPUnit {
    private ImgBB $imgBB;
    private string $imgUri;
    private ?string $imgName;

    public function setUp(): void {
        $this->imgBB = new ImgBB($_ENV["IMGBB_API_KEY"]);
        $this->imgUri = dirname(__FILE__) . "/../public/background-form.png";
        $this->imgName = "backgroundLegal.png";
    }

    public function testImgBase64(): void {
        $resultUrl = $this->imgBB->getImgBase64($this->imgUri);

        $this->assertNotEmpty($resultUrl);
    }

    public function testUpload(): void {
        $resultUrl = $this->imgBB->upload($this->imgUri, $this->imgName);

        print_r("\n$resultUrl\n");
        $this->assertNotEmpty($resultUrl);
    }

}