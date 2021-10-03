<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Pencapaian;
use App\Models\Bukti;
use App\Models\User;
use Illuminate\Http\Request;
use Auth;
use Illuminate\Support\Carbon;

class Kecekapan extends Component
{
    public function master() {

        $pencapaian = Pencapaian::latest()->get();

        return view('staff.master', compact('pencapaian'));
    }

    public function pencapaian_save(Request $request){

        $validatedData = $request->validate([

            'status' => ['required'],
            'weightage' => ['required', 'numeric'],

            'overall' => ['required', 'numeric'],
            'tahun' => ['required'],
            'bulan' => ['required'],

            'objektif' => ['required'],
            'fungsi' => ['required'],

            'metrik' => ['required'],
            'ukuran' => ['required'],

            'peratus' => ['required'],
            'threshold' => ['required'],

            'base' => ['required'],
            'stretch' => ['required'],

            'pencapaian' => ['required'],
            'total' => ['required'],
            'score' => ['required'],
            
        ]);


        Pencapaian::insert([
        
        'user_id'=> Auth::user()->id,
        'created_at'=> Carbon::now(),
        'updated_at'=> Carbon::now(),

        'status'=> $request->status,
        'weightage'=> $request->weightage,

        'overall'=> $request->overall,
        'tahun'=> $request->tahun,
        'bulan'=> $request->bulan,

        'fungsi'=> $request->fungsi,
        'objektif'=> $request->objektif,
        
        'metrik'=> $request->metrik,
        'ukuran'=> $request->ukuran,

        'peratus'=> $request->peratus,
        'threshold'=> $request->threshold,

        'base'=> $request->base,
        'stretch'=> $request->stretch,
 
        'pencapaian'=> $request->pencapaian,
        'total'=> $request->total,
        'score'=> $request->score,
        

        ]);


        Bukti::insert([
        
            'user_id'=> Auth::user()->id,
            'created_at'=> Carbon::now(),
            'updated_at'=> Carbon::now(),

            // TajuK Objektif - Bukti Form
            'metrik'=> $request->metrik,

        ]);

        

        return redirect()->back()->with('message', 'Pencapaian berjaya ditambah!');
    } 
       

    public function pencapaian_edit($id) {

        $pencapaian = Pencapaian::find($id);

        return view('staff.form_pencapaian' , compact('pencapaian'));

    }


    public function pencapaian_update(Request $request, $id) {

        $validatedData = $request->validate([

            'status' => ['required'],
            'weightage' => ['required', 'numeric'],

            'overall' => ['required', 'numeric'],
            'tahun' => ['required'],
            'bulan' => ['required'],

            'objektif' => ['required'],
            'fungsi' => ['required'],

            'metrik' => ['required'],
            'ukuran' => ['required'],

            'peratus' => ['required'],
            'threshold' => ['required'],

            'base' => ['required'],
            'stretch' => ['required'],

            'pencapaian' => ['required'],
            'total' => ['required'],
            'score' => ['required'],
            
        ]);

        $update = Pencapaian::find($id)->update([

            'user_id'=> Auth::user()->id,
            'created_at'=> Carbon::now(),
            'updated_at'=> Carbon::now(),


            'status'=> $request->status,
            'weightage'=> $request->weightage,

            'overall'=> $request->overall,
            'tahun'=> $request->tahun,
            'bulan'=> $request->bulan,

            'objektif'=> $request->objektif,
            'fungsi'=> $request->fungsi,

            'metrik'=> $request->metrik,
            'ukuran'=> $request->ukuran,

            'peratus'=> $request->peratus,
            'threshold'=> $request->threshold,

            'base'=> $request->base,
            'stretch'=> $request->stretch,
    
            'pencapaian'=> $request->pencapaian,
            'total'=> $request->total,
            'score'=> $request->score,

        ]);

        return redirect()->route('staff_master')->with('message', 'Pencapaian Updated Successfully');

    }

    public function pencapaian_delete($id) {

        $delete = Pencapaian::find($id)->forceDelete();

        return redirect()->back()->with('message', 'Pencapaian Deleted Successfully');
    }

    public function bukti_main($id) {

        $pencapaian = Pencapaian::find($id);
        $bukti = Bukti::find($id);
        
        return view('staff.main_bukti' , compact('pencapaian', 'bukti') );
    }


    public function bukti_update(Request $request, $id) { 

        $bukti = Bukti::find($id)->update([

            'user_id'=> Auth::user()->id,

            'link'=> $request->link,

        ]);

        return redirect()->back()->with('message', 'Profile Updated Successfully');

    }

    public function bukti_save(Request $request){
     
    Bukti::insert([
        
            'user_id'=> Auth::user()->id,
            'created_at'=> Carbon::now(),
            'updated_at'=> Carbon::now(),
    
            'metrik'=> $request->metrik,

            'link'=> $request->link,
    
        ]);

}
        public function render()
    {
        return view('livewire.kecekapan');
    }
}