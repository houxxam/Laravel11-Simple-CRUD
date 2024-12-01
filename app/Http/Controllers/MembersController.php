<?php

namespace App\Http\Controllers;

use App\Models\Members;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class MembersController extends Controller
{
    //
    public function index()
    {
        $members = Members::all();
        return view('members.index', compact('members'));
    }

    public function create()
    {
        return view('members.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'first_name' => 'required|string|max:255',
            'last_name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'phone_number' => 'nullable|string|max:10',
            'join_date' => 'required|date',
            'picture' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            // 'status' => ''
        ]);

        $member = new Members();
        $member->first_name = $request->first_name;
        $member->last_name = $request->last_name;
        $member->email = $request->email;
        $member->phone_number = $request->phone_number;
        $member->join_date = $request->join_date;

        if ($request->hasFile('picture')) {
            $path = $request->file('picture')->store('pictures', 'public');
            $member->picture = $path;
        } else {
            $member->picture = 'pictures/no-photo.png';
        }

        $member->save();
        return redirect()->route('members.index');
    }

    public function show($id)
    {
        $member = Members::findOrFail($id);
        return view('members.show', compact('member'));
    }

    public function edit($id)
    {
        $member = Members::findOrFail($id);
        return view('members.edit', compact('member'));
    }

    public function update(Request $request, $id)
    {
        $member = Members::findOrFail($id);
        $request->validate([
            'first_name' => 'required|string|max:255',
            'last_name' => 'required|string|max:255',
            'email' => 'required|email|max:255,' . $member->id,
            'phone_number' => 'nullable|string|max:10',
            'join_date' => 'required|date',
            'picture' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',

        ]);

        $member->first_name = $request->first_name;
        $member->last_name = $request->last_name;
        $member->email = $request->email;
        $member->phone_number = $request->phone_number;
        $member->join_date = $request->join_date;
        if ($request->hasFile('picture')) {
            $member->picture = $request->file('picture')->store('pictures', 'public');
        }
        // $member->status = $request->status;

        $member->save();

        return redirect()->route('members.index')->with('success', 'Member updated successfully.');
    }

    public function destroy($id)
    {
        $deleted = Members::findOrFail($id);
        if ($deleted->picture && $deleted->picture !== 'pictures/no-photo.png') {
            // delete phote from website
            Storage::disk('public')->delete($deleted->picture);
        }
        $deleted->delete();

        return redirect()->route('members.index');
    }
}
