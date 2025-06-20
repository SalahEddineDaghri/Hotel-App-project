<?php

namespace Database\Seeders;

use App\Models\ImageRoom;
use Illuminate\Database\Seeder;

class ImageRoomSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // مثال على مجموعة صور لكل غرفة
        $images = [
            1 => ['room-images/1.jpg','2.jpg'],
            2 => ['room-images/3.jpg','4.jpg'],
            3 => ['room-images/5.jpg','6.jpg'],
            4 => ['room-images/7.jpg','8.jpg'],
            5 => ['room-images/9.jpg', '10.jpg'],
            6 => ['room-images/11.jpg','12.jpg'],
            7 => ['room-images/13.jpg','14.jpg'],
            8 => ['room-images/15.jpg'],
            9 => ['room-images/16.jpg'],
            10 => ['room-images/17.jpg'],
            11 => ['room-images/18.jpg'],
            12 => ['room-images/19.jpg'],
            13 => ['room-images/20.jpg'],
            // 14 => ['room_14.jpg'],
            // 15 => ['room_15.jpg'],
            // 16 => ['room_16.jpg'],
            // 17 => ['room_17.jpg'],
            // 18 => ['room_18.jpg'],
            // 19 => ['room_19.jpg'],
            // 20 => ['room_20.jpg'],
        ];

        foreach ($images as $roomId => $roomImages) {
            foreach ($roomImages as $image) {
                ImageRoom::create([
                    'room_id' => $roomId,
                    'image' => $image,
                ]);
            }
        }
    }
}
