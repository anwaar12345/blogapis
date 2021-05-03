<?php
use App\Reservation;
use App\Room;
use App\RoomType;
use App\Hotel;
use App\City;
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
    $city_id = 2;
    $room_size = 2;
    $user_id = 1;
    $room_id = 29;
  // $results = Reservation::where(function($q) use($check_in,$check_out){
  //   $q->where('check_in','>',$check_in);
  //   $q->where('check_in','>=',$check_out);
  // })->orWhere(function($q) use($check_in,$check_out){
  //   $q->where('check_out','<=',$check_in);
  //   $q->where('check_out','<',$check_out);
  // })->get();
  // dump($results);

// $results = \DB::table('rooms')
// ->join('room_types','rooms.room_type_id','=','room_types.id')
// ->whereNotExists(
//   function($q) use($check_in,$check_out){
//     $q->select('reservations.id')
//     ->from('reservations')
//     ->join('reservation_room','reservations.id','=','reservation_room.reservation_id')
//     ->whereColumn('rooms.id','=','reservation_room.room_id')
//     ->where(function($query) use($check_in,$check_out){
//       $query->where('check_out','>',$check_in);
//       $query->where('check_in','<',$check_out);
//     })->limit(1); 
//   }
// )->get();
// dump($results);
//  $results = Room::with(['type','hotel'])->whereDoesntHave('reservations',function($q) use($check_in,$check_out){
//     $q->where('check_in',"<",$check_out);
//     $q->where('check_out','>',$check_in);
//  })->whereHas('hotel.city',function($q) use($city_id){
//    $q->where('cities.id','=',$city_id);
//  })->whereHas('type',function($query) use($room_size){
//    $query->where('amount','>',0);
//    $query->where('size','>',$room_size);
//  })
//  ->get()->sortBy('type.price'); //desc
//  dump($results);
// \DB::transaction(function(){
//   $check_in = "2020-06-20";
//   $check_out = "2020-06-08";
//   $room = Room::findOrFail(29);
//   $reservation = new Reservation();
//   $reservation->user_id = 1;
//   $reservation->check_in = $check_in;
//   $reservation->check_out = $check_out; 
//   $reservation->price = $room->type->price;
//   $reservation->save();
//   $room->reservations()->attach($reservation->id);

//   RoomType::where('id',$room->type->id)
//   ->where('amount','>',0)
//   ->decrement('amount');
// });
// // dump($room);  

//user reservations
// $result = Reservation::with(['rooms.type','rooms.hotel'])
//           ->where('user_id',$user_id)->get();
// dump($result);  

// hotel's owner reservations
$hotel_id = [1];
// $result = Reservation::with(['rooms.type','user'])
//           ->select('reservations.*',\DB::raw('DATEDIFF(check_out,check_in) AS nights'))
//           ->whereHas('rooms.hotel',function($q) use($hotel_id){
//             $q->whereIn('hotel_id',$hotel_id);
//           })
//           ->orderBy('nights','DESC')
//           ->get();
// dump($result);   

// $result = Room::whereHas('hotel',function($q) use($hotel_id){
//           $q->whereIn('hotel_id',$hotel_id);
// })->withCount('reservations')
// ->orderBy('reservations_count','DESC')
// ->get();
// dump($result);

// $hotels = range(1,10);
// $result = Hotel::whereIn('id',$hotels)
//           ->withCount('rooms')
//           ->orderBy('rooms_count','DESC')
//           ->get();
// dump($result);      

//order users by reservations
// $result = \DB::table('users')->orderByDesc(
//   \DB::table('reservations')
//   ->select('price')
//   ->whereColumn('users.id','reservations.id')
//   ->orderByDesc('price')
//   ->limit(1)
// )->get();
// dump($result);
// $city = City::find(1);
// $hotel = new Hotel();
// $hotel->name = "test final test hotel";
// $hotel->description = "description";
// $hotel->city()->associate($city);
// dump($hotel->save()); 
$room_type = new RoomType();
$room_type->size = 2;
$room_type->price = 200;
$room_type->amount = 3;
$room_type->save();

$room = new Room();
$room->name = "test name";
$room->description = "test description";
$room->type()->associate($room_type);

$hotel = Hotel::find(1);
$result = $hotel->rooms()->save($room);
dump($result);
});
