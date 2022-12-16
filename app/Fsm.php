<?php
    namespace App;

    abstract class Fsm {
        protected $finite_state_sets; // Q is a finite set of states;
        protected $finite_input_sets; // Σ is a finite input alphabet
        protected $initial_state; // q0 ∈ Q is the initial state;
        protected $final_state_sets; // F ⊆ Q is the set of accepting/final states
        protected $transition_steps; // δ:Q×Σ→Q is the transition function
        
        protected $invalid_state = 's_i';  // To return invalid state in case of invalid input

        /**
         * This method is used to set the transition steps in FSM
         * @param mixed[] $transition_steps Array or Objects in format [[current_state, input_character, result_state],...]
         * @access protected
         */
        // 
        protected function setTransitionSteps(Array $transition_steps) {
            //$current_state, $input_character, $result_state
            foreach($transition_steps as $step) {
                list($current_state, $input_character, $result_state) = $step;
                $this->transition_steps[$current_state][$input_character] = $result_state;
            }
        }

        /**
         * This will to display TransitionSteps in detail, just to helo debug
         * @access protected
         */
        protected function getTransitionSteps() {
            $steps =  "Transition Steps:\n";
            if (empty($this->transition_steps)) {
                return null;
            } else {
                foreach($this->transition_steps as $current_state => $row) {
                    foreach($row as $input_character => $result_state) {
                        $steps .= "Current State: $current_state, Input: $input_character, Result State: $result_state \n";
                    }
                }
                $steps .="\n"; 
            }
            return $steps;
        }

        /**
         * returns the next state in the transition
         * @param string $current_state
         * @param string $input_character
         * @return string next_state
         * @access private
         */
        private function getNextTransitionState($current_state, $input_character) {
            if (!empty($this->transition_steps[$current_state][$input_character])) {
                return $this->transition_steps[$current_state][$input_character];
            }
        }

        /**
         * returns the final state or invalid state using the transition steps and input_string
         * @param string $input_string
         * @return string final_state
         * @access protected
         */
        protected function processFinalStateForInput(string $input_string) {
            $current_state = $this->initial_state;
            if (!empty($input_string)) {
                $chars = str_split($input_string);
            
                foreach($chars as $char) {
                    $current_state = $this->getNextTransitionState($current_state, $char);
                }

                $final_state = $current_state;
                return $final_state;
            } else {
                return $this->invalid_state;
            }

        }
        /**
         * This is abstract method so that all the classes extending Fsm class has their own version of output method
         * @return output
         * @access protected
         */
        abstract protected function output();
    }