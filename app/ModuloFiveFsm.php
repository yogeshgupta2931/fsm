<?php
    
    namespace App;
    
    require_once('Fsm.php');
    
    class ModuloFiveFsm extends Fsm {
        
        public $input_string;

        public function __construct(String $input_string) {
            
            if ( empty($input_string) || !preg_match('~^[01]+$~', $input_string) ) {
                throw new \InvalidArgumentException('Input must be binary decimal');
            }
            $this->input_string = $input_string;

            //Set member variables for ModuloFive Class
            $this->finite_state_sets = ["s0", "s1", "s2", "s3", "s4"]; //Q = (s0, s1, s2, s3, s4)
            $this->finite_input_sets = ["0", "1"]; //Σ = (0, 1)
            $this->initial_state = "s0"; //q0 = s0
            $this->final_state_sets = ["s0", "s1", "s2", "s3", "s4"]; //F = (s0, s1, s2, s3, s4)

            //Set the transition steps for ModuloFive FSM
            $this->setTransitionSteps([
                ["s0", "0", "s0"], // Defining δ(s0,0) = s0
                ["s0", "1", "s1"], // Defining δ(s0,1) = s1
                ["s1", "0", "s2"], // Defining δ(s1,0) = s2
                ["s1", "1", "s3"], // Defining δ(s1,1) = s3
                ["s2", "0", "s4"], // Defining δ(s2,0) = s4
                ["s2", "1", "s0"], // Defining δ(s2,1) = s0
                ["s3", "0", "s1"], // Defining δ(s3,0) = s1
                ["s3", "1", "s2"], // Defining δ(s3,1) = s2
                ["s4", "0", "s3"], // Defining δ(s4,0) = s3
                ["s4", "1", "s4"]  // Defining δ(s4,1) = s4
            ]);
        }

        public function output () {
            $final_state = $this->processFinalStateForInput($this->input_string);

            $modulo = match ($final_state) {
                's0' => 0,
                's1' => 1,
                's2' => 2,
                's3' => 3,
                's4' => 4,
                default => 'unknown state',
            };
            return $modulo;
        }
    }