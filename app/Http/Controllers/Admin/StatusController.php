<?php

namespace App\Http\Controllers\Admin;

use App\Status;
use App\Http\Controllers\Controller;

class StatusController extends Controller
{
    /**
     * Display a list of Statuses.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $statuses = Status::getList();

        return view('admin.statuses.index', compact('statuses'));
    }

    /**
     * Show the form for creating a new Status
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $statusOptions = Status::$statusOptions;

        return view('admin.statuses.add', compact('statusOptions'));
    }

    /**
     * Save new Status
     *
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store()
    {
        $validatedData = request()->validate(Status::validationRules());

        $status = Status::create($validatedData);

        return redirect()->route('admin.statuses.index')->with([
            'type' => 'success',
            'message' => 'Status added'
        ]);
    }

    /**
     * Show the form for editing the specified Status
     *
     * @param \App\Status $status
     * @return \Illuminate\Http\Response
     */
    public function edit(Status $status)
    {
        $statusOptions = Status::$statusOptions;

        return view('admin.statuses.edit', compact('status', 'statusOptions'));
    }

    /**
     * Update the Status
     *
     * @param \App\Status $status
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(Status $status)
    {
        $validatedData = request()->validate(
            Status::validationRules($status->id)
        );

        $status->update($validatedData);

        return redirect()->route('admin.statuses.index')->with([
            'type' => 'success',
            'message' => 'Status Updated'
        ]);
    }

    /**
     * Delete the Status
     *
     * @param \App\Status $status
     * @return void
     */
    public function destroy(Status $status)
    {
        if ($status->requisicaos()->count()) {
            return redirect()->route('admin.statuses.index')->with([
                'type' => 'error',
                'message' => 'This record cannot be deleted as there are relationship dependencies.'
            ]);
        }

        $status->delete();

        return redirect()->route('admin.statuses.index')->with([
            'type' => 'success',
            'message' => 'Status deleted successfully'
        ]);
    }
}
