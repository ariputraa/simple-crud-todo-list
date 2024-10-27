<?php

namespace App\Http\Controllers;

use App\Exports\TdlsExport;
use App\Exports\UsersExport;
use App\Imports\TdlsImport;
use App\Imports\UsersImport;
use App\Models\Tdl;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Facades\Excel;
use RealRashid\SweetAlert\Facades\Alert;

class TdlController extends Controller
{
    // public function search(Request $request){

    //     $query = $request->search;

    //     $tdls = DB::table('tdls');

    //    if($query){
    //       $tdls = $tdls->where('day', 'LIKE', "%$query%");
    //     }

    //     if($request->goal){
    //       $tdls = $tdls->where('goal',$request->goal);
    //     }

    //     if($request->time){
    //       $tdls = $tdls->where('time', $request->time);
    //     }

    //     $tdls->get();
    //     return view('Tdl.index')->with('tdls', $tdls);
    // }

    public function index(Request $request)
    {
        $tdls = Tdl::orderBy('created_at', 'asc');

        if(request()->filled('search')){
            $tdls = TDL::where('goal','like', '%'. request()->get('search').'%');
        }

        if(request()->filled('status')){
            $tdls = TDL::where('status', $request->status);
        }

        $tdls = $tdls->get();
        return view('Tdl.index', ['tdls' => $tdls]);

        // $tdls = $tdls->where('goal','like', '%'. request()->get('search').'%');
        // if(request()->get('search')){
        //     $tdls = TDL::where('day', 'like', '%' . request()->get('day') . '%')
        //     ->where('goal', 'like', '%' . request()->get('goal') . '%')
        //     ->where('time', 'like', '%' . request()->get('time') . '%')
        //     ->get();
        //     // ->where('status', request()->get('status'). '%');
        // }

        // elseif(request()->get('search')){
        //     $tdls = TDL::where('goal','like', '%'. request()->get('search').'%');
        // }
    }

    // public function view_pdf()

    // {

    //     $mpdf = new \Mpdf\Mpdf();
    //     $tdls = Tdl::orderBy('created_at', 'asc')->get();
    //     $mpdf->WriteHTML(view('Tdl.index', ['tdls' => $tdls]));
    //     $mpdf->Output();
    //     // $mpdf = new \Mpdf\Mpdf();
    //     // $tdls = Tdl::orderBy('created_at', 'asc');
    //     // $mpdf->WriteHTML(view('Tdl.index', ['tdls' => $tdls]));
    //     // $mpdf->Output();
    // }

    // public function download_pdf()
    // {

    //     $mpdf = new \Mpdf\Mpdf();
    //     $tdls = Tdl::orderBy('created_at', 'asc')->get();
    //     $mpdf->WriteHTML(view('Tdl.index', ['tdls' => $tdls]));
    //     $mpdf->Output('himitsu.pdf','D');
    //     // $mpdf = new \Mpdf\Mpdf();
    //     // $tdls = Tdl::orderBy('created_at', 'asc');
    //     // $mpdf->WriteHTML(view('Tdl.index', ['tdls' => $tdls]));
    //     // $mpdf->Output();
    // }

    public function create()
    {
        return view('Tdl.create');
    }

    public function store(Request $request,)
    {
        $data = $request->validate([
            // 'user_id'=>$id,
            // 'user_id' => 'required|exists:users,id',
            'day'=>'required',
            'goal'=>'required',
            'time'=>'required|numeric',
            'status'=>'required'
        ]);

        // $data['user_id'] = auth()->id();

        $newTdl = Tdl::create($data);
        Alert::success('New TDL Created', 'Your New TDL Has Been Created Successfully');
        return redirect(route('tdl.index'));
    }

    public function edit(Tdl $tdl)
    {
        return view('Tdl.edit', ['tdl' => $tdl]);
    }

    public function update(Tdl $tdl, Request $request,)
    {
        $data = $request->validate([
            // 'user_id'=>$id,
            'day'=>'required',
            'goal'=>'required',
            'time'=>'required|numeric',
            'status'=>'required',
        ]);

        $tdl->update($data);
        Alert::success('Data Has Been Updated!', 'Your Data Has Been Updated Successfully');
        return redirect(route('tdl.index'));
        // ->with('Confirmed', 'Model Has Been Updated!');
    }

    public function destroy(Tdl $tdl)
    {
        $tdl->delete();
        Alert::success('Data Has Been Deleted!', 'Your Data Has Been Deleted Successfully');
        return redirect()->back();
        // return back()->with('Confirmed', 'Model Has Been Deleted!');
    //     Alert::warning('Warning Title', 'Warning Message')
    // ->persistent(true)
    // ->timer(5000);
    }

    public function export()
    {
        return Excel::download(new UsersExport, 'wacawaca.xlsx');
    }

    public function expors()
    {
        return Excel::download(new TdlsExport, 'tdlist.xlsx');
    }

    public function import()
    {
        Excel::import(new UsersImport, 'users.xlsx');

        Alert::success('Data Has Been Imported!', 'Your Data Has Been Imported Successfully');
        return redirect()->back();
    }

    public function impors(Request $request)
    {
        $request->validate([
            'file' => 'required|mimes:xls,xlsx'
        ]);

        Excel::import(new TdlsImport, request()->file('file'));

        Alert::success('Data Has Been Imported!', 'Your Data Has Been Imported Successfully');
        return redirect()->back();
    }
}
