<?php

namespace Database\Seeders;

use App\Models\RoomStatus;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class RoomStatusSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $rs = array(
            array(
                'id' => '1',
                'name' => 'Vacant',
                'code' => 'V',
                'info' => 'Term for an empty room that is available for booking.',
                'created_at' => '2022-10-26 10:09:02',
                'updated_at' => '2022-10-26 10:09:02'
            ),
            array(
                'id' => '2',
                'name' => 'Occupied',
                'code' => 'O',
                'info' => 'A room currently occupied by a registered hotel guest with a valid reservation.',
                'created_at' => '2022-10-26 10:09:02',
                'updated_at' => '2022-10-26 10:09:02'
            ),
            array(
                'id' => '3',
                'name' => 'Occupied Clean',
                'code' => 'OC',
                'info' => 'An occupied room that has been cleaned and is in good condition for the guest.',
                'created_at' => '2022-10-26 10:09:02',
                'updated_at' => '2022-10-26 10:09:02'
            ),
            array(
                'id' => '4',
                'name' => 'Occupied Dirty',
                'code' => 'OD',
                'info' => 'An occupied room that requires cleaning. This status typically changes from OC to OD after one night of stay.',
                'created_at' => '2022-10-26 10:09:02',
                'updated_at' => '2022-10-26 10:09:02'
            ),
            array(
                'id' => '5',
                'name' => 'Vacant Clean Inspected',
                'code' => 'VCI',
                'info' => 'A vacant room that has been cleaned, inspected by the supervisor, and is ready for new guests.',
                'created_at' => '2022-10-26 10:09:02',
                'updated_at' => '2022-10-26 10:09:02'
            ),
            array(
                'id' => '6',
                'name' => 'Vacant Clean',
                'code' => 'VC',
                'info' => 'A vacant room that is clean but hasn\'t been inspected yet.',
                'created_at' => '2022-10-26 10:09:02',
                'updated_at' => '2022-10-26 10:09:02'
            ),
            array(
                'id' => '7',
                'name' => 'Vacant Dirty',
                'code' => 'VD',
                'info' => 'A vacant room that requires cleaning, either from a guest who checked out or scheduled housekeeping.',
                'created_at' => '2022-10-26 10:09:02',
                'updated_at' => '2022-10-26 10:09:02'
            ),
            array(
                'id' => '8',
                'name' => 'Compliment',
                'code' => 'Comp',
                'info' => 'A room registered to a guest but provided free of charge (complimentary stay).',
                'created_at' => '2022-10-26 10:09:02',
                'updated_at' => '2022-10-26 10:09:02'
            ),
            array(
                'id' => '9',
                'name' => 'House Use',
                'code' => 'HU',
                'info' => 'A room registered for use by hotel management or staff.',
                'created_at' => '2022-10-26 10:09:02',
                'updated_at' => '2022-10-26 10:09:02'
            ),
            array(
                'id' => '10',
                'name' => 'Do not Disturb',
                'code' => 'DND',
                'info' => 'A room with this status means the guest does not wish to be disturbed (Do Not Disturb sign displayed).',
                'created_at' => '2022-10-26 10:09:02',
                'updated_at' => '2022-10-26 10:09:02'
            ),
            array(
                'id' => '11',
                'name' => 'Sleep Out',
                'code' => 'SO',
                'info' => 'A registered guest who is not using their room because they are staying elsewhere temporarily.',
                'created_at' => '2022-10-26 10:09:02',
                'updated_at' => '2022-10-26 10:09:02'
            ),
            array(
                'id' => '12',
                'name' => 'Skipper',
                'code' => 'Skip',
                'info' => 'A guest who left the hotel without settling their payment obligations (skipped payment).',
                'created_at' => '2022-10-26 10:09:02',
                'updated_at' => '2022-10-26 10:09:02'
            ),
            array(
                'id' => '13',
                'name' => 'Out of Service',
                'code' => 'OS',
                'info' => 'A room temporarily unavailable due to minor repairs or maintenance.',
                'created_at' => '2022-10-26 10:09:02',
                'updated_at' => '2022-10-26 10:09:02'
            ),
            array(
                'id' => '14',
                'name' => 'Out of Order',
                'code' => 'OOO',
                'info' => 'A room requiring major repairs, typically unavailable for more than one day. This status reduces room availability.',
                'created_at' => '2022-10-26 10:09:02',
                'updated_at' => '2022-10-26 10:09:02'
            ),
            array(
                'id' => '15',
                'name' => 'Due Out / Expected Departure',
                'code' => 'DO/ED',
                'info' => 'List of rooms expected to check out today according to their departure date.',
                'created_at' => '2022-10-26 10:09:02',
                'updated_at' => '2022-10-26 10:09:02'
            ),
            array(
                'id' => '16',
                'name' => 'Expected Arrival',
                'code' => 'EA',
                'info' => 'List of guests expected to arrive today.',
                'created_at' => '2022-10-26 10:09:02',
                'updated_at' => '2022-10-26 10:09:02'
            ),
            array(
                'id' => '17',
                'name' => 'Check Out',
                'code' => 'CO',
                'info' => 'Guests who have officially left the hotel today after settling all payments and returning their keys.',
                'created_at' => '2022-10-26 10:09:02',
                'updated_at' => '2022-10-26 10:09:02'
            ),
            array(
                'id' => '18',
                'name' => 'Late Check Out',
                'code' => 'LCO',
                'info' => 'A guest request to depart later than the standard check-out time.',
                'created_at' => '2022-10-26 10:09:02',
                'updated_at' => '2022-10-26 10:09:02'
            ),
            array(
                'id' => '19',
                'name' => 'Occupied no Luggage',
                'code' => 'ONL',
                'info' => 'A registered room showing no signs of guest belongings or luggage.',
                'created_at' => '2022-10-26 10:09:02',
                'updated_at' => '2022-10-26 10:09:02'
            ),
            array(
                'id' => '20',
                'name' => 'Double Lock',
                'code' => 'DL',
                'info' => 'A guest-requested security measure that prevents any access to the room, including by hotel staff.',
                'created_at' => '2022-10-26 10:09:02',
                'updated_at' => '2022-10-26 10:09:02'
            )
        );

        RoomStatus::create($rs[0]);
        RoomStatus::create($rs[1]);
        RoomStatus::create($rs[2]);
        RoomStatus::create($rs[3]);
        RoomStatus::create($rs[4]);
        RoomStatus::create($rs[5]);
        RoomStatus::create($rs[6]);
        RoomStatus::create($rs[7]);
        RoomStatus::create($rs[8]);
        RoomStatus::create($rs[9]);
        RoomStatus::create($rs[10]);
        RoomStatus::create($rs[11]);
        RoomStatus::create($rs[12]);
        RoomStatus::create($rs[13]);
        RoomStatus::create($rs[14]);
        RoomStatus::create($rs[15]);
        RoomStatus::create($rs[16]);
        RoomStatus::create($rs[17]);
        RoomStatus::create($rs[18]);
        RoomStatus::create($rs[19]);
    }
}
