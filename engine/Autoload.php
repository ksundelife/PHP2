<?php

namespace app\engine;

class Autoload
{
    protected $search = [
        "app",
        '\\'
    ];

    protected $replace = [
        "..",
        '/'
    ];

    public function loadClass($className) {
        var_dump($className);
       
        $replacedStr = str_replace($this->search, $this->replace, $className);

            $fileName = "$replacedStr.php";
            var_dump($fileName);

            if (file_exists($fileName)) {
                include $fileName;
            }

    }
}
