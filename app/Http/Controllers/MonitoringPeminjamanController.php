<?php

namespace App\Http\Controllers;

use App\Models\MonitoringPeminjaman;
use Illuminate\Http\Request;

class MonitoringPeminjamanController extends Controller
{
     /**
         * index
         *
         * @return void
         */
        public function index()
        {
           
            $monitoringpeminjamans = MonitoringPeminjaman::all();
    
  
            return view('monitoringpeminjamans.index', compact('monitoringpeminjamans'));
        }
        public function create()
        {
            return view('monitoringpeminjamans.create');
        }
    
        /**
         * store
         *
         * @param Request $request
         * @return void
         */
        public function store(Request $request)
        {
            
            MonitoringPeminjaman::create( [
                'nama_barang' => $request->nama_barang,
                'user' => $request->user,
                'divisi' => $request->divisi,
                
            ]);
    
            //redirect to index
            return redirect()->route('monitoringpeminjamans.index')->with(['success' => 'Data Berhasil Disimpan!']);
        }
        public function edit(MonitoringPeminjaman $monitoringpeminjaman)
        {
            return view('monitoringpeminjamans.edit', compact('monitoringpeminjaman'));
        }
        
        /**
         * update
         *
         * @param  mixed $request
         * @param  mixed $post
         * @return void
         */
        public function update(Request $request, MonitoringPeminjaman $monitoringpeminjaman)
        {
            //validate form
            $this->validate($request, [
                'nama_barang',
                'user',
                'divisi',
              
                
            ]);
    
            
            //update 
            $monitoringpeminjaman->update([
                'nama_barang' => $request->nama_barang,
                'user' => $request->user,
                'divisi' => $request->divisi,
        ]);
    
                return redirect()->route('monitoringpeminjamans.index')->with(['success' => 'Data Berhasil Disimpan!']);
            }
    
            //redirect to index
           
            public function destroy(MonitoringPeminjaman $monitoringpeminjaman)
            {
                
        
                //delete post
                $monitoringpeminjaman->delete();
        
                //redirect to index
                return redirect()->route('monitoringpeminjamans.index')->with(['success' => 'Data Berhasil Dihapus!']);
            }
}
