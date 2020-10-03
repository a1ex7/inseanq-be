<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateStudentRequest;
use App\Http\Requests\UpdateStudentRequest;
use App\Models\Group;
use App\Models\Student;
use Exception;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\View\View;

class StudentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @param Request $request
     * @return Application|Factory|Response|View
     */
    public function index(Request $request)
    {
        $students = Student::with('group')
            ->search($request->input('search'))
            ->latest()
            ->paginate();

        return view('students.index', ['students' => $students]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Application|Factory|Response|View
     */
    public function create()
    {
        $student = new Student();
        $groupsList = Group::orderBy('number')->pluck('number', 'id');

        return view('students.create', [
            'student'    => $student,
            'groupsList' => $groupsList
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param CreateStudentRequest $request
     * @return RedirectResponse
     */
    public function store(CreateStudentRequest $request): RedirectResponse
    {
        $student = Student::create($request->all());
        return redirect()
            ->route('students.index')
            ->with('message', __('Student was created'));
    }

    /**
     * Show the form for editing the specified resource.
     *s
     * @param Student $student
     * @return Application|Factory|Response|View
     */
    public function edit(Student $student)
    {
        $groupsList = Group::orderBy('number')->pluck('number', 'id');

        return view('students.update', [
            'student'    => $student,
            'groupsList' => $groupsList
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param UpdateStudentRequest $request
     * @param Student $student
     * @return RedirectResponse
     */
    public function update(UpdateStudentRequest $request, Student $student): RedirectResponse
    {
        $student->update($request->all());

        return redirect()
            ->route('students.index')
            ->with('message', __('Student was updated'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Student $student
     * @return RedirectResponse
     * @throws Exception
     */
    public function destroy(Student $student): RedirectResponse
    {
        $student->delete();

        return redirect()
            ->route('students.index')
            ->with('message', __('Student was deleted'));
    }
}
