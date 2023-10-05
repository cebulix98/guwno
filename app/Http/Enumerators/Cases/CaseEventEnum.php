<?php

namespace App\Http\Enumerators\Cases;

/** db model creator */
class CaseEventEnum
{
    public const EVENT_CREATED = 'event_created';
    public const EVENT_ADD_LAWYER = 'event_add_lawyer';
    public const EVENT_REMOVE_LAWYER = 'event_remove_lawyer';
    public const EVENT_REASSIGN_LAWYER = 'event_reassign_lawyer';
    public const EVENT_END = 'event_end';
    public const EVENT_CANCELLED = 'event_cancel';
    public const EVENT_START = 'event_start';
    public const EVENT_CHANGE_STATUS = 'event_change_status';
    public const EVENT_UPDATE_ATTRIBUTE = 'event_update_attribute';
    public const EVENT_UPDATE_PETITIONER_NAME = 'event_update_petitioner_name';
    public const EVENT_UPDATE_PETITIONER_PHONE = 'event_update_petitioner_phone';
    public const EVENT_UPDATE_PETITIONER_EMAIL = 'event_update_petitioner_email';
    public const EVENT_UPDATE_CONTACT_DATA = 'event_update_contact_data';
    public const EVENT_UPDATE_NOTE = 'event_update_note';
    public const EVENT_ADD_ATTACHEMENT = 'event_add_attachement';
    public const EVENT_REMOVE_ATTACHEMENT = 'event_remove_attachement';
    public const EVENT_DELETE_NOTE = 'event_delete_note';
    public const EVENT_ADD_NOTE = 'event_add_note';
    public const EVENT_ADD_RESPONSE = 'event_add_response';
    public const EVENT_ADD_ORDER = 'event_add_order';
    public const EVENT_DELETE_CASE = 'event_delete_case';
    public const EVENT_UPDATE_CASE_NAME = 'event_update_case_name';
    public const EVENT_UPDATE_CASE_MOTION_PDF = 'event_update_case_motion_pdf';
    public const EVENT_UPDATE_CASE_MOTION_RTF = 'event_update_case_motion_rtf';
    public const EVENT_UPDATE_CASE_MOTION_TXT = 'event_update_case_motion_txt';
    public const EVENT_ORDER_PAID = 'event_order_paid';
}