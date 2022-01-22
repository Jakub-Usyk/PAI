<?php

class Recipe
{
    private string $title;
    private string $description;
    private int $prepareTime;
    private string $image;

    public function __construct(string $title, string $description, int $prepareTime, string $image)
    {
        $this->title = $title;
        $this->description = $description;
        $this->prepareTime = $prepareTime;
        $this->image = $image;
    }

    public function getTitle() : string
    {
        return $this->title;
    }

    public function setTitle(string $title)
    {
        $this->title = $title;
    }

    public function getDescription() : string
    {
        return $this->description;
    }

    public function setDescription(string $description)
    {
        $this->description = $description;
    }

    public function getPrepareTime() : int
    {
        return $this->prepareTime;
    }

    public function setPrepareTime(int $prepareTime)
    {
        $this->prepareTime = $prepareTime;
    }

    public function getImage() : string
    {
        return $this->image;
    }

    public function setImage(string $image)
    {
        $this->image = $image;
    }


}