<?php


include_once 'TelegraphText.php';

class FileStorage
{
    public function create(TelegraphText $text): string
    {
        $i = 1;
        $fileName = $text->slug . '_' .  date('r');
        while (file_exists($fileName)) {
            $fileName = $text->slug . '_' . $i . '_' . date('r');
            $i ++;
        }
        $text->slug = $fileName;
        file_put_contents($fileName, serialize($text));
        return $text->slug;
    }

    public function read($slug)
    {
        if (file_exists($slug)) {
            $data = file_get_contents($slug);
            $arr = unserialize($data);
            foreach ($arr as $value) {
                echo $value . PHP_EOL;
            }
        }
    }

    public function update($slug, $title, $text)
    {
        if (file_exists($slug)) {
            $data = file_get_contents($slug);
            $arr = unserialize($data);
            $arr['title'] = $title;
            $arr['text'] = $text;
            $arr['published'] = date('r');
            file_put_contents($slug, serialize($arr));
        }
    }

    public function delete($slug)
    {
        unlink($slug);
    }

    public function list(): array
    {
        $list = [];
        $array = scandir(getcwd());
        $array = array_slice($array, 2, null);
        foreach ($array as $file) {
            $list[] = $file;
        } return $list;
    }
}
