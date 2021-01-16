<?php

use Illuminate\Support\Facades\Route;

Route::prefix('groups')->group(base_path('/routes/groups-api.php'));

Route::prefix('students')->group(base_path('/routes/students-api.php'));

Route::prefix('years')->group(base_path('/routes/years-api.php'));

Route::prefix('majors')->group(base_path('/routes/majors-api.php'));

Route::prefix('patterns')->group(base_path('/routes/patterns-api.php'));

Route::prefix('reasons')->group(base_path('/routes/expel-reasons-api.php'));
