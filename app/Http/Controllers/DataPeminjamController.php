<?php

namespace App\Http\Controllers;

use App\Models\DataPeminjam;
use Illuminate\Http\Request;

class DataPeminjamController extends Controller
{
     /**
         * index
         *
         * @return void
         */
        public function index()
        {
           
            $datapeminjams = DataPeminjam::all();
    
  
            return view('datapeminjams.index', compact('datapeminjams'));
        }
        public function create()
        {
            return view('datapeminjams.create');
        }
    
        /**
         * store
         *
         * @param Request $request
         * @return void
         */
        public function store(Request $request)
        {
            
            DataPeminjam::create( [
                'alamat' => $request->alamat,
                'user' => $request->user,
                'divisi' => $request->divisi,
                'nomor_telepon' => $request->nomor_telepon,
            ]);
    
            //redirect to index
            return redirect()->route('datapeminjams.index')->with(['success' => 'Data Berhasil Disimpan!']);
        }
        public function edit(DataPeminjam $datapeminjam)
        {
            return view('datapeminjams.edit', compact('datapeminjam'));
        }
        
        /**
         * update
         *
         * @param  mixed $request
         * @param  mixed $post
         * @return void
         */
        public function update(Request $request, DataPeminjam $datapeminjam)
        {
            //validate form
            $this->validate($request, [
                'alamat',
                'user',
                'divisi',
                'nomor_telepon',
              
                
            ]);
    
            
            //update 
            $datapeminjam->update([
                'alamat' => $request->alamat,
                'user' => $request->user,
                'divisi' => $request->divisi,
                'nomor_telepon' => $request->nomor_telepon,
        ]);
    
                return redirect()->route('datapeminjams.index')->with(['success' => 'Data Berhasil Disimpan!']);
            }
    
            //redirect to index
           
            public function destroy(DataPeminjam $datapeminjam)
            {
                
        
                //delete post
                $datapeminjam->delete();
        
                //redirect to index
                return redirect()->route('datapeminjams.index')->with(['success' => 'Data Berhasil Dihapus!']);
            }
}
