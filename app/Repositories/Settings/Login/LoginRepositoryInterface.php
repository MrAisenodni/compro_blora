<?php

namespace App\Repositories\Settings\Login;

interface LoginRepositoryInterface
{
    public function getAll();
    public function findById($id);
    public function findByUsername($username);
    public function save(array $data);
    public function update($id, $data);
    public function delete($id);
}
