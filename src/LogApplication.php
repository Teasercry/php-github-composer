<?php

class Log {
    static function info(string $message) {
        $filename = $_SERVER['DOCUMENT_ROOT'] . 'tmp/' . date('Y-m-d') . '.log';
        $file = fopen($filename, "a");
        if (!$file) {
            error_log("overwriting the file failed (permission problem maybe), debug or log here", 0);
        } else {
            file_put_contents($filename, date('Y-m-d H:i:s') ." : ".$message . "\n", FILE_APPEND);
            fclose($file);
        }
    }
}
