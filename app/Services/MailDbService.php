<?php


namespace App\Services;


use App\Models\MailModel;

class MailDbService implements MailServiceInterface
{

    public function getList(array $filters): array
    {

        return MailModel::paginate()->all();
    }

    public function getMail(int $id, array $select = []): MailModel|null
    {
        if (count($select)) {
            $select[] = 'id';
            $oMail = new MailModel();
            $select = array_filter($select, function($item) use ($oMail){
                return in_array($item, $oMail->allowFilter);
            });
            return MailModel::select($select)->where('id', $id)->first();
        }
        return MailModel::where('id', $id)->first();
    }

    public function create(array $fields): array
    {
        $mail = new MailModel();
        $mail->name = $fields['name'];
        $mail->email = $fields['email'];
        $mail->text = $fields['text'];
        $res = $mail->save();
        return [
            'id' => $mail->id,
            'status' => $res
        ];
    }
}
