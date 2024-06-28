<?php

namespace App\Repositories\Masters\Doctor;

interface DoctorRepositoryInterface
{
    public function getAll();
    public function findByCode($code);
    public function save(array $data);
    public function update($id, $data);
    public function delete($id);
}
