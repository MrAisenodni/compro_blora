<?php

namespace App\Repositories\Settings\Provider;

interface ProviderRepositoryInterface
{
    public function getAll();
    public function findData();
    public function findById($id);
    public function save(array $data);
    public function update($id, $data);
}
