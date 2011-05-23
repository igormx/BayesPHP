<?php

namespace BayesPHP;

require_once dirname(__FILE__) . '/../WordCounter.php';

/**
 * Test class for WordCounter.
 * Generated by PHPUnit on 2011-05-24 at 00:01:59.
 */
class WordCounterTest extends \PHPUnit_Framework_TestCase
{

    /**
     * @var WordCounter
     */
    protected $object;

    /**
     * Sets up the fixture, for example, opens a network connection.
     * This method is called before a test is executed.
     */
    protected function setUp()
    {
        $this->object = new WordCounter;
    }

    /**
     * Tears down the fixture, for example, closes a network connection.
     * This method is called after a test is executed.
     */
    protected function tearDown()
    {
        
    }

    public function testWordsAreCounted()
    {
        $string = 'this is a simple test';
        
        $this->object->addToSample($string);

        $counts = $this->object->getWordCounts();

        $resultArray = array(
                        'this' => 1,
                        'is' => 1,
                        'a' => 1,
                        'simple' => 1,
                        'test' => 1);

        $this->assertEquals($resultArray, $counts);
    }

    public function testWordsNotCountedTwice()
    {
        $string = 'this this is a simple test';

        $this->object->addToSample($string);

        $counts = $this->object->getWordCounts();

                $resultArray = array(
                        'this' => 1,
                        'is' => 1,
                        'a' => 1,
                        'simple' => 1,
                        'test' => 1);

        $this->assertEquals($resultArray, $counts);
    }

    public function testWordsCountedMultipleAdds()
    {
        $string = 'this this is a simple test';

        $this->object->addToSample($string);
        $this->object->addToSample($string);

        $counts = $this->object->getWordCounts();

                $resultArray = array(
                        'this' => 2,
                        'is' => 2,
                        'a' => 2,
                        'simple' => 2,
                        'test' => 3);

        $this->assertEquals($resultArray, $counts);
    }

}

?>
