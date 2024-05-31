<?php

namespace App\Repositories\Managements\Service;

use App\Models\Managements\Service;

class ServiceRepository implements ServiceRepositoryInterface
{
    public function getAll()
    {
        $data = Service::where('disabled', 0);

        return $data->get();
    }

    public function getByCondition($select, $where, $order)
    {
        $data = Service::selectRaw("$select")->whereRaw("$where")->orderByRaw("$order");

        return $data->get();
    }

    public function findById($id)
    {
        $data = Service::where('id', $id)->where('disabled', 0);

        return $data->first();
    }

    public function save(array $data)
    {
        return Service::create($data);
    }

    public function update($id, $data)
    {
        $detail = Service::where('id', $id)->update($data);

        return $detail;
    }

    public function delete($id)
    {
        $detail = $this->findById($id);
        $detail->delete();

        return true;
    }
}