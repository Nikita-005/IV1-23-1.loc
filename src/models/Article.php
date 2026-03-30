<?php
namespace src\models;

use src\services\Db;
class  Article extends ActiveRecordEntity
{
    protected $author_id;
    protected $name;
    protected $text;
    protected $created_at;

    protected static function getTableName(): string
    {
        return 'articles';
    }
    public function getAuthorId(): int
    {
        return $this->author_id;
    }
    public function getName(): string
    {
        return $this->name;
    }
    public function getText(): string
    {
        return $this->text;
    }
    public function getCreatedAt(): string
    {
        return $this->created_at;
    }
    public function setName($name)
    {
        $this->name = $name;
    }

    public function setText($text)
    {
        $this->text = $text;
    }
    public function setAuthorId($authorId)
    {
        $this->author_id = $authorId;
    }

    public function getAuthor(): Users
    {
        return Users::getById($this->author_id);
    }
    public function updateFromArray(array $fields)
    {
        // $this->setName($fields['name']);
        $this->name = $fields['name'];
        $this->text = $fields['text'];

        $this->save();
    }
}