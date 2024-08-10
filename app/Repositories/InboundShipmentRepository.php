<?php
namespace App\Repositories;

use App\Models\InboundShipment;
use App\Repositories\Interfaces\InboundShipmentRepositoryInterface;
use Illuminate\Pagination\LengthAwarePaginator;

class InboundShipmentRepository implements InboundShipmentRepositoryInterface
{
    protected $model;

    public function __construct(InboundShipment $model)
    {
        $this->model = $model;
    }
    public function paginate(int $perPage): LengthAwarePaginator
    {
        return InboundShipment::paginate($perPage);
    }

    public function allPaginated($perPage)
    {
        return InboundShipment::paginate($perPage);
    }

    public function create(array $data)
    {
        return $this->model->create($data);
    }

    public function find($id)
    {
        return $this->model->findOrFail($id);
    }

    public function update($id, array $data)
    {
        $inboundShipment = $this->model->findOrFail($id);
        $inboundShipment->update($data);
        return $inboundShipment;
    }

    public function delete($id)
    {
        $inboundShipment = $this->model->findOrFail($id);
        return $inboundShipment->delete();
    }
}
