<?php

namespace cointopay_direct_bancontact\Merchant;

use cointopay_direct_bancontact\Cointopay_Direct_Bancontact;
use cointopay_direct_bancontact\Merchant;

class Order extends Merchant
{
    private $order;

    public function __construct($order)
    {
        $this->order = $order;
    }

    public static function createOrFail($params, $options = array(), $authentication = array())
    {
        $order = Cointopay_Direct_Bancontact::request('orders', 'GET', $params, $authentication);
        return new self($order);
    }
    public static function ValidateOrder($params, $options = array(), $authentication = array())
    {
        $order = Cointopay_Direct_Bancontact::request('validation', 'GET', $params, $authentication);
        return new self($order);
    }

    public function toHash()
    {
        return $this->order;
    }

    public function __get($name)
    {
        return $this->order[$name];
    }
}
