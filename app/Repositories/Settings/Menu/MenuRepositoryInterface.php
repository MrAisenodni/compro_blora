<?php

namespace App\Repositories\Settings\Menu;

interface MenuRepositoryInterface
{
    public function getAll();
    public function findById($id);
    public function findByCondition($select, $where);
    public function save(array $data);
    public function update($id, $data);
    public function delete($id);
}
