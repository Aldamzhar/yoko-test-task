<?php

namespace App\Services;

use App\Http\Requests\FormJsonRequest;
use Illuminate\Support\Facades\Storage;

class FormJsonService
{
    // Первый способ -  прочесть два файла c storage, обработать JSON и соединить
    public function combine() {
        $first_file = storage_path() . "/app/public/first_response.json";
        $second_file = storage_path() . "/app/public/second_response.json";

        $first_response = json_decode(file_get_contents($first_file))->data;
        $second_response = json_decode(file_get_contents($second_file));

        $response = array_merge($first_response,$second_response);
        return response()->json(['data' => $response]);
    }

    // Второй способ реализации - альтернативный - прибывают строки от JSON файлов как параметры в запрос
    public function alternativeCombine(FormJsonRequest $request) {
        $data = $request->validated();
        $first_response = json_decode($data['first_response'])->data;
        $second_response = json_decode($data['second_response']);
        $response = array_merge($first_response,$second_response);
        return response()->json(['data' => $response]);
    }
}
