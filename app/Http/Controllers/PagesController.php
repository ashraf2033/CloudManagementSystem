<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Failure;
use App\Repair;
use App\Task;
use Carbon\Carbon;
use Jenssegers\Date\Date;
use Gate;
class PagesController extends Controller
{

  public function __construct()
  {
    $this->middleware('auth');
  }
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function about()
    {
        return 'about';
    }
public function check() {
  $weektasks = Task::orderBy('task_date','desc')->thisweek()->take(5);
  $tasks = Task::orderBy('task_date','desc')->take(5)->get();
        $page_title ="الصيانة الوقائية";
        $section_title ="";

  return view('pages.check',compact('page_title','section_title','tasks','weektasks'));

    }

    public function maintainance() {

            $page_title ="الصيانة التصحيحية";
            $section_title ="";

          $failures = Failure::orderBy('created_at','DESC')->take(5)->get();

          $finrepairs = Repair::finished()->orderBy('created_at','DESC')->take(5)->get();
          $apprepairs = Repair::approved()->orderBy('created_at','DESC')->take(5)->get();


                return view('pages.maintainance',compact('page_title','section_title','failures','finrepairs','apprepairs'));
        }
        public function home() {
          $page_title ="لوحة التحكم";
          $section_title ="لوحة التحكم";
          Date::setLocale('ar');
            $date = Date::now()->format('j F Y');
            $day = Date::now()->format('l');
            $month = Date::now()->format('F');
            $year = Date::now()->format('Y');
            //**************Tasks***************
            $tasksToday = Task::orderBy('task_date','desc')->today()->take(5);$tasksWeek = Task::orderBy('task_date','desc')->thisweek()->take(5);
            $tasksMonth = Task::orderBy('task_date','desc')->thisMonth()->take(5); $tasks_count = count($tasksToday->toArray());
            //**************Fails***************
            $failsToday = Failure::orderBy('fail_time','desc')->today()->take(5);$failsWeek = Failure::orderBy('fail_time','desc')->thisweek()->take(5);
            $failsMonth = Failure::orderBy('fail_time','desc')->thisMonth()->take(5); $fails_count = count($failsToday->toArray());
            //**************Repairs***************
            $repairsToday = Repair::today();$repairsWeek = Repair::thisweek();
            $repairsMonth = Repair::thisMonth(); $repairs_count = count($repairsToday->toArray());


                      return view('dashboard.dashboard',
                      compact('page_title','section_title','date','day','month','year',
                      'tasksToday','tasksMonth','tasksWeek','tasks_count',
                      'failsToday','failsMonth','failsWeek','fails_count',
                    'repairsToday','repairsMonth','repairsWeek','repairs_count'));

            }
}
