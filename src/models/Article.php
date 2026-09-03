<?php
namespace src\models;

use src\Exceptions\InvalidArgumentException;
use src\services\Db;
class  Article extends ActiveRecordEntity
{
    protected $author_id;
    protected $name;
    protected $text;
    protected $created_at;
    protected $img = null;

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
    public function getImg(): ?string
    {
        return $this->img;
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

    public function getAuthor(): User
    {
        return User::getById($this->author_id);
    }

    public static function create(array $fields, array $imgFile, User $author): Article
    {

        if(empty($fields['name'])){
            throw new InvalidArgumentException('не передано название статьи');
        }
        if(empty($fields['text'])){
            throw new InvalidArgumentException('не передан текст статьи');
        }
        if($imgFile['size'] > 10*1024*1024){
            throw new InvalidArgumentException('Слишком большой файл! Должно быть не более 10МБ');
        }

        $article = new Article();
        $article->name = $fields['name'];
        $article->text = $fields['text'];
        $article->author_id = $author->getId();

        if(!empty($imgFile['name'])){
            $filePath = 'uploads/' . $imgFile['name'];
            $article->img = $filePath;

            if(!move_uploaded_file($imgFile['tmp_name'], $filePath)){
                throw new InvalidArgumentException('Ошибка при загрузке файла');
            }
        }

        $article->save();
        return $article;
    }



    public function updateFromArray(array $fields, array $imgFile):Article
    {
       if(empty($fields['name'])){
            throw new InvalidArgumentException('не передано название статьи');
        }
        if(empty($fields['text'])){
            throw new InvalidArgumentException('не передан текст статьи');
        }
        if($imgFile['size'] > 10*1024*1024){
            throw new InvalidArgumentException('Слишком большой файл! Должно быть не более 10МБ');
        }

        $this->name = $fields['name'];
        $this->text = $fields['text'];

        if(!empty($imgFile['name'])){
            $filePath = 'uploads/' . $imgFile['name'];
            $this->img = $filePath;

            if(!move_uploaded_file($imgFile['tmp_name'], $filePath)){
                throw new InvalidArgumentException('Ошибка при загрузке файла');
            }
        }

        $this->save();
        return $this;

    }
    public static function searchByName(string $searchString): ?array
    {
        return parent::search('name', $searchString);
    }
}