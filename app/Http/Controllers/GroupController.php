<?php

namespace App\Http\Controllers;

use App\Http\Requests\Groups\CreateGroupRequest;
use App\Http\Requests\Groups\UpdateGroupRequest;
use App\Models\Group;
use App\Models\Student;
use Exception;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\View\View;

class GroupController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @param Request $request
     * @return Application|Factory|Response|View
     */
    public function index(Request $request)
    {
        $groups = Group::orderBy('number')
            ->withCount('students')
            ->search($request->input('search'))
            ->paginate();

        return view('groups.index', ['groups' => $groups]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Application|Factory|Response|View
     */
    public function create()
    {
        $group = new Group();
        $studentsList = Student::orderBy('lastname')
            ->get()
            ->pluck('fullName', 'id');

        return view('groups.create', [
            'group'        => $group,
            'studentsList' => $studentsList,
        ]);
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param CreateGroupRequest $request
     * @return RedirectResponse
     */
    public function store(CreateGroupRequest $request): RedirectResponse
    {
        $group = Group::create($request->all());
        if ($request->input('student_id') !== null) {
            $student = Student::findOrFail($request->input('student_id'));
            $group->students()->save($student);
        }

        return redirect()
            ->route('groups.index')
            ->with('message', __('Group was created'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param Group $group
     * @return Application|Factory|Response|View
     */
    public function edit(Group $group)
    {
        $studentsList = Student::orderBy('lastname')
            ->get()
            ->pluck('fullName', 'id');

        return view('groups.update', [
            'group'        => $group,
            'studentsList' => $studentsList,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param UpdateGroupRequest $request
     * @param Group $group
     * @return RedirectResponse
     */
    public function update(UpdateGroupRequest $request, Group $group): RedirectResponse
    {
        $group->update($request->all());

        return redirect()
            ->route('groups.index')
            ->with('message', __('Group was updated'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Group $group
     * @return RedirectResponse
     * @throws Exception
     */
    public function destroy(Group $group): RedirectResponse
    {
        $group->delete();

        return redirect()
            ->route('groups.index')
            ->with('message', __('Group was deleted'));
    }
}
