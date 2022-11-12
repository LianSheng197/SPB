<?php

namespace SPB\Html;

use SPB\Filesystem\Check;
use SPB\Filesystem\Get;

class General {
    private static $root = __DIR__ . "/../..";

    /**
     * 添加 meta
     */
    public static function addMeta(string $html = ""):void {
        if($html !== "") {
            echo $html;
        } else {
            echo '<meta charset="UTF-8">
            <meta http-equiv="X-UA-Compatible" content="IE=edge">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">';
        }

        echo "\n";
    }

    

    /**
     * 添加 js 相依檔案
     */
    public static function addJs(string $filename, bool $ignoreCache = false): void {
        $target = self::$root . "/js/{$filename}";
        $ignoreCacheSuffix = "";

        // 若本地檔案存在則直接引用
        // 否則一律當作從網路引用
        if (Check::fileExist($target)) {
            if ($ignoreCache === true) {
                $t = time();
                $ignoreCacheSuffix = "?t={$t}";
            }

            echo "<script src='js/{$filename}{$ignoreCacheSuffix}'></script>";
        } else {
            echo "<script src='{$filename}'></script>";
        }

        echo "\n";
    }

    /**
     * 添加 css 相依檔案
     */
    public static function addCss(string $filename, bool $ignoreCache = false): void {
        $target = self::$root . "/css/{$filename}";
        $ignoreCacheSuffix = "";

        // 若本地檔案存在則直接引用
        // 否則一律當作從網路引用
        if (Check::fileExist($target)) {
            if ($ignoreCache === true) {
                $t = time();
                $ignoreCacheSuffix = "?t={$t}";
            }

            echo "<link href='css/{$filename}{$ignoreCacheSuffix}'></link>";
        } else {
            echo "<link href='{$filename}'></link>";
        }

        echo "\n";
    }

    /**
     * 添加 html 區塊檔案
     */
    public static function addHtmlBlock(string $filename): void {
        $target = self::$root . "/html/{$filename}";
        echo Get::fileContent($target);

        echo "\n";
    }

    /**
     * 添加 html
     */
    public static function addHtml(string $html): void {
        echo $html;

        echo "\n";
    }

    /**
     * 設定網頁標題
     */
    public static function setTitle(string $title):void {
        echo "<title>{$title}</title>";

        echo "\n";
    }
}
