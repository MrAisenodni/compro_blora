<?php

namespace App\Repositories\Managements\Slider;

interface SliderRepositoryInterface
{
    public function getAll();
    public function getByCondition($select, $where, $order);
    public function findById($id);
    public function save(array $data);
    public function update($id, $data);
    public function delete($id);
}
