<?php

namespace App\Repositories;

use DB;

class Plant extends BaseRepository
{
  public function create($code)
  {
    $id = DB::table('plants')->insertGetId(['code' => $code]);

    return $this->find($id);
  }

  public function delete($code)
  {
    DB::table('plants')->where('code', $code)->update([
      'deleted_at' => 'now()'
    ]);
  }

  public function update($code, $data)
  {
    DB::table('plants')->where('code', $code)->update($data);
  }

  public function search()
  {
    return DB::table('plants')->orderBy('id')->get();
  }

  public function find($id)
  {
    return DB::table('plants')->where('id', $id)->get()[0];
  }
} 