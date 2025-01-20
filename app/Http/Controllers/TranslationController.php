<?php

namespace App\Http\Controllers;

use App\Models\Translation;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class TranslationController extends Controller
{
    public function __construct()
    {
        $this->middleware('admin.auth');
    }

    private function search($str)
    {
        $a = new Translation();
        if(strlen(trim($str)) > 0)
        {
            $a = $a->where(function($query) use ($str){
                $query->where('key', 'LIKE', '%'. $str . '%')
                    ->orWhere('file', 'LIKE', '%'. $str . '%')
                    ->orWhere('value_tm', 'LIKE', '%'. $str . '%')
                    ->orWhere('value_ru', 'LIKE', '%'. $str . '%')
                    ->orWhere('value_en', 'LIKE', '%'. $str . '%');
            });
        }
        return $a;
    }

    public function index(Request $request)
    {
        $page = [ 'Translations', 'Configs' ];

        $r = $this->hasPermission('translation.index', auth()->user()->role_id);
        if(!$r)
            return back()->with('prev-url', request()->input('prev-url') ?? '')->with('permission', 'no permission');

        $input = $request->all();
        $row = $this->search($input['search'] ?? '');

        $row = $row->select(Translation::getColumns());

        $row = $row->orderBy('id', 'DESC')->paginate(\Helper::getMyConfigCache('custom.page-limit'))->appends([
            'search' => $input['search'] ?? '',
        ]);

        return view('admin.translations.index', compact(['page']))
            ->with('translations', $row)
            ->with('input', $input);
    }

    public function create()
    {
        $page = [ 'Create', 'Configs', 'Translations' ];

        $r = $this->hasPermission('translation.create', auth()->user()->role_id);
        if(!$r)
            return back()->with('prev-url', request()->input('prev-url') ?? '')->with('permission', 'no permission');

        $row = new Translation;
        $files = Translation::distinct()->pluck('file');

        return view('admin.translations.create', compact(['page']))->with('translation', $row)->with('files', $files);
    }

    public function store(Request $request)
    {
        $r = $this->hasPermission('translation.create', auth()->user()->role_id);
        if(!$r)
            return back()->with('prev-url', request()->input('prev-url') ?? '')->with('permission', 'no permission');


        $request->validate([
            'key' => 'required|unique:translations,key',
            'file' => 'required|in:translates,mytr',
            'value_tm' => 'nullable|string',
            'value_ru' => 'nullable|string',
            'value_en' => 'nullable|string',
        ]);

        Translation::create($request->only(['key', 'file', 'value_tm', 'value_ru', 'value_en']));

        // Update translation files
        $this->updateTranslationFiles($request->file);

        return redirect()->route('translations.index')->with('success', 'Translation created successfully.');
    }

    public function edit(Translation $translation)
    {
        $page = [ 'Edit', 'Configs', 'Translations' ];

        $r = $this->hasPermission('translation.update', auth()->user()->role_id);
        if(!$r)
            return back()->with('prev-url', request()->input('prev-url') ?? '')->with('permission', 'no permission');

        $files = Translation::distinct()->pluck('file');

        return view('admin.translations.edit', compact(['page']))->with('translation', $translation)->with('files', $files);

    }

    public function update(Request $request, Translation $translation)
    {
        $r = $this->hasPermission('translation.update', auth()->user()->role_id);
        if(!$r)
            return back()->with('prev-url', request()->input('prev-url') ?? '')->with('permission', 'no permission');

        $request->validate([
            'key' => 'required',
            'file' => 'required|in:translates,mytr',
            'value_tm' => 'nullable|string',
            'value_ru' => 'nullable|string',
            'value_en' => 'nullable|string',
        ]);

        $translation->update($request->only(['key', 'file', 'value_tm', 'value_ru', 'value_en']));

        // Update translation files
        $this->updateTranslationFiles($request->file);

        return redirect()->route('translations.index')->with('success', 'Translation updated successfully.');
    }

    public function destroy(Translation $translation)
    {

        $r = $this->hasPermission('translation.delete', auth()->user()->role_id);
        if(!$r)
            return back()->with('prev-url', request()->input('prev-url') ?? '')->with('permission', 'no permission');

        $file = $translation->file;
        $translation->delete();


        // Update translation files
        $this->updateTranslationFiles($file);

        return redirect()->route('translations.index')->with('success', 'Translation deleted successfully.');
    }

    private function updateTranslationFiles($file)
    {

        $translations = Translation::where('file', $file)->get();
        foreach (['tm', 'ru', 'en'] as $locale) {
            $content = "<?php\n\nreturn [\n";
            foreach ($translations as $translation) {
                $value = $translation["value_{$locale}"] ?: '';
                $content .= "    '{$translation->key}' => '{$value}',\n";
            }
            $content .= "];\n";

            file_put_contents(resource_path("lang/{$locale}/{$file}.php"), $content);
        }

    }
}
