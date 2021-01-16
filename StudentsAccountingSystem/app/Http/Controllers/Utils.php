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



}
