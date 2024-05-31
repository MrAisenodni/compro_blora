<?php

namespace App\Repositories\Managements\ServiceDetail;

use App\Models\Managements\ServiceDetail;

class ServiceDetailRepository implements ServiceDetailRepositoryInterface
{
    public function getAll()
    {
        $data = ServiceDetail::where('disabled', 0);

        return $data->get();
    }

    public function getByCondition($select, $where, $order)
    {
        $data = ServiceDetail::selectRaw("$select")->whereRaw("$where")->orderByRaw("$order");

        return $data->get();
    }

    public function findById($id)
    {
        $data = ServiceDetail::where('id', $id)->where('disabled', 0);

        return $data->first();
    }

    public function save(array $data)
    {
        return ServiceDetail::create($data);
    }

    public function update($id, $data)
    {
        $detail = ServiceDetail::where('id', $id)->update($data);

        return $detail;
    }

    public function delete($id)
    {
        $detail = $this->findById($id);
        $detail->delete();

        return true;
    }
}