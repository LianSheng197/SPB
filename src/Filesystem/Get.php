<?php

namespace SPB\Filesystem;

class Get {
    /**
     * 取得檔案內容
     */
    public static function fileContent(string $filename): string {
        return file_get_contents($filename);
    }
}