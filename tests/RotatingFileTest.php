<?php

namespace Iqbal\Belajar\PHP\Logger;

use Monolog\Handler\RotatingFileHandler;
use Monolog\Handler\StreamHandler;
use Monolog\Logger;
use PHPUnit\Framework\TestCase;

class RotatingFileTest extends TestCase
{
     public function testRotating()
     {
          $logger = new Logger(RotatingFileTest::class);
          $logger->pushHandler(new StreamHandler("php://stderr"));
          $logger->pushHandler(new RotatingFileHandler(__DIR__ . "/../app.log", 10, Logger::INFO));

          $logger->info("Belajar PHP OOP");
          $logger->info("Belajar PHP Web");
          $logger->info("Belajar PHP Database");

          self::assertNotNull($logger);
     }
}
