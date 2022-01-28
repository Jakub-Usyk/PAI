<?php

class Category
{
    private string $name;
    private string $icon;
    private array $ingredients;

    public function __construct(string $name, string $icon, array $ingredients)
    {
        $this->name = $name;
        $this->icon = $icon;
        $this->ingredients = $ingredients;
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function setName(string $name): void
    {
        $this->name = $name;
    }

    public function getIcon(): string
    {
        return $this->icon;
    }

    public function setIcon(string $icon): void
    {
        $this->icon = $icon;
    }

    public function getIngredients(): array
    {
        return $this->ingredients;
    }

    public function setIngredients(array $ingredients): void
    {
        $this->ingredients = $ingredients;
    }



}