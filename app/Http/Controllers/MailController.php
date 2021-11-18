<?php

namespace App\Http\Controllers;

use App\Services\MailServiceInterface;
use Illuminate\Http\Request;

class MailController extends Controller
{

    protected $mailService;

    public function __construct(MailServiceInterface $mailService)
    {
        $this->mailService = $mailService;
    }

    public function list(Request $request)
    {
        return $this->mailService->getList($request->all());
    }

    public function get(Request $request)
    {
        $request->validate([
            'id' => 'required|integer',
        ]);
        $fields = $request->post('fields', []);
        if (is_string($fields) and strlen($fields) > 0) {
            $fields = explode(',', $fields);
        } else {
            $fields = [];
        }
        $res = $this->mailService->getMail($request->input('id'), $fields);
        return !is_null($res) ? $res->toArray() : ['status' => false ];
    }

    public function create(Request $request)
    {
        $request->validate([
            'name' => 'required|max:255',
            'email' => 'required|email|max:255',
            'text' => 'required',
        ]);

        $res = $this->mailService->create($request->all());
        return $res;
    }

}
