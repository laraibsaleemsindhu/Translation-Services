# Translation Management Service

This is a Laravel-based Translation Management Service designed to manage translation strings for multilingual web applications. It provides a simple model-based approach to storing translation keys, content, and locale values in the database.

## 🛠️ Features

- Add, retrieve, and update translation entries
- Manage translation content by `key`, `locale`, and `content`
- Easy integration with Laravel apps
- Tested using Laravel Tinker

## 📂 Project Structure

translation-service-v2/
├── app/
│ └── Models/
│ └── Translation.php
├── database/
│ └── migrations/
│ └── 2025_xx_xx_create_translations_table.php
├── routes/
│ └── web.php
├── .env
├── composer.json
└── README.md

PHP

## 🧬 Model

The `Translation` model is stored at `app/Models/Translation.php`.

```php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Translation extends Model
{
    protected $fillable = ['key', 'content', 'locale'];
}
