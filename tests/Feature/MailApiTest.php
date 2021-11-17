<?php

namespace Tests\Feature;

use App\Models\MailModel;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class MailApiTest extends TestCase
{

    public function test_get_list()
    {
        $response = $this->get('/api/mail/list');
        $response->assertStatus(200);
    }

    public function test_get_mail_fail()
    {
        $response = $this->post('/api/mail/one', []);
        $response->assertStatus(422);
    }

    public function test_get_mail_by_id_case_1()
    {
        $mail = MailModel::first();
        $this->assertNotNull($mail);
        $response = $this->post('/api/mail/one',
            [
                'id' => $mail->id
            ]
        );
        $response->assertStatus(200);
    }

    /*
     * Get one mail with filter and without trash
     */
    public function test_get_mail_by_id_case_2()
    {
        $mail = MailModel::first();
        $this->assertNotNull($mail);
        $response = $this->post('/api/mail/one',
            [
                'id' => $mail->id,
                'fields' => ['name']
            ]
        );
        $response->assertStatus(200);
        $response->assertExactJson([
           'id' => $mail->id,
           'name' => $mail->name
        ]);
    }

    /*
     * Get one mail with filter and with trash
     */
    public function test_get_mail_by_id_case_3()
    {
        $mail = MailModel::first();
        $this->assertNotNull($mail);
        $response = $this->post('/api/mail/one',
            [
                'id' => $mail->id,
                'fields' => ['name', 'huehue']
            ]
        );
        $response->assertStatus(200);
        $response->assertExactJson([
            'id' => $mail->id,
            'name' => $mail->name
        ]);
    }

    public function test_create_mail_fail()
    {
        $mailData = [];
        $response = $this->post('/api/mail/create', $mailData);
        $response->assertStatus(422);
    }

    public function test_create_mail_true()
    {
        $mailData = [
            'name' => 'one',
            'email' => 'example@example.com',
            'text' => 'Dear diary, today I did a test'
        ];
        $response = $this->post('/api/mail/create', $mailData);
        $response->assertStatus(200);
        $mail = MailModel::orderByDesc('id')->first();
        $this->assertNotNull($mail);
        $response->assertExactJson([
            'id' => $mail->id,
            'status' => true
        ]);
    }
}
