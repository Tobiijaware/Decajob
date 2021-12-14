<?php


namespace App\Http\DTO;


class CompanyDTO
{
    private string $name = "";
    private string $logo_url = "";
    private string $website_url = "";
    private string $location = "";
    private string $address = "";

    /**
     * @return string
     */
    public function getName(): string
    {
        return $this->name;
    }

    /**
     * @param string $name
     */
    public function setName(string $name): void
    {
        $this->name = $name;
    }

    /**
     * @return string
     */
    public function getLogoUrl(): string
    {
        return $this->logo_url;
    }

    /**
     * @param string $logo_url
     */
    public function setLogoUrl(string $logo_url): void
    {
        $this->logo_url = $logo_url;
    }

    /**
     * @return string
     */
    public function getWebsiteUrl(): string
    {
        return $this->website_url;
    }

    /**
     * @param string $website_url
     */
    public function setWebsiteUrl(string $website_url): void
    {
        $this->website_url = $website_url;
    }

    /**
     * @return string
     */
    public function getLocation(): string
    {
        return $this->location;
    }

    /**
     * @param string $location
     */
    public function setLocation(string $location): void
    {
        $this->location = $location;
    }

    /**
     * @return string
     */
    public function getAddress(): string
    {
        return $this->address;
    }

    /**
     * @param string $address
     */
    public function setAddress(string $address): void
    {
        $this->address = $address;
    }

}
