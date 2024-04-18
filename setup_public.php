
<?php

class Translator {
    private $langt;

    public function __construct() {
        include dirname(__FILE__) . '/config.php';
        $lang = isset($_GET['lang']) ? $_GET['lang'] : (isset($_COOKIE['lang']) ? $_COOKIE['lang'] : $_CONFIG['lang_default']);
        setcookie('lang', $lang, time() + (10 * 365 * 24 * 60 * 60), '/');
        $translations_file = dirname(__FILE__) . "/translations/$lang.php";
        if (!file_exists($translations_file)) {
            $lang = $_CONFIG['lang_default'];
            $translations_file = dirname(__FILE__) . "/translations/$lang.php";
        }
        include $translations_file;
        $this->langt = $_TRANSLATIONS;
    }

    public function getTranslations() {
        return $this->langt;
    }
}


?>
