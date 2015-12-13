WebVent PHP Naming Convention
=============================

Overview
--------


Class
-----
A class named `ClassName` shall be put in a file named `ClassName.php` and would 
follow following convention:

```PHP

    class ClassName {
      public $propertyName;
      protected $fooProperty;
      protected $_anotherField;
      private $barProperty;
      private $_field;
      
      public function __construct() {
      }
      
      public function init() {
        $this->_field = 'Some value';
        $this->_anotherField = 'another value';
      }
      
      public function fooProperty() {
        return $this->fooProperty;
      }
      
      public function setFooProperty($fooProperty) {
        $this->fooProperty = $fooProperty;
        return $this;
      }
      
      public function barProperty() {
        return $this->barProperty;
      }
      
      public function setBarProperty($barProperty) {
        $this->barProperty = $barProperty;
        return $this;
      }
      
      public function doSomething() {
        
      }
      
      public function methodName($argOne, $argTwo) {
        $this->_methodName($argOne, $argTwo);
      }
      
      private function _methodName($argOne, $argTwo) {
        $localVar = $argOne;
      }
    }
```

Global Names
------------
Global names are snake_case. e.g.:
+ `some_global_function()`
+ `some_global_variable`