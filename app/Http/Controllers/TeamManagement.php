<?php

namespace App\Http\Controllers;

use App\Models\Team;
use Illuminate\Http\Request;

class TeamManagement extends Controller
{
    public function team()
    {
        $data = Team::all();
        return view('ferwafa.teams.team' ,['teams' => $data]);
    }
    public function show(Team $team_id)
    {
        return view('ferwafa.teams.team' ,['team_id' => $team_id]);
    }

    public function registration(Request $request)
    {
        $formFields = $request->validate([
            'team_name' => 'required|unique:teams,name',
            'stadium' => 'required',
            'logo' => 'required|mimes:jpg,bmp,png',
            'username' => 'required|unique:teams,username',
            'password' => 'required|min:5',
        ]);
        $formFields['password'] = bcrypt($request->input('password'));
        $formFields['name'] = $request->input('team_name');
        $formFields['logo'] = $request->file('logo')->store('Team', 'public');
        $team = Team::create($formFields);
        if ($team) {
            return back()->with('success' , 'New Team Added Successfully');
        }

    }
    public function update(Request $request, Team $team)
    {
        $formFields = $request->validate([
            'team_name' => 'required|unique:teams,name,'.$team->id,
            'stadium' => 'required',
            'logo' => 'mimes:jpg,bmp,png',
            'username' => 'required|unique:teams,username,'.$team->id,
        ]);
        $formFields['password'] = bcrypt($request->input('password'));
        $formFields['name'] = $request->input('team_name');
        if ($request->hasFile('logo')) {
        $formFields['logo'] = $request->file('logo')->store('Team', 'public');
        }
        $team->update($formFields);
       
         return back()->with('success' , 'Team Updated Successfully');
        
    }
    public function destroy(Team $team)
    {
        $team->delete();
        return redirect()->route('team_reg')->with('success' , 'Team Deleted Successfully');
    }
}
