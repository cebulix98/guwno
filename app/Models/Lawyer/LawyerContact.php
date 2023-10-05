<?php

namespace App\Models\Lawyer;

use App\Models\Dictionary\DictionaryContactType;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LawyerContact extends Model
{
    use HasFactory;

    protected $fillable = [
        'lawyer_id', 'type_id', 'data', 'is_primary', 'note'
    ];

    /**
     * relation: lawyer
     *
     * @return Lawyer
     */
    public function lawyer()
    {
        return $this->hasOne(Lawyer::class, 'id', 'lawyer_id');
    }

    /**
     * relation: type
     *
     * @return DictionaryContactType
     */
    public function type()
    {
        return $this->hasOne(DictionaryContactType::class, 'id', 'type_id');
    }

    /**
     * update data
     *
     * @param string $data
     * @return void
     */
    public function UpdateData($data)
    {
        $this->data = $data;
        $this->save();
    }

    /**
     * toggle primary
     *
     * @param boolean $toggle
     * @return void
     */
    public function TogglePrimary($toggle)
    {
        $this->is_primary = $toggle;
        $this->save();
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
     *update
     *
     * @param int $type
     * @param string $data
     * @param string $note
     * @return void
     */
    public function UpdateAll($type, $data, $note)
    {
        $this->type_id = $type;
        $this->data = $data;
        $this->note = $note;
        $this->save();
    }
}
