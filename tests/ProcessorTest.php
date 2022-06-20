<?php

namespace Iqbal\Belajar\PHP\Logger;

use Monolog\Handler\StreamHandler;
use Monolog\Logger;
use Monolog\Processor\GitProcessor;
use Monolog\Processor\HostnameProcessor;
use Monolog\Processor\MemoryUsageProcessor;
use PHPUnit\Framework\TestCase;

class ProcessorTest extends TestCase
{
     public function testProcessor()
     {
          $logger = new Logger(ProcessorTest::class);
          $logger->pushHandler(new StreamHandler("php://stderr"));
          $logger->pushProcessor(new GitProcessor());
          $logger->pushProcessor(new MemoryUsageProcessor());
          $logger->pushProcessor(new HostnameProcessor());
          $logger->pushProcessor(function ($record) {
               $record['extra']['pzn'] =  [
                    "app" => "Belajar PHP Logging",
                    "author" => "Iqbal",
               ];
               return $record;
          });

          $logger->info("Hello World", ["username" => "iqbal"]);
          $logger->info("Hello World");
          $logger->info("Hello World Lagi");

          self::assertNotNull($logger);
     }
}
