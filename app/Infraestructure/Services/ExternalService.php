<?php

namespace App\Infraestructure\Services;

use Illuminate\Support\Facades\Http;

class ExternalService {

  public function getExternalService($id): string {
    $response = Http::withOptions(["verify" => false])->get("https://jsonplaceholder.typicode.com/todos/$id");
    if ($response->successful()) {
      return json_encode($response->json());
    } else {
      return null;
    }
  }

}