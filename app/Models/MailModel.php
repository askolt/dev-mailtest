<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MailModel extends Model
{
    use HasFactory;

    protected $table = 'mails';

    protected $fillable = [
        'name',
        'email',
        'text',
    ];

    public $allowFilter = [
        'id',
        'name',
        'email',
        'text',
        'created_at',
        'updated_at'
    ];
}
