# PHP Translation System

A simple, file-based translation system for PHP projects. This system allows you to easily manage and display translated content in your web application.

## Project Structure

The project is organized into two main directories:

- `public/`: This directory contains the public-facing files of your application, such as `index.php`. It serves as the web root.
- `src/`: This directory contains the core application logic, including the `Translator` class, configuration, and translation files.

```
/
|-- public/
|   `-- index.php
|-- src/
|   |-- translations/
|   |   |-- en.php
|   |   `-- fr.php
|   |-- config.php
|   `-- Translator.php
`-- README.md
```

## How to Use

### 1. Include the Translator

To use the translation system, you first need to include the `Translator.php` file in your project. This is typically done at the beginning of your main application file (e.g., `public/index.php`).

```php
require_once __DIR__ . '/../src/Translator.php';
```

### 2. Instantiate the Translator

Next, create an instance of the `Translator` class and retrieve the translations for the current language.

```php
$translator = new Translator();
$tr = $translator->getTranslations();
```

The `Translator` class automatically detects the user's language from the `lang` query parameter in the URL (e.g., `index.php?lang=fr`) or from a cookie. If no language is specified, it uses the default language defined in `src/config.php`.

### 3. Display Translated Content

You can now use the `$tr` array to display translated strings in your HTML.

```php
<h1><?php echo $tr['my_account']; ?></h1>
<p><?php echo $tr['email']; ?></p>
```

## Adding a New Language

To add a new language, follow these steps:

1.  **Create a new translation file.** In the `src/translations/` directory, create a new PHP file named after the language code (e.g., `es.php` for Spanish).

2.  **Add the translation strings.** The file should contain an array named `$_TRANSLATIONS` with the translated strings. At a minimum, you should include the `LANGUAGE_NAME`, `LANGUAGE_CODE`, and `directory` (either `ltr` for left-to-right or `rtl` for right-to-left).

    **Example: `src/translations/es.php`**

    ```php
    <?php
    $_TRANSLATIONS = array (
      'LANGUAGE_NAME' => 'Español',
      'LANGUAGE_CODE' => 'es',
      'directory' => 'ltr',
      'my_account' => 'Mi cuenta',
      'email' => 'Correo electrónico',
      // ... other translations
    );
    ?>
    ```

The new language will be automatically detected by the `Translator` class.

## Configuration

The default language can be set in the `src/config.php` file.

```php
<?php
$_CONFIG = array (
  'lang_default' => 'en',
);
?>
```

## Contributing

Contributions are welcome! If you find any issues or have suggestions for improvements, please open an issue or submit a pull request.
