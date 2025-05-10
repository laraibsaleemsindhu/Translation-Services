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
🗃️ Migration
Run the following command to generate the translation table:

php artisan migrate

Migration file contains:

Schema::create('translations', function (Blueprint $table) {
    $table->id();
    $table->string('key');
    $table->text('content');
    $table->string('locale');
    $table->timestamps();
});


🚀 Usage (Tinker Examples)
Add a New Translation

use App\Models\Translation;

Translation::create([
    'key' => 'greeting.hello',
    'content' => 'Hello',
    'locale' => 'en',
]);


Update a Translation

$translation = Translation::where('key', 'greeting.hello')->where('locale', 'en')->first();
$translation->update(['content' => 'Hi']);

Retrieve All Translations

\App\Models\Translation::all();

🧪 Testing
You can test your model using Laravel Tinker:

php artisan tinker


And use the above usage examples to create, update, or fetch data.

🧑‍💻 Developer Info
Name: Laraib Saleem

Email: laraibsaleem623@gmail.com

GitHub: laraibsaleemsindhu

📌 Notes
Ensure .env file is correctly configured for database access.

This app assumes you're running PHP 8+ and Laravel 8 or higher.

The current branch is main, and the full codebase is available on GitHub.



