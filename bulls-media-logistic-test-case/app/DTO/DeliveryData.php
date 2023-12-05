<?php

namespace App\DTO;


class DeliveryData extends BaseDTO
{
    public string $customer_name;
    public string $phone_number;
    public string $email;
    public string $sender_address;
    public string $delivery_address;

    /**
     * @param string $customer_name
     * @param string $phone_number
     * @param string $email
     * @param string $sender_address
     * @param string $delivery_address
     */
    public function __construct(string $customer_name, string $phone_number, string $email, string $sender_address, string $delivery_address)
    {
        $this->customer_name = $customer_name;
        $this->phone_number = $phone_number;
        $this->email = $email;
        $this->sender_address = $sender_address;
        $this->delivery_address = $delivery_address;
    }

    public function toArray(): array
    {
        return [
            'customer_name' => $this->customer_name,
            'phone_number' => $this->phone_number,
            'email' => $this->email,
            'sender_address' => $this->sender_address,
            'delivery_address' => $this->delivery_address,
        ];
    }
}
