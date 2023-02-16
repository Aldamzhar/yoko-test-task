<?php

namespace App\Http\Controllers;

use App\Http\Requests\FormJsonRequest;
use Illuminate\Http\Request;
use App\Services\FormJsonService;

class FormJsonController extends Controller
{
    private FormJsonService $formJsonService;

    public function __construct(FormJsonService $formJsonService)
    {
        $this->formJsonService = $formJsonService;
    }

    public function combine() {
        return $this->formJsonService->combine();
    }

    public function alternativeCombine(FormJsonRequest $formJsonRequest) {
        return $this->formJsonService->alternativeCombine($formJsonRequest);
    }

}
