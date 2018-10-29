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


    public function matchingCardDataProvider()
    {
        return array(
            array(new Card('4', 'hearts'), true, 'should match'),
            array(new Card('5', 'hearts'), false, 'should not match')
        );
    }

    /**
     * @dataProvider matchingCardDataProvider
     */
    public function testIsInMatchingSet(Card $matchingCard, $expected, $msg)
    {
        $this->assertEquals($expected, $this->card->isInMatchingSet($matchingCard),
            "<{$this->card->getNumber()} or {$this->card->getSuit()}> {$msg} ".
            "<{$matchingCard->getNumber()} or {$matchingCard->getSuit()}>");
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
