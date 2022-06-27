<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Tahun_ajaran;

use DB;
use Illuminate\Support\Facades\DB as FacadesDB;

class Tahun_ajaranController extends Controller
{
    public function index()
    {
        return view('admin.tahun_ajaran.index');
    }

    public function get()
    {
        $data = tahun_ajaran::orderby('id_tahun_ajaran', 'ASC')->get();


        echo json_encode($data);
    }

    public function save(Request $r)
    {
        //  id_tahun_ajaran int NOT NULL,
        //   nama_tahun_ajaran varchar(15) NOT NULL,
        $tahun_ajaran = new Tahun_ajaran;
        $tahun_ajaran->id_tahun_ajaran = $r->input('txtid_tahun_ajaran');
        $tahun_ajaran->nama_tahun_ajaran = $r->input('txtnama_tahun_ajaran');


        $tahun_ajaran->save();
        $msg['success'] = FALSE;

        if ($tahun_ajaran) {
            $msg['success'] = TRUE;
        }
        echo json_encode($msg);
        //echo "sukses";
        //return redirect()->route('listTahunAjaran');

    }

    //isi data id_tahun_ajaran otomatis menambah satu dari jml data terbesar
    // public function getmax()
    //     {   $data = DB::table('tahun_ajaran')
    //         ->selectRaw('max(id_tahun_ajaran) + 1 as jml')
    //         ->get();
    //         echo json_encode($data);
    //     }  

    // public function getmax()
    //      {
    //   $data = DB::table('tahun_ajaran')
    //     ->selectRaw(' concat('M',right(concat('000',
    //     CAST (substring(max(id_tahun_ajaran),2,4) AS INTEGER) , 4)) as jml'
    //     )
    //     ->get();
    //     echo json_encode($data);
    //    }
    /*
select concat('M',right(concat('000',
			  max(CASE WHEN substring(id_tahun_ajaran,2,4)~E'^\\d+$' THEN CAST (substring(id_tahun_ajaran,2,4) AS INTEGER) ELSE 0 END
			  )+1),
              4)) as kode from tahun_ajaran

  */


    public function gettahun_ajaran($id)
    {
        $data = Tahun_ajaran::find($id);
        //peritah sql  ::select * from tahun_ajaran
        //   $data = DB::table('tahun_ajaran')->where('id_tahun_ajaran', $id)->get();
        echo json_encode($data);
    }


    public function update(Request $r, $id)
    {
        $tahun_ajaran = tahun_ajaran::find($id);

        //perintah sql :: update matpet set nama_tahun_ajaran=txtnama_tahun_ajaran, status_pelajaran=cmbStatus
        // where id_tahun_ajaran='M0001'
        $tahun_ajaran->nama_tahun_ajaran = $r->input('txtnama_tahun_ajaran');


        $tahun_ajaran->save();
        echo "sukses";
    }



    public function delete($id)
    {
        $tahun_ajaran = FacadesDB::table('tahun_ajaran')->where('id_tahun_ajaran', $id)->delete();
        $msg['success'] = FALSE;
        if ($tahun_ajaran) {
            $msg['success'] = TRUE;
        }
        echo json_encode($msg);
    }
}
