<?php

namespace App\Http\Controllers\Admin;

use App\Models\Bank;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class BankController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('dashboard.admin.bank.index',[
            'title'=>'Dashboard Bank',
            'company'=>'KitaBantu',
            'list'=>Bank::latest()->filter(request(['search']))->paginate(5)->withQueryString(),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('dashboard.admin.bank.create',[
            'title'=>'Dashboard Bank',
            'company'=>'KitaBantu',
            'subteks'=>'Create Bank'
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name'=>'required',
        ]);

        $name = $request->input('name');

        $slug = str::slug($name);

        $originalSlug = $slug;
        $counter= 1;

        while (Bank::where('slug', $slug)->exists()){
            $slug = $originalSlug . '-' . $counter;
            $counter++;
        }

        Bank::create([
            'name' => $name,
            'slug' => $slug,
        ]);

        flash()->success('Bank Successfull Added Has Been');
        return redirect()->route('bank.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Bank $bank)
    {
        return view('dashboard.admin.bank.edit',compact('bank'),[
            "title"=>'Dashboard Bank',
            "company"=>'KitaBantu',
            "subteks"=>'Edit Bank',
            "bank"=>$bank
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Bank $bank)
    {
        $rules =[
            'name'=>'required'
        ];

        if($request->slug != $bank->slug){
            $rules['slug'] = 'required|unique:categories';
        }
        $validateData = $request->validate($rules);

        Bank::where('id',$bank->id)
        ->update($validateData);


        flash()->success('Bank Successfull Updated Has Been');

        return redirect()->route('bank.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Bank $bank)
    {
        $bank->delete();

        flash()->success('Bank deleted successfully');

        return redirect()->route('bank.index');
    }
}
