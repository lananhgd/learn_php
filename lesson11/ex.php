<?php
abstract class Shape {
    abstract public function calculateArea();
}
class Circle extends Shape {
    protected $radian;
    public function __construct($radian) {
      $this->radian = $radian;
    }
    public function calculateArea() {
    return 3.14 * pow($this->radian, 2);
        }
  }
class Rectangle extends Shape {
    protected $length;
    protected $width;
 public function __construct($length, $width) {
    $this->length = $length;
    $this->width = $width;
}
public function calculateArea() {
return ($this->length + $this->width) * 2;
    }
}
$less1_1 = new Circle(10);
$less1_2 = new Rectangle(3, 4);
echo $less1_1->calculateArea()."<br>";
echo $less1_2->calculateArea()."<br>";

//bai2
abstract class Animal {
    abstract public function makeSound();
}
    class Dog extends Animal {
        public function makeSound() {
          echo "Woof!";
        }
    }
    class Cat extends Animal {
        public function makeSound() {
            echo "Meo!";
        }
    }
$less2_1 = new Dog();
$less2_2 = new Cat();
echo $less2_1->makeSound()."<br>";
echo $less2_2->makeSound()."<br>";

//bai3
abstract class Employee {
    abstract public function name();
    abstract public function salary();
}
class Manager extends Employee {
    protected $name;
    protected $salary;
    public function __construct($name, $salary) {
      $this->name = $name;
      $this->salary = $salary;
    }
    public function name() {
    // echo $this->name;
        }
    public function salary() {
        // echo $this->salary;
        }
    public function getInf() {
        echo $this->name;
        echo $this->salary;
        }
  }
class Staff extends Employee {
 public function __construct($name, $salary) {
    $this->name = $name;
    $this->salary = $salary;
}
    public function name() {
        // echo $this->name;
            }
    public function salary() {
        // echo $this->salary;
    }
    public function getInf() {
        echo $this->name;
        echo $this->salary;
        }
}
$less3_1 = new Manager("toan", "10tr");
$less3_2 = new Staff("toan", "10tr");
echo $less3_1->getInf()."<br>";
echo $less3_2->getInf()."<br>";

//bai4
abstract class Vehicle {
    abstract public function start();
}
    class Car extends Vehicle {
        public function start() {
          echo "Starting car!";
        }
    }
    class Motorcycle extends Vehicle {
        public function start() {
            echo "Starting motorcycle!";
        }
    }
$less4_1 = new Car();
$less4_2 = new Motorcycle();
echo $less4_1->start()."<br>";
echo $less4_2->start()."<br>";

//bai5
abstract class Database {
    abstract public function connect($host, $user, $password, $database);
    abstract public function query($sql);
    abstract public function disconnect();
  }
  
  class MySQLDatabase extends Database {
    private $connection;
  
    public function connect($host, $user, $password, $database) {
      $this->connection = mysqli_connect($host, $user, $password, $database);
      if (!$this->connection) {
        die("Lỗi kết nối: " . mysqli_connect_error());
      }
      echo "Kết nối thành công\n";
    }
  
    public function query($sql) {
      $result = mysqli_query($this->connection, $sql);
      if (!$result) {
        die("Lỗi truy vấn: " . mysqli_error($this->connection));
      }
      echo "Số hàng bị ảnh hưởng: " . mysqli_affected_rows($this->connection) . "\n";
    }
    public function disconnect() {
      mysqli_close($this->connection);
      echo "Ngắt kết nối". "<Br>";
    }
  }
  
  class PostgreSQLDatabase extends Database {
    private $connection;
    public function connect($host, $user, $password, $database) {
      $this->connection = pg_connect("host=$host user=$user password=$password dbname=$database");
      if (!$this->connection) {
        die("Lỗi kết nối: " . pg_last_error());
      }
      echo "Kết nối thành công\n";
    }
  
    public function query($sql) {
      $result = pg_query($this->connection, $sql);
      if (!$result) {
        die("Lỗi truy vấn: " . pg_last_error($this->connection));
      }
      echo "Số hàng bị ảnh hưởng: " . pg_affected_rows($result) . "<br>";
    }
  
    public function disconnect() {
      pg_close($this->connection);
      echo "Ngắt kết nối". "<br>";
    }
  }
  $mysql = new MySQLDatabase();
  $mysql->connect("localhost", "root", "", "deha");
  $mysql->query("INSERT INTO users (name, email) VALUES (' TRAN MINH HOANG', 'hoangan@gmail.com')");
  $mysql->disconnect();
  $postgresql = new PostgreSQLDatabase();
  $postgresql->connect("localhost", "postgres", "", "deha");
  $postgresql->query("INSERT INTO users (name, email) VALUES ('TRAN NGOC HOI', 'tnhoib@gmail.com')");
  $postgresql->disconnect();
//bai1
interface Resizable {
    public function resize();
}
class Rectangle1 implements Resizable {
    protected $length, $width;
    public function __construct($length, $width) {
        $this->length = $length;
        $this->width = $width;
    }
    public function resize() {
        echo "resize length is: ". $this->length. "<br>";
        echo " resize width is: ". $this->width. "<br>";
    }
}
$less6_1 = new Rectangle1(3, 4);
echo $less6_1->resize();

//bai2 
interface Logger {
    public function logInfo();
    public function logWarning();
    public function logError();
}
class FileLogger implements Logger {
    public function logInfo() {

    }
    public function logWarning() {
        
    }
    public function logError() {
        
    }
    protected $log;
    public function __construct($log) {
        $this->log = $log;
        $this->logInfo();
        $this->logWarning();
        $this->logError();
    }
    public function getLog() {
        return $this->log;
    }
}
class DatabaseLogger implements Logger {
    public function logInfo() {

    }
    public function logWarning() {
        
    }
    public function logError() {
        
    }
    protected $log;
    public function __construct($log) {
        $this->log = $log;
        $this->logInfo();
        $this->logWarning();
        $this->logError();
    }
    public function getLog() {
        return $this->log;
    }
}
$less7_1 = new FileLogger("bug...1");
$less7_2 = new DatabaseLogger("bug...2");
echo $less7_1->getLog(). "<br>";
echo $less7_2->getLog(). "<br>";

//bai3
interface Drawable {
    public function draw();
}
class Circle1 implements Drawable {
    public function draw() {
        return "Drawing a circle:...";
    }
}
class Square1 implements Drawable {
    public function draw() {
        return "Drawing a square:...";
    }
}
$less8_1 = new Circle1();
$less8_2 = new Square1();
$draws = [$less8_1, $less8_2];
foreach($draws as $draw)
echo $draw->draw(). "<br>";

//bai4
interface Sortable {
    public function getSort();
}
class ArraySorter implements Sortable {
    protected $arr;
    public function __construct($arr) {
        $this->arr = $arr;
    }
    public function getSort() {
        sort($this->arr);
        return $this->arr;
    }
}
class LinkedListSorter implements Sortable {
    protected $arr;
    public function __construct($arr) {
        $this->arr = $arr;
    }
    public function getSort() {
        sort($this->arr);
        return $this->arr;
    }
}
$arr1 = [5,6,4,1];
$arr2 = ["Volvo", "BMW", "Toyota"];
$less9_1 = new ArraySorter($arr1);
$less9_2 = new LinkedListSorter($arr2);
$result1 = $less9_1->getSort();
$result2 = $less9_2->getSort();
echo implode(", ", $result1). "<br>";
echo implode(", ", $result2). "<br>";
?>