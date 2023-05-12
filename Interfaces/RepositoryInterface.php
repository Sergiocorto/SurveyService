<?php


namespace Interfaces;


interface RepositoryInterface
{
    public function getAll($id);
    public function add($data);
    public function delete($id);
}