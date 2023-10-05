<?php

namespace App\Models\User;

//handle alert messages
trait LawyerStatsTrait
{

    public function CountCasesAll()
    {
        $count = $this->cases_with_trashed->count();
        return $count;
    }

    public function CountCasesOpened()
    {
        $count = $this->cases->where('status_code', 'status_started')->count();
        return $count;
    }

    public function CountCasesWaitOpen()
    {
        $count = $this->cases->where('status_code', 'status_wait_start')->count();
        return $count;
    }

    public function CountCasesClosed()
    {
        $count = $this->cases_with_trashed->where('status_code', 'status_ended')->count();
        return $count;
    }

    public function CountCasesCancelled()
    {
        $count = $this->cases_with_trashed->where('status_code', 'status_cancelled')->count();
        return $count;
    }

    public function CountCasesArchived()
    {
        $count = $this->cases_only_trashed->count();
        return $count;
    }
}
