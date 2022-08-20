<?php

namespace App\Models\Backend;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Backend\Language;

class TextLanguage extends Model
{
    use HasFactory;

    protected $table = 'text_languages';

    protected $fillable = [
        'sourcetext',
        'sourcelang',
        'targettext',
        'targetlang',
        'keyword',
        'status',
        'user_id'
    ];

    public function sourcelangname()
    {
        return $this->belongsTo(Language::class, 'sourcelang');
    }

    public function targetlangname()
    {
        return $this->belongsTo(Language::class, 'targetlang');
    }

    public static function languages()
    {
        $lang = Language::orderby('name', 'asc')->where('status', 'active')->get();

        return $lang;
    }
}
