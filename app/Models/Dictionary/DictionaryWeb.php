<?php

namespace App\Models\Dictionary;

use App\Http\Creators\MotionCreator;
use App\Http\Custom\Parameters;
use App\Models\Motion\Motion;
use App\Models\Motion\MotionPrice;
use App\Models\System\ConfigSmtp;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Str;

class DictionaryWeb extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'name', 'can_edit', 'can_remove', 'code', 'name_lang', 'url', 'is_active', 'smtp_id', 'key'
    ];

    public const CODE_PREFIX = "web_";

    /**
     * relation: smtp
     *
     * @return smtp
     */
    public function smtp()
    {
        return $this->hasOne(ConfigSmtp::class, 'id', 'smtp_id');
    }

    /**
     * relation: motion_prices
     *
     * @return MotionPrice
     */
    public function motion_prices()
    {
        return $this->hasMany(MotionPrice::class, 'origin_id', 'id');
    }

    /**
     * generate code
     *
     * @return void
     */
    public function GenerateCode()
    {
        $code = $this::CODE_PREFIX . $this->id;
        $this->code = $code;
        $this->save();
    }

    /**
     * generate key
     *
     * @return void
     */
    public function GenerateKey()
    {
        $code = Str::random(5). $this->id;
        $this->key = $code;
        $this->save();
    }

    /**
     * copy lang name as name
     *
     * @return void
     */
    public function GenerateNameLang()
    {
        $this->name_lang = $this->name;
        $this->save();
    }

    /**
     * Update name
     *
     * @param string $name
     * @return void
     */
    public function UpdateName($name)
    {
        $this->name = $name;
        $this->save();
    }

    /**
     * Update name
     *
     * @param string $name
     * @return void
     */
    public function UpdateUrl($name)
    {
        $this->url = $name;
        $this->save();
    }

    /**
     * Update name
     *
     * @param string $name
     * @return void
     */
    public function UpdateSmtp($name)
    {
        $this->smtp_id = $name;
        $this->save();
    }

    /**
     * toggle active
     *
     * @param boolean $toggle
     * @return void
     */
    public function ToggleActive($toggle)
    {
        $this->is_active = $toggle;
        $this->save();
    }

    /**
     * can model be edited
     *
     * @return boolean
     */
    public function CanBeEdited()
    {
        if ($this->can_edit) return true;

        return false;
    }

    /**
     * can model be removed
     *
     * @return boolean
     */
    public function CanBeRemoved()
    {
        if ($this->can_remove) return true;

        return false;
    }

    /**
     * get foreign key options
     *
     * @param string $attribute
     * @return array
     */
    public static function GetOptions($attribute)
    {
        switch ($attribute) {
            case 'smtp_id':
                return ConfigSmtp::all();
                break;
            default:
                return array();
                break;
        }
    }

    public function CheckMotionPrices()
    {
        $motions = Motion::all();

        foreach ($motions as $motion) {
            $exists = MotionPrice::where('origin_id', $this->id)->where('motion_id', $motion->id)->first();

            if (!$exists) MotionCreator::CreateMotionPrice($motion->id, $this->id, Parameters::VAT_RATE);
        }
    }
}
