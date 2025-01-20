<?php

namespace App\Console\Commands;

use App\Models\Translation;
use Illuminate\Console\Command;

class ImportTranslations extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'translations:import';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        // Get the files and languages from the arguments
        $files = ['translates', 'mytr'];
        $locales = ['tm', 'ru', 'en'];

        foreach ($files as $file) {
            foreach ($locales as $locale) {
                // Construct the file path
                $filePath = resource_path("lang/{$locale}/{$file}.php");

                if (!file_exists($filePath)) {
                    $this->error("Translation file '{$filePath}' does not exist for locale '{$locale}'.");
                    continue;
                }

                // Include the translation file and get its contents
                $translations = include $filePath;

                if (!is_array($translations)) {
                    $this->error("Translation file '{$filePath}' is not a valid PHP array.");
                    continue;
                }

                foreach ($translations as $key => $value) {
                    // Find or create a translation record by key and file
                    $translation = Translation::firstOrNew(['key' => $key, 'file' => $file]);

                    if (gettype($value) == 'array'){
                        $value = json_encode($value);
                        // Optionally, check if JSON encoding is successful
                        if (json_last_error() !== JSON_ERROR_NONE) {
                            $this->error("Failed to encode array to JSON for key {$key} in file {$file}");
                            continue;
                        }
                    }
                    // Set the appropriate value for the current locale
                    $translation->{"value_{$locale}"} = $value;

                    // If the value is missing for the current locale, set it to null
                    if (empty($value)) {
                        $translation->{"value_{$locale}"} = null;
                    }

                    // Save the translation
                    $translation->save();

                    $this->info("Imported translation for '{$file}': {$key} => {$value} in locale {$locale}");
                }
            }
        }

        $this->info('Translations imported successfully.');
        return 0;
    }
}
