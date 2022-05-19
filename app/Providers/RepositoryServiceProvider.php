<?php

namespace App\Providers;

use App\Repositories\AcademicTerm\AcademicTermRepository;
use App\Repositories\AcademicTerm\AcademicTermRepositoryInterface;
use App\Repositories\AcademicYear\AcademicYearInterface;
use App\Repositories\AcademicYear\AcademicYearRepository;
use App\Repositories\AcademicYear\AcademicYearRepositoryInterface;
use App\Repositories\Block\BlockRepository;
use App\Repositories\Block\BlockRepositoryInterface;
use App\Repositories\Course\CourseRepository;
use App\Repositories\Course\CourseRepositoryInterface;
use App\Repositories\Department\DepartmentRepository;
use App\Repositories\Department\DepartmentRepositoryInterface;
use App\Repositories\Program\ProgramRepository;
use App\Repositories\Program\ProgramRepositoryInterface;
use App\Repositories\EnrolledStudents\EnrolledStudentRepository;
use App\Repositories\EnrolledStudents\EnrolledStudentRepositoryInterface;
use App\Repositories\Room\RoomRepository;
use App\Repositories\Room\RoomRepositoryInterface;
use App\Repositories\Schedule\ScheduleRepository;
use App\Repositories\Schedule\ScheduleRepositoryInterface;
use App\Repositories\Student\StudentRepository;
use App\Repositories\Student\StudentRepositoryInterface;
use App\Repositories\Teacher\TeacherRepository;
use App\Repositories\Teacher\TeacherRepositoryInterface;
use Illuminate\Support\ServiceProvider;
use App\Repositories\User\UserRepository;
use App\Repositories\User\UserRepositoryInterface;
use App\Repositories\YearLevel\YearLevelRepository;
use App\Repositories\YearLevel\YearLevelRepositoryInterface;

class RepositoryServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind(UserRepositoryInterface::class, UserRepository::class);
        $this->app->bind(AcademicYearRepositoryInterface::class, AcademicYearRepository::class);
        $this->app->bind(AcademicTermRepositoryInterface::class, AcademicTermRepository::class);
        $this->app->bind(TeacherRepositoryInterface::class, TeacherRepository::class);
        $this->app->bind(DepartmentRepositoryInterface::class, DepartmentRepository::class);
        $this->app->bind(TeacherRepositoryInterface::class, TeacherRepository::class);
        $this->app->bind(ProgramRepositoryInterface::class, ProgramRepository::class);
        $this->app->bind(BlockRepositoryInterface::class, BlockRepository::class);
        $this->app->bind(CourseRepositoryInterface::class, CourseRepository::class);
        $this->app->bind(RoomRepositoryInterface::class, RoomRepository::class);
        $this->app->bind(ScheduleRepositoryInterface::class, ScheduleRepository::class);
        $this->app->bind(StudentRepositoryInterface::class, StudentRepository::class);
        $this->app->bind(EnrolledStudentRepositoryInterface::class, EnrolledStudentRepository::class);
        $this->app->bind(YearLevelRepositoryInterface::class, YearLevelRepository::class);
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}
