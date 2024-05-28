<?php

namespace App\Repositories\Settings\Login;

use App\Models\Settings\Login;

class LoginRepository implements LoginRepositoryInterface
{
    public function getAll()
    {
        $data = Login::where('disabled', 0)->get();

        return $data;
    }

    public function findById($id)
    {
        $data = Login::where('id', $id)->where('disabled', 0);

        return $data->first();
    }

    public function findByUsername($username)
    {
        $data = Login::where('username', $username)->where('disabled', 0);

        return $data->first();
    }

    public function save(array $data)
    {
        return Login::create($data);
    }

    public function update($id, $data)
    {
        $detail = Login::where('id', $id)->update($data);

        return $detail;
    }

    public function delete($id)
    {
        $detail = $this->findById($id);
        $detail->delete();

        return true;
    }
}