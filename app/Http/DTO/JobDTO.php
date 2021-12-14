<?php


namespace App\Http\DTO;


class JobDTO
{
    private string $title = "";
    private string $type = "";
    private string $description = "";
    private string $salary_min = "";
    private string $salary_max = "";
    private string $company = "";
    private string $source = "";

    /**
     * @return string
     */
    public function getSource(): string
    {
        return $this->source;
    }

    /**
     * @param string $source
     */
    public function setSource(string $source): void
    {
        $this->source = $source;
    }

    /**
     * @return string
     */
    public function getCompany(): string
    {
        return $this->company;
    }

    /**
     * @param string $company
     */
    public function setCompany(string $company): void
    {
        $this->company = $company;
    }
    private int $rating = 0;

    /**
     * @return string
     */
    public function getTitle(): string
    {
        return $this->title;
    }

    /**
     * @param string $title
     */
    public function setTitle(string $title): void
    {
        $this->title = $title;
    }

    /**
     * @return string
     */
    public function getType(): string
    {
        return $this->type;
    }

    /**
     * @param string $type
     */
    public function setType(string $type): void
    {
        $this->type = $type;
    }

    /**
     * @return string
     */
    public function getDescription(): string
    {
        return $this->description;
    }

    /**
     * @param string $description
     */
    public function setDescription(string $description): void
    {
        $this->description = $description;
    }



    /**
     * @return string
     */
    public function getSalaryMin(): string
    {
        return $this->salary_min;
    }

    /**
     * @param string $salary_min
     */
    public function setSalaryMin(string $salary_min): void
    {
        $this->salary_min = $salary_min;
    }

    /**
     * @return string
     */
    public function getSalaryMax(): string
    {
        return $this->salary_max;
    }

    /**
     * @param string $salary_max
     */
    public function setSalaryMax(string $salary_max): void
    {
        $this->salary_max = $salary_max;
    }

    /**
     * @return int
     */
    public function getRating(): int
    {
        return $this->rating;
    }

    /**
     * @param string $rating
     */
    public function setRating(string $rating): void
    {
        $this->rating = $rating;
    }

}
