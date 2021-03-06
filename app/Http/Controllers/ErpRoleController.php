<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\User;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use DB;



class ErpRoleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function __construct()
    {
        $this->middleware('permission:Add/Edit Role|Assign Permission by Role')->only('index');
        $this->middleware('permission:Add/Edit Role')->only('create','edit','store','update');
        $this->middleware('permission:Assign Permission by Role')->only('assignPermission','rolePermissionStore');
    }

    public function index()
    {
        // $permission = Permission::create(['name' => 'View User List']);
        $roles = Role::all();
        return view('backEnd.roles.create', compact('roles'));
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
        $request->validate([
            'role_name'=>'required'
        ]);


        $role = Role::create(['name' => $request->get('role_name')]);
        return redirect('/role')->with('message-success', 'Role has been added');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $role = Role::find($id);
        return view('backEnd.roles.edit', compact('role'));
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
        $request->validate([
            'name'=>'required'
        ]);
        $role = Role::find($id);
        $role->name = $request->get('name');
        $role->save();
        return redirect('/role')->with('message-success', 'Role has been updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $type = Role::find($id);
        $type->delete();
        return redirect()->back()->with('message-success-delete', 'Role has been suspended successfully');
    }

    public function assignPermission($role_id){
        $role=Role::findById($role_id);

        $permissions=Permission::all();
        // $role_permissions=$role->getPermissionIds();
        
         $role_permissions=$role->getAllPermissions();
        //$role_permissions = DB::table('role_has_permissions')->where('role_id', '=', $role_id)->get();
        $already_assigned = [];
        foreach($role_permissions as $role_permission){
            $already_assigned[] = $role_permission->id;
        }

        return view('backEnd.roles.assignPermission', compact('permissions','role','already_assigned'));
    }

    public function rolePermissionStore(Request $request){

        $role=Role::findById($request->role_id);
        $role->syncPermissions($request->permissions);
        return redirect('role')->with('message-success-assign-role', 'Role permission has been assigned successfully');
    }
}
