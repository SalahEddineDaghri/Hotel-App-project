<?php

namespace Database\Seeders;

use App\Models\Type;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class TypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $types = array(
            array('id' => '1','name' => 'Standard Room','info' => 'As the name suggests, the standard room type is the most basic type of hotel room in a hotel. Usually, this type of room is priced relatively cheaply. The facilities offered are also standard, such as a king-size bed or two queen-size beds. However, the offers given depend on each hotel. The standard room of a 1-star and 5-star hotel is certainly different.','created_at' => '2022-10-26 10:09:02','updated_at' => '2022-10-26 10:09:02'),
            array('id' => '2','name' => 'Superior Room','info' => 'Basically, a superior room is a slightly better room type than a standard room type. The difference can be in the facilities provided, the interior of the room, or the view from the room..','created_at' => '2022-10-26 10:09:02','updated_at' => '2022-10-26 10:09:02'),
            array('id' => '3','name' => 'Deluxe Room','info' => 'Above the superior room type is the deluxe room. This room certainly has a larger room. There are choices of beds that you can choose, double bed or twin bed. Usually, in terms of interior, this room looks more luxurious.','created_at' => '2022-10-26 10:09:02','updated_at' => '2022-10-26 10:09:02'),
            array('id' => '4','name' => 'Junior Suite Room','info' => 'The type of junior suite hotel room is characterized by the presence of a living room. However, the living room is still in the same room as the bed. The living room is usually separated or partitioned by a large closet so that the bed is not visible. ','created_at' => '2022-10-26 10:09:02','updated_at' => '2022-10-26 10:09:02'),
            array('id' => '5','name' => 'Suite Room','info' => 'Suite room is above the junior suite room type. The living room in this hotel room is separate from the bedroom. In terms of facilities, of course it is different from the junior suite room. In addition to the living room, usually this type of hotel room is equipped with a kitchen.','created_at' => '2022-10-26 10:09:02','updated_at' => '2022-10-26 10:09:02'),
            array('id' => '6','name' => 'Presidential Suite','info' => 'The presidential suite is the best and most expensive type of hotel room. In fact, not all hotels have a presidential suite. The facilities offered are certainly the best, starting from the interior, room views, and many others.','created_at' => '2022-10-26 10:09:02','updated_at' => '2022-10-26 10:09:02'),
            array('id' => '7','name' => 'Single Room','info' => 'Single room is the most common type of hotel room. This type of hotel room consists of a single bed, sofa, and bathroom. The size of the room is also not too big. Usually this type of hotel room is chosen by backpackers or solo travelers because the facilities are for one person and the price is cheap.','created_at' => '2022-10-26 10:09:02','updated_at' => '2022-10-26 10:09:02'),
            array('id' => '8','name' => 'Twin Room','info' => 'From the name alone, it can be guessed that this type of hotel room has two separate single beds. This type of hotel room is suitable for couples or staying with friends with 2-3 people.','created_at' => '2022-10-26 10:09:02','updated_at' => '2022-10-26 10:09:02'),
            array('id' => '9','name' => 'Double Room','info' => 'Want to stay more comfortably and with better facilities? You can book a double room type of hotel room. This type of hotel room usually has a large bed size such as king size. This double room is perfect for couples who want to honeymoon.','created_at' => '2022-10-26 10:09:02','updated_at' => '2022-10-26 10:09:02'),
            array('id' => '10','name' => 'Family Room/Triple Room','info' => 'Going traveling with a large family or friends? You can choose the family room type of hotel room. In terms of room size, of course it is much larger than other types of hotel rooms. This type of family room hotel room is usually available with one place with a king size and one bed with a smaller size.','created_at' => '2022-10-26 10:09:02','updated_at' => '2022-10-26 10:09:02'),
            array('id' => '11','name' => 'Connecting Room','info' => "This type of hotel room with Connecting Room is suitable for those of you who go with a large family or group but want to have your own bedroom. Your room and other family members will be next to each other and there is a door connecting your rooms. So, if you or other family members want to go to each other's room, you can go through the connecting door and don't have to bother going through the front door, Toppers.",'created_at' => '2022-10-26 10:09:02','updated_at' => '2022-10-26 10:09:02'),
            array('id' => '12','name' => 'Murphy Room','info' => 'Murphy room is a type of hotel room that provides a sofa bed in the room. This sofa bed is used as a bed at night and a living room during the day. The size of the Murphy Room is around 20 - 40 m. Wow, what an exciting concept!','created_at' => '2022-10-26 10:09:02','updated_at' => '2022-10-26 10:09:02'),
            array('id' => '13','name' => 'Accessible Room/Disabled Room','info' => 'This Accessible Room/Disable Room type is available for guests with disabilities. The existence of this room type is also required by law, you know, to avoid discrimination. This is also made to make it easier for these guests when staying at the hotel.','created_at' => '2022-10-26 10:09:02','updated_at' => '2022-10-26 10:09:02'),
            array('id' => '14','name' => 'Smoking/Non Smoking Room','info' => 'Usually guests are not allowed to smoke in the room. However, many hotels already provide Smoking/Non-Smoking Room types. This is also useful so as not to disturb the next guest with the smell of cigarettes in the room. So, if you are a smoker, now you can book a room with a smoking room type.','created_at' => '2022-10-26 10:09:02','updated_at' => '2022-10-26 10:09:02'),
            array('id' => '15','name' => 'Cabana Room','info' => 'Want to swim right away when you open the door? Or have a private pool? Choose the Cabana Room type! This type of hotel room is designed with a private pool for those who book the room. The size of the Cabana Room is around 30 - 40 m2.','created_at' => '2022-10-26 10:09:02','updated_at' => '2022-10-26 10:09:02')
          );

          Type::create($types[0]);
          Type::create($types[1]);
          Type::create($types[2]);
          Type::create($types[3]);
          Type::create($types[4]);
          Type::create($types[5]);
          Type::create($types[6]);
          Type::create($types[7]);
          Type::create($types[8]);
          Type::create($types[9]);
          Type::create($types[10]);
          Type::create($types[11]);
          Type::create($types[12]);
          Type::create($types[13]);
          Type::create($types[14]);
    }
}
