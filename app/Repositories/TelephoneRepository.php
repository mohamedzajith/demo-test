<?php


namespace App\Repositories;


use App\Interfaces\TelephoneInterface;
use App\Models\Telephone;
use Illuminate\Http\Request;
use Exception;

class TelephoneRepository implements TelephoneInterface
{

    public function filterData(Request $request)
    {
        try {
            $draw = $request->get('draw');
            $query = Telephone::skip($request->get("start"))
                ->take($request->get("length"));
            if ($request->search['value']) {
                $query = $query->where('name', 'like', '%'.$request->search['value'].'%')
                    ->orWhere('number', 'like', '%'.$request->search['value'].'%');
            }
            $data = $query->get()
                ->transform(function ($item) {
                    return [
                        'id' => $item->id,
                        'name' => $item->name,
                        'number' => $item->number,
                    ];
                });
            $totalRecords = Telephone::count();
            return ['data' => $data, 'draw' => intval($draw), "iTotalRecords" => $totalRecords, "iTotalDisplayRecords" => $totalRecords ];
        } catch (Exception $exception) {
            throw $exception;
        }
    }

    public function store(Request $request)
    {
        try {
//
        } catch (Exception $exception) {
            throw $exception;
        }
    }

    public function update(Request $request, $id)
    {
        try {
//
        } catch (Exception $exception) {
            throw $exception;
        }
    }

    public function delete($id)
    {
        try {
//
        } catch (Exception $exception) {
            throw $exception;
        }
    }
}
