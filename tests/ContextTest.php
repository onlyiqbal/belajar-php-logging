<?php

namespace Iqbal\Belajar\PHP\Logger;

use Monolog\Handler\StreamHandler;
use Monolog\Logger;
use PHPUnit\Framework\TestCase;

class ContextTest extends TestCase
{
     public function testContext()
     {
          $logger = new Logger(ContextTest::class);
          $logger->pushHandler(new StreamHandler("php://stderr"));

          $logger->info("This is log massage", ['username' => 'iqbal']);
          $logger->info("Try login user", ['username' => 'iqbal']);
          $logger->info("Succss login user", ['username' => 'iqbal']);

          self::assertNotNull($logger);
     }
}
