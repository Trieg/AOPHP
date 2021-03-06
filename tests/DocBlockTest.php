<?php
/**
 * @author AlexanderC <self@alexanderc.me>
 * @date 10/28/13
 * @time 8:32 PM
 */

class DocBlockTest implements \AOPHP\Helpers\AOPConst
{
    use \AOPHP\Traits\AOP;

    public function __construct()
    {
        // this is required.
        // You can also provider another instance of AOPHP
        // provided to the constructor manually or by DI service
        $this->initAOP(\AOPHP\AOPHP::crete());
    }

    /**
     * NOTE: to be able to make this AOP target set protected/private key
     *
     * @param string $text
     * @return string
     */
    protected function doThings($text)
    {
        echo "Do text things is ", $text, "\n";
        return 'blablashow';
    }

    /**
     * NOTE: to be able to make this AOP target set protected/private key
     *
     * @param string $text
     * @return string
     */
    protected function doAnotherThings($text)
    {
        echo "Do text another things is ", $text, "\n";
        return 'blablashow';
    }

    /**
     * This is an aspect.
     * Once you change this DockBlock the cache is invalidated.
     * You can subscribe for more advices.
     * (*) Asterix ==> means any (class or method)
     * before|after ==> when advice to be applied
     * (DocBlockTest . doThings) ==> is join point ("class . method") advice to be applied to
     *
     * @param \AOPHP\DocBlock\Advice $advice
     * @param array $parameters
     * @param null|mixed $result
     *
     * @AOP  / before  (DocBlockTest . doThings)
     * @AOP    /  before    (* . doAnotherThings)
     * @AOP/after(DocBlockTest . *)
     */
    public function testBlockAfter(\AOPHP\DocBlock\Advice $advice, array & $parameters, $result = null)
    {
        echo "Calling advice: ", $advice->getRawAspect(), "\n";
        echo "Called using: ", var_export($parameters, true), "\n";
        echo "Target Result: ", var_export($result, true), "\n";
    }

    // Some example of method without docBlock
    protected function withoutAnyDocBlock()
    {   }

    /**
     * This would be your magic __call method up to now
     *
     * @param string $method
     * @param array $arguments
     */
    protected function __onCall($method, array $arguments)
    {   }
}