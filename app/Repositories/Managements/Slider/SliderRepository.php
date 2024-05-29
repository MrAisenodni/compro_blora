<?php

namespace App\Repositories\Managements\Slider;

use App\Models\Managements\Slider;

class SliderRepository implements SliderRepositoryInterface
{
    public function getAll()
    {
        $data = Slider::where('disabled', 0);

        return $data->get();
    }

    public function getByCondition($select, $where, $order)
    {
        $data = Slider::selectRaw("$select")->whereRaw("$where")->orderByRaw("$order");

        return $data->get();
    }

    public function findById($id)
    {
        $data = Slider::where('id', $id)->where('disabled', 0);

        return $data->first();
    }

    public function save(array $data)
    {
        return Slider::create($data);
    }

    public function update($id, $data)
    {
        $detail = Slider::where('id', $id)->update($data);

        return $detail;
    }

    public function delete($id)
    {
        $detail = $this->findById($id);
        $detail->delete();

        return true;
    }
}