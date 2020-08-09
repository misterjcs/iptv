<?php
declare(strict_types=1);

namespace Tests;

use Src\AbstractDriver;
use Src\ChinaMobile\Driver\BeijingDriver;

class ChinaMobileDriverTest extends HttpTest
{
    /**
     * 测试全部驱动
     */
    public function testDrivers()
    {
        $drivers = [
            BeijingDriver::class
        ];
        foreach ($drivers as $driverClassName) {
            /** @var AbstractDriver $driver */
            $driver = new $driverClassName();
            $result = $driver->getM3u8Array();
            $this->assertIsArray($result);
            $this->assertNotEmpty($result);
            foreach ($result as $m3u8Url) {
                $this->assertIsString($m3u8Url);
                $this->testMu38Url($m3u8Url);
            }
        }
    }
}