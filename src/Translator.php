
<?php

class Translator
{
    private $langt;
    private $available_languages = [];

    public function __construct()
    {
        include dirname(__FILE__) . '/config.php';

        $this->loadAvailableLanguages();

        $lang = $_CONFIG['lang_default'];
        if (isset($_GET['lang']) && $this->isLanguageAvailable($_GET['lang'])) {
            $lang = $_GET['lang'];
        } elseif (isset($_COOKIE['lang']) && $this->isLanguageAvailable($_COOKIE['lang'])) {
            $lang = $_COOKIE['lang'];
        }

        setcookie('lang', $lang, time() + (10 * 365 * 24 * 60 * 60), '/');

        $translations_file = dirname(__FILE__) . "/translations/$lang.php";
        if (file_exists($translations_file)) {
            include $translations_file;
            $this->langt = $_TRANSLATIONS;
        }
    }

    private function loadAvailableLanguages()
    {
        $translations_dir = dirname(__FILE__) . '/translations/';
        $files = scandir($translations_dir);
        foreach ($files as $file) {
            if ($file !== '.' && $file !== '..') {
                $this->available_languages[] = pathinfo($file, PATHINFO_FILENAME);
            }
        }
    }

    private function isLanguageAvailable($lang)
    {
        return in_array($lang, $this->available_languages);
    }

    public function getTranslations()
    {
        return $this->langt;
    }
}


?>
