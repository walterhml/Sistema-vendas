<?php

interface baseDAO {
    public function getById($id);
    public function getAll();
    public function create($entity);
    public function update($entity);
    public function delete($id);
}


















?>