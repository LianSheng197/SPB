<?php

namespace SPB\Filesystem;

class Check {
    /**
     * 確認檔案是否存在
     */
    public static function fileExist(string $target): bool {
        return file_exists($target);
    }

    /**
     * 確認目錄是否存在
     */
    public static function folderExist(string $target): bool {
        return is_dir($target);
    }
}