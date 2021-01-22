<?php


namespace App\Helpers;


class Cart
{
private $cart =[
    'tickets' =>[],
    'totalQty'=>0,
    'totalPrice'=>0
];
    public function __construct()
    {
        session()->get('cart') ? $this->cart = session()->get('cart') : null;
    }
    public function add($item)
    {
        $id = $item->id;
        $singlePrice = $item->price;
        if (!array_key_exists($id, $this->cart['tickets'])) {
            $this->cart['tickets'][$id] =[
                'id' => $item->id,
                'naam' => $item->ticket_name,
                'qty' => 1,
                'price' => $item->price
            ];
        } else {
            $this->cart['tickets'][$id]['qty']++;
            $this->cart['tickets'][$id]['price'] = $singlePrice * $this->cart['tickets'][$id]['qty'];
        }
        $this->updateTotal();                 // update totalQty and totalPrice

        session()->put('cart', $this->cart);  // save the session
    }

    // Delete a record to the cart
    public function delete($item)
    {
        $id = $item->id;
        $singlePrice = $item->price;
        if (array_key_exists($id, $this->cart['tickets'])) {
            $this->cart['tickets'][$id]['qty']--;
            if ($this->cart['tickets'][$id]['qty'] != 0) {
                $this->cart['tickets'][$id]['price'] = $singlePrice * $this->cart['tickets'][$id]['qty'];
            } else {
                unset($this->cart['tickets'][$id]);
            }
            $this->updateTotal();
        }
        session()->put('cart', $this->cart);  // save the session
    }
    public function empty()
    {
        session()->remove('cart');
    }
    public function getCart()
    {
        return $this->cart;
    }

    // Get all the records form from the cart
    public function getRecords()
    {
        return $this->cart['tickets'];
    }

    // Get one record from the cart
    public function getOneRecord($key)
    {
        if (array_key_exists($key, $this->cart['tickets'])) {
            return $this->cart['tickets'][$key];
        }
    }

    // Get all the record keys
    public function getKeys()
    {
        return array_keys($this->cart['tickets']);
    }

    // Get total quantity
    public function getTotalQty()
    {
        return $this->cart['totalQty'];
    }

    // Get total price
    public function getTotalPrice()
    {
        return $this->cart['totalPrice'];
    }

    // Calculate total quantity and total price
    private function updateTotal()
    {
        $totalQty = 0;
        $totalPrice = 0;
        foreach ($this->cart['tickets'] as  $ticket) {
            $totalQty += $ticket['qty'];
            $totalPrice += $ticket['price'];
        }
        $this->cart['totalQty'] = $totalQty;
        $this->cart['totalPrice'] = round($totalPrice, 2);
    }
}
