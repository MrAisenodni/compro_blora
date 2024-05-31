<?php

namespace App\Repositories\Settings\Provider;

use App\Models\Settings\Provider;

class ProviderRepository implements ProviderRepositoryInterface
{
    public function getAll()
    {
        $data = Provider::where('disabled', 0)->get();

        return $data;
    }

    public function findById($id)
    {
        $data = Provider::where('id', $id)->where('disabled', 0);

        return $data->first();
    }

    public function findByCondition($select, $where)
    {
        $data = Provider::selectRaw("$select")->whereRaw("$where");

        return $data->first();
    }

    public function save(array $data)
    {
        return Provider::create($data);
    }

    public function update($id, $data)
    {
        $detail = Provider::where('id', $id)->update($data);

        return $detail;
    }
}