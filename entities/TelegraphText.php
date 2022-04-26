<?php

class TelegraphText
{
    private $text;
    private $title;
    private $author;
    private $published;
    private $slug;

    public function __construct()
    {
        $this->author = 'Владыка смерти';
        $this->slug = 'test_text_file';
        $this->published = date('r');

    }

    private function storeText()
    {
        $data = [
            'title' => $this->title,
            'text' => $this->text,
            'author' => $this->author,
            'published' => $this->published
        ];
        file_put_contents($this->slug, serialize($data));
    }

    private function loadText()
    {
        if (filesize($this->slug) > 0 ) {
            $data = unserialize(file_get_contents($this->slug));
            $this->title = $data['title'];
            $this->text = $data['text'];
            $this->author = $data['author'];
            $this->published = $data['published'];
        }
        return $this->text;
    }

    public function editText($newTitle, $newText)
    {
        $this->title = $newTitle;
        $this->text = $newText;
    }

    public function __set($name, $value)
    {
        if ($name == 'author' && strlen($name < 120)) {
            $this->author = $value;
        }

        if ($name == 'slug' && preg_match("/[^(\w)|(\x7F-\xFF)|(\s)]/", $name)) {
            $this->slug = $value;
        }

        if ($name == 'published' && date($name) < date('r')) {
            $this->published = $value;
        }
        if ($name == 'data') {
            $this->storeText();
        }
    }

    public function __get($name)
    {
        if ($name == 'author') {
            return $this->name;
        }

        if ($name == 'slug') {
            return $this->name;
        }

        if ($name == 'published'){
            return $this->name;
        }

        if ($name == 'data') {
            return $this->loadText();
        }
    }
}


