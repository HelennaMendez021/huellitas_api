<?php

namespace App\Models;

class ResponseApi implements \JsonSerializable
{
    public bool $success;
    public string $message;
    public $data;
    public string $errors;

    public function __construct(bool $success, $message, $data = null, string $errors = '')
    {
        $this->success = $success;
        $this->message = $message;
        $this->data = $data;
        $this->errors = $errors;
    }

    /**
     * Define cómo se debe serializar el objeto a JSON.
     */
    public function jsonSerialize(): array
    {
        return [
            'success' => $this->success,
            'message' => $this->message,
            'data' => $this->data,
            'errors' => $this->errors,
        ];
    }
}
