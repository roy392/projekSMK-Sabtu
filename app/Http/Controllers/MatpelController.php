<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Matpel;

use DB;
use Illuminate\Support\Facades\DB as FacadesDB;

class MatpelController extends Controller
{
    public function index()
    {
        return view('admin.matpel.index');
    }

    public function get()
    {
        $data = Matpel::orderby('id_matpel', 'ASC')->get();


        echo json_encode($data);
    }

    public function save(Request $r)
    {

        $matpel = new Matpel;
        $matpel->id_matpel = $r->input('txtIDMatpel');
        $matpel->nama_matpel = $r->input('txtNamaMatpel');
        $matpel->status_pelajaran = $r->input('cmbStatus');

        $matpel->save();
        $msg['success'] = FALSE;

        if ($matpel) {
            $msg['success'] = TRUE;
        }
        echo json_encode($msg);
        //echo "sukses";
        //return redirect()->route('listTahunAjaran');

    }

    //isi data id_matpel otomatis menambah satu dari jml data terbesar
    // public function getmax()
    //     {   $data = DB::table('matpel')
    //         ->selectRaw('max(id_matpel) + 1 as jml')
    //         ->get();
    //         echo json_encode($data);
    //     }  

    // public function getmax()
    //      {
    //   $data = DB::table('matpel')
    //     ->selectRaw(' concat('M',right(concat('000',
    //     CAST (substring(max(id_matpel),2,4) AS INTEGER) , 4)) as jml'
    //     )
    //     ->get();
    //     echo json_encode($data);
    //    }
    /*
select concat('M',right(concat('000',
			  max(CASE WHEN substring(id_matpel,2,4)~E'^\\d+$' THEN CAST (substring(id_matpel,2,4) AS INTEGER) ELSE 0 END
			  )+1),
              4)) as kode from matpel

  */


    public function getMatpel($id)
    {
        $data = Matpel::find($id);
        //peritah sql  ::select * from matpel
        //   $data = DB::table('matpel')->where('id_matpel', $id)->get();
        echo json_encode($data);
    }

    // public function getURLMatpel($id,$id2,$id3){
    //     if($id != "MMMM" && $id2 != "MMMM" && $id3 != "MMMM" ){
    //         $data = DB::table('matpel')
    //         ->where('id_matpel', $id)
    //         //->where('nama_matpel','like', 'Bah%')
    //         //->where('status_pelajaran', $id3)
    //         ->get();
    //     } else

    //     if($id2 != "MMMM" && $id3 != "MMMM" ){
    //         $data = DB::table('matpel')
    //         //->where('id_matpel', $id)
    //         ->where('nama_matpel','like',  "%{$id2}%")
    //         ->where('status_pelajaran', $id3)
    //         ->get();
    //     } else
    //     if($id2 != "MMMM" && $id3 = "MMMM" ){
    //         $data = DB::table('matpel')
    //         //->where('id_matpel', $id)
    //         ->where('nama_matpel','like', "%{$id2}%")
    //         //->where('status_pelajaran', $id3)
    //         ->get();
    //     } else
    //     if($id2 = "MMMM" && $id3 != "MMMM"){
    //         $data = DB::table('matpel')
    //         //->where('id_matpel', $id)
    //        // ->where('nama_matpel','like', "%{$id2}%")
    //         ->where('status_pelajaran', $id3)
    //         ->get();
    //     } else
    //     if($id = "MMMM" && $id2 = "MMMM" && $id3 = "MMMM" ){
    //         $data = DB::table('matpel')
    //         ->where('id_matpel', $id)
    //         ->where('nama_matpel','like', "%{$id2}%")
    //         ->where('status_pelajaran', $id3)
    //         ->get();
    //     }


    //       echo json_encode($data);

    //}

    public function update(Request $r, $id)
    {
        $matpel = Matpel::find($id);

        //perintah sql :: update matpet set nama_matpel=txtNamaMatpel, status_pelajaran=cmbStatus
        // where id_matpel='M0001'
        $matpel->nama_matpel = $r->input('txtNamaMatpel');
        $matpel->status_pelajaran = $r->input('cmbStatus');

        $matpel->save();
        echo "sukses";
    }



    public function delete($id)
    {
        $matpel = FacadesDB::table('matpel')->where('id_matpel', $id)->delete();
        $msg['success'] = FALSE;
        if ($matpel) {
            $msg['success'] = TRUE;
        }
        echo json_encode($msg);
    }
}
