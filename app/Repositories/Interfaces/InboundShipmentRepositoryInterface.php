<?php

namespace App\Repositories\Interfaces;
use Illuminate\Pagination\LengthAwarePaginator;

interface InboundShipmentRepositoryInterface
{
    public function allPaginated($perPage);
    public function paginate(int $perPage): LengthAwarePaginator;

    public function create(array $data);

    public function find($id);

    public function update($id, array $data);

    public function delete($id);
}
