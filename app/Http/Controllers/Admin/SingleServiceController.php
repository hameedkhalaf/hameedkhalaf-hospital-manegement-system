<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\StoreSingleServiceRequest;
use App\Interfaces\Services\SingleServiceRepositoryInterface;

class SingleServiceController extends Controller
{
    private $SingleService;

    public function __construct(SingleServiceRepositoryInterface $SingleService)
    {
        $this->SingleService = $SingleService;
    }

    public function index()
    {
        return $this->SingleService->index();
    }


    public function store(StoreSingleServiceRequest $request)
    {
        return $this->SingleService->store($request);
    }


    public function update(StoreSingleServiceRequest $request)
    {
        return $this->SingleService->update($request);

    }


    public function destroy(Request $request)
    {
        return $this->SingleService->destroy($request);
    }
}
