<?php

namespace App\Repositories\Managements\ContactInfo;

use App\Models\Managements\ContactInfo;

class ContactInfoRepository implements ContactInfoRepositoryInterface
{
    public function getAll()
    {
        $data = ContactInfo::where('disabled', 0);

        return $data->get();
    }

    public function getByCondition($select, $where, $order)
    {
        $data = ContactInfo::selectRaw("$select")->whereRaw("$where")->orderByRaw("$order");

        return $data->get();
    }

    public function findById($id)
    {
        $data = ContactInfo::where('id', $id)->where('disabled', 0);

        return $data->first();
    }

    public function save(array $data)
    {
        return ContactInfo::create($data);
    }

    public function update($id, $data)
    {
        $detail = ContactInfo::where('id', $id)->update($data);

        return $detail;
    }

    public function delete($id)
    {
        $detail = $this->findById($id);
        $detail->delete();

        return true;
    }
}