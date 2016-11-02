<?php
namespace Granam\Tests\Exceptions\Tools;

use Granam\Exceptions\Tools\TestOfExceptionsHierarchy;

abstract class AbstractExceptionsHierarchyTest extends \PHPUnit_Framework_TestCase
{

    /**
     * @var TestOfExceptionsHierarchy
     */
    private $testOfExceptionsHierarchy;

    protected function setUp()
    {
        $this->testOfExceptionsHierarchy = new TestOfExceptionsHierarchy(
            $this->getTestedNamespace(),
            $this->getRootNamespace(),
            $this->getExceptionsSubDir(),
            (array)$this->getExternalRootNamespaces(),
            $this->getExternalRootExceptionsSubDir(),
            $this->getExceptionClassesSkippedFromUsageTest(),
            $this->getExceptionsUsageRootDir()
        );
    }

    /**
     * @return TestOfExceptionsHierarchy
     */
    protected function getTestOfExceptionsHierarchy()
    {
        return $this->testOfExceptionsHierarchy;
    }

    /**
     * @return string
     */
    abstract protected function getTestedNamespace();

    /**
     * @return string
     */
    abstract protected function getRootNamespace();

    /**
     * @return string
     */
    protected function getExceptionsSubDir()
    {
        return 'Exceptions';
    }

    /**
     * For a single external root namespace can return just a string.
     *
     * @return array|string[]|string
     */
    protected function getExternalRootNamespaces()
    {
        return array();
    }

    protected function getExternalRootExceptionsSubDir()
    {
        return 'Exceptions';
    }

    /**
     * @test
     */
    public function My_exceptions_are_in_family_tree()
    {
        self::assertTrue($this->getTestOfExceptionsHierarchy()->My_exceptions_are_in_family_tree());
    }

    /**
     * @test
     * @depends My_exceptions_are_in_family_tree
     */
    public function My_exceptions_are_used()
    {
        self::assertTrue(
            $this->getTestOfExceptionsHierarchy()->My_exceptions_are_used(
                $this->getExceptionsUsageRootDir(),
                $this->getExceptionClassesSkippedFromUsageTest()
            )
        );
    }

    /**
     * @return string
     */
    protected function getExceptionsUsageRootDir()
    {
        return ''; // empty for same dir as exceptions are or upper level moving against exceptions sub dir
    }

    /**
     * @return array|string[]
     */
    protected function getExceptionClassesSkippedFromUsageTest()
    {
        return array();
    }

}