<?php

declare(strict_types=1);

namespace Setono\CoolRunner\DTO;

final class Address
{
    public string $street;

    public string $zipCode;

    public string $city;

    public string $countryCode;

    public function __construct(string $street, string $zipCode, string $city, string $countryCode)
    {
        $this->street = $street;
        $this->zipCode = $zipCode;
        $this->city = $city;
        $this->countryCode = $countryCode;
    }
}
