<?php

namespace App\Http\Controllers;

use App\Bank;
use Session;
use Illuminate\Http\Request;

class bankController extends Controller
{
    public function bank(){
        $banks = Bank::all();
        return view('admin.page.bank.bank',compact('banks'));
    }

    public function edit($id){
        $edit = Bank::find($id);
        return view('admin.page.bank.edit',compact('edit'));
    }

    public function update(Request $request, $id){
        $update = Bank::find($id);
        $update->name_bank = $request->name_bank;
        $update->name_account = $request->name_account;
        $update->iban_number = $request->iban_number;
        $update->account_number = $request->account_number;

        if (!empty($request->file('image'))) {
            $image = $request->file('image');
            $ext = $image->getClientOriginalExtension();
            $name = rand() . time() . '.' . $ext;
            $image->move(public_path('/upload'), $name);
            $update->image = $name;
        }
        $update->update();
        Session::flash('alert-success', 'تم تعديل البيانات بنجاح');
        return redirect('bank');
    }

}
