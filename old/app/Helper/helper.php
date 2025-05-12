<?php

function course_complate($program)
{
    $count      =   App\Models\Admission::where('session', '2024-02')->where('master_programmes', $program)->where('is_complate', 1)->count();
    return $count;
}

function course_ncomplate($program)
{
    $count      =   App\Models\Admission::where('session', '2024-02')->where('master_programmes', $program)->where('is_complate', 0)->count();
    return $count;
}

function phd_course_complate($program)
{
    $count      =   App\Models\Admission::where('session', '2024-02')->where('Phd_programmes', $program)->where('is_complate', 1)->count();
    return $count;
}

function phd_course_ncomplate($program)
{
    $count      =   App\Models\Admission::where('session', '2024-02')->where('Phd_programmes', $program)->where('is_complate', 0)->count();
    return $count;
}


function btech()
{
    //m-tech   
    $count      =   App\Models\Admission::where('session', '2024-02')->where('is_complate', 1)->where('programme', 'b-tech')->count();
    return $count;
}

function btech_not()
{
    $count      =   App\Models\Admission::where('session', '2024-02')->where('is_complate', 0)->where('programme', 'b-tech')->count();
    return $count;
}

function mtech()
{
    //m-tech   
    $count      =   App\Models\Admission::where('session', '2024-02')->where('is_complate', 1)->where('programme', 'm-tech')->count();
    return $count;
}

function mtech_not()
{
    $count      =   App\Models\Admission::where('session', '2024-02')->where('is_complate', 0)->where('programme', 'm-tech')->count();
    return $count;
}

function isUploaded($user_id)
{
    $count      =   App\Models\File::where('user_id', $user_id)->count();
    if ($count)
        return 'Yes';
    else
        return 'No';
}

function countryInProcessed($programme, $subject, $country)
{
    $count      =   App\Models\Admission::where('session', '2024-02')->where('is_complate', 0)->where('programme', $programme)->where('Phd_programmes', $subject)->where('nationality', $country)->count();
    return $count;
}

function countryComplate($programme, $subject, $country)
{
    $count      =   App\Models\Admission::where('session', '2024-02')->where('is_complate', 1)->where('programme', $programme)->where('Phd_programmes', $subject)->where('nationality', $country)->count();
    return $count;
}




function Masters202402InProcess()
{
    $count      =   App\Models\Admission::where('session', '2024-02')->where('is_complate', 0)->where('programme', 'Masters')->count();
    return $count;
}
function Masters202402Complete()
{
    $count      =   App\Models\Admission::where('session', '2024-02')->where('is_complate', 1)->where('programme', 'Masters')->count();
    return $count;
}

function Short_Term_CoursesInProcess()
{
    $count      =   App\Models\Admission::where('session', '2024-02')->where('is_complate', 0)->where('programme', 'short_term')->count();
    return $count;
}
function Short_Term_CoursesComplete()
{
    $count      =   App\Models\Admission::where('session', '2024-02')->where('is_complate', 1)->where('programme', 'short_term')->count();
    return $count;
}
