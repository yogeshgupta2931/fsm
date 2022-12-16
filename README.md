# About FSM library

### FSM is a simple library that takes the input characters one at a time, MOST significant bit first and transitions between a set of states as specified in the transition steps. To create your own FSM for desired Modulo functionality, you need to perform following steps

- Create a new class and extend `FSM` class
- Create a construct method to initialize member variables (5-tuples) (Q,Σ,q0,F,δ)
- Use the construct method to define the state transition steps for your functionality.
- Redefine abstact method `Output` in your class
- Now you can instantiate your class in `Index.php` file and call output method to check your output 

## How to Run the project

- Make sure you have composer and php installed
- Run the following commands in the terminal (make sure you are inside your project directory before running these command )

```
{project_directory} > composer install
```

- This should create vendor folder and install phpunit dependency

## Use of the library

- `FSM` is a simple Finite State Machine Class demonstration in PHP
- Inherit base `Class FSM` to create your own implementation of FSM
- Refer `Class ModuloThreeFsm` and `Class ModuloFiveFsm` as documentation

## Tested using PHPUnit

- Try running test cases using phpunit by following command
```
{project_directory} > ./vendor/bin/phpunit --testdox
```
