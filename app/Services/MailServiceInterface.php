<?php


namespace App\Services;


use App\Models\MailModel;

interface MailServiceInterface
{

    public function getList(array $filters): array;
    public function getMail(int $id, array $select = []): MailModel|null;
    public function create(array $fields): array;
}
