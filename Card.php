<?php
/**
 * Created by PhpStorm.
 * User: og
 * Date: 2018/10/25
 * Time: 21:41
 */

class Card
{
    private $number;
    private $suit;
    public function __construct($number, $suit)
    {
        $this->number = $number;
        $this->suit = $suit;
    }

    public function getNumber()
    {
        return $this->number;
    }

    public function getSuit()
    {
        return $this->suit;
    }

    /**
     * @param Card $card
     * @return bool
     * @assert (new Card(3, 'h'), new Card(3, 's')) == true
     * @assert (new Card(4, 'h'), new Card(3, 's')) == false
     */
    public function isInMatchingSet(Card $card)
    {
        return ($this->getNumber() == $card->getNumber());
    }

}