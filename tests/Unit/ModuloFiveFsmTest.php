<?php
    
    class ModuloFiveFsmTest extends \PHPUnit\Framework\TestCase{

        public function testSuccessScenarios() {
            //Testing the binary 1001 for decimal 9
            $m5 = new App\ModuloFiveFsm("1001");
            $result = $m5->output();
            $this->assertEquals(4, $result);

            //Testing the binary 1011111 for decimal 95
            $m5 = new App\ModuloFiveFsm("1011111");
            $result = $m5->output();
            $this->assertEquals(0, $result);

            //Testing the binary 100010001 for decimal 273
            $m5 = new App\ModuloFiveFsm("100010001");
            $result = $m5->output();
            $this->assertEquals(3, $result);

            //Testing the binary 1001010000 for decimal 592
            $m5 = new App\ModuloFiveFsm("1001010000");
            $result = $m5->output();
            $this->assertEquals(2, $result);
        }

        // Testing Exception
        public function testInvalidInputs() {
            
            $this->expectException(\InvalidArgumentException::class);
            $this->expectExceptionMessage('Input must be binary decimal');
            
            //Try invalid string
            $m5 = new App\ModuloFiveFsm("01a");
            $m5->output();
        
        }

    }