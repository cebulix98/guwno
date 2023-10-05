<?php

namespace App\Models\Cases;

use App\Http\Enumerators\Cases\CaseEventEnum;
use App\Models\File\FileAsset;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class CaseResponse extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'case_id', 'note', 'user_id', 'content', 'date_sent', 'footer'
    ];

    /**
     * relation: case
     *
     * @return CaseCase
     */
    public function case()
    {
        return $this->hasOne(CaseCase::class, 'id', 'case_id');
    }

    /**
     * relation: user
     *
     * @return User
     */
    public function user()
    {
        return $this->hasOne(User::class, 'id', 'user_id');
    }

    /**
     * relation: files
     *
     * @return FileAsset
     */
    public function file_attachements()
    {
        return $this->hasManyThrough(FileAsset::class, CaseResponseAttachement::class, 'response_id', 'id','id', 'file_id');
    }

    /**
     * update note
     *
     * @param string $value
     * @return void
     */
    public function UpdateNote($value)
    {
        $this->note = $value;
        $this->save();
    }

    /**
     * update note
     *
     * @param string $value
     * @return void
     */
    public function UpdateContent($value)
    {
        $this->content = $value;
        $this->save();
    }

    public function MailSent()
    {
        $this->date_sent = Carbon::now()->toDateString();
        $this->save();

    }
}
