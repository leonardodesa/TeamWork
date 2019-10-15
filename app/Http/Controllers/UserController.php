<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Rossedman\Teamwork\Facades\Teamwork;
use Excel;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $usersTimerActive = $this->getUsersTimerActive();
        return response()->json($usersTimerActive);
    }

    public function getUsersTimerActive() {
        $getAllUsersTimeActive = Teamwork::time()->all()['timers'];
        $maqinaId = 63858;
        $usersMaqinaTimerActive = [];

        for($i = 0; $i < count($getAllUsersTimeActive); $i++) {
            $idUser = $getAllUsersTimeActive[$i]['userId'];

            $allPeoples = Teamwork::people()->getById($idUser);

            if($allPeoples['person']['companyId'] == $maqinaId) {
                $namePerson = $allPeoples['person'];
                array_push($usersMaqinaTimerActive, $allPeoples['person']);
            }
        }

        return $usersMaqinaTimerActive;
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
    }
}
