<?php

namespace App\Http\Columns;

use App\Http\Managers\DictionaryManager;
use App\Models\Dictionary\Dictionary;
use App\Models\Dictionary\Sections\DictionaryItemCategory;
use App\Models\Dictionary\Sections\DictionaryItemSection;
use App\Models\Dictionary\Sections\DictionaryItemSectionCategory;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Schema;

/** db model creator */
class DictionaryColumn
{
    public const DICTIONARIES = ['name', 'code', 'table_name', 'is_editable', 'is_visible', 'name_lang'];
    public const DICTIONARY_ADDRESS_TYPES = ['name', 'can_edit', 'can_remove', 'code', 'name_lang'];
    public const DICTIONARY_AGREEMENTS = ['name', 'description', 'can_edit', 'can_remove', 'is_required', 'is_active', 'code', 'name_lang'];
    public const DICTIONARY_AGREEMENT_ITEM_TYPES = ['agreement_id', 'can_edit', 'can_remove', 'is_required', 'is_active'];
    public const DICTIONARY_AGREEMENT_USER_TYPES = ['agreement_id', 'can_edit', 'can_remove', 'is_required', 'is_active'];
    public const DICTIONARY_COMMON_STATUSES = ['name', 'can_edit', 'can_remove', 'code', 'name_lang'];
    public const DICTIONARY_CONTACT_CATEGORIES = ['name', 'can_edit', 'can_remove', 'code', 'name_lang'];
    public const DICTIONARY_CONTACT_TYPES = ['name', 'can_edit', 'can_remove', 'category_id', 'code', 'name_lang', 'icon'];
    public const DICTIONARY_CONTRACTOR_TYPES = ['name', 'can_edit', 'can_remove', 'code', 'name_lang'];
    public const DICTIONARY_EVENT_TIMES = ['name', 'can_edit', 'can_remove', 'code', 'name_lang', 'days', 'minutes'];
    public const DICTIONARY_ITEM_STATUSES = ['name', 'can_edit', 'can_remove', 'code', 'name_lang'];
    public const DICTIONARY_STATUS_TYPES = ['name', 'can_edit', 'can_remove', 'code', 'name_lang', 'is_programmed'];
    public const DICTIONARY_SECTION_TYPES = ['name', 'can_edit', 'can_remove', 'code', 'name_lang'];

    public const DICTIONARY_ITEM_CATEGORIES = ['name', 'can_edit', 'can_remove', 'code', 'name_lang', 'filename', 'order', 'description_short'];
    public const DICTIONARY_ITEM_CATEGORY_MODULES = ['category_id', 'module_id'];
    public const DICTIONARY_ITEM_CATEGORY_TAGS = ['category_id', 'tag_id'];
    public const DICTIONARY_ITEM_MODULES = ['name', 'can_edit', 'can_remove', 'code', 'name_lang'];
    public const DICTIONARY_ITEM_SECTIONS = ['name', 'can_edit', 'can_remove', 'code', 'name_lang', 'filename', 'order', 'description_short', 'special_id', 'is_special'];
    public const DICTIONARY_ITEM_SECTION_CATEGORIES = ['category_id', 'section_id', 'order'];
    public const DICTIONARY_ITEM_SECTION_MODULES = ['section_id', 'module_id'];
    public const DICTIONARY_ITEM_SECTION_TAGS = ['section_id', 'tag_id'];
    public const DICTIONARY_SPECIAL_SECTIONS = ['name', 'can_edit', 'can_remove', 'code', 'name_lang', 'filename', 'order', 'description_short', 'section_id', 'type_id'];
    public const DICTIONARY_SPECIAL_SECTION_CATEGORIES = ['category_id', 'section_id', 'order'];
    public const DICTIONARY_SPECIAL_SECTION_MODULES = ['section_id', 'module_id'];
    public const DICTIONARY_SPECIAL_SECTION_TAGS = ['section_id', 'tag_id'];

    public static function CheckColumnDictionaryAddressType($attribute)
    {
        Schema::table('dictionary_address_types', function (Blueprint $table) use ($attribute) {
            switch ($attribute) {
                case 'name':
                    $table->string('name')->nullable()->comment('tresc')->index();
                    break;
                case 'can_edit':
                    $table->boolean('can_edit')->nullable()->comment('czy mozna edytowac');
                    break;
                case 'can_remove':
                    $table->boolean('can_remove')->nullable()->comment('czy mozna usunac');
                    break;
                case 'code':
                    $table->string('code')->nullable()->comment('kod')->index();
                    break;
                case 'name_lang':
                    $table->string('name_lang')->nullable()->comment('zmienna językowa');
                    break;
            }
        });
    }

    public static function CheckColumnDictionaries($attribute)
    {
        Schema::table('dictionaries', function (Blueprint $table) use ($attribute) {
            switch ($attribute) {
                case 'name':
                    $table->string('name')->nullable()->comment('nazwa');
                    break;
                case 'is_editable':
                    $table->boolean('is_editable')->nullable()->comment('slownik edytowalny');
                    break;
                case 'is_visible':
                    $table->boolean('is_visible')->nullable()->comment('widzialny na liscie slownikow');
                    break;
                case 'code':
                    $table->string('code')->nullable()->comment('kod')->index();
                    break;
                case 'name_lang':
                    $table->string('name_lang')->nullable()->comment('zmienna językowa');
                    break;
                case 'table_name':
                    $table->string('table_name')->nullable()->comment('tabela');
                    break;
            }
        });
    }

    public static function CheckColumnDictionaryAgreement($attribute)
    {
        Schema::table('dictionary_agreements', function (Blueprint $table) use ($attribute) {
            switch ($attribute) {
                case 'name':
                    $table->string('name')->nullable()->comment('tresc')->index();
                    break;
                case 'can_edit':
                    $table->boolean('can_edit')->nullable()->comment('czy mozna edytowac');
                    break;
                case 'can_remove':
                    $table->boolean('can_remove')->nullable()->comment('czy mozna usunac');
                    break;
                case 'code':
                    $table->string('code')->nullable()->comment('kod')->index();
                    break;
                case 'name_lang':
                    $table->string('name_lang')->nullable()->comment('zmienna językowa');
                    break;
                case 'description':
                    $table->string('description')->nullable()->comment('opis')->index();
                    break;
                case 'is_active':
                    $table->boolean('is_active')->nullable()->comment('aktywne');
                    break;
                case 'is_required':
                    $table->boolean('is_required')->nullable()->comment('obowiazkowe');
                    break;
            }
        });
    }

    public static function CheckColumnDictionaryAgreementItemType($attribute)
    {
        Schema::table('dictionary_agreement_item_types', function (Blueprint $table) use ($attribute) {
            switch ($attribute) {
                case 'agreement_id':
                    $table->bigInteger('agreement_id')->nullable()->unsigned()->comment('id zgody');
                    $table->foreign('agreement_id')->references('id')->on('dictionary_agreements')->onDelete('cascade');
                    break;
                case 'can_edit':
                    $table->boolean('can_edit')->nullable()->comment('czy mozna edytowac');
                    break;
                case 'can_remove':
                    $table->boolean('can_remove')->nullable()->comment('czy mozna usunac');
                    break;
                case 'is_active':
                    $table->boolean('is_active')->nullable()->comment('aktywne');
                    break;
                case 'is_required':
                    $table->boolean('is_required')->nullable()->comment('obowiazkowe');
                    break;
            }
        });
    }

    public static function CheckColumnDictionaryAgreementUserType($attribute)
    {
        Schema::table('dictionary_agreement_user_types', function (Blueprint $table) use ($attribute) {
            switch ($attribute) {
                case 'agreement_id':
                    $table->bigInteger('agreement_id')->nullable()->unsigned()->comment('id zgody');
                    $table->foreign('agreement_id')->references('id')->on('dictionary_agreements')->onDelete('cascade');
                    break;
                case 'can_edit':
                    $table->boolean('can_edit')->nullable()->comment('czy mozna edytowac');
                    break;
                case 'can_remove':
                    $table->boolean('can_remove')->nullable()->comment('czy mozna usunac');
                    break;
                case 'is_active':
                    $table->boolean('is_active')->nullable()->comment('aktywne');
                    break;
                case 'is_required':
                    $table->boolean('is_required')->nullable()->comment('obowiazkowe');
                    break;
            }
        });
    }

    public static function CheckColumnDictionaryCommonStatus($attribute)
    {
        Schema::table('dictionary_common_statuses', function (Blueprint $table) use ($attribute) {
            switch ($attribute) {
                case 'name':
                    $table->string('name')->nullable()->comment('tresc')->index();
                    break;
                case 'can_edit':
                    $table->boolean('can_edit')->nullable()->comment('czy mozna edytowac');
                    break;
                case 'can_remove':
                    $table->boolean('can_remove')->nullable()->comment('czy mozna usunac');
                    break;
                case 'code':
                    $table->string('code')->nullable()->comment('kod')->index();
                    break;
                case 'name_lang':
                    $table->string('name_lang')->nullable()->comment('zmienna językowa');
                    break;
            }
        });
    }

    public static function CheckColumnDictionaryContactCategory($attribute)
    {
        Schema::table('dictionary_contact_categories', function (Blueprint $table) use ($attribute) {
            switch ($attribute) {
                case 'name':
                    $table->string('name')->nullable()->comment('tresc')->index();
                    break;
                case 'can_edit':
                    $table->boolean('can_edit')->nullable()->comment('czy mozna edytowac');
                    break;
                case 'can_remove':
                    $table->boolean('can_remove')->nullable()->comment('czy mozna usunac');
                    break;
                case 'code':
                    $table->string('code')->nullable()->comment('kod')->index();
                    break;
                case 'name_lang':
                    $table->string('name_lang')->nullable()->comment('zmienna językowa');
                    break;
            }
        });
    }

    public static function CheckColumnDictionaryContactType($attribute)
    {
        Schema::table('dictionary_contact_types', function (Blueprint $table) use ($attribute) {
            switch ($attribute) {
                case 'name':
                    $table->string('name')->nullable()->comment('tresc')->index();
                    break;
                case 'can_edit':
                    $table->boolean('can_edit')->nullable()->comment('czy mozna edytowac');
                    break;
                case 'can_remove':
                    $table->boolean('can_remove')->nullable()->comment('czy mozna usunac');
                    break;
                case 'code':
                    $table->string('code')->nullable()->comment('kod')->index();
                    break;
                case 'name_lang':
                    $table->string('name_lang')->nullable()->comment('zmienna językowa');
                    break;
                case 'icon':
                    $table->string('icon')->nullable()->comment('ikona');
                    break;
                case 'category_id':
                    $table->bigInteger('category_id')->nullable()->unsigned()->comment('rodzaj typu');
                    $table->foreign('category_id')->references('id')->on('dictionary_contact_categories')->onDelete('cascade');
                    break;
            }
        });
    }

    public static function CheckColumnDictionaryContractorType($attribute)
    {
        Schema::table('dictionary_contractor_types', function (Blueprint $table) use ($attribute) {
            switch ($attribute) {
                case 'name':
                    $table->string('name')->nullable()->comment('tresc')->index();
                    break;
                case 'can_edit':
                    $table->boolean('can_edit')->nullable()->comment('czy mozna edytowac');
                    break;
                case 'can_remove':
                    $table->boolean('can_remove')->nullable()->comment('czy mozna usunac');
                    break;
                case 'code':
                    $table->string('code')->nullable()->comment('kod')->index();
                    break;
                case 'name_lang':
                    $table->string('name_lang')->nullable()->comment('zmienna językowa');
                    break;
            }
        });
    }

    public static function CheckColumnDictionaryEventTime($attribute)
    {
        Schema::table('dictionary_event_times', function (Blueprint $table) use ($attribute) {
            switch ($attribute) {
                case 'name':
                    $table->string('name')->nullable()->comment('tresc')->index();
                    break;
                case 'can_edit':
                    $table->boolean('can_edit')->nullable()->comment('czy mozna edytowac');
                    break;
                case 'can_remove':
                    $table->boolean('can_remove')->nullable()->comment('czy mozna usunac');
                    break;
                case 'code':
                    $table->string('code')->nullable()->comment('kod')->index();
                    break;
                case 'name_lang':
                    $table->string('name_lang')->nullable()->comment('zmienna językowa');
                    break;
                case 'days':
                    $table->integer('days')->nullable()->comment('ile dni')->index();
                    break;
                case 'minutes':
                    $table->integer('minutes')->nullable()->comment('ile minut')->index();
                    break;
            }
        });
    }

    public static function CheckColumnDictionaryItemStatus($attribute)
    {
        Schema::table('dictionary_item_statuses', function (Blueprint $table) use ($attribute) {
            switch ($attribute) {
                case 'name':
                    $table->string('name')->nullable()->comment('tresc')->index();
                    break;
                case 'can_edit':
                    $table->boolean('can_edit')->nullable()->comment('czy mozna edytowac');
                    break;
                case 'can_remove':
                    $table->boolean('can_remove')->nullable()->comment('czy mozna usunac');
                    break;
                case 'code':
                    $table->string('code')->nullable()->comment('kod')->index();
                    break;
                case 'name_lang':
                    $table->string('name_lang')->nullable()->comment('zmienna językowa');
                    break;
            }
        });
    }

    public static function CheckColumnDictionaryStatusType($attribute)
    {
        Schema::table('dictionary_status_types', function (Blueprint $table) use ($attribute) {
            switch ($attribute) {
                case 'name':
                    $table->string('name')->nullable()->comment('tresc')->index();
                    break;
                case 'can_edit':
                    $table->boolean('can_edit')->nullable()->comment('czy mozna edytowac');
                    break;
                case 'can_remove':
                    $table->boolean('can_remove')->nullable()->comment('czy mozna usunac');
                    break;
                case 'code':
                    $table->string('code')->nullable()->comment('kod')->index();
                    break;
                case 'name_lang':
                    $table->string('name_lang')->nullable()->comment('zmienna językowa');
                    break;
                case 'is_programmed':
                    $table->boolean('is_programmed')->nullable()->comment('info: czy jest zaprogramowany/robi coś w programie. Zmienienie tego na tak nic nie da');
                    break;
            }
        });
    }

    public static function CheckColumnDictionarySectionType($attribute)
    {
        Schema::table('dictionary_section_types', function (Blueprint $table) use ($attribute) {
            switch ($attribute) {
                case 'name':
                    $table->string('name')->nullable()->comment('tresc')->index();
                    break;
                case 'can_edit':
                    $table->boolean('can_edit')->nullable()->comment('czy mozna edytowac');
                    break;
                case 'can_remove':
                    $table->boolean('can_remove')->nullable()->comment('czy mozna usunac');
                    break;
                case 'code':
                    $table->string('code')->nullable()->comment('kod')->index();
                    break;
                case 'name_lang':
                    $table->string('name_lang')->nullable()->comment('zmienna językowa');
                    break;
            }
        });
    }

    public static function CheckColumnDictionaryItemCategory($attribute)
    {
        Schema::table('dictionary_item_categories', function (Blueprint $table) use ($attribute) {
            switch ($attribute) {
                case 'name':
                    $table->string('name')->nullable()->comment('tresc')->index();
                    break;
                case 'can_edit':
                    $table->boolean('can_edit')->nullable()->comment('czy mozna edytowac');
                    break;
                case 'can_remove':
                    $table->boolean('can_remove')->nullable()->comment('czy mozna usunac');
                    break;
                case 'code':
                    $table->string('code')->nullable()->comment('kod')->index();
                    break;
                case 'name_lang':
                    $table->string('name_lang')->nullable()->comment('zmienna językowa');
                    break;
                case 'order':
                    $table->integer('order')->nullable()->comment('kolejnosc')->index();
                    break;
                case 'description_short':
                    $table->longText('description_short')->nullable()->comment('opis krótki');
                    break;
                case 'filename':
                    $table->string('filename')->nullable()->comment('sciezka ikony');
                    break;
            }
        });
    }

    public static function CheckColumnDictionaryItemCategoryModule($attribute)
    {
        Schema::table('dictionary_item_category_modules', function (Blueprint $table) use ($attribute) {
            switch ($attribute) {
                case 'category_id':
                    $table->bigInteger('category_id')->nullable()->unsigned()->comment('kategoria');
                    $table->foreign('category_id')->references('id')->on('dictionary_item_categories')->onDelete('cascade');
                    break;
                case 'module_id':
                    $table->bigInteger('module_id')->nullable()->unsigned()->comment('moduł');
                    $table->foreign('module_id')->references('id')->on('dictionary_item_modules')->onDelete('cascade');
                    break;
            }
        });
    }

    public static function CheckColumnDictionaryItemCategoryTag($attribute)
    {
        Schema::table('dictionary_item_category_tags', function (Blueprint $table) use ($attribute) {
            switch ($attribute) {
                case 'category_id':
                    $table->bigInteger('category_id')->nullable()->unsigned()->comment('kategoria');
                    $table->foreign('category_id')->references('id')->on('dictionary_item_categories')->onDelete('cascade');
                    break;
                case 'tag_id':
                    $table->bigInteger('tag_id')->nullable()->unsigned()->comment('tag');
                    $table->foreign('tag_id')->references('id')->on('tags')->onDelete('cascade');
                    break;
            }
        });
    }

    public static function CheckColumnDictionaryItemModule($attribute)
    {
        Schema::table('dictionary_item_modules', function (Blueprint $table) use ($attribute) {
            switch ($attribute) {
                case 'name':
                    $table->string('name')->nullable()->comment('tresc')->index();
                    break;
                case 'can_edit':
                    $table->boolean('can_edit')->nullable()->comment('czy mozna edytowac');
                    break;
                case 'can_remove':
                    $table->boolean('can_remove')->nullable()->comment('czy mozna usunac');
                    break;
                case 'code':
                    $table->string('code')->nullable()->comment('kod')->index();
                    break;
                case 'name_lang':
                    $table->string('name_lang')->nullable()->comment('zmienna językowa');
                    break;
            }
        });
    }

    public static function CheckColumnDictionaryItemSection($attribute)
    {
        Schema::table('dictionary_item_sections', function (Blueprint $table) use ($attribute) {
            switch ($attribute) {
                case 'name':
                    $table->string('name')->nullable()->comment('tresc')->index();
                    break;
                case 'can_edit':
                    $table->boolean('can_edit')->nullable()->comment('czy mozna edytowac');
                    break;
                case 'can_remove':
                    $table->boolean('can_remove')->nullable()->comment('czy mozna usunac');
                    break;
                case 'code':
                    $table->string('code')->nullable()->comment('kod')->index();
                    break;
                case 'name_lang':
                    $table->string('name_lang')->nullable()->comment('zmienna językowa');
                    break;
                case 'order':
                    $table->integer('order')->nullable()->comment('kolejnosc')->index();
                    break;
                case 'description_short':
                    $table->longText('description_short')->nullable()->comment('opis krótki');
                    break;
                case 'filename':
                    $table->string('filename')->nullable()->comment('sciezka ikony');
                    break;
                case 'is_special':
                    $table->boolean('is_special')->nullable()->comment('czy dzial specjalny');
                    break;
                case 'special_id':
                    $table->bigInteger('special_id')->nullable()->unsigned()->comment('dział specjalny');
                    $table->foreign('special_id')->references('id')->on('dictionary_special_sections');
                    break;
            }
        });
    }

    public static function CheckColumnDictionaryItemSectionCategory($attribute)
    {
        Schema::table('dictionary_item_section_categories', function (Blueprint $table) use ($attribute) {
            switch ($attribute) {
                case 'section_id':
                    $table->bigInteger('section_id')->nullable()->unsigned()->comment('dział');
                    $table->foreign('section_id')->references('id')->on('dictionary_item_sections')->onDelete('cascade');
                    break;
                case 'category_id':
                    $table->bigInteger('category_id')->nullable()->unsigned()->comment('kategoria');
                    $table->foreign('category_id')->references('id')->on('dictionary_item_categories')->onDelete('cascade');
                    break;
                case 'order':
                    $table->integer('order')->nullable()->comment('kolejnosc')->index();
                    break;
            }
        });
    }

    public static function CheckColumnDictionaryItemSectionModule($attribute)
    {
        Schema::table('dictionary_item_section_modules', function (Blueprint $table) use ($attribute) {
            switch ($attribute) {
                case 'section_id':
                    $table->bigInteger('section_id')->nullable()->unsigned()->comment('dział');
                    $table->foreign('section_id')->references('id')->on('dictionary_item_sections')->onDelete('cascade');
                    break;
                case 'module_id':
                    $table->bigInteger('module_id')->nullable()->unsigned()->comment('moduł');
                    $table->foreign('module_id')->references('id')->on('dictionary_item_modules')->onDelete('cascade');
                    break;
            }
        });
    }

    public static function CheckColumnDictionaryItemSectionTag($attribute)
    {
        Schema::table('dictionary_item_section_tags', function (Blueprint $table) use ($attribute) {
            switch ($attribute) {
                case 'section_id':
                    $table->bigInteger('section_id')->nullable()->unsigned()->comment('dział');
                    $table->foreign('section_id')->references('id')->on('dictionary_item_sections')->onDelete('cascade');
                    break;
                case 'tag_id':
                    $table->bigInteger('tag_id')->nullable()->unsigned()->comment('tag');
                    $table->foreign('tag_id')->references('id')->on('tags')->onDelete('cascade');
                    break;
            }
        });
    }

    public static function CheckColumnDictionarySpecialSection($attribute)
    {
        Schema::table('dictionary_special_sections', function (Blueprint $table) use ($attribute) {
            switch ($attribute) {
                case 'name':
                    $table->string('name')->nullable()->comment('tresc')->index();
                    break;
                case 'can_edit':
                    $table->boolean('can_edit')->nullable()->comment('czy mozna edytowac');
                    break;
                case 'can_remove':
                    $table->boolean('can_remove')->nullable()->comment('czy mozna usunac');
                    break;
                case 'code':
                    $table->string('code')->nullable()->comment('kod')->index();
                    break;
                case 'name_lang':
                    $table->string('name_lang')->nullable()->comment('zmienna językowa');
                    break;
                case 'order':
                    $table->integer('order')->nullable()->comment('kolejnosc')->index();
                    break;
                case 'description_short':
                    $table->longText('description_short')->nullable()->comment('opis krótki');
                    break;
                case 'filename':
                    $table->string('filename')->nullable()->comment('sciezka ikony');
                    break;
                case 'section_id':
                    $table->bigInteger('section_id')->nullable()->unsigned()->comment('dział')->index();
                    $table->foreign('section_id')->references('id')->on('dictionary_item_sections');
                    break;
                case 'type_id':
                    $table->bigInteger('type_id')->nullable()->unsigned()->comment('typ')->index();
                    $table->foreign('type_id')->references('id')->on('dictionary_section_types');
                    break;
            }
        });
    }

    public static function CheckColumnDictionarySpecialSectionCategory($attribute)
    {
        Schema::table('dictionary_special_section_categories', function (Blueprint $table) use ($attribute) {
            switch ($attribute) {
                case 'section_id':
                    $table->bigInteger('section_id')->nullable()->unsigned()->comment('dział');
                    $table->foreign('section_id')->references('id')->on('dictionary_special_sections')->onDelete('cascade');
                    break;
                case 'category_id':
                    $table->bigInteger('category_id')->nullable()->unsigned()->comment('kategoria');
                    $table->foreign('category_id')->references('id')->on('dictionary_item_categories')->onDelete('cascade');
                    break;
                case 'order':
                    $table->integer('order')->nullable()->comment('kolejnosc')->index();
                    break;
            }
        });
    }

    public static function CheckColumnDictionarySpecialSectionModule($attribute)
    {
        Schema::table('dictionary_special_section_modules', function (Blueprint $table) use ($attribute) {
            switch ($attribute) {
                case 'section_id':
                    $table->bigInteger('section_id')->nullable()->unsigned()->comment('dział');
                    $table->foreign('section_id')->references('id')->on('dictionary_special_sections')->onDelete('cascade');
                    break;
                case 'module_id':
                    $table->bigInteger('module_id')->nullable()->unsigned()->comment('moduł');
                    $table->foreign('module_id')->references('id')->on('dictionary_item_modules')->onDelete('cascade');
                    break;
            }
        });
    }

    public static function CheckColumnDictionarySpecialSectionTag($attribute)
    {
        Schema::table('dictionary_special_section_tags', function (Blueprint $table) use ($attribute) {
            switch ($attribute) {
                case 'section_id':
                    $table->bigInteger('section_id')->nullable()->unsigned()->comment('dział');
                    $table->foreign('section_id')->references('id')->on('dictionary_special_sections')->onDelete('cascade');
                    break;
                case 'tag_id':
                    $table->bigInteger('tag_id')->nullable()->unsigned()->comment('tag');
                    $table->foreign('tag_id')->references('id')->on('tags')->onDelete('cascade');
                    break;
            }
        });
    }
}
