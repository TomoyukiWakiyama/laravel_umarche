<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Owner; // エロクアント
use Illuminate\Support\Facades\DB; // Queryビルダー
use Carbon\Carbon;
use Illuminate\Support\Facades\Hash;

use Illuminate\Validation\Rules;



class OwnersController extends Controller
{
    public function __construct()
    {
        // admin認証のミドルウェアを差し込む
        $this->middleware('auth:admin');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        // $data_now = Carbon::now();
        // $data_parse = Carbon::parse(now());
        // echo $data_now->year . '<br>';
        // echo $data_parse . '<br>';

        // $e_all = Owner::all(); // eloquent
        // $q_get = DB::table('owners')->select('name', 'created_at')->get();
        // $q_first = DB::table('owners')->select('name')->first();

        $owners = Owner::select('id', 'name', 'email', 'created_at')
            ->paginate(5);
        return view('admin.owners.index', compact('owners'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('admin.owners.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:owners'],
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
        ]);

        Owner::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);

        return redirect()
            ->route('admin.owners.index')
            ->with(['message'=>'オーナー登録が完了しました',
                    'status'=>'info']);

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
        //
        $owner = Owner::findOrFail($id);
        return view('admin.owners.edit', compact('owner'));
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
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:owners'],
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
        ]);

        $owner = Owner::findOrFail($id);
        $owner->name = $request->name;
        $owner->email = $request->email;
        $owner->password = Hash::make($request->password);
        $owner->save();

        return redirect()
            ->route('admin.owners.index')
            ->with(['message'=>'オーナー情報を更新しました',
            'status'=>'info']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        Owner::findOrFail($id)->delete();
        return redirect()
            ->route('admin.owners.index')
            ->with(['message' => 'オーナー情報を削除しました',
                     'status'=>'alert']);
    }

    public function expiredOwnerIndex(){
        // ソフトデリートされたデータのみ取得
        $expiredOwners = Owner::onlyTrashed()->get();
        return view('admin.expired-owners', compact('expiredOwners'));
    }

    public function expiredOwnerDestroy($id){
        Owner::onlyTrashed()->findOrFail($id)->forceDelete();
        return redirect()->route('admin.expired-owners.index');
    }
}
