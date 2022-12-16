<?php
    
    class ModuloThreeFsmTest extends \PHPUnit\Framework\TestCase{

        public function testSuccessScenarios() {
            //Testing the binary 1001 for decimal 9
            $m3 = new App\ModuloThreeFsm("1001");
            $result = $m3->output();
            $this->assertEquals(0, $result);

            //Testing the binary 1011111 for decimal 95
            $m3 = new App\ModuloThreeFsm("1011111");
            $result = $m3->output();
            $this->assertEquals(2, $result);

            //Testing the binary 100010001 for decimal 273
            $m3 = new App\ModuloThreeFsm("100010001");
            $result = $m3->output();
            $this->assertEquals(0, $result);

            //Testing the binary 1001010000 for decimal 592
            $m3 = new App\ModuloThreeFsm("1001010000");
            $result = $m3->output();
            $this->assertEquals(1, $result);
        }

        // Testing Exception
        public function testInvalidInputs() {
            $this->expectException(\InvalidArgumentException::class);
            $this->expectExceptionMessage('Input must be binary decimal');

            $m3 = new App\ModuloThreeFsm("01a");
            $result = $m3->output();
        
        }

    }