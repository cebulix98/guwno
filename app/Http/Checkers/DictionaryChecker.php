<?php

namespace App\Http\Checkers;

use App\Http\Columns\DictionaryColumn;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Schema;

/** db model creator */
class DictionaryChecker
{
    public static function CheckDictionaryAddressType()
    {
        $table_name = 'dictionary_address_types';
        $cols = DictionaryColumn::DICTIONARY_ADDRESS_TYPES;

        if (Schema::hasTable($table_name)) {
            $columns = Schema::getColumnListing($table_name);

            foreach ($cols as $col) {
                if (!in_array($col, $columns)) {
                    DictionaryColumn::CheckColumnDictionaryAddressType($col);
                }
            }
        } else {
            Log::info($table_name . ' doesnt exist');
        }
    }

    public static function CheckDictionaries()
    {
        $table_name = 'dictionaries';
        $cols = DictionaryColumn::DICTIONARIES;

        if (Schema::hasTable($table_name)) {
            $columns = Schema::getColumnListing($table_name);

            foreach ($cols as $col) {
                if (!in_array($col, $columns)) {
                    DictionaryColumn::CheckColumnDictionaries($col);
                }
            }
        } else {
            Log::info($table_name . ' doesnt exist');
        }
    }

    public static function CheckDictionaryAgreement()
    {
        $table_name = 'dictionary_agreements';
        $cols = DictionaryColumn::DICTIONARY_AGREEMENTS;

        if (Schema::hasTable($table_name)) {
            $columns = Schema::getColumnListing($table_name);

            foreach ($cols as $col) {
                if (!in_array($col, $columns)) {
                    DictionaryColumn::CheckColumnDictionaryAgreement($col);
                }
            }
        } else {
            Log::info($table_name . ' doesnt exist');
        }
    }

    public static function CheckDictionaryAgreementItemType()
    {
        $table_name = 'dictionary_agreement_item_types';
        $cols = DictionaryColumn::DICTIONARY_AGREEMENT_ITEM_TYPES;

        if (Schema::hasTable($table_name)) {
            $columns = Schema::getColumnListing($table_name);

            foreach ($cols as $col) {
                if (!in_array($col, $columns)) {
                    DictionaryColumn::CheckColumnDictionaryAgreementItemType($col);
                }
            }
        } else {
            Log::info($table_name . ' doesnt exist');
        }
    }

    public static function CheckDictionaryAgreementUserType()
    {
        $table_name = 'dictionary_agreement_user_types';
        $cols = DictionaryColumn::DICTIONARY_AGREEMENT_USER_TYPES;

        if (Schema::hasTable($table_name)) {
            $columns = Schema::getColumnListing($table_name);

            foreach ($cols as $col) {
                if (!in_array($col, $columns)) {
                    DictionaryColumn::CheckColumnDictionaryAgreementUserType($col);
                }
            }
        } else {
            Log::info($table_name . ' doesnt exist');
        }
    }

    public static function CheckDictionaryCommonStatus()
    {
        $table_name = 'dictionary_common_statuses';
        $cols = DictionaryColumn::DICTIONARY_COMMON_STATUSES;

        if (Schema::hasTable($table_name)) {
            $columns = Schema::getColumnListing($table_name);

            foreach ($cols as $col) {
                if (!in_array($col, $columns)) {
                    DictionaryColumn::CheckColumnDictionaryCommonStatus($col);
                }
            }
        } else {
            Log::info($table_name . ' doesnt exist');
        }
    }

    public static function CheckDictionaryContactCategory()
    {
        $table_name = 'dictionary_contact_categories';
        $cols = DictionaryColumn::DICTIONARY_CONTACT_CATEGORIES;

        if (Schema::hasTable($table_name)) {
            $columns = Schema::getColumnListing($table_name);

            foreach ($cols as $col) {
                if (!in_array($col, $columns)) {
                    DictionaryColumn::CheckColumnDictionaryContactCategory($col);
                }
            }
        } else {
            Log::info($table_name . ' doesnt exist');
        }
    }

    public static function CheckDictionaryContactType()
    {
        $table_name = 'dictionary_contact_types';
        $cols = DictionaryColumn::DICTIONARY_CONTACT_TYPES;

        if (Schema::hasTable($table_name)) {
            $columns = Schema::getColumnListing($table_name);

            foreach ($cols as $col) {
                if (!in_array($col, $columns)) {
                    DictionaryColumn::CheckColumnDictionaryContactType($col);
                }
            }
        } else {
            Log::info($table_name . ' doesnt exist');
        }
    }

    public static function CheckDictionaryContractorType()
    {
        $table_name = 'dictionary_contractor_types';
        $cols = DictionaryColumn::DICTIONARY_CONTRACTOR_TYPES;

        if (Schema::hasTable($table_name)) {
            $columns = Schema::getColumnListing($table_name);

            foreach ($cols as $col) {
                if (!in_array($col, $columns)) {
                    DictionaryColumn::CheckColumnDictionaryContractorType($col);
                }
            }
        } else {
            Log::info($table_name . ' doesnt exist');
        }
    }

    public static function CheckDictionaryEventTime()
    {
        $table_name = 'dictionary_event_times';
        $cols = DictionaryColumn::DICTIONARY_EVENT_TIMES;

        if (Schema::hasTable($table_name)) {
            $columns = Schema::getColumnListing($table_name);

            foreach ($cols as $col) {
                if (!in_array($col, $columns)) {
                    DictionaryColumn::CheckColumnDictionaryEventTime($col);
                }
            }
        } else {
            Log::info($table_name . ' doesnt exist');
        }
    }

    public static function CheckDictionaryItemStatus()
    {
        $table_name = 'dictionary_item_statuses';
        $cols = DictionaryColumn::DICTIONARY_ITEM_SECTIONS;

        if (Schema::hasTable($table_name)) {
            $columns = Schema::getColumnListing($table_name);

            foreach ($cols as $col) {
                if (!in_array($col, $columns)) {
                    DictionaryColumn::CheckColumnDictionaryItemStatus($col);
                }
            }
        } else {
            Log::info($table_name . ' doesnt exist');
        }
    }

    public static function CheckDictionaryStatusType()
    {
        $table_name = 'dictionary_status_types';
        $cols = DictionaryColumn::DICTIONARY_STATUS_TYPES;

        if (Schema::hasTable($table_name)) {
            $columns = Schema::getColumnListing($table_name);

            foreach ($cols as $col) {
                if (!in_array($col, $columns)) {
                    DictionaryColumn::CheckColumnDictionaryStatusType($col);
                }
            }
        } else {
            Log::info($table_name . ' doesnt exist');
        }
    }

    public static function CheckDictionarySectionType()
    {
        $table_name = 'dictionary_section_types';
        $cols = DictionaryColumn::DICTIONARY_SECTION_TYPES;

        if (Schema::hasTable($table_name)) {
            $columns = Schema::getColumnListing($table_name);

            foreach ($cols as $col) {
                if (!in_array($col, $columns)) {
                    DictionaryColumn::CheckColumnDictionarySectionType($col);
                }
            }
        } else {
            Log::info($table_name . ' doesnt exist');
        }
    }

    public static function CheckDictionaryItemCategory()
    {
        $table_name = 'dictionary_item_categories';
        $cols = DictionaryColumn::DICTIONARY_ITEM_CATEGORIES;

        if (Schema::hasTable($table_name)) {
            $columns = Schema::getColumnListing($table_name);

            foreach ($cols as $col) {
                if (!in_array($col, $columns)) {
                    DictionaryColumn::CheckColumnDictionaryItemCategory($col);
                }
            }
        } else {
            Log::info($table_name . ' doesnt exist');
        }
    }

    public static function CheckDictionaryItemCategoryModule()
    {
        $table_name = 'dictionary_item_category_modules';
        $cols = DictionaryColumn::DICTIONARY_ITEM_CATEGORY_MODULES;

        if (Schema::hasTable($table_name)) {
            $columns = Schema::getColumnListing($table_name);

            foreach ($cols as $col) {
                if (!in_array($col, $columns)) {
                    DictionaryColumn::CheckColumnDictionaryItemCategoryModule($col);
                }
            }
        } else {
            Log::info($table_name . ' doesnt exist');
        }
    }

    public static function CheckDictionaryItemCategoryTag()
    {
        $table_name = 'dictionary_item_category_tags';
        $cols = DictionaryColumn::DICTIONARY_ITEM_CATEGORY_TAGS;

        if (Schema::hasTable($table_name)) {
            $columns = Schema::getColumnListing($table_name);

            foreach ($cols as $col) {
                if (!in_array($col, $columns)) {
                    DictionaryColumn::CheckColumnDictionaryItemCategoryTag($col);
                }
            }
        } else {
            Log::info($table_name . ' doesnt exist');
        }
    }

    public static function CheckDictionaryItemModule()
    {
        $table_name = 'dictionary_item_modules';
        $cols = DictionaryColumn::DICTIONARY_ITEM_MODULES;

        if (Schema::hasTable($table_name)) {
            $columns = Schema::getColumnListing($table_name);

            foreach ($cols as $col) {
                if (!in_array($col, $columns)) {
                    DictionaryColumn::CheckColumnDictionaryItemModule($col);
                }
            }
        } else {
            Log::info($table_name . ' doesnt exist');
        }
    }

    public static function CheckDictionaryItemSection()
    {
        $table_name = 'dictionary_item_sections';
        $cols = DictionaryColumn::DICTIONARY_ITEM_SECTIONS;

        if (Schema::hasTable($table_name)) {
            $columns = Schema::getColumnListing($table_name);

            foreach ($cols as $col) {
                if (!in_array($col, $columns)) {
                    DictionaryColumn::CheckColumnDictionaryItemSection($col);
                }
            }
        } else {
            Log::info($table_name . ' doesnt exist');
        }
    }

    public static function CheckDictionaryItemSectionCategory()
    {
        $table_name = 'dictionary_item_section_categories';
        $cols = DictionaryColumn::DICTIONARY_ITEM_SECTION_CATEGORIES;

        if (Schema::hasTable($table_name)) {
            $columns = Schema::getColumnListing($table_name);

            foreach ($cols as $col) {
                if (!in_array($col, $columns)) {
                    DictionaryColumn::CheckColumnDictionaryItemSectionCategory($col);
                }
            }
        } else {
            Log::info($table_name . ' doesnt exist');
        }
    }

    public static function CheckDictionaryItemSectionModule()
    {
        $table_name = 'dictionary_item_section_modules';
        $cols = DictionaryColumn::DICTIONARY_ITEM_SECTION_MODULES;

        if (Schema::hasTable($table_name)) {
            $columns = Schema::getColumnListing($table_name);

            foreach ($cols as $col) {
                if (!in_array($col, $columns)) {
                    DictionaryColumn::CheckColumnDictionaryItemSectionModule($col);
                }
            }
        } else {
            Log::info($table_name . ' doesnt exist');
        }
    }

    public static function CheckDictionaryItemSectionTag()
    {
        $table_name = 'dictionary_item_section_tags';
        $cols = DictionaryColumn::DICTIONARY_ITEM_SECTION_TAGS;

        if (Schema::hasTable($table_name)) {
            $columns = Schema::getColumnListing($table_name);

            foreach ($cols as $col) {
                if (!in_array($col, $columns)) {
                    DictionaryColumn::CheckColumnDictionaryItemSectionTag($col);
                }
            }
        } else {
            Log::info($table_name . ' doesnt exist');
        }
    }

    public static function CheckDictionarySpecialSection()
    {
        $table_name = 'dictionary_special_sections';
        $cols = DictionaryColumn::DICTIONARY_SPECIAL_SECTIONS;

        if (Schema::hasTable($table_name)) {
            $columns = Schema::getColumnListing($table_name);

            foreach ($cols as $col) {
                if (!in_array($col, $columns)) {
                    DictionaryColumn::CheckColumnDictionarySpecialSection($col);
                }
            }
        } else {
            Log::info($table_name . ' doesnt exist');
        }
    }

    public static function CheckDictionarySpecialSectionCategory()
    {
        $table_name = 'dictionary_special_section_categories';
        $cols = DictionaryColumn::DICTIONARY_SPECIAL_SECTION_CATEGORIES;

        if (Schema::hasTable($table_name)) {
            $columns = Schema::getColumnListing($table_name);

            foreach ($cols as $col) {
                if (!in_array($col, $columns)) {
                    DictionaryColumn::CheckColumnDictionarySpecialSectionCategory($col);
                }
            }
        } else {
            Log::info($table_name . ' doesnt exist');
        }
    }

    public static function CheckDictionarySpecialSectionModule()
    {
        $table_name = 'dictionary_special_section_modules';
        $cols = DictionaryColumn::DICTIONARY_SPECIAL_SECTION_MODULES;

        if (Schema::hasTable($table_name)) {
            $columns = Schema::getColumnListing($table_name);

            foreach ($cols as $col) {
                if (!in_array($col, $columns)) {
                    DictionaryColumn::CheckColumnDictionarySpecialSectionModule($col);
                }
            }
        } else {
            Log::info($table_name . ' doesnt exist');
        }
    }

    public static function CheckDictionarySpecialSectionTag()
    {
        $table_name = 'dictionary_special_section_tags';
        $cols = DictionaryColumn::DICTIONARY_SPECIAL_SECTION_TAGS;

        if (Schema::hasTable($table_name)) {
            $columns = Schema::getColumnListing($table_name);

            foreach ($cols as $col) {
                if (!in_array($col, $columns)) {
                    DictionaryColumn::CheckColumnDictionarySpecialSectionTag($col);
                }
            }
        } else {
            Log::info($table_name . ' doesnt exist');
        }
    }
}
