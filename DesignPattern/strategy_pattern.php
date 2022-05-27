<?php
require __DIR__.'../../vendor/autoload.php';




/**
 * The Strategy interface declares operations common to all supported versions
 * of some algorithm.
 *
 * The Context uses this interface to call the algorithm defined by Concrete
 * Strategies.
 */
interface Strategy
{
    public function doAlgorithm(array $data): array;
}

/**
 * The Context defines the interface of interest to clients.
 */
class Context
{
    /**
     * @var Strategy The Context maintains a reference to one of the Strategy
     * objects. The Context does not know the concrete class of a strategy. It
     * should work with all strategies via the Strategy interface.
     */
    private $strategy;

    /**
     * Usually, the Context accepts a strategy through the constructor, but also
     * provides a setter to change it at runtime.
     */
    public function __construct(Strategy $strategy)
    {
        $this->strategy = $strategy;
    }

    /**
     * Usually, the Context allows replacing a Strategy object at runtime.
     */
    public function setStrategy(Strategy $strategy)
    {
        $this->strategy = $strategy;
    }

    /**
     * The Context delegates some work to the Strategy object instead of
     * implementing multiple versions of the algorithm on its own.
     */
    public function doSomeBusinessLogic(): void
    {
        $result = $this->strategy->doAlgorithm(["a", "b", "c", "d", "e"]);
        echo implode(",", $result)."<br>";
    }
}


/**
 * Concrete Strategies implement the algorithm while following the base Strategy
 * interface. The interface makes them interchangeable in the Context.
 */
class ConcreteStrategyA implements Strategy
{
    public function doAlgorithm(array $data): array
    {
        sort($data);

        return $data;
    }
}

class ConcreteStrategyB implements Strategy
{
    public function doAlgorithm(array $data): array
    {
        rsort($data);

        return $data;
    }
}

/**
 * The client code picks a concrete strategy and passes it to the context. The
 * client should be aware of the differences between strategies in order to make
 * the right choice.
 */
$context = new Context(new ConcreteStrategyA());
echo "Client: Strategy is set to normal sorting. <br>";
$context->doSomeBusinessLogic();

echo "<br>";

echo "Client: Strategy is set to reverse sorting. <br>";
$context->setStrategy(new ConcreteStrategyB());
$context->doSomeBusinessLogic();
die;












//interface  PaymentStrategy
//{
//    public function payNow($transactionDetails);
//}
//class PayMob implements PaymentStrategy
//{
//
//    public function payNow($transactionDetails):string
//    {
//        return 'pay now by payMob '.$transactionDetails;
//    }
//}
//class PayBal implements PaymentStrategy
//{
//
//    public function payNow($transactionDetails):string
//    {
//        return 'pay now by PayBal '.$transactionDetails;
//    }
//}
//class Payment
//{
//    public static function payNow($requestMethod,$transactionDetails)
//    {
//        return (new $requestMethod)->payNow($transactionDetails);
//    }
//}
//
//$requestMethod = 'PayBal';
//$transactionDetails = mt_rand(0,9);
//echo Payment::payNow($requestMethod,$transactionDetails);

interface  PaymentService
{
    public function payNow();
}
class PayMob implements PaymentService
{

    public function payNow():string
    {
        return 'pay now by payMob';
    }
}
class PayBal implements PaymentService
{

    public function payNow():string
    {
        return 'pay now by PayBal';
    }
}
class Strip implements PaymentService
{

    public function payNow():string
    {
        return 'pay now by Strip';
    }
}
class Payment
{
    public PaymentService $paymentService;

    public function __construct($paymentService)
    {
        $this->paymentService = $paymentService;
    }

    public function pay()
    {
        return $this->paymentService->payNow();
    }
}


$validMethods = ['Strip','PayBal','PayMob'];
$requestMethod = 'Strip';
(!in_array($requestMethod,$validMethods)) ? dd('invalid method') : dd((new Payment(new $requestMethod))->pay());










