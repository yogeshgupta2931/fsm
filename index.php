<?php
    
    use App\ModuloThreeFsm;
    use App\ModuloFiveFsm;

    require_once __DIR__ . '/app/ModuloFiveFsm.php';
    require_once __DIR__ .'/app/ModuloThreeFsm.php';

    function modThree($input_characters)
    {
        $m3 = new ModuloThreeFsm($input_characters);
        return $m3->output();
    }

    function modFive($input_characters)
    {
        $m5 = new ModuloFiveFsm($input_characters);
        return $m5->output();
    }

    $check_input_characters = [ "1001", "1011111", "100010001", "1001010000", "01a", "" ];

    foreach($check_input_characters as $input_characters) {
        try {
            if (!empty($input_characters) && preg_match('~^[01]+$~', $input_characters)) {
                $decimal = bindec($input_characters);
                echo "\nModuloThree: $input_characters (int:" . $decimal . ") => " . modThree($input_characters). "\n";
                echo "ModuloFive: $input_characters (int:" . $decimal . ") => " . modFive($input_characters);
            } else {
                throw new \InvalidArgumentException("Input must be binary decimal, \"$input_characters\" given" );
            }            
        } catch(\InvalidArgumentException $e) {
            echo $e->getMessage();
        }
        echo "\n_______________\n\n";
    }
    
    flush();
?>