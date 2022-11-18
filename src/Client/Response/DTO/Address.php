<?php

declare(strict_types=1);

namespace Setono\CoolRunner\Client\Response\DTO;

final class Address
{
    /** @readonly */
    public string $street;

    /** @readonly */
    public string $zipCode;

    /** @readonly */
    public string $city;

    /** @readonly */
    public string $countryCode;

    public function __construct(string $street, string $zipCode, string $city, string $countryCode)
    {
        $this->street = $street;
        $this->zipCode = $zipCode;
        $this->city = $city;
        $this->countryCode = $countryCode;
    }

    public static function fromArray(array $data): self
    {
        return new self($data['street'], $data['zip_code'], $data['city'], $data['country_code']);
    }
}
