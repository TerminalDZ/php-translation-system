
# php translation system


## How Use :

**Add setup_public.php into the file you want to translate into**

    require  'language/setup_public.php';

**Define it in a file**

    $translator = new  Translator();
    $tr = $translator->getTranslations();

## **How to use translation**

**Add key and word in translations/lang.php**

**Example :**
translations/fr.php

    <?php
    
    $_TRANSLATIONS = array (
    
    'LANGUAGE_NAME' => 'française',    
    'LANGUAGE_CODE' => 'fr',
    'directory' => 'ltr',
         
    'email' => 'E-mail',
	'phone' => 'Numéro de téléphone',
	'my_account' => 'Mon compte',
	'logout' => 'Se déconnecter',
	'manage_my_account' => 'Gérer mon compte',



index.php add

    <?=$tr['phone'];?>
    
    <label  for="phone"><?=$tr['phone'];?>:</label>

# Add a new language


**Add a file in a folder
translations/
It is an example language code**
en.php
fr.php
ar.php

**Add to him**

    <?php
    
    $_TRANSLATIONS = array (
    
    'LANGUAGE_NAME' => 'française', //<= Language name
    
    'LANGUAGE_CODE' => 'fr', //<= Language code
    
    'directory' => 'ltr', //<= Left to Right (ltr) or Right to Left (rtl)


# Setting the default language

**Edit the config.php file**

    <?php
    
    $_CONFIG = array (
    
    'lang_default' => 'fr',
    
    );


**If you want to change between existing languages
You can use a code**

    <?php
    
    $translations_dir = 'include/language/translations/'; // Directory where the translation files are stored
    
    $translations_files = scandir($translations_dir);
    
    $translations = array();
    
    $lang = isset($_GET['lang']) ? $_GET['lang'] : (isset($_COOKIE['lang']) ? $_COOKIE['lang'] : null);
    
    foreach ($translations_files as $file) {
    
    if ($file !== '.' && $file !== '..') {
    
    include  $translations_dir  .  $file;
    
    $language_name = $_TRANSLATIONS['LANGUAGE_NAME'];
    
    $language_code = $_TRANSLATIONS['LANGUAGE_CODE'];
    
    $translations[$language_code] = $language_name;
    
    }
    
    }
    
    ?>

    <li  class="nav-item dropdown no-arrow mx-1">
    
    <a  class="nav-link dropdown-toggle"  href="#"  id="alertsDropdown"  role="button"  data-toggle="dropdown"  aria-haspopup="true"  aria-expanded="false">
    
    <i  class="fas fa-globe fa-fw"></i>  <?=  $tr['LANGUAGE_NAME'] ?>
    
    </a>
    
    <!-- Dropdown - Alerts -->
    
    <div  class="dropdown-list dropdown-menu dropdown-menu-right shadow animated--grow-in"  aria-labelledby="alertsDropdown">
    
    <?php
    
    $query_string = $_SERVER['QUERY_STRING'];
    
    $current_url = $_SERVER['REQUEST_URI'];
    
    foreach ($translations as $key => $value) {
    
    $lang_param = ($query_string ? '&' : '?') .  'lang='  .  $key;
    
    $new_url = $current_url  .  $lang_param;
    
    ?>
    
    <a  class="dropdown-item d-flex align-items-center"  href="<?=$new_url?>">
    
    <?=$value?>
    
    </a>
    
    <?php
    
    };
    
    ?>
    
    </div>
    
    </li>


