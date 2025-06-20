<?php

namespace Database\Seeders;

use App\Models\Room;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class RoomSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $rooms = array(
            array(
                'id' => '1',
                'type_id' => '10',
                'status_id' => '1',
                'no' => '10A',
                'capacity' => '2',
                'price' => '650',
                'info' => 'Standard double room with comfortable queen-size bed, air conditioning, TV, and private bathroom. Ideal for couples or business travelers. Located on the quiet side of the hotel with a nice view of the garden.',
                'created_at' => '2022-10-26 10:09:02',
                'updated_at' => '2022-10-26 10:09:02'
            ),
            array(
                'id' => '2',
                'type_id' => '11',
                'status_id' => '1',
                'no' => '11C',
                'capacity' => '6',
                'price' => '200',
                'info' => 'Family suite with two bedrooms (1 queen bed + 2 twin beds), living area, and kitchenette. Perfect for families or group travelers. Includes all standard amenities plus extra space and comfort.',
                'created_at' => '2022-10-26 10:09:02',
                'updated_at' => '2022-10-26 10:09:02'
            ),
            array(
                'id' => '3',
                'type_id' => '6',
                'status_id' => '1',
                'no' => '12A',
                'capacity' => '11',
                'price' => '175',
                'info' => 'Executive meeting room suitable for business gatherings or small events. Equipped with conference table, projector, whiteboard, and comfortable seating for up to 11 people. Catering services available upon request.',
                'created_at' => '2022-10-26 10:09:02',
                'updated_at' => '2022-10-26 10:09:02'
            ),
            array(
                'id' => '4',
                'type_id' => '10',
                'status_id' => '1',
                'no' => '13D',
                'capacity' => '11',
                'price' => '200',
                'info' => 'Deluxe family room with one king bed and three twin beds. Spacious layout with sitting area and extra storage. Features premium amenities including minibar, coffee maker, and luxury toiletries.',
                'created_at' => '2022-10-26 10:09:02',
                'updated_at' => '2022-10-26 10:09:02'
            ),
            array(
                'id' => '5',
                'type_id' => '1',
                'status_id' => '1',
                'no' => '14D',
                'capacity' => '3',
                'price' => '400',
                'info' => 'Superior triple room with one queen bed and one twin bed. Modern design with work desk and ergonomic chair. Includes high-speed WiFi, smart TV, and premium bedding for maximum comfort.',
                'created_at' => '2022-10-26 10:09:02',
                'updated_at' => '2022-10-26 10:09:02'
            ),
            array(
                'id' => '6',
                'type_id' => '3',
                'status_id' => '1',
                'no' => '15A',
                'capacity' => '5',
                'price' => '500',
                'info' => 'Budget-friendly room with two twin beds and one rollaway bed available. Basic amenities including TV, air conditioning, and private bathroom. Great value for backpackers or short stays.',
                'created_at' => '2022-10-26 10:09:02',
                'updated_at' => '2022-10-26 10:09:02'
            ),
            array(
                'id' => '7',
                'type_id' => '8',
                'status_id' => '1',
                'no' => '16D',
                'capacity' => '1',
                'price' => '950',
                'info' => 'Cozy single room perfect for solo travelers. Features a comfortable twin bed, compact work space, and efficient storage solutions. Quiet location ideal for business travelers or those seeking privacy.',
                'created_at' => '2022-10-26 10:09:02',
                'updated_at' => '2022-10-26 10:09:02'
            ),
            array(
                'id' => '8',
                'type_id' => '8',
                'status_id' => '1',
                'no' => '17A',
                'capacity' => '6',
                'price' => '440',
                'info' => 'Standard family room with two queen beds. Simple yet comfortable accommodation for groups or families traveling together. Includes basic amenities and daily housekeeping service.',
                'created_at' => '2022-10-26 10:09:02',
                'updated_at' => '2022-10-26 10:09:02'
            ),
            array(
                'id' => '9',
                'type_id' => '14',
                'status_id' => '1',
                'no' => '18C',
                'capacity' => '11',
                'price' => '850',
                'info' => 'Multi-purpose event space suitable for workshops, seminars, or social gatherings. Flexible seating arrangements available. Includes basic AV equipment and high-speed internet connection.',
                'created_at' => '2022-10-26 10:09:02',
                'updated_at' => '2022-10-26 10:09:02'
            ),
            array(
                'id' => '10',
                'type_id' => '10',
                'status_id' => '1',
                'no' => '19A',
                'capacity' => '1',
                'price' => '200',
                'info' => 'Luxury single room with premium king-size bed and upscale amenities. Features a spacious work area, premium bath products, and exclusive access to the executive lounge.',
                'created_at' => '2022-10-26 10:09:02',
                'updated_at' => '2022-10-26 10:09:02'
            ),
            array(
                'id' => '11',
                'type_id' => '12',
                'status_id' => '1',
                'no' => '20D',
                'capacity' => '2',
                'price' => '300',
                'info' => 'Standard twin room with two comfortable single beds. Ideal for business partners or friends traveling together. Includes all basic amenities with efficient use of space.',
                'created_at' => '2022-10-26 10:09:02',
                'updated_at' => '2022-10-26 10:09:02'
            ),
            array(
                'id' => '12',
                'type_id' => '11',
                'status_id' => '1',
                'no' => '21D',
                'capacity' => '6',
                'price' => '250',
                'info' => 'Premium family suite with separate living area and two bedrooms. Features a kitchenette, dining area, and extra storage space. Perfect for extended stays or family vacations.',
                'created_at' => '2022-10-26 10:09:02',
                'updated_at' => '2022-10-26 10:09:02'
            ),
            array(
                'id' => '13',
                'type_id' => '14',
                'status_id' => '1',
                'no' => '22A',
                'capacity' => '3',
                'price' => '500',
                'info' => 'Executive boardroom with premium furnishings and advanced AV equipment. Suitable for important business meetings or presentations. Includes complimentary coffee/tea service.',
                'created_at' => '2022-10-26 10:09:02',
                'updated_at' => '2022-10-26 10:09:02'
            ),
            array(
                'id' => '14',
                'type_id' => '6',
                'status_id' => '1',
                'no' => '23B',
                'capacity' => '12',
                'price' => '175',
                'info' => 'Large conference room with theater-style seating for up to 12 participants. Professional setup with podium, projector, and sound system. Ideal for corporate training sessions or workshops.',
                'created_at' => '2022-10-26 10:09:02',
                'updated_at' => '2022-10-26 10:09:02'
            ),
            array(
                'id' => '15',
                'type_id' => '15',
                'status_id' => '1',
                'no' => '24A',
                'capacity' => '5',
                'price' => '950',
                'info' => 'Junior suite with one king bed and sofa bed. Spacious accommodation with sitting area and enhanced amenities. Great for small families or travelers wanting extra comfort.',
                'created_at' => '2022-10-26 10:09:02',
                'updated_at' => '2022-10-26 10:09:02'
            ),
            array(
                'id' => '16',
                'type_id' => '15',
                'status_id' => '1',
                'no' => '25A',
                'capacity' => '11',
                'price' => '499',
                'info' => 'Presidential suite with luxurious furnishings and premium services. Features separate living and dining areas, premium bathroom with jacuzzi, and exclusive butler service.',
                'created_at' => '2022-10-26 10:09:02',
                'updated_at' => '2022-10-26 10:09:02'
            ),
            array(
                'id' => '17',
                'type_id' => '11',
                'status_id' => '1',
                'no' => '26D',
                'capacity' => '5',
                'price' => '799',
                'info' => 'Family room with one queen bed and bunk beds. Fun and functional design perfect for families with children. Includes child-friendly amenities and extra safety features.',
                'created_at' => '2022-10-26 10:09:02',
                'updated_at' => '2022-10-26 10:09:02'
            ),
            array(
                'id' => '18',
                'type_id' => '14',
                'status_id' => '1',
                'no' => '27D',
                'capacity' => '6',
                'price' => '480',
                'info' => 'Small meeting room with U-shaped seating arrangement. Basic setup suitable for team meetings or brainstorming sessions. Includes whiteboard and flip chart.',
                'created_at' => '2022-10-26 10:09:02',
                'updated_at' => '2022-10-26 10:09:02'
            ),
            array(
                'id' => '19',
                'type_id' => '6',
                'status_id' => '1',
                'no' => '28A',
                'capacity' => '8',
                'price' => '650',
                'info' => 'Medium-sized conference room with classroom-style seating. Suitable for training sessions or group presentations. Includes projector screen and basic sound system.',
                'created_at' => '2022-10-26 10:09:02',
                'updated_at' => '2022-10-26 10:09:02'
            ),
            array(
                'id' => '20',
                'type_id' => '11',
                'status_id' => '1',
                'no' => '29A',
                'capacity' => '11',
                'price' => '490',
                'info' => 'Grand family suite with three separate bedrooms and shared living space. Ideal for large families or multiple couples traveling together. Features premium amenities and extra privacy.',
                'created_at' => '2022-10-26 10:09:02',
                'updated_at' => '2022-10-26 10:09:02'
            )
        );

        Room::create($rooms[0]);
        Room::create($rooms[1]);
        Room::create($rooms[2]);
        Room::create($rooms[3]);
        Room::create($rooms[4]);
        Room::create($rooms[5]);
        Room::create($rooms[6]);
        Room::create($rooms[7]);
        Room::create($rooms[8]);
        Room::create($rooms[9]);
        Room::create($rooms[10]);
        Room::create($rooms[11]);
        Room::create($rooms[12]);
        Room::create($rooms[13]);
        Room::create($rooms[14]);
        Room::create($rooms[15]);
        Room::create($rooms[16]);
        Room::create($rooms[17]);
        Room::create($rooms[18]);
        Room::create($rooms[19]);
    }
}
