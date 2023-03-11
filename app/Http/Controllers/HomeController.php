<?php

namespace App\Http\Controllers;

use App\Models\Bb;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }
    private const BB_VALIDATOR = [
        "title" => "required|max:50",
        "content" => "required",
        "price" => "required|numeric"
    ];
    private const BB_ERROR_MESSAGE = [
        "price.required" => "Бесплатно раздавать товары нельзя",
        "required" => "Заполните это поле",
        "numeric" => "Введите число",
        "max" => "Значение не должно быть длиннее :max символов"
    ];
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('home', ['bbs' => Auth::user()->bbs()->latest()->get()]);
    }
    public function showAddBgForm()
    {
        return view('bb_add');
    }
    public function storeBb(Request $request)
    {
        $validated = $request->validate(self::BB_VALIDATOR, self::BB_ERROR_MESSAGE);
        $bb = Auth::user()->bbs()->create([
            "title" => $validated['title'],
            "content" => $validated['content'],
            "price" => $validated['price'],
        ]);
        return redirect()->route('home');
    }
    public function showEditBgForm(Bb $bb)
    {
        return view('bb_edit', ['bb' => $bb]);
    }
    public function updateBb($bb, Request $request)
    {
        $validated = $request->validate(self::BB_VALIDATOR, self::BB_ERROR_MESSAGE);

        $bb = Bb::find($bb);
        $bb->title = $validated['title'];
        $bb->content = $validated['content'];
        $bb->price = $validated['price'];
        $bb->save();
        return redirect()->route('home');
    }
    public function showDeleteBgForm(Bb $bb)
    {
        return view('bb_delete', ['bb' => $bb]);
    }
    public function destroyBb(Bb $bb)
    {
        $bb->delete();
        return redirect()->route('home');
    }
}
