<?php


namespace App\Interfaces;


use Illuminate\Http\Request;

interface TelephoneInterface
{
    public function filterData(Request $request);

    public function store(Request $request);

    public function update(Request $request, $id);

    public function delete($id);
}
