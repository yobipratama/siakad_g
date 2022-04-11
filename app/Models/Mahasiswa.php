<?php
namespace App\Models;
 use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\Mahasiswa as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Model; //Model Eloquent


class Mahasiswa extends Model //Definisi Model
{
    //protected $perPage = 4;
    protected $table='mahasiswa'; // Eloquent akan membuat model mahasiswa menyimpan record di tabel mahasiswa
    protected $primaryKey = 'nim'; // Memanggil isi DB Dengan primarykey
 /**
 * The attributes that are mass assignable.
 *
 * @var array
 */
    protected $fillable = [
        'nim',
        'nama',
        'kelas_id',
        'jurusan',
        // 'Nim',
        // 'Nama',
        // 'Email',
        // 'Tanggal Lahir',
        // 'Alamat',
        // 'Kelas',
        // 'Jurusan',
    ];
    public function kelas(){
        return $this->belongsTo(Kelas::class);
    }
    public function matakuliah(){
        return $this->belongsToMany(Mahasiswa_MataKuliah::class)->withPivot('nilai');
    }
}