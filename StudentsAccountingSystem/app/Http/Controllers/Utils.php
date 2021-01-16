<?php


namespace App\Http\Controllers;


use App\Models\AcademicYear;
use App\Models\GroupsToYear;
use App\Models\StudentToGroup;

class Utils
{
    public static function createFirstDate(AcademicYear $year)
    {
        $date = mktime(0, 0, 0, 9, 1, $year->start_year);
        return date('Y-m-d', $date);
    }

    public static function createFirstDateFromId(int $year)
    {
        return self::createFirstDate(AcademicYear::where('id', $year)->first());
    }

    public static function createLastDate(AcademicYear $year)
    {
        $date = mktime(0, 0, 0, 8, 31, $year->start_year + 1);
        return date('Y-m-d', $date);
    }

    public static function getInfoString($studentInfo) : string
    {
        $student = StudentToGroup::where('id', $studentInfo->pivot->id)->first();

        $infoStr = "";

        if (self::isExpelled($student))
        {
            $infoStr .= "Отчислен " . $student->end_date . ". ";
        }

        if (self::isTransferred($student))
        {
            $infoStr .= "Переведён" . ". ";
        }

        return $infoStr;
    }

    public static function getCountInfo(GroupsToYear $groupsToYear) : string
    {
        $students = self::studentsForGroupAndYear($groupsToYear);

        $expelledCount = 0;
        $transferredCount = 0;
        $otherCount = 0;

        foreach ($students as $student) {
            if (self::isTransferred($student))
                $transferredCount++;
            else if (self::isExpelled($student))
                $expelledCount++;
            else
                $otherCount++;
        }

        return "Переведено: " . $transferredCount . ". Отчислено: " . $expelledCount . ". Остальные: " . $otherCount . ".";
    }

    public static function isTransferred(StudentToGroup $student) : bool
    {
        return $student->end_date && $student->next_group;
    }

    public static function isExpelled(StudentToGroup $student) : bool
    {
        return $student->end_date && $student->expel_reason_id;
    }

    public static function isTransferredById(int $id): bool
    {
        return self::isTransferred(StudentToGroup::where('id', $id)->first());
    }

    public static function isExpelledById(int $id): bool
    {
        return self::isExpelled(StudentToGroup::where('id', $id)->first());
    }
}
