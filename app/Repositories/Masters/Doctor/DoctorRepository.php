<?php

namespace App\Repositories\Masters\Doctor;

use App\Models\Masters\Doctor;

class DoctorRepository implements DoctorRepositoryInterface
{
    public function getAll()
    {
        $data = Doctor::where('disabled', 0)->get();

        return $data;
    }

    public function findByCode($code)
    {
        $data = Doctor::where('code', $code)->where('disabled', 0);

        return $data->first();
    }

    public function findByUsername($username)
    {
        $data = Doctor::where('username', $username)->where('disabled', 0);

        return $data->first();
    }

    public function save(array $data)
    {
        return Doctor::create($data);
    }

    public function update($id, $data)
    {
        $detail = Doctor::where('id', $id)->update($data);

        return $detail;
    }

    public function delete($id)
    {
        $detail = $this->findById($id);
        $detail->delete();

        return true;
    }
}