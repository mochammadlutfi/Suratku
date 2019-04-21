<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Agenda;
use Spatie\Permission\Models\Role;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;


class AgendaController extends Controller
{

    public function index(Request $request)
    {
        $agenda = Agenda::all();
        $event  =[];
        foreach($agenda as $row){
            // $tgl_akhir = $row->tgl_akhir."24:00:00";
            $event[]=\Calendar::event(
                $row->acara,
                true,
                new \DateTime($row->tgl_awal),
                new \DateTime($row->tgl_akhir),
                $row->id,
                [
                    'locale' => 'id',
                    'color' => $row->warna,
                ]
            );
        }
        $calendar = \Calendar::addEvents($event);
        $agenda_data = Agenda::when($request->keyword, function ($query) use ($request) {
            $query->where('acara', 'like', "%{$request->keyword}%")
                ->orWhere('tgl_awal', 'like', "%{$request->keyword}%");
        })->orderBy('id', 'desc')->paginate(1);

        $agenda_data->appends($request->only('keyword'));
        return view('agenda.index',compact('agenda','calendar', 'agenda_data'));
    }

    public function tambah(Request $request)
    {
        if ($request->isMethod('get')){

            $role_data = Role::where('name', '!=', 'super-admin')
                        ->get();

            return view('agenda.tambah', compact('role_data'));
        }else {
            $rules = [
                'acara' => 'required',
                'tgl_awal' => 'required',
                'tgl_akhir' => 'required',
                'warna' => 'required',

            ];
            $pesan = [
                'acara.required' => 'Nama Agenda Tidak Boleh Kosong',
                'tgl_awal.required'  => 'No. Surat Tidak Boleh Kosong',
                'tgl_akhir.required' => 'Tanggal Surat Tidak Boleh Kosong',
                'warna.required' => 'Sumber Surat Tidak Boleh Kosong',

            ];

            $v = Validator::make($request->all(), $rules, $pesan);
            if ($v->fails()) {
                return response()->json([
                    'fail' => true,
                    'errors' => $v->errors()
                ]);
            }else{
                $agenda = new Agenda;
                $agenda->acara = $request->input('acara');
                $agenda->tgl_awal =  date("Y-m-d", strtotime($request->tgl_awal));
                $agenda->tgl_akhir =  date("Y-m-d", strtotime($request->tgl_akhir));
                $agenda->warna = $request->input('warna');
                if($agenda->save()){
                    return response()->json([
                        'fail' => false,
                    ]);
                }
            }
        }
    }
    public function detail($id)
    {
        $data = Agenda::find($id);

        return view('agenda.detail', compact('data'));
    }
    public function edit($id)
    {
        $data = Agenda::find($id);
        $role_data = Role::where('name', '!=', 'super-admin')->get();
        return response()->json($data);
    }
    public function update(Request $request)
    {
        $rules = [
            'acara' => 'required',
            'tgl_awal' => 'required',
            'tgl_akhir' => 'required',
            'warna' => 'required',

        ];
        $pesan = [
            'acara.required' => 'No. Indeks Tidak Boleh Kosong',
            'tgl_awal.required'  => 'No. Surat Tidak Boleh Kosong',
            'tgl_akhir.required' => 'Tanggal Surat Tidak Boleh Kosong',
            'warna.required' => 'Sumber Surat Tidak Boleh Kosong',

        ];

        $v = Validator::make($request->all(), $rules, $pesan);
        if ($v->fails()) {
            return response()->json([
                'fail' => true,
                'errors' => $v->errors()
            ]);
        }else{
            $agenda = Agenda::find($request->input('id_agenda'));
            $agenda->acara = $request->input('acara');
            $agenda->tgl_awal =  date("Y-m-d", strtotime($request->tgl_awal));
            $agenda->tgl_akhir =  date("Y-m-d", strtotime($request->tgl_akhir));
            $agenda->warna = $request->input('warna');
            if($agenda->save())
            {
                return response()->json([
                    'fail' => false,
                ]);
            }else{
                App::abort(500, 'Error');
            }

        }
    }
    public function hapus($id)
    {
        if(Agenda::destroy($id))
        {
            return response()->json([
                'fail' => false,
            ]);
        }
    }
}
