<?php
use App\Reservation;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
Route::get('/db-create', function () {
$servername = "localhost";
$username = "root";
$password = "";

try {
  $conn = new PDO("mysql:host=$servername", $username, $password);
  // set the PDO error mode to exception
  $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
  $sql = "CREATE DATABASE hotels";
  // use exec() because no results are returned
  $conn->exec($sql);
  echo "Database created successfully<br>";
} catch(PDOException $e) {
  echo $sql . "<br>" . $e->getMessage();
}

$conn = null;
});
Route::get('/', function () {

    $check_in = "2020-06-20";
    $check_out = "2020-06-08";
  // $results = Reservation::where(function($q) use($check_in,$check_out){
  //   $q->where('check_in','>',$check_in);
  //   $q->where('check_in','>=',$check_out);
  // })->orWhere(function($q) use($check_in,$check_out){
  //   $q->where('check_out','<=',$check_in);
  //   $q->where('check_out','<',$check_out);
  // })->get();
  // dump($results);

$results = \DB::table('rooms')->whereNotExists(
  function($q) use($check_in,$check_out){
    $q->select('reservations.id')
    ->from('reservations')
    ->join('reservation_room','reservations.id','=','reservation_room.reservation_id')
    ->where(function($query) use($check_in,$check_out){
      $query->where('check_out','>',$check_in);
      $query->where('check_in','<',$check_out);
    })->limit(1); 
  }
)->paginate(10);
dump($results);
});
