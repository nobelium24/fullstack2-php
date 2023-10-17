<?php
//Classes and Objects

// A class is a blueprint for creating objects
class Car
{
    public $brand;
    public $model;

    //access modifiers - public, private, protected
    //public - can be accessed from anywhere
    //private - can only be accessed from within the class
    //protected - can only be accessed from within the class and any class that inherits from it

    //constructor - a special method that is triggered when a nwe instance(an object) of a class is created
    public function __construct($brand, $model)
    {
        $this->brand = $brand;
        $this->model = $model;
    }

    public function startEngine()
    {
        echo "Engine started.";
    }

    //destructor - a special method that is triggered when an object is destroyed
    public function __destruct()
    {
        echo "Car destroyed.";
    }
}

$myCar = new Car("Toyota", "Camry");
$myCar->startEngine(); // Output: Engine started.
unset($myCar); // Output: Car destroyed.

//Inheritance
//Inheritance is a mechanism in which one class inherits the properties and methods of another class.
//The class that inherits the properties and methods is called the child class.
//The class whose properties and methods are inherited is called the parent class.
//A child class can only inherit from one parent class.
//A child class can inherit from a parent class that inherits from another parent class.
class ElectricCar extends Car
{
    public function chargeBattery()
    {
        echo "Battery charged.";
    }
}

$electricCar = new ElectricCar("Tesla", "Model 3");
$electricCar->startEngine(); // Output: Engine started.
$electricCar->chargeBattery(); // Output: Battery charged.
echo ($electricCar->brand); // Output: Tesla



//Polymorphism
//Polymorphism is a concept of object-oriented programming that allows us to perform a single action in different ways.
class Shape
{
    public function getArea()
    {
        return 0;
    }
}

class Circle extends Shape
{
    private $radius;
    public function __construct($radius)
    {
        $this->radius = $radius;
    }
    public function getArea()
    {
        //the pow() function returns the value of a number raised to a power. Takes two arguments: the number and the power.
        return pi() * pow($this->radius, 2);
    }
}

class Rectangle extends Shape
{
    private $width;
    private $height;
    public function __construct($width, $height)
    {
        $this->width = $width;
        $this->height = $height;
    }
    public function getArea()
    {
        return $this->width * $this->height;
    }
}

$shapes = [
    new Circle(2),
    new Rectangle(2, 3)
];

//The foreach loop iterates through each shape in the shapes array and calls the getArea() method on each shape.
foreach ($shapes as $shape) {
    echo $shape->getArea() . "<br>";
}

// //Encapsulation:
// Encapsulation refers to bundling data and methods that operate on the data within a single unit (object). It helps protect the integrity of data and allows you to control access to it using access modifiers. The access modifiers are public, private, and protected.

//Abstraction:
// Abstraction refers to hiding the internal implementation details of a class from the outside world. It helps reduce complexity and allows you to focus on what the object does instead of how it does it.
//The abstract keyword is used to create an abstract class or method. An abstract class cannot be instantiated. It can only be extended by other classes. An abstract method can only be used in an abstract class, and it does not have a body. The body is provided by the subclass that extends the abstract class.
abstract class Animal
{
    protected $name;
    public function __construct($name)
    {
        $this->name = $name;
    }

    abstract public function makeSound();
}

class Dog extends Animal
{
    public function makeSound()
    {
        return "Woof!";
    }
}

class Cat extends Animal
{
    public function makeSound()
    {
        return "Meow!";
    }
}

$dog = new Dog("Bull Dog");
echo $dog->makeSound(); // Output: Woof!
$cat = new Cat("Persian Cat");
echo $cat->makeSound(); // Output: Meow!

?>
