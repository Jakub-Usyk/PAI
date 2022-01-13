<?php

class Recipe
{
    private $title;
    private $description;
    private $prepareTime;
    private $image;

    public function __construct($title, $description, $prepareTime, $image)
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

    public function getPrepareTime() : string
    {
        return $this->prepareTime;
    }

    public function setPrepareTime(string $prepareTime)
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