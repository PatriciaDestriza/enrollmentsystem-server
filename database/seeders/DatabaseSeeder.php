<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Date;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // users DB
        DB::table('users')->insert([
            'universityID' => '20190016832',
            'firstName' => 'James',
            'middleName' => 'Baculanta',
            'lastName' => 'Jilhaney',
            'birthDate' => Date('2000-09-04'),
            'address' => 'e',
            'phoneNumber' => 'e',
            'email' => 'testemail2121',
            'username' => 'testusername1212',
            'password' => Hash::make('testpass'),
            'accountType' => 'admin',
        ]);

        DB::table('users')->insert([
            'universityID' => '20190016830',
            'firstName' => 'Jameson',
            'middleName' => 'Baculanta',
            'lastName' => 'Jilhaney',
            'birthDate' => Date('2000-09-04'),
            'address' => 'e',
            'phoneNumber' => 'e',
            'email' => 'testemail12',
            'username' => 'testusername11231',
            'password' => Hash::make('testpassword'),
            'accountType' => 'student',
        ]);

        DB::table('students')->insert([
            'userID' => 2,
            'isActivated' => false
        ]);


        DB::table('academic_years')->insert([
            'startYear' => Carbon::now()->format("Y"),
            'endYear' => Carbon::parse('2023-04-04')->format('Y')
        ]);

        DB::table('academic_terms')->insert([
            'semName' => 'First Semester',
            'academicYearID' => 1,
        ]);

        DB::table('departments')->insert([
            'collegeName' => 'CCS',
            'collegeCode' => 420,
        ]);

        DB::table('programs')->insert([
            'programName' => 'ITCC42',
            'departmentID' => 1,
            'programCode' => 421
        ]);

        DB::table('programs')->insert([
            'programName' => 'Bachelor in Science in Computer Science',
            'departmentID' => 1,
            'programCode' => 420
        ]);

        DB::table('teachers')->insert([
            'firstName' => 'Lionel',
            'middleName' => 'Cinco',
            'lastName' => 'Messi',
            'departmentID' => 1,
        ]);

        DB::table('teachers')->insert([
            'firstName' => 'Lionel',
            'middleName' => 'Cinco',
            'lastName' => 'Messi',
            'departmentID' => 1,
        ]);

        DB::table('schedules')->insert([
            'day' => 'Monday',
            'startTime' => Carbon::createFromTime(10),
            'endTime' => Carbon::createFromTime(11, 30),
        ]);

        DB::table('rooms')->insert([
            'roomName' => 'STS303',
            'roomCode' => '420',
        ]);

        DB::table('courses')->insert([
            'courseName' => 'ITCC42',
            'courseCode' => 210,
            'teacherID' => 1,
            'roomID' => 1,
            'scheduleID' => 1
        ]);

        DB::table('blocks')->insert([
            'blockName' => 'CCA',
            'blockCode' => 210,
            'programID' => 1,
            'yearID' => 1,
        ]);

        DB::table('block_courses')->insert([
            'blockID' => 1,
            'termID' => 1,
            'courseID' => 1,
        ]);

        DB::table('year_levels')->insert([
            'yearName' => 'First Year',
        ]);

        DB::table('enrolled_students')->insert([
            'studentID' => 1,
            'yearLevelID' => 1,
            'blockID' => 1,
            'termID' => 1,
            'isRegular' => true
        ]);
    }
}
