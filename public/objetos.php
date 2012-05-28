<?php
//CREAR UNA CLASE
class miClase
{
	// Propiedades
	public $mipropiedad='esto variable';
	// Metodos
	public function miMetodo()
	{
		echo "hola mundo";
		return NULL;
	}	
}
$miObjeto= new miClase();
$miObjeto -> miMetodo();
echo "<br/>";
echo $miObjeto -> mipropiedad;
echo "<br/>";
echo $miObjeto -> mipropiedad="otra cosa"; 
echo "<br/>";
$miObjeto2= new miClase();
echo $miObjeto2 -> mipropiedad;   
echo "<hr/>";
//-------------------------------------------
class A
{
	function foo()
	{
		if (isset($this)) {
			echo '$this is defined (';
			echo get_class($this);
			echo ")\n";
		} else {
			echo "\$this is not defined.\n";
		}
	}
} 
$objeto1= new A;
$objeto1 -> foo();
echo "<hr/>";
//------------------------------------------
class SimpleClass
{
	// invalid member declarations:
// 	public $var1 = 'hello '.'world'; // las propiedades de las variables de clase no pueden ser dinamicas
// 	public $var2 = <<<EOD
// hello world
// EOD;
// 	public $var3 = 1+2;
// 	public $var4 = self::myStaticMethod();
// 	public $var5 = $myVar;
	// valid member declarations:
	
	//define('myConstant', 'mivalor'); //esto no se puede hacer dentro de una clase
	public $pi=3.1418;
	//public $var6 = myConstant;
	//public $var7 = self::pi; // :: es un operador de resolucion, llamada estatica
	public $var8 = array(true, false);
	
	function displayVar2()
	{
		echo "Simple class\n";
		return;
	}
}   
$objeto2=new SimpleClass();
echo $objeto2 -> pi;
echo "<hr/>";
//echo $objeto2 -> var7;
echo "<hr/>";
//-----------------------------------------pag20
class ExtendClass extends SimpleClass //extendclass hereda de simpleclass
{
	// Redefine the parent method
	function displayVar()
	{
		echo "Extending class\n";
		parent::displayVar2();
	}
}
$extended = new ExtendClass();
$extended->displayVar();
echo "<br/>";
$extended ->displayVar2();
//---------------------------------------pag21
echo "<hr/>";
echo "<hr/>";
echo "<hr/>";
class MyDestructableClass {
	function __construct() {
		print "In constructor\n";
		$this->name = "MyDestructableClass";
	}
	function __destruct() {
		print "Destroying " . $this->name . "\n";
	}
}
$obj = new MyDestructableClass();
//------------------------------------pag22
echo "<hr/>";
class MyClass
{
	public $public = 'Public';
	protected $protected = 'Protected';
	private $private = 'Private';
	function printHello()
	{
		echo $this->public;
		echo $this->protected;
		echo $this->private;
	}
}
$obj11=new MyClass();
echo $obj11->private;
echo $obj11 -> printHello();

//------------------------------------pag28
echo "<hr/>";
//class BaseClass {
	//public function test() {
	//	echo "BaseClass::test() called\n";
//	}
//	final public function moreTesting() {
//		echo "BaseClass::moreTesting() called\n";
//	}
//}
//class ChildClass extends BaseClass {
//	public function moreTesting() {
		echo "ChildClass::moreTesting() called\n";
//	}
//}

?>


