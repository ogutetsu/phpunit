<?php
/**
 * Created by PhpStorm.
 * User: og
 * Date: 2018/10/25
 * Time: 21:46
 */


require 'Card.php';
use PHPUnit\Framework\TestCase;

class CardTest extends TestCase
{
    private $card;
    public function setUp()
    {
        $this->card = new Card('4', 'spades');
    }

    public function testIsInMatchingSet()
    {
        $matchingCard = new Card('4', 'hearts');
        $this->assertTrue($this->card->isInMatchingSet($matchingCard),
            '<4 of Spades> should match < 4 of Hearts>');
    }

    public function testIsNotInMatchingSet()
    {
        $matchingCard = new Card('5', 'hearts');
        $this->assertFalse($this->card->isInMatchingSet($matchingCard),
            '<4 of Spades> should match <5 of Hearts>');
    }

    public function testGetSuit()
    {
        $actualSuit = $this->card->getSuit();
        $this->assertEquals('spades', $actualSuit, 'Suit shoud be <spades>');
    }

    public function testGetNumber()
    {
        $actualNumber = $this->card->getNumber();
        $this->assertEquals(4, $actualNumber, 'Number should be <4>');
    }
}
