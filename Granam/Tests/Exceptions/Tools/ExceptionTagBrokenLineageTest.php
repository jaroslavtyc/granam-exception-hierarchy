<?php
namespace Granam\Tests\Exceptions\Tools;

class ExceptionTagBrokenLineageTest extends AbstractExceptionsHierarchyTest
{

    /**
     * @test
     * @expectedException \Granam\Exceptions\Tools\Exceptions\InvalidExceptionHierarchy
     * @expectedExceptionMessageRegExp ~^Tag .+\\BrokenLineage\\ExceptionTagWithoutParent\\Exception should be child of .+\\BrokenLineage\\Exception~
     */
    public function My_exceptions_are_in_family_tree()
    {
        parent::My_exceptions_are_in_family_tree();
    }

    /**
     * @return string
     */
    protected function getTestedNamespace()
    {
        return $this->getRootNamespace() . '\\ExceptionTagWithoutParent';
    }

    /**
     * @return string
     */
    protected function getRootNamespace()
    {
        return __NAMESPACE__ . '\\DummyExceptionsHierarchy\\BrokenLineage';
    }

    /**
     * @return false
     */
    protected function getExceptionsSubDir()
    {
        return false; // exceptions are directly in the tested namespace
    }

}