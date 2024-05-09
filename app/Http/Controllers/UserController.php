<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\ImageRequest;
use  App\Models\Order;
use App\Http\Requests\UserRequest;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
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
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {   
        $user = \Auth::user();
        $order_items = $user->orderItems;

        return view('users.show', [
            'title' => 'ユーザープロフィール',
            'user' => $user,
            'order_items' => $order_items,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit()
    {
        $user = \Auth::user();
        return view('users.edit', [
            'title' => 'プロフィール編集',
            'user' => $user,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UserRequest $request)
    {
        \Auth::user()->update([
            'name' => $request->name,
            'profile' => $request->profile,
        ]);

        return redirect()->route('users.show', \Auth::user()->id);
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
    }

    public function editImage() {
        return view('users.edit_image', [
            'title' => 'プロフィール画像編集',
            'user' => \Auth::user(),
        ]);
    }

    public function updateImage(ImageRequest $request) {
        $path = '';
        $image = $request->file('image');

         //画像がアップロードされたら、保存時のファイルパスを返す
        if($image !== null){
            $path = $request->file('image')->store('photos', 'public');
        }

        $user = \Auth::user();

        // 画像がすでに存在していたら古い画像を削除
        if ($user->image !== null) {
            \Storage::disk('public')->delete($user->image);
        }
        //削除対応したのち、アップされた画像パスをデータベースに保存する
        $user->update([
            'image' => $path,
        ]);

        session()->flash('success', '画像を保存しました');

        return redirect()->route('users.show', $user->id);
    }
}
