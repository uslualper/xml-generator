<?php

namespace System\Model;

interface IModel{
    public function __construct(string $name,string $description);
    public function getXml() : string;
    public function addItem() : bool;
    public function deleteItem(int $id) : bool;
}