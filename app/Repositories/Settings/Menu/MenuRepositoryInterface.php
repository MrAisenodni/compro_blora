<?php

namespace App\Repositories\Settings\Menu;

interface MenuRepositoryInterface
{
    public function findBySlug($slug);
    public function findById($id);
    public function save(array $data);
    public function update($id, $data);
    public function delete($id);
}
