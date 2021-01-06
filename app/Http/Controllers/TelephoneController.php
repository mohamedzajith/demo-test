<?php

namespace App\Http\Controllers;

use App\Interfaces\TelephoneInterface;
use Illuminate\Http\Request;
use Exception;
use Illuminate\Validation\ValidationException;

class TelephoneController extends Controller
{
    private $telephoneRepository;

    public function __construct(TelephoneInterface $telephoneRepository)
    {
        $this->telephoneRepository = $telephoneRepository;
    }
    public function index(){
        try {
            return view('telephone.view');
        } catch (Exception $exception) {
            return $this->exceptionErrorResponse($exception);
        }
    }

    public function filterData(Request $request){
        try {
            $data = $this->telephoneRepository->filterData($request);
            return $data;
        } catch (Exception $exception) {
            return $this->exceptionErrorResponse($exception);
        }
    }

    public function create()
    {
        return view('telephone.create');
    }

    public function store(Request $request)
    {
        try {
            $request->validate([
                'name' => 'required',
                'subject' => 'required',
                'type' => 'required',
                'content' => 'required',
            ]);
            $template = $this->emailTemplateRepository->store($request);
            return redirect()->route('email')->with($template);
        } catch (ValidationException $validationException) {
            return $this->validationErrorResponse($validationException);
        } catch (Exception $exception) {
            return $this->exceptionErrorResponse($exception);
        }
    }

}
