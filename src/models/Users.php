<?php
namespace src\models;

use src\services\Db;
class  Users extends ActiveRecordEntity
{
    protected $nickname;
    protected $email;
    protected $text;
    protected $create_at;
    protected $is_confirmed;
    protected $role;
    protected $password_hash;
    protected $auth_token;

    protected static function getTableName(): string
    {
        return 'users';
    }
    public function getNickname(): string
    {
        return $this->nickname;
    }


}